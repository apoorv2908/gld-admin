<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Userdashboard Controller
 *
 * @method \App\Model\Entity\Userdashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserdashboardController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $userdashboard = $this->paginate($this->Userdashboard);

        $this->set(compact('userdashboard'));
    }

    /**
     * View method
     *
     * @param string|null $id Userdashboard id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userdashboard = $this->Userdashboard->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('userdashboard'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userdashboard = $this->Userdashboard->newEmptyEntity();
        if ($this->request->is('post')) {
            $userdashboard = $this->Userdashboard->patchEntity($userdashboard, $this->request->getData());
            if ($this->Userdashboard->save($userdashboard)) {
                $this->Flash->success(__('The userdashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userdashboard could not be saved. Please, try again.'));
        }
        $this->set(compact('userdashboard'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Userdashboard id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userdashboard = $this->Userdashboard->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userdashboard = $this->Userdashboard->patchEntity($userdashboard, $this->request->getData());
            if ($this->Userdashboard->save($userdashboard)) {
                $this->Flash->success(__('The userdashboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The userdashboard could not be saved. Please, try again.'));
        }
        $this->set(compact('userdashboard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Userdashboard id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userdashboard = $this->Userdashboard->get($id);
        if ($this->Userdashboard->delete($userdashboard)) {
            $this->Flash->success(__('The userdashboard has been deleted.'));
        } else {
            $this->Flash->error(__('The userdashboard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
