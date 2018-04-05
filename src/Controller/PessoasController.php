<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 */
class PessoasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Profissaos', 'Users']
        ];
        $pessoas = $this->paginate($this->Pessoas);

        $this->set(compact('pessoas'));
        $this->set('_serialize', ['pessoas']);
    }

    /**
     * View method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => ['Profissaos', 'Users', 'Pessoas', 'Pais', 'Pessoaeventos']
        ]);

        $this->set('pessoa', $pessoa);
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pessoa = $this->Pessoas->newEntity();
        if ($this->request->is('post')) {
               
            $lider = $this->Pessoas->get($this->request->data['pessoa_id']);
            if($lider){
            $this->request->data['nivel']=$lider['nivel']+1;
            }
           else{
              $this->request->data['nivel']=0;  
           }
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('Registro Salvo com Sucesso'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Não é Possível Salvar esse Registro.'));
            }
        }
         $pessoas = $this->Pessoas->find('list', ['limit' => 200]);
        $profissaos = $this->Pessoas->Profissaos->find('list', ['limit' => 200]);
        $users = $this->Pessoas->Users->find('list', ['limit' => 200]);
        $this->set(compact('pessoa', 'profissaos', 'users','pessoas'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pessoa = $this->Pessoas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pessoa = $this->Pessoas->patchEntity($pessoa, $this->request->data);
            if ($this->Pessoas->save($pessoa)) {
                $this->Flash->success(__('The pessoa has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pessoa could not be saved. Please, try again.'));
            }
        }
        $profissaos = $this->Pessoas->Profissaos->find('list', ['limit' => 200]);
        $users = $this->Pessoas->Users->find('list', ['limit' => 200]);
        $this->set(compact('pessoa', 'profissaos', 'users'));
        $this->set('_serialize', ['pessoa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pessoa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pessoa = $this->Pessoas->get($id);
        if ($this->Pessoas->delete($pessoa)) {
            $this->Flash->success(__('Registro Deletado com Sucesso'));
        } else {
            $this->Flash->error(__('Não é Possível Deletar esse Registro'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
