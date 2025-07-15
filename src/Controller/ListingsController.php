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
            'Listings.country_name LIKE' => '%' . $search . '%',
            'Listings.state_name LIKE' => '%' . $search . '%',
            'Listings.city_name LIKE' => '%' . $search . '%',
        ];
        }

          $this->paginate = [
            'conditions' => $conditions,
            'limit' => 10,
        ];
        
        $listings = $this->paginate($this->Listings->find());


    
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
            'conditions' => ['Listings.is_suspended' => 1],
        ];
        $listings = $this->paginate($this->Listings);
    
        $this->set(compact('listings', 'search'));
    }


    public function editedListings(){

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
            'conditions' => ['Listings.isedited' => 1],
        ];
        $listings = $this->paginate($this->Listings);
    
        $this->set(compact('listings', 'search'));
    }


    public function pendingListings()
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
            'conditions' => ['Listings.status' => 0, 'Listings.is_suspended' => 0],
        ];
        $listings = $this->paginate($this->Listings);
    
        $this->set(compact('listings', 'search'));
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


    public function editLawyerPage($id = null)
{
    $this->loadModel('Practicearea');
    $this->loadModel('Listings');
    $this->loadModel('Countries');
    $this->loadModel('States');
    $this->loadModel('Cities');
    $this->loadModel('Users');

    // Fetch practice areas and countries for dropdowns
    $practicearea = $this->Practicearea->find('list', ['keyField' => 'practice_area_id', 'valueField' => 'practice_area_title'])->toArray();
    $countries = $this->Countries->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

    $user = $this->Authentication->getIdentity();
    
    // Get the current listing - changed query to use listing ID or user ID
    $listing = $this->Listings->find()
        ->where([
            'OR' => [
                ['id' => $id],  // Try by listing ID first
                ['user_id' => $id, 'listing_type' => 'Lawyer']  // Fallback to user ID
            ]
        ])
        ->first();

    if (!$listing) {
        $this->Flash->error(__('Lawyer listing not found.'));
        return $this->redirect(['action' => 'directoryOfLawyers']);
    }
    // Fetch states and cities based on the listing's country/state
    $states = $this->States->find('list', ['keyField' => 'id', 'valueField' => 'name'])
        ->where(['country_id' => $listing->country])
        ->toArray();

    $cities = $this->Cities->find('list', ['keyField' => 'id', 'valueField' => 'name'])
        ->where(['state_id' => $listing->state])
        ->toArray();

    // Decode JSON fields if they exist
    if (!empty($listing->court_of_practice)) {
        $listing->court_of_practice = json_decode($listing->court_of_practice, true);
    }

    // Convert practice area string to array
    if (!empty($listing->practice_area)) {
        $listing->practice_area = explode(',', $listing->practice_area);
    }

    if ($this->request->is(['post', 'put'])) {
        $data = $this->request->getData();

        // Handle file upload (only if new file is uploaded)
        if (!empty($data['remove_image'])) {
            // Delete old image if exists
            if (!empty($listing->image)) {
                $oldFile = WWW_ROOT . 'img' . DS . $listing->image;
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            
            $uploadedFile = $data['image'];
            $fileName = time() . '_' . $uploadedFile->getClientFilename();
            $filePath = WWW_ROOT . 'img' . DS . 'uploads' . DS . $fileName;
            $uploadedFile->moveTo($filePath);
            $data['image'] = 'uploads' . DS . $fileName;
        } else {
            // Keep existing image if no new file uploaded
            unset($data['image']);
        }

        // Update location names
        if (!empty($data['country'])) {
            $country = $this->Countries->findById($data['country'])->first();
            $data['country_name'] = $country->name ?? null;
        }

        if (!empty($data['state'])) {
            $state = $this->States->findById($data['state'])->first();
            $data['state_name'] = $state->name ?? null;
        }

        if (!empty($data['city'])) {
            $city = $this->Cities->findById($data['city'])->first();
            $data['city_name'] = $city->name ?? null;
        }

        // Handle practice areas
        if (!empty($data['practice_area']) && is_array($data['practice_area'])) {
            $data['practice_area'] = array_filter($data['practice_area']);
            $selectedPracticeAreas = $this->Practicearea->find('list')
                ->where(['practice_area_id IN' => $data['practice_area']])
                ->toArray();
            $data['practice_area'] = implode(',', $data['practice_area']);
            $data['practice_area_name'] = implode(', ', $selectedPracticeAreas);
        }

        // Handle court of practice
        if (isset($data['court_of_practice'])) {
            $data['court_of_practice'] = json_encode($data['court_of_practice']);
        }

        

        $listing = $this->Listings->patchEntity($listing, $data);

        if ($this->Listings->save($listing)) {
            $this->Flash->success(__('Your listing has been updated.'));
            return $this->redirect(['controller' => 'myaccount']);
        } else {
            $this->Flash->error(__('Unable to update your listing. Please try again.'));
        }
    }

    $this->set(compact('listing', 'practicearea', 'countries', 'states', 'cities'));
    $this->render('edit_lawyer_page');
}



   public function editLawfirmPage($id = null)
{
    $this->loadModel('Practicearea');
    $this->loadModel('Listings');
    $this->loadModel('Countries');
    $this->loadModel('States');
    $this->loadModel('Cities');
    $this->loadModel('Users');

    // Fetch practice areas and countries for dropdowns
    $practicearea = $this->Practicearea->find('list', ['keyField' => 'practice_area_id', 'valueField' => 'practice_area_title'])->toArray();
    $countries = $this->Countries->find('list', ['keyField' => 'id', 'valueField' => 'name'])->toArray();

    $user = $this->Authentication->getIdentity();
    
    // Get the current listing - changed query to use listing ID or user ID
    $listing = $this->Listings->find()
        ->where([
            'OR' => [
                ['id' => $id],  // Try by listing ID first
                ['user_id' => $id, 'listing_type' => 'Lawyer']  // Fallback to user ID
            ]
        ])
        ->first();

    if (!$listing) {
        $this->Flash->error(__('Lawyer listing not found.'));
        return $this->redirect(['action' => 'directoryOfLawyers']);
    }
    // Fetch states and cities based on the listing's country/state
    $states = $this->States->find('list', ['keyField' => 'id', 'valueField' => 'name'])
        ->where(['country_id' => $listing->country])
        ->toArray();

    $cities = $this->Cities->find('list', ['keyField' => 'id', 'valueField' => 'name'])
        ->where(['state_id' => $listing->state])
        ->toArray();

    // Decode JSON fields if they exist
    if (!empty($listing->court_of_practice)) {
        $listing->court_of_practice = json_decode($listing->court_of_practice, true);
    }

    // Convert practice area string to array
    if (!empty($listing->practice_area)) {
        $listing->practice_area = explode(',', $listing->practice_area);
    }

    if ($this->request->is(['post', 'put'])) {
        $data = $this->request->getData();

        // Handle file upload (only if new file is uploaded)
        if (!empty($data['remove_image'])) {
            // Delete old image if exists
            if (!empty($listing->image)) {
                $oldFile = WWW_ROOT . 'img' . DS . $listing->image;
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            
            $uploadedFile = $data['image'];
            $fileName = time() . '_' . $uploadedFile->getClientFilename();
            $filePath = WWW_ROOT . 'img' . DS . 'uploads' . DS . $fileName;
            $uploadedFile->moveTo($filePath);
            $data['image'] = 'uploads' . DS . $fileName;
        } else {
            // Keep existing image if no new file uploaded
            unset($data['image']);
        }

        // Update location names
        if (!empty($data['country'])) {
            $country = $this->Countries->findById($data['country'])->first();
            $data['country_name'] = $country->name ?? null;
        }

        if (!empty($data['state'])) {
            $state = $this->States->findById($data['state'])->first();
            $data['state_name'] = $state->name ?? null;
        }

        if (!empty($data['city'])) {
            $city = $this->Cities->findById($data['city'])->first();
            $data['city_name'] = $city->name ?? null;
        }

        // Handle practice areas
        if (!empty($data['practice_area']) && is_array($data['practice_area'])) {
            $data['practice_area'] = array_filter($data['practice_area']);
            $selectedPracticeAreas = $this->Practicearea->find('list')
                ->where(['practice_area_id IN' => $data['practice_area']])
                ->toArray();
            $data['practice_area'] = implode(',', $data['practice_area']);
            $data['practice_area_name'] = implode(', ', $selectedPracticeAreas);
        }

        // Handle court of practice
        if (isset($data['court_of_practice'])) {
            $data['court_of_practice'] = json_encode($data['court_of_practice']);
        }

        

        $listing = $this->Listings->patchEntity($listing, $data);

        if ($this->Listings->save($listing)) {
            $this->Flash->success(__('Your listing has been updated.'));
            return $this->redirect(['controller' => 'myaccount']);
        } else {
            $this->Flash->error(__('Unable to update your listing. Please try again.'));
        }
    }

    $this->set(compact('listing', 'practicearea', 'countries', 'states', 'cities'));
    $this->render('edit_lawfirm_page');
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
