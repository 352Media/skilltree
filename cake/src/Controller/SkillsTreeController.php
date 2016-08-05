<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SkillsTree Controller
 *
 * @property \App\Model\Table\SkillsTreeTable $SkillsTree
 */
class SkillsTreeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentSkillsTree', 'Skills']
        ];
        $skillsTree = $this->paginate($this->SkillsTree);

        $this->set(compact('skillsTree'));
        $this->set('_serialize', ['skillsTree']);
    }

        /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function listTree()
    {   
        $skillsTree = $this->SkillsTree->find('threaded', ['contain' => ['Skills']])->toArray();;
        $this->set(compact('skillsTree'));
        $this->set('_serialize', ['skillsTree']);
    }

    /**
     * View method
     *
     * @param string|null $id Skills Tree id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skillsTree = $this->SkillsTree->get($id, [
            'contain' => ['ParentSkillsTree', 'Skills', 'ChildSkillsTree']
        ]);

        $this->set('skillsTree', $skillsTree);
        $this->set('_serialize', ['skillsTree']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skillsTree = $this->SkillsTree->newEntity();
        if ($this->request->is('post')) {
            $skillsTree = $this->SkillsTree->patchEntity($skillsTree, $this->request->data);
            if ($this->SkillsTree->save($skillsTree)) {
                $this->Flash->success(__('The skills tree has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                debug($skillsTree->errors());
                $this->Flash->error(__('The skills tree could not be saved. Please, try again.'));
            }
        }
        $parentSkillsTree = $this->SkillsTree->ParentSkillsTree->find('list', [
            'limit' => 200, 'keyField' => 'id',
            'valueField' => 'name'
        ]);

        $skills = $this->SkillsTree->Skills->find('list', ['limit' => 200]);
        $this->set(compact('skillsTree', 'parentSkillsTree', 'skills'));
        $this->set('_serialize', ['skillsTree']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Skills Tree id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skillsTree = $this->SkillsTree->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skillsTree = $this->SkillsTree->patchEntity($skillsTree, $this->request->data);
            if ($this->SkillsTree->save($skillsTree)) {
                $this->Flash->success(__('The skills tree has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                debug($skillsTree->errors());
                exit;
                $this->Flash->error(__('The skills tree could not be saved. Please, try again.'));
            }
        }
        $parentSkillsTree = $this->SkillsTree->ParentSkillsTree->find('list', ['limit' => 200]);
        $skills = $this->SkillsTree->Skills->find('list', ['limit' => 200]);
        $this->set(compact('skillsTree', 'parentSkillsTree', 'skills'));
        $this->set('_serialize', ['skillsTree']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skills Tree id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skillsTree = $this->SkillsTree->get($id);
        if ($this->SkillsTree->delete($skillsTree)) {
            $this->Flash->success(__('The skills tree has been deleted.'));
        } else {
            $this->Flash->error(__('The skills tree could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
