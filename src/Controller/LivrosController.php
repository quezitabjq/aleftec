<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Livros Controller
 *
 * @property \App\Model\Table\LivrosTable $Livros
 */
class LivrosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
            $livros = $this->paginate($this->Livros);

        $this->set(compact('livros'));
    }

    /**
     * View method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $livro = $this->Livros->get($id, [
            'contain' => ['Autors', 'Generos', 'Users']

        ]);

        $this->set('livro', $livro);
        $this->set('_serialize', ['livro']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $livro = $this->Livros->newEntity();
        if ($this->request->is('post')) {
            $livro = $this->Livros->patchEntity($livro, $this->request->data);
            if ($this->Livros->save($livro)) {
                $this->Flash->success(__('The livro has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The livro could not be saved. Please, try again.'));
            }
        }
        $autors = $this->Livros->Autors->find('list')->order(['Autors.descricao' => 'ASC']);
        $generos = $this->Livros->Generos->find('list')->order(['Generos.descricao' => 'ASC']);
        $user = $this->Auth->user();
        $this->set(compact('livro', 'autors', 'generos', 'user'));
        $this->set('_serialize', ['livro']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $livro = $this->Livros->get($id, [
            'contain' => []

        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $livro = $this->Livros->patchEntity($livro, $this->request->data);
            if ($this->Livros->save($livro)) {
                $this->Flash->success(__('The livro has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The livro could not be saved. Please, try again.'));
            }
        }
      $autors = $this->Livros->Autors->find('list')->order(['Autors.descricao' => 'ASC']);
        $generos = $this->Livros->Generos->find('list')->order(['Generos.descricao' => 'ASC']);
        $users = $this->Livros->Users->find('list', ['limit' => 200]);
        $this->set(compact('livro', 'autors', 'generos', 'users'));
        $this->set('_serialize', ['livro']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Livro id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $livro = $this->Livros->get($id);
        if ($this->Livros->delete($livro)) {
            $this->Flash->success(__('The livro has been deleted.'));
        } else {
            $this->Flash->error(__('The livro could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
