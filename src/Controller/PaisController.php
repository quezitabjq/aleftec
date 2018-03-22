<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pais Controller
 *
 * @property \App\Model\Table\PaisTable $Pais
 */
class PaisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tipopais', 'Pessoas']
        ];
        $pais = $this->paginate($this->Pais);

        $this->set(compact('pais'));
        $this->set('_serialize', ['pais']);
    }

    /**
     * View method
     *
     * @param string|null $id Pai id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pai = $this->Pais->get($id, [
            'contain' => ['Tipopais', 'Pessoas', 'Criancas']
        ]);

        $this->set('pai', $pai);
        $this->set('_serialize', ['pai']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pai = $this->Pais->newEntity();
        if ($this->request->is('post')) {
            $pai = $this->Pais->patchEntity($pai, $this->request->data);
            if ($this->Pais->save($pai)) {
                $this->Flash->success(__('Registro Salvo com Sucesso'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não é Possível Salvar esse Registro.'));
            }
        }
        $tipopais = $this->Pais->Tipopais->find('list', ['limit' => 200]);
        $pessoas = $this->Pais->Pessoas->find('list');
        $this->set(compact('pai', 'tipopais', 'pessoas'));
        $this->set('_serialize', ['pai']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pai id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pai = $this->Pais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pai = $this->Pais->patchEntity($pai, $this->request->data);
            if ($this->Pais->save($pai)) {
                $this->Flash->success(__('The pai has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pai could not be saved. Please, try again.'));
            }
        }
        $tipopais = $this->Pais->Tipopais->find('list', ['limit' => 200]);
        $pessoas = $this->Pais->Pessoas->find('list', ['limit' => 200]);
        $this->set(compact('pai', 'tipopais', 'pessoas'));
        $this->set('_serialize', ['pai']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pai id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pai = $this->Pais->get($id);
        if ($this->Pais->delete($pai)) {
            $this->Flash->success(__('Registro Deletado com Sucesso'));
        } else {
            $this->Flash->error(__('Não é Possível Deletar esse Registro'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
