<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * LawArticles Controller
 *
 * @property \App\Model\Table\LawArticlesTable $LawArticles
 * @method \App\Model\Entity\LawArticle[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LawArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

        $search = $this->request->getQuery('search');
        $conditions = [];
    
        if ($search) {
            $conditions['OR'] = [
                'LawArticles.article_title LIKE' => '%' . $search . '%',
                'LawArticles.added_by LIKE' => '%' . $search . '%',

            ];
        }
    
        $this->paginate = [
            'conditions' => $conditions,
            'limit' => 10,
            'order' => ['LawArticles.id' => 'asc'],
        ];
    
        $lawArticles = $this->paginate($this->LawArticles->find());

        $this->set(compact('lawArticles', 'search'));
    }

    /**
     * View method
     *
     * @param string|null $id Law Article id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // Fetch the law article by its ID
        $lawArticle = $this->LawArticles->get($id, [
            'contain' => [],
        ]);

        $practiceAreas = $this->LawArticles->Practicearea->find('list', [
            'keyField' => 'practice_area_id',
            'valueField' => 'practice_area_title'
        ])->toArray();
    
        $this->set(compact('lawArticle', 'practiceAreas'));

        // Increment the view count
        $lawArticle->views = $lawArticle->views + 1;

        // Save the updated view count
        if ($this->LawArticles->save($lawArticle)) {
            $this->set(compact('lawArticle'));
        } else {
            $this->Flash->error(__('The view count could not be updated. Please, try again.'));
        }
       
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $lawArticle = $this->LawArticles->newEmptyEntity();
    
    if ($this->request->is('post')) {
        $data = $this->request->getData();
        
        // Set default values
        $data['added_on'] = date('Y-m-d'); // Current date
        $data['added_by'] = 'Admin'; // Admin by default
        $data['status'] = 1; // Approved status
        
        $lawArticle = $this->LawArticles->patchEntity($lawArticle, $data);
        if ($this->LawArticles->save($lawArticle)) {
            $this->Flash->success(__('The law article has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The law article could not be saved. Please, try again.'));
    }

    // Fetch the list of practice areas for the dropdown
    $practiceAreas = $this->LawArticles->Practicearea->find('list', [
        'keyField' => 'practice_area_id',
        'valueField' => 'practice_area_title'
    ])->toArray();

    $this->set(compact('lawArticle', 'practiceAreas'));
}


    /**
     * Edit method
     *
     * @param string|null $id Law Article id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lawArticle = $this->LawArticles->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lawArticle = $this->LawArticles->patchEntity($lawArticle, $this->request->getData());
            if ($this->LawArticles->save($lawArticle)) {
                $this->Flash->success(__('The law article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The law article could not be saved. Please, try again.'));
        }

        $practiceAreas = $this->LawArticles->Practicearea->find('list', [
            'keyField' => 'practice_area_id',
            'valueField' => 'practice_area_title'
        ])->toArray();
    
        $this->set(compact('lawArticle', 'practiceAreas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Law Article id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lawArticle = $this->LawArticles->get($id);
        if ($this->LawArticles->delete($lawArticle)) {
            $this->Flash->success(__('The law article has been deleted.'));
        } else {
            $this->Flash->error(__('The law article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function toggleStatus($id = null)
{
    try {
        // Fetch the law article by its ID
        $lawArticle = $this->LawArticles->get($id);

        // Toggle the status
        $lawArticle->status = $lawArticle->status ? 0 : 1;

        // Save the updated status
        if ($this->LawArticles->save($lawArticle)) {
            $this->Flash->success(__('The status has been changed.'));
        } else {
            $this->Flash->error(__('The status could not be changed. Please, try again.'));
        }
    } catch (\Cake\Datasource\Exception\RecordNotFoundException $e) {
        $this->Flash->error(__('Law article not found.'));
    }

    // Redirect to the referring page
    return $this->redirect($this->referer());
}

}
