<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 *
 * @method \App\Model\Entity\Permission[] paginate($object = null, array $settings = [])
 */
class PermissionsController extends AppController
{

      public function initialize(){
        parent::initialize();
        $this->loadComponent('RequestHandler');
          
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $permissions = $this->paginate($this->Permissions);

        $this->set(compact('permissions'));
        $this->set('_serialize', ['permissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('permission', $permission);
        $this->set('_serialize', ['permission']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
                 // $this->viewBuilder()->bake('AdminLTE.add');

        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('Registro salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar registro. Por favor, tente novamente.'));
        }
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'roles'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('Registro salvo com successo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar registro. Por favor, tente novamente.'));
        }
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'roles'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success(__('Registro excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir registro. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
