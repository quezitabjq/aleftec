<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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

      
        $this->paginate = [
            'contain' => ['Roles']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
         $user = $this->Auth->user();
        $this->set(compact('user'));
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {     
         $this->viewBuilder()->layout('AdminLTE.register'); 
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao tentar salvar usuário, tente novamente.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $users = $this->Users->find("list", ["limit" => 200])->where(["active" => true]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Registro salvo com sucesso.'));

                //return $this->redirect(['action' => 'index']);
            }else{
            $this->Flash->error(__('Registro não pode ser salvo. Por favor, tente novamente.'));
            }
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('Registro excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Registro não pode ser excluído. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
       if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            //var_dump($user); die;
            if ($user) {
                $this->Auth->setUser($user);
                if($user['role_id'] ==5 ){
                    return $this->redirect(['controller' => 'users' , 'action' => 'view' , $user['id']]);
                }else{
                    return $this->redirect($this->Auth->redirectUrl());
                }
            } else {
                $this->Flash->error(__('Usuário ou senha inválidos'));
            }
        }
    }

    

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function noAuthorized(){
        
        $this->Flash->error(__('Você não tem permissão para acessar esta pagina'));
        return $this->render();
    }

        /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function byProfile($roleId = null)
    {
        //$this->response->header('Access-Control-Allow-Origin', '*');
        $role= (int) $roleId -1;
        $users = $this->Users->findByRoleId($role, [
            'contain' => ['Roles']
        ]);


       $response =$this->response->withType('application/json')
                        ->withStringBody(json_encode(['users' => $users] )); 

        return $response;       
        
    }
}
