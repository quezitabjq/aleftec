<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tipopais Controller
 *
 * @property \App\Model\Table\TipopaisTable $Tipopais
 */
class TipopaisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tipopais = $this->paginate($this->Tipopais);

        $this->set(compact('tipopais'));
        $this->set('_serialize', ['tipopais']);
    }

    /**
     * View method
     *
     * @param string|null $id Tipopai id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipopai = $this->Tipopais->get($id, [
            'contain' => ['Pais']
        ]);

        $this->set('tipopai', $tipopai);
        $this->set('_serialize', ['tipopai']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipopai = $this->Tipopais->newEntity();
        if ($this->request->is('post')) {
            $tipopai = $this->Tipopais->patchEntity($tipopai, $this->request->data);
            if ($this->Tipopais->save($tipopai)) {
                $this->Flash->success(__('The tipopai has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tipopai could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tipopai'));
        $this->set('_serialize', ['tipopai']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipopai id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipopai = $this->Tipopais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipopai = $this->Tipopais->patchEntity($tipopai, $this->request->data);
            if ($this->Tipopais->save($tipopai)) {
                $this->Flash->success(__('The tipopai has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tipopai could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tipopai'));
        $this->set('_serialize', ['tipopai']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipopai id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipopai = $this->Tipopais->get($id);
        if ($this->Tipopais->delete($tipopai)) {
            $this->Flash->success(__('The tipopai has been deleted.'));
        } else {
            $this->Flash->error(__('The tipopai could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
