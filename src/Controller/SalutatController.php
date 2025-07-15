<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Salutat Controller
 *
 * @property \App\Model\Table\SalutatTable $Salutat
 * @method \App\Model\Entity\Salutat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalutatController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $salutat = $this->paginate($this->Salutat);

          $search = $this->request->getQuery('search');
        $conditions = [];
    
        if ($search) {
            $conditions['OR'] = [
                'Salutat.salutat_name LIKE' => '%' . $search . '%',
            ];
        }

        
        $statusOptions = [
        1 => 'Approved',
        0 => 'Suspended'
    ];

        $this->set(compact('salutat', 'search', 'statusOptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Salutat id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salutat = $this->Salutat->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('salutat'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salutat = $this->Salutat->newEmptyEntity();
        if ($this->request->is('post')) {
            $salutat = $this->Salutat->patchEntity($salutat, $this->request->getData());
            if ($this->Salutat->save($salutat)) {
                $this->Flash->success(__('The salutat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salutat could not be saved. Please, try again.'));
        }
        $this->set(compact('salutat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Salutat id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salutat = $this->Salutat->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salutat = $this->Salutat->patchEntity($salutat, $this->request->getData());
            if ($this->Salutat->save($salutat)) {
                $this->Flash->success(__('The salutat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The salutat could not be saved. Please, try again.'));
        }
        $this->set(compact('salutat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Salutat id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salutat = $this->Salutat->get($id);
        if ($this->Salutat->delete($salutat)) {
            $this->Flash->success(__('The salutat has been deleted.'));
        } else {
            $this->Flash->error(__('The salutat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function updateStatus($id)
{
    $salutat = $this->Salutat->get($id);

    if ($this->request->is('post')) {
        $status = $this->request->getData('status');
        $salutat->status = $status;

        if ($this->Salutat->save($salutat)) {
            $this->Flash->success(__('The status has been updated.'));
        } else {
            $this->Flash->error(__('The status could not be updated. Please, try again.'));
        }
    }

    return $this->redirect(['action' => 'index']);
}
}
