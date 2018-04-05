<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
/**
 * Cultosalaalunos Controller
 *
 * @property \App\Model\Table\CultosalaalunosTable $Cultosalaalunos
 */
class CultosalaalunosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cultosalas', 'Alunos']
        ];
        $cultosalaalunos = $this->paginate($this->Cultosalaalunos);

        $this->set(compact('cultosalaalunos'));
        $this->set('_serialize', ['cultosalaalunos']);
    }

    /**
     * View method
     *
     * @param string|null $id Cultosalaaluno id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function getAlunosAll()
{
    if ($this->requrest->is('ajax')) {
        $this->autoRender = false;
        
        $name = $this->request->query['term'];
        $results = $this->Cultosalaalunos->Alunos->find('all', [
            'conditions' => [ 
                'nome LIKE' => '%'.$name . '%'
            ]
        ])->contain('Criancas');
        $resultsArr = [];
        foreach ($results as $result) {
             $resultsArr[] =['label' => $result['nome'], 'value' => $result['']];
        }
        echo json_encode($resultsArr);
    }
}
    public function view($id = null)
    { 
  
        $cultosalaaluno = $this->Cultosalaalunos->get($id, [
            'contain' => []
        ]);
               $cultosalasTable = TableRegistry::get('Cultosalas');
                $alunoTable = TableRegistry::get('Alunos');
        $cultosalas=$cultosalasTable->get($id, [
            'contain' => ['Cultos','Salas']
        ]);
          $alunos=$alunoTable->get($cultosalaaluno['aluno_id'], [
            'contain' => ['Criancas']
        ]);

        
        $this->set(compact('cultosalaaluno', 'cultos', 'alunos','cultosalas'));
        $this->set('_serialize', ['cultosalaaluno']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
             $cultosalaaluno = $this->Cultosalaalunos->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['cultosala_id'] =$id;
            $cultosalaaluno = $this->Cultosalaalunos->patchEntity($cultosalaaluno, $this->request->data);
                       if ($this->Cultosalaalunos->save($cultosalaaluno)) {
                $this->Flash->success(__('Registro Salvo com Sucesso'));

                return $this->redirect(['action' => 'view',$cultosalaaluno->id]);
            } else {
                $this->Flash->error(__('The cultosalaaluno could not be saved. Please, try again.'));
            }
        }

        $cultosalasTable = TableRegistry::get('Cultosalas');
        $cultosalas=$cultosalasTable->get($id, [
            'contain' => ['Cultos','Salas']
        ]);
        $alunosView= TableRegistry::get('Nomealunos');
        $alunos = $alunosView->find('all');

        $this->set(compact('cultosalaaluno', 'cultos', 'alunos','cultosalas'));
        $this->set('_serialize', ['cultosalaaluno','alunos']);
    }



    /**
     * Edit method
     *
     * @param string|null $id Cultosalaaluno id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cultosalaaluno = $this->Cultosalaalunos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cultosalaaluno = $this->Cultosalaalunos->patchEntity($cultosalaaluno, $this->request->data);
            if ($this->Cultosalaalunos->save($cultosalaaluno)) {
                $this->Flash->success(__('The cultosalaaluno has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cultosalaaluno could not be saved. Please, try again.'));
            }
        }
        $cultosalas = $this->Cultosalaalunos->Cultosalas->find('list', ['limit' => 200]);
        $alunos = $this->Cultosalaalunos->Alunos->find('list', ['limit' => 200]);
        $this->set(compact('cultosalaaluno', 'cultosalas', 'alunos'));
        $this->set('_serialize', ['cultosalaaluno']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cultosalaaluno id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cultosalaaluno = $this->Cultosalaalunos->get($id);
        if ($this->Cultosalaalunos->delete($cultosalaaluno)) {
            $this->Flash->success(__('The cultosalaaluno has been deleted.'));
        } else {
            $this->Flash->error(__('The cultosalaaluno could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
