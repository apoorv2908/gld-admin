<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Admin Controller
 *
 * @property \App\Model\Table\AdminTable $Admin
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $admin = $this->paginate($this->Admin);

         $search = $this->request->getQuery('search');
        $conditions = [];
    
        if ($search) {
            $conditions['OR'] = [
                'Admin.name LIKE' => '%' . $search . '%',
            ];
        }

        $this->set(compact('admin', 'search'));

       
    }

    /**
     * View method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admin = $this->Admin->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('admin'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $admin = $this->Admin->newEmptyEntity();
        if ($this->request->is('post')) {
            $admin = $this->Admin->patchEntity($admin, $this->request->getData());
            if ($this->Admin->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $this->set(compact('admin'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $admin = $this->Admin->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $admin = $this->Admin->patchEntity($admin, $this->request->getData());
            if ($this->Admin->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $this->set(compact('admin'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admin->get($id);
        if ($this->Admin->delete($admin)) {
            $this->Flash->success(__('The admin has been deleted.'));
        } else {
            $this->Flash->error(__('The admin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function beforeFilter(\Cake\Event\EventInterface $event)
{
parent::beforeFilter($event);
// Configure the login action to not require authentication, preventing
// the infinite redirect loop issue
$this->Authentication->addUnauthenticatedActions(['login']);
$this->Authentication->addUnauthenticatedActions(['login', 'add']);

}
public function login()
{
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();

    // If user is already authenticated, redirect them
    if ($result && $result->isValid()) {
        // Ensure the redirect is set correctly
        $redirect = $this->request->getQuery('redirect');
        
        if (!$redirect) {
            $redirect = ['controller' => 'Dashboard', 'action' => 'index'];
        }

        return $this->redirect($redirect);
    }

    // If login fails, show error message
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
}

public function logout()
{
$result = $this->Authentication->getResult();
// regardless of POST or GET, redirect if user is logged in
if ($result && $result->isValid()) {
$this->Authentication->logout();
return $this->redirect(['controller' => 'Admin', 'action' => 'login']);
}
}

}
