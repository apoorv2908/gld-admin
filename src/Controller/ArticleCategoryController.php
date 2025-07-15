<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ArticleCategory Controller
 *
 * @property \App\Model\Table\ArticleCategoryTable $ArticleCategory
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticleCategoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $articleCategory = $this->paginate($this->ArticleCategory);

         $search = $this->request->getQuery('search');
        $conditions = [];
    
        if ($search) {
            $conditions['OR'] = [
                'ArticleCategory.article_title LIKE' => '%' . $search . '%',
            ];
        }

         $statusOptions = [
        1 => 'Approved',
        0 => 'Suspended'
    ];

        $this->set(compact('articleCategory',  'statusOptions', 'search'));
    }

    /**
     * View method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $articleCategory = $this->ArticleCategory->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('articleCategory'));
    }


     public function updateStatus($id)
{
    $articleCategory = $this->ArticleCategory->get($id);

    if ($this->request->is('post')) {
        $status = $this->request->getData('status');
        $articleCategory->status = $status;

        if ($this->ArticleCategory->save($articleCategory)) {
            $this->Flash->success(__('The status has been updated.'));
        } else {
            $this->Flash->error(__('The status could not be updated. Please, try again.'));
        }
    }

    return $this->redirect(['action' => 'index']);
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $articleCategory = $this->ArticleCategory->newEmptyEntity();
        if ($this->request->is('post')) {
            $articleCategory = $this->ArticleCategory->patchEntity($articleCategory, $this->request->getData());
            if ($this->ArticleCategory->save($articleCategory)) {
                $this->Flash->success(__('The article category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article category could not be saved. Please, try again.'));
        }
        $this->set(compact('articleCategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $articleCategory = $this->ArticleCategory->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $articleCategory = $this->ArticleCategory->patchEntity($articleCategory, $this->request->getData());
            if ($this->ArticleCategory->save($articleCategory)) {
                $this->Flash->success(__('The article category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article category could not be saved. Please, try again.'));
        }
        $this->set(compact('articleCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $articleCategory = $this->ArticleCategory->get($id);
        if ($this->ArticleCategory->delete($articleCategory)) {
            $this->Flash->success(__('The article category has been deleted.'));
        } else {
            $this->Flash->error(__('The article category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
