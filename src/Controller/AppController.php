<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Database\Type;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    private $permissionsTable;
    
    private $rolesTable;

    private $permissionsRolesTable;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
       ini_set('memory_limit','2048M');
        
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Welcome'
                
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'unuauthorize'=>[
          'plugin'=>false,
          'controller'=>'Welcome',
          'action'=>'index'
          ],

            'authError' => 'Faça o login primeiramente',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
           
        ]);

        $this->Auth->allow(['*','login', 'logout', 'byProfile', 'feed', 'add']);

        $this->permissionsRolesTable = TableRegistry::get('permissions_roles'); 
         $user = $this->Auth->user();
        $this->set(compact('user'));    
        //$this->viewBuilder()->setTheme('AdminLTE');
        //$this->viewBuilder()->setClassName('AdminLTE.AdminLTE');  
        
    }

    public function beforeFilter(Event $event){
     
     $this->viewBuilder()->setTheme('AdminLTE');
       $this->viewBuilder()->setClassName('AdminLTE.AdminLTE');  
if (method_exists($this, 'isAuthorized')) {
            $this->set('Auth', $this->Auth);
            $user = $this->Auth->user();
            $access = $this->isAuthorized($user);      
    }
  }

      public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
    

  public function isAuthorized($user)
     {
       $controller = $this->request->params['controller']; //get current controller
        $action = $this->request->params['action']; //get current action

       
        $permissionsRoles = $this->permissionsRolesTable->find()->where(['role_id' => $user['role_id']])
        ->contain(['Permissions'])
        ->where(['controller' =>  $controller])
        ->andWhere(['action' => $action ])
        ->first();
        
      
        //var_dump($permissionsRoles);
        if($action== 'login' || $action == 'logout' || $action == 'noAuthorized'){
            $this->Auth->allow($action);
            return true;
        }
        if ( $permissionsRoles!=null) {
                
                $this->addPermission($action);
                $this->Auth->allow($action);
                return true;
        }
        if( empty($permissionsRoles) ){
            $this->removePermission($action);
            return false;
        }
       // Bloqueia acesso por padrão
        return false;
     }


    public function addPermission($permission){
     
            $this->Auth->allow([$permission]);
        
     }

    public function removePermission($permission){               
  //$this->Flash->error('ERROU MANE');
  $this->redirect($this->request->here);
        //$this->redirect(['controller' => 'users', 'action' => 'noAuthorized']);

     }
}
