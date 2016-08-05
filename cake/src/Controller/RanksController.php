<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ranks Controller
 *
 * @property \App\Model\Table\RanksTable $Ranks
 */
class RanksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Skills']
        ];
        $ranks = $this->paginate($this->Ranks);

        $this->set(compact('ranks'));
        $this->set('_serialize', ['ranks']);
    }

    /**
     * View method
     *
     * @param string|null $id Rank id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rank = $this->Ranks->get($id, [
            'contain' => ['Skills', 'UsersSkills']
        ]);

        $this->set('rank', $rank);
        $this->set('_serialize', ['rank']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rank = $this->Ranks->newEntity();
        if ($this->request->is('post')) {
            $rank = $this->Ranks->patchEntity($rank, $this->request->data);
            if ($this->Ranks->save($rank)) {
                $this->Flash->success(__('The rank has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rank could not be saved. Please, try again.'));
            }
        }
        $skills = $this->Ranks->Skills->find('list', ['limit' => 200]);
        $this->set(compact('rank', 'skills'));
        $this->set('_serialize', ['rank']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rank id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rank = $this->Ranks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rank = $this->Ranks->patchEntity($rank, $this->request->data);
            if ($this->Ranks->save($rank)) {
                $this->Flash->success(__('The rank has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rank could not be saved. Please, try again.'));
            }
        }
        $skills = $this->Ranks->Skills->find('list', ['limit' => 200]);
        $this->set(compact('rank', 'skills'));
        $this->set('_serialize', ['rank']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rank id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rank = $this->Ranks->get($id);
        if ($this->Ranks->delete($rank)) {
            $this->Flash->success(__('The rank has been deleted.'));
        } else {
            $this->Flash->error(__('The rank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
