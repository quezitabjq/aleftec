<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Salas Controller
 *
 * @property \App\Model\Table\SalasTable $Salas
 */
class SalasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $salas = $this->paginate($this->Salas);

        $this->set(compact('salas'));
        $this->set('_serialize', ['salas']);
    }

    /**
     * View method
     *
     * @param string|null $id Sala id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sala = $this->Salas->get($id, [
            'contain' => ['Alunos', 'Cultosalas']
        ]);

        $this->set('sala', $sala);
        $this->set('_serialize', ['sala']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sala = $this->Salas->newEntity();
        if ($this->request->is('post')) {
            $sala = $this->Salas->patchEntity($sala, $this->request->data);
            if ($this->Salas->save($sala)) {
                $this->Flash->success(__('The sala has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sala could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sala'));
        $this->set('_serialize', ['sala']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sala id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sala = $this->Salas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sala = $this->Salas->patchEntity($sala, $this->request->data);
            if ($this->Salas->save($sala)) {
                $this->Flash->success(__('The sala has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sala could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('sala'));
        $this->set('_serialize', ['sala']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sala id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sala = $this->Salas->get($id);
        if ($this->Salas->delete($sala)) {
            $this->Flash->success(__('The sala has been deleted.'));
        } else {
            $this->Flash->error(__('The sala could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
