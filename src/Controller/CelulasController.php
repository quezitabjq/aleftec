<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Celulas Controller
 *
 * @property \App\Model\Table\CelulasTable $Celulas
 *
 * @method \App\Model\Entity\Celula[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CelulasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $celulas = $this->paginate($this->Celulas);

        $this->set(compact('celulas'));
    }

    /**
     * View method
     *
     * @param string|null $id Celula id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $celula = $this->Celulas->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('celula', $celula);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $celula = $this->Celulas->newEntity();
        if ($this->request->is('post')) {
            $celula = $this->Celulas->patchEntity($celula, $this->request->getData());
            if ($this->Celulas->save($celula)) {
                $this->Flash->success(__('The celula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The celula could not be saved. Please, try again.'));
        }
        $users = $this->Celulas->Users->find('list', ['limit' => 200]);
        $this->set(compact('celula', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Celula id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $celula = $this->Celulas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $celula = $this->Celulas->patchEntity($celula, $this->request->getData());
            if ($this->Celulas->save($celula)) {
                $this->Flash->success(__('The celula has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The celula could not be saved. Please, try again.'));
        }
        $users = $this->Celulas->Users->find('list', ['limit' => 200]);
        $this->set(compact('celula', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Celula id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $celula = $this->Celulas->get($id);
        if ($this->Celulas->delete($celula)) {
            $this->Flash->success(__('The celula has been deleted.'));
        } else {
            $this->Flash->error(__('The celula could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
