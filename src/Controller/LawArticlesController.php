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


    public function pendingLawArticle()
{
    $search = $this->request->getQuery('search');
    $conditions = ['LawArticles.status' => 0]; // Fetch only pending articles

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

                    $this->loadModel('ArticleCategory');

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
    $practiceAreas = $this->LawArticles->ArticleCategory->find('list', [
        'keyField' => 'id',
        'valueField' => 'article_category'
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

                $this->loadModel('ArticleCategory');

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

        $practiceAreas = $this->LawArticles->ArticleCategory->find('list', [
            'keyField' => 'id',
            'valueField' => 'article_category'
        ])->toArray();

                        \Cake\Log\Log::write('debug', 'Validation Errors: ' . json_encode($lawArticle->getErrors()));

    
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

   public function toggleStatus($id = null, $status = null)
{
    $this->request->allowMethod(['post', 'ajax']);

    try {
        // Fetch the law article by ID
        $lawArticle = $this->LawArticles->get($id);
        
        // Validate status values (0, 1, 2)
        if (!in_array($status, [0, 1, 2])) {
            throw new \Exception("Invalid status value.");
        }

        // Update status
        $lawArticle->status = $status;

        if ($this->LawArticles->save($lawArticle)) {
            return $this->response->withType("application/json")->withStringBody(json_encode(["success" => true]));
        } else {
            return $this->response->withType("application/json")->withStringBody(json_encode(["success" => false]));
        }
    } catch (\Exception $e) {
        return $this->response->withType("application/json")->withStringBody(json_encode(["success" => false, "error" => $e->getMessage()]));
    }
}


}
