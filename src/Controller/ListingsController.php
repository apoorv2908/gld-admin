<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Listings Controller
 *
 * @property \App\Model\Table\ListingsTable $Listings
 * @method \App\Model\Entity\Listing[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListingsController extends AppController
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
            'Listings.firstname LIKE' => '%' . $search . '%',
            'Listings.lastname LIKE' => '%' . $search . '%',
            'Listings.email LIKE' => '%' . $search . '%',
            'Listings.listing_id LIKE' => '%' . $search . '%',
            'Listings.country LIKE' => '%' . $search . '%',
            'Listings.state LIKE' => '%' . $search . '%',
            'Listings.city LIKE' => '%' . $search . '%',
        ];
        }

        $this->paginate = [
            'contain' => ['Users'],
    'conditions' => array_merge(['Listings.is_suspended' => 0], $conditions)

        ];
        
        $listings = $this->paginate($this->Listings);
    
        // For handling status changes via dropdown
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listingId = $this->request->getData('listing_id');
            $status = $this->request->getData('status');
    
            $listing = $this->Listings->get($listingId);
    
            if ($status === '1') { // Approved
                $listing->status = 1;
                $listing->listing_status = 'Approved';
            } elseif ($status === '2') { // Suspended
                $listing->is_suspended = 1;
                $listing->listing_status = 'Suspended';
            } else { // Pending Approval
                $listing->status = 0;
                $listing->listing_status = 'Pending Approval';
            }
    
            if ($this->Listings->save($listing)) {
                $this->Flash->success(__('The listing status has been updated.'));
            } else {
                $this->Flash->error(__('The listing status could not be updated. Please, try again.'));
            }
    
            return $this->redirect(['action' => 'index']);
        }
    
        $this->set(compact('listings', 'search'));
    }
    



    public function suspendedListings()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => ['Listings.is_suspended' => 1],
        ];
        $listings = $this->paginate($this->Listings);
    
        $this->set(compact('listings'));
    }


    public function pendingListings()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'conditions' => ['Listings.status' => 0, 'Listings.is_suspended' => 0],
        ];
        $listings = $this->paginate($this->Listings);
    
        $this->set(compact('listings'));
    }

    /**
     * View method
     *
     * @param string|null $id Listing id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listing = $this->Listings->get($id, [
            'contain' => ['Users', 'Listings'],
        ]);

        $this->set(compact('listing'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listing = $this->Listings->newEmptyEntity();
        if ($this->request->is('post')) {
            $listing = $this->Listings->patchEntity($listing, $this->request->getData());
            if ($this->Listings->save($listing)) {
                $this->Flash->success(__('The listing has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The listing could not be saved. Please, try again.'));
        }
        $users = $this->Listings->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('listing', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Listing id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listing = $this->Listings->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            // Handle status dropdown change
            if ($this->request->getData('status') == 1) {
                $listing->status = 1; // Approved
                $listing->is_suspended = 0;
            } elseif ($this->request->getData('status') == 2) {
                $listing->is_suspended = 1; // Suspended
                $listing->status = 0;
            }
    
            if ($this->Listings->save($listing)) {
                $this->Flash->success(__('The listing has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The listing could not be updated. Please, try again.'));
        }
        $users = $this->Listings->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('listing', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Listing id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listing = $this->Listings->get($id);
        if ($this->Listings->delete($listing)) {
            $this->Flash->success(__('The listing has been deleted.'));
        } else {
            $this->Flash->error(__('The listing could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
