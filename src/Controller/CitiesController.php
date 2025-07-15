<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cities Controller
 *
 * @property \App\Model\Table\CitiesTable $Cities
 * @method \App\Model\Entity\City[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitiesController extends AppController
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
                'Countries.name LIKE' => '%' . $search . '%',
            ];
        }

         $statusOptions = [
        1 => 'Approved',
        0 => 'Suspended'
    ];

        $this->paginate = [
            'contain' => ['States'],
        ];
        $cities = $this->paginate($this->Cities);

        $this->set(compact('cities', 'search', 'statusOptions'));
    }

    /**
     * View method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => ['States'],
        ]);

        $this->set(compact('city'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $city = $this->Cities->newEmptyEntity();
        if ($this->request->is('post')) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $states = $this->Cities->States->find('list', ['limit' => 200])->all();
        $this->set(compact('city', 'states'));
    }

    /**
     * Edit method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $city = $this->Cities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $city = $this->Cities->patchEntity($city, $this->request->getData());
            if ($this->Cities->save($city)) {
                $this->Flash->success(__('The city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The city could not be saved. Please, try again.'));
        }
        $states = $this->Cities->States->find('list', ['limit' => 200])->all();
        $this->set(compact('city', 'states'));
    }

    /**
     * Delete method
     *
     * @param string|null $id City id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $city = $this->Cities->get($id);
        if ($this->Cities->delete($city)) {
            $this->Flash->success(__('The city has been deleted.'));
        } else {
            $this->Flash->error(__('The city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function updateStatus($id)
{
    $city = $this->Cities->get($id);

    if ($this->request->is('post')) {
        $status = $this->request->getData('status');
        $city->status = $status;

        if ($this->Cities->save($city)) {
            $this->Flash->success(__('The status has been updated.'));
        } else {
            $this->Flash->error(__('The status could not be updated. Please, try again.'));
        }
    }

    return $this->redirect(['action' => 'index']);
}

public function otherCities()
{

    $search = $this->request->getQuery('search');
    $conditions = [];

    if ($search) {
        $conditions['OR'] = [
            'Countries.name LIKE' => '%' . $search . '%',
        ];
    }

     $statusOptions = [
    1 => 'Approved',
    0 => 'Suspended'
];

    $this->paginate = [
        'contain' => ['States'],
    ];
    $cities = $this->paginate($this->Cities);

    $this->set(compact('cities', 'search', 'statusOptions'));
    
}

}


