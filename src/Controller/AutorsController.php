<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Autors Controller
 *
 * @property \App\Model\Table\AutorsTable $Autors
 *
 * @method \App\Model\Entity\Autor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AutorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $autors = $this->paginate($this->Autors);

        $this->set(compact('autors'));
    }

    /**
     * View method
     *
     * @param string|null $id Autor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $autor = $this->Autors->get($id, [
            'contain' => ['Livros']
        ]);

        $this->set('autor', $autor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $autor = $this->Autors->newEntity();
        if ($this->request->is('post')) {
            $autor = $this->Autors->patchEntity($autor, $this->request->getData());
            if ($this->Autors->save($autor)) {
                $this->Flash->success(__('The autor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The autor could not be saved. Please, try again.'));
        }
        $this->set(compact('autor'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Autor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $autor = $this->Autors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $autor = $this->Autors->patchEntity($autor, $this->request->getData());
            if ($this->Autors->save($autor)) {
                $this->Flash->success(__('The autor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The autor could not be saved. Please, try again.'));
        }
        $this->set(compact('autor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Autor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $autor = $this->Autors->get($id);
        if ($this->Autors->delete($autor)) {
            $this->Flash->success(__('The autor has been deleted.'));
        } else {
            $this->Flash->error(__('The autor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
