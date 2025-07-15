<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {

         $orders = $this->paginate($this->Orders);

         $search = $this->request->getQuery('search');
        $conditions = [];
    
        if ($search) {
            $conditions['OR'] = [
                'Orders.invoiceNumber LIKE' => '%' . $search . '%',
                                'Orders.orderId LIKE' => '%' . $search . '%',
                                                'Orders.emailId LIKE' => '%' . $search . '%',
                'Orders.userId LIKE' => '%' . $search . '%',
                                'Orders.invoiceId LIKE' => '%' . $search . '%',
                'Orders.listingId LIKE' => '%' . $search . '%',
                                'Orders.userName LIKE' => '%' . $search . '%',




            ];
        }

        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders', 'search'));
    }



     public function unpaidOrders()
    {

         $orders = $this->paginate($this->Orders);

         $search = $this->request->getQuery('search');
        $conditions = [];
    
        if ($search) {
            $conditions['OR'] = [
                'Orders.invoiceNumber LIKE' => '%' . $search . '%',
                                'Orders.orderId LIKE' => '%' . $search . '%',
                                                'Orders.emailId LIKE' => '%' . $search . '%',
                'Orders.userId LIKE' => '%' . $search . '%',
                                'Orders.invoiceId LIKE' => '%' . $search . '%',
                'Orders.listingId LIKE' => '%' . $search . '%',
                                'Orders.userName LIKE' => '%' . $search . '%',




            ];
        }

        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders', 'search'));
    }

     public function paidOrders()
    {

         $orders = $this->paginate($this->Orders);

         $search = $this->request->getQuery('search');
        $conditions = [];
    
        if ($search) {
            $conditions['OR'] = [
                'Orders.invoiceNumber LIKE' => '%' . $search . '%',
                                'Orders.orderId LIKE' => '%' . $search . '%',
                                                'Orders.emailId LIKE' => '%' . $search . '%',
                'Orders.userId LIKE' => '%' . $search . '%',
                                'Orders.invoiceId LIKE' => '%' . $search . '%',
                'Orders.listingId LIKE' => '%' . $search . '%',
                                'Orders.userName LIKE' => '%' . $search . '%',




            ];
        }

        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders', 'search'));
    }


     public function invoice()
    {

         $orders = $this->paginate($this->Orders);

         $search = $this->request->getQuery('search');
        $conditions = [];
    
        if ($search) {
            $conditions['OR'] = [
                'Orders.invoiceNumber LIKE' => '%' . $search . '%',
                                'Orders.orderId LIKE' => '%' . $search . '%',
                                                'Orders.emailId LIKE' => '%' . $search . '%',
                'Orders.userId LIKE' => '%' . $search . '%',
                                'Orders.invoiceId LIKE' => '%' . $search . '%',
                'Orders.listingId LIKE' => '%' . $search . '%',
                                'Orders.userName LIKE' => '%' . $search . '%',




            ];
        }

        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders', 'search'));
    }



    



    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
