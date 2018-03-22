<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Profissaos Controller
 *
 * @property \App\Model\Table\ProfissaosTable $Profissaos
 */
class ProfissaosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $profissaos = $this->paginate($this->Profissaos);

        $this->set(compact('profissaos'));
        $this->set('_serialize', ['profissaos']);
    }

    /**
     * View method
     *
     * @param string|null $id Profissao id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profissao = $this->Profissaos->get($id, [
            'contain' => ['Pessoas']
        ]);

        $this->set('profissao', $profissao);
        $this->set('_serialize', ['profissao']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profissao = $this->Profissaos->newEntity();
        if ($this->request->is('post')) {
            $profissao = $this->Profissaos->patchEntity($profissao, $this->request->data);
            if ($this->Profissaos->save($profissao)) {
                $this->Flash->success(__('The profissao has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The profissao could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('profissao'));
        $this->set('_serialize', ['profissao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profissao id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profissao = $this->Profissaos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profissao = $this->Profissaos->patchEntity($profissao, $this->request->data);
            if ($this->Profissaos->save($profissao)) {
                $this->Flash->success(__('The profissao has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The profissao could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('profissao'));
        $this->set('_serialize', ['profissao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profissao id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profissao = $this->Profissaos->get($id);
        if ($this->Profissaos->delete($profissao)) {
            $this->Flash->success(__('The profissao has been deleted.'));
        } else {
            $this->Flash->error(__('The profissao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
