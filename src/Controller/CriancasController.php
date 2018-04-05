<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Criancas Controller
 *
 * @property \App\Model\Table\CriancasTable $Criancas
 */
class CriancasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pais']
        ];
        $criancas = $this->paginate($this->Criancas);

        $this->set(compact('criancas'));
        $this->set('_serialize', ['criancas']);
    }

    /**
     * View method
     *
     * @param string|null $id Crianca id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crianca = $this->Criancas->get($id, [
            'contain' => ['Pais', 'Alunos']
        ]);

        $this->set('crianca', $crianca);
        $this->set('_serialize', ['crianca']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crianca = $this->Criancas->newEntity();
        if ($this->request->is('post')) {
            $crianca = $this->Criancas->patchEntity($crianca, $this->request->data);
            if ($this->Criancas->save($crianca)) {
                $this->Flash->success(__('Registro Salvo com Sucesso'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The crianca could not be saved. Please, try again.'));
            }
        }
         $paisView= TableRegistry::get('Listagempais');
        $pais = $paisView->find('all');
        $this->set(compact('crianca', 'pais'));
        $this->set('_serialize', ['crianca']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Crianca id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crianca = $this->Criancas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crianca = $this->Criancas->patchEntity($crianca, $this->request->data);
            if ($this->Criancas->save($crianca)) {
                $this->Flash->success(__('The crianca has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The crianca could not be saved. Please, try again.'));
            }
        }
       $paisView= TableRegistry::get('Listagempais');
        $pais = $paisView->find('all');
        $this->set(compact('crianca', 'pais'));
        $this->set('_serialize', ['crianca']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Crianca id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crianca = $this->Criancas->get($id);
        if ($this->Criancas->delete($crianca)) {
            $this->Flash->success(__('The crianca has been deleted.'));
        } else {
            $this->Flash->error(__('The crianca could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
