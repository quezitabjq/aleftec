<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cultos Controller
 *
 * @property \App\Model\Table\CultosTable $Cultos
 */
class CultosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $cultos = $this->paginate($this->Cultos);

        $this->set(compact('cultos'));
        $this->set('_serialize', ['cultos']);
    }

    /**
     * View method
     *
     * @param string|null $id Culto id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $culto = $this->Cultos->get($id, [
            'contain' => ['Cultosalas']
        ]);

        $this->set('culto', $culto);
        $this->set('_serialize', ['culto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $culto = $this->Cultos->newEntity();
        if ($this->request->is('post')) {
            $culto = $this->Cultos->patchEntity($culto, $this->request->data);
            if ($this->Cultos->save($culto)) {
                $this->Flash->success(__('Registro Salvo com Sucesso'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The culto could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('culto'));
        $this->set('_serialize', ['culto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Culto id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $culto = $this->Cultos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $culto = $this->Cultos->patchEntity($culto, $this->request->data);
            if ($this->Cultos->save($culto)) {
                $this->Flash->success(__('The culto has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The culto could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('culto'));
        $this->set('_serialize', ['culto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Culto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $culto = $this->Cultos->get($id);
        if ($this->Cultos->delete($culto)) {
            $this->Flash->success(__('The culto has been deleted.'));
        } else {
            $this->Flash->error(__('The culto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
