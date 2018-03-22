<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * Cultosalas Controller
 *
 * @property \App\Model\Table\CultosalasTable $Cultosalas
 */
class CultosalasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
       $now = Time::now();
        $this->paginate = [
            'contain' => ['Cultos', 'Salas'],

        ];
        $query = $this->Cultosalas->find('all', [

            'conditions' => [
                    'Cultosalas.dataCulto =' => $now
           
        ]
    ]);
        $cultosalas = $this->paginate($query);

        $this->set(compact('cultosalas'));
        $this->set('_serialize', ['cultosalas']);
    }

    /**
     * View method
     *
     * @param string|null $id Cultosala id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cultosala = $this->Cultosalas->get($id, [
            'contain' => ['Cultos', 'Salas', 'Cultosalaalunos']
        ]);

        $this->set('cultosala', $cultosala);
        $this->set('_serialize', ['cultosala']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cultosala = $this->Cultosalas->newEntity();
        if ($this->request->is('post')) {
            $cultosala = $this->Cultosalas->patchEntity($cultosala, $this->request->data);
            if ($this->Cultosalas->save($cultosala)) {
                $this->Flash->success(__('Registro Salvo com Sucesso'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cultosala could not be saved. Please, try again.'));
            }
        }
        $cultos = $this->Cultosalas->Cultos->find('list', ['limit' => 200]);
        $salas = $this->Cultosalas->Salas->find('list', ['limit' => 200]);
        $this->set(compact('cultosala', 'cultos', 'salas'));
        $this->set('_serialize', ['cultosala']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cultosala id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cultosala = $this->Cultosalas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cultosala = $this->Cultosalas->patchEntity($cultosala, $this->request->data);
            if ($this->Cultosalas->save($cultosala)) {
                $this->Flash->success(__('The cultosala has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The cultosala could not be saved. Please, try again.'));
            }
        }
        $cultos = $this->Cultosalas->Cultos->find('list', ['limit' => 200]);
        $salas = $this->Cultosalas->Salas->find('list', ['limit' => 200]);
        $this->set(compact('cultosala', 'cultos', 'salas'));
        $this->set('_serialize', ['cultosala']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cultosala id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cultosala = $this->Cultosalas->get($id);
        if ($this->Cultosalas->delete($cultosala)) {
            $this->Flash->success(__('The cultosala has been deleted.'));
        } else {
            $this->Flash->error(__('The cultosala could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
