<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * States Controller
 *
 * @property \App\Model\Table\StatesTable $States
 * @method \App\Model\Entity\State[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StatesController extends AppController
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
            'States.name LIKE' => '%' . $search . '%',
        ];
    }

    // Handle status change request
    $statusOptions = [
        1 => 'Approved',
        0 => 'Suspended'
    ];

    $this->paginate = [
        'conditions' => $conditions,
        'contain' => ['Countries'],
    ];
    $states = $this->paginate($this->States);

    $this->set(compact('states', 'search', 'statusOptions'));
}


public function updateStatus($id)
{
    $states = $this->States->get($id);

    if ($this->request->is('post')) {
        $status = $this->request->getData('status');
        $states->status = $status;

        if ($this->States->save($states)) {
            $this->Flash->success(__('The status has been updated.'));
        } else {
            $this->Flash->error(__('The status could not be updated. Please, try again.'));
        }
    }

    return $this->redirect(['action' => 'index']);
}




    /**
     * View method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $state = $this->States->get($id, [
            'contain' => ['Countries', 'Cities'],
        ]);

        $this->set(compact('state'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $state = $this->States->newEmptyEntity();
        if ($this->request->is('post')) {
            $state = $this->States->patchEntity($state, $this->request->getData());
            if ($this->States->save($state)) {
                $this->Flash->success(__('The state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The state could not be saved. Please, try again.'));
        }
        $countries = $this->States->Countries->find('list', ['limit' => 200])->all();
        $this->set(compact('state', 'countries' ));
    }

    /**
     * Edit method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $state = $this->States->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $state = $this->States->patchEntity($state, $this->request->getData());
            if ($this->States->save($state)) {
                $this->Flash->success(__('The state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The state could not be saved. Please, try again.'));
        }
        $countries = $this->States->Countries->find('list', ['limit' => 200])->all();
        $this->set(compact('state', 'countries'));
    }

    /**
     * Delete method
     *
     * @param string|null $id State id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $state = $this->States->get($id);
        if ($this->States->delete($state)) {
            $this->Flash->success(__('The state has been deleted.'));
        } else {
            $this->Flash->error(__('The state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function otherStates()
    {
        $search = $this->request->getQuery('search');
    $conditions = [];
    
    if ($search) {
        $conditions['OR'] = [
            'States.name LIKE' => '%' . $search . '%',
        ];
    }

    // Handle status change request
    $statusOptions = [
        1 => 'Approved',
        0 => 'Suspended'
    ];

    $this->paginate = [
        'conditions' => $conditions,
        'contain' => ['Countries'],
    ];
    $states = $this->paginate($this->States);

    $this->set(compact('states', 'search', 'statusOptions'));
        
    }
}
