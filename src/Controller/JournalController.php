<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Journal Controller
 *
 * @property \App\Model\Table\JournalTable $Journal
 * @method \App\Model\Entity\Journal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class JournalController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $journal = $this->paginate($this->Journal);

        $this->set(compact('journal'));
    }

    /**
     * View method
     *
     * @param string|null $id Journal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $journal = $this->Journal->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('journal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $journal = $this->Journal->newEmptyEntity();
        if ($this->request->is('post')) {
            $journal = $this->Journal->patchEntity($journal, $this->request->getData());
            if ($this->Journal->save($journal)) {
                $this->Flash->success(__('The journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal could not be saved. Please, try again.'));
        }
        $this->set(compact('journal'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Journal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $journal = $this->Journal->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $journal = $this->Journal->patchEntity($journal, $this->request->getData());
            if ($this->Journal->save($journal)) {
                $this->Flash->success(__('The journal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The journal could not be saved. Please, try again.'));
        }
        $this->set(compact('journal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Journal id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $journal = $this->Journal->get($id);
        if ($this->Journal->delete($journal)) {
            $this->Flash->success(__('The journal has been deleted.'));
        } else {
            $this->Flash->error(__('The journal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
