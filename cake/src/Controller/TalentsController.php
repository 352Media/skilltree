<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Talents Controller
 *
 * @property \App\Model\Table\TalentsTable $Talents
 */
class TalentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $talents = $this->paginate($this->Talents);

        $this->set(compact('talents'));
        $this->set('_serialize', ['talents']);
    }

    /**
     * View method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $talent = $this->Talents->get($id, [
            'contain' => ['Skills']
        ]);

        $this->set('talent', $talent);
        $this->set('_serialize', ['talent']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $talent = $this->Talents->newEntity();
        if ($this->request->is('post')) {
            $talent = $this->Talents->patchEntity($talent, $this->request->data);
            if ($this->Talents->save($talent)) {
                $this->Flash->success(__('The talent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The talent could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('talent'));
        $this->set('_serialize', ['talent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $talent = $this->Talents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $talent = $this->Talents->patchEntity($talent, $this->request->data);
            if ($this->Talents->save($talent)) {
                $this->Flash->success(__('The talent has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The talent could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('talent'));
        $this->set('_serialize', ['talent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Talent id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $talent = $this->Talents->get($id);
        if ($this->Talents->delete($talent)) {
            $this->Flash->success(__('The talent has been deleted.'));
        } else {
            $this->Flash->error(__('The talent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
