<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Stats Controller
 *
 * @property \App\Model\Table\StatsTable $Stats
 */
class StatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $stats = $this->paginate($this->Stats);

        $this->set(compact('stats'));
        $this->set('_serialize', ['stats']);
    }

    /**
     * View method
     *
     * @param string|null $id Stat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stat = $this->Stats->get($id, [
            'contain' => ['Skills', 'Users']
        ]);

        $this->set('stat', $stat);
        $this->set('_serialize', ['stat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stat = $this->Stats->newEntity();
        if ($this->request->is('post')) {
            $stat = $this->Stats->patchEntity($stat, $this->request->data);
            if ($this->Stats->save($stat)) {
                $this->Flash->success(__('The stat has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stat could not be saved. Please, try again.'));
            }
        }
        $skills = $this->Stats->Skills->find('list', ['limit' => 200]);
        $users = $this->Stats->Users->find('list', ['limit' => 200]);
        $this->set(compact('stat', 'skills', 'users'));
        $this->set('_serialize', ['stat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Stat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stat = $this->Stats->get($id, [
            'contain' => ['Skills', 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stat = $this->Stats->patchEntity($stat, $this->request->data);
            if ($this->Stats->save($stat)) {
                $this->Flash->success(__('The stat has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The stat could not be saved. Please, try again.'));
            }
        }
        $skills = $this->Stats->Skills->find('list', ['limit' => 200]);
        $users = $this->Stats->Users->find('list', ['limit' => 200]);
        $this->set(compact('stat', 'skills', 'users'));
        $this->set('_serialize', ['stat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Stat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stat = $this->Stats->get($id);
        if ($this->Stats->delete($stat)) {
            $this->Flash->success(__('The stat has been deleted.'));
        } else {
            $this->Flash->error(__('The stat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
