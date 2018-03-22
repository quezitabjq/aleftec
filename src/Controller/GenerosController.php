<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Generos Controller
 *
 * @property \App\Model\Table\GenerosTable $Generos
 */
class GenerosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
          $this->paginate = [
            'order' => [
            'Generos.descricao' => 'asc'
 ]       ];
        $generos = $this->paginate($this->Generos);

        $this->set(compact('generos'));
        $this->set('_serialize', ['generos']);
    }

    /**
     * View method
     *
     * @param string|null $id Genero id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $genero = $this->Generos->get($id, [
            'contain' => ['Livros']
        ]);

        $this->set('genero', $genero);
        $this->set('_serialize', ['genero']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $genero = $this->Generos->newEntity();
        if ($this->request->is('post')) {
            $genero = $this->Generos->patchEntity($genero, $this->request->data);
            if ($this->Generos->save($genero)) {
                $this->Flash->success(__('The genero has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The genero could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('genero'));
        $this->set('_serialize', ['genero']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Genero id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $genero = $this->Generos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $genero = $this->Generos->patchEntity($genero, $this->request->data);
            if ($this->Generos->save($genero)) {
                $this->Flash->success(__('The genero has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The genero could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('genero'));
        $this->set('_serialize', ['genero']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Genero id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $genero = $this->Generos->get($id);
        if ($this->Generos->delete($genero)) {
            $this->Flash->success(__('The genero has been deleted.'));
        } else {
            $this->Flash->error(__('The genero could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
