<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[] paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $roles = $this->paginate($this->Roles);
 
        $this->set(compact('roles'));
        $this->set('_serialize', ['roles']);
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Permissions', 'Users']
        ]);
        $this->set('role', $role);
        $this->set('_serialize', ['role']);
    }



    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->newEntity( $this->request->getData() , [
                'associated' => [ 'Permissions']
            ]);

            if ($this->Roles->save($role)) {
                $this->Flash->success(__('Registro salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Registro não pode ser salvo. Por favor, tente novamente.'));
        }
        $controllers = $this->Roles->Permissions->find('list', ['order' => 'Permissions.name', 'limit' => 200])->select('id', 'name');

        $permissions = $this->Roles->Permissions->find('list', ['order' => 'Permissions.controller','limit' => 200])->where(['active' => true]);

        
        $this->set(compact('role', 'permissions', 'controllers'));
        $this->set('_serialize', ['role', 'controllers']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Permissions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData(),  [
                'associated' => [ 'Permissions']
            ]);
            
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('Registro salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Registro não pode ser salvo. Por favor, tente novamente.'));
        }
         $controllers = $this->Roles->Permissions->find()->order(['Permissions.name' => 'ASC'])
         ->distinct()->select('id', 'controller')->limit(200);

        $permissions = $this->Roles->Permissions->find('list', ['order' => 'Permissions.controller','limit' => 200])->where(['active' => true]);
        
        $this->set(compact('role', 'permissions', 'controllers'));
        $this->set('_serialize', ['role', 'controllers']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('Registro excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Registro não pode ser excluído. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
