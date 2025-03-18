<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Practicearea Controller
 *
 * @property \App\Model\Table\PracticeareaTable $Practicearea
 * @method \App\Model\Entity\Practicearea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PracticeareaController extends AppController
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
                'Practicearea.practice_area_title LIKE' => '%' . $search . '%',
            ];
        }
    
        $this->paginate = [
            'conditions' => $conditions,
            'limit' => 10,
            'order' => ['Practicearea.practice_area_title' => 'asc'],
        ];
    
        $practicearea = $this->paginate($this->Practicearea->find());

        $this->set(compact('practicearea', 'search'));
    


        
    }

    /**
     * View method
     *
     * @param string|null $id Practicearea id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {


        $practicearea = $this->Practicearea->findByPracticeAreaId($id)->firstOrFail();
    $this->set(compact('practicearea'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $practicearea = $this->Practicearea->newEmptyEntity();
        if ($this->request->is('post')) {
            $practicearea = $this->Practicearea->patchEntity($practicearea, $this->request->getData());
            if ($this->Practicearea->save($practicearea)) {
                $this->Flash->success(__('The practicearea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The practicearea could not be saved. Please, try again.'));
        }
        $this->set(compact('practicearea'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Practicearea id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $practicearea = $this->Practicearea->findByPracticeAreaId($id)->firstOrFail();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $practicearea = $this->Practicearea->patchEntity($practicearea, $this->request->getData());
            if ($this->Practicearea->save($practicearea)) {
                $this->Flash->success(__('The practicearea has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The practicearea could not be saved. Please, try again.'));
        }
        $this->set(compact('practicearea'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Practicearea id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $practicearea = $this->Practicearea->findByPracticeAreaId($id)->firstOrFail();
        if ($this->Practicearea->delete($practicearea)) {
            $this->Flash->success(__('The practicearea has been deleted.'));
        } else {
            $this->Flash->error(__('The practicearea could not be deleted. Please, try again.'));
        }
    
        return $this->redirect(['action' => 'index']);
    }

  
}
