<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;
/**
 * Menu cell
 */
class MenuCell extends Cell
{

    private $permissionsRolesTable;

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    public function initialize(){
        parent::initialize();

        $this->permissionsRolesTable = TableRegistry::get('permissions_roles'); 
    }

    /**
     * Default display method.
     *
     * @return void
     */
     public function display($user)
    {
       /*
        $menuCategories = $this->getMenusCategories($user);
        $menuSubcategories = $this->getMenusSubcategories($user);
        
        $menuAgendas = $this->getMenusEvents($user);*/
       
        $menuUsers = $this->getMenusUsers($user);
        $menuRoles = $this->getMenusRoles($user);
        $menuPermissions = $this->getMenusPermissions($user);
       /* $menuCalendar = $this->getMenusCalendar($user);
        //var_dump($menuPermissions);
        $menuContacts = $this->getMenusContacts($user);

        $menuServices = $this->getMenusServices($user);

        $menuStatus = $this->getMenusStatus($user);

        $menuProspections=$this->getMenusPolls($user);

       */ 
        /*$this->set('menuCategories', $menuCategories);
        $this->set('menuSubcategories', $menuSubcategories);
        $this->set('menuAgendas', $menuAgendas);
        $this->set('menuCalendar', $menuCalendar);
  */
        $this->set('menuUsers', $menuUsers);
        $this->set('menuRoles', $menuRoles);
        $this->set('menuPermissions', $menuPermissions);
        /*$this->set('menuContacts', $menuContacts);
        $this->set('menuServices', $menuServices);
        $this->set('menuStatus', $menuStatus);
        $this->set('menuProspections', $menuProspections);
        */
    }

    public function getMenusCategories($user)
    {
        $this->loadModel('Permissions');

        return  $this->Permissions->find()
        ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 'controller' => 'eventTypes',
                'action IN' => ['add', 'index']
                        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();
        
    }

    public function getMenusSubcategories($user)
    {
       $this->loadModel('Permissions');
      
        return $this->Permissions->find()
         ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 'controller' => 'subcategories',
                'action IN' => ['add', 'index']
                        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();
        
    }

     public function getMenusServices($user)
    {
       $this->loadModel('Permissions');
      
        return $this->Permissions->find()
         ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 'controller' => 'services',
                'action IN' => ['add', 'index']
                        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();
        
    }

    public function getMenusEvents($user)
    {
        $this->loadModel('Permissions');

        return  $this->Permissions->find()
         ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'],
            'controller' => 'events',
            'action IN' => ['add', 'index']
        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();
        
    }

    public function getMenusUsers($user)
    {
        $this->loadModel('Permissions');
  
       return  $this->Permissions->find()
        ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 'controller' => 'users',
                'action IN' => ['add', 'index']
        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();
        
       
    }

    
    public function getMenusRoles($user)
    {
        $this->loadModel('Permissions');

       return  $this->Permissions->find()
         ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 
            'controller' =>'roles',
            'action IN' => ['add', 'index']
        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();
        
       
    }

    public function getMenusPermissions($user)
    {
        $this->loadModel('Permissions');
        return  $this->Permissions->find()
        ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'],
            'controller' => 'permissions',
            'action IN' => ['add', 'index']
        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();
        
        
        
       
    }

    public function getMenusCalendar($user)
    {
        $this->loadModel('Permissions');

       return  $this->Permissions->find()
         ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 
            'controller' =>'calendar',
            'action IN' => ['add', 'index']
        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();    
    }

     public function getMenusContacts($user)
    {
        $this->loadModel('Permissions');

       return  $this->Permissions->find()
         ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 
            'controller' =>'prospections',
            'action IN' => ['add', 'index']
        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();    
    }

    public function getMenusStatus($user){
        $this->loadModel('Permissions');

        return  $this->Permissions->find()
         ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 
            'controller' =>'status',
            'action IN' => ['add', 'index']
        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();   
    }

    public function getMenusPolls($user){
         $this->loadModel('Permissions');

        return  $this->Permissions->find()
         ->join([
            'pr' => [
                'table' => 'permissions_roles',
                'type' => 'INNER',
                'conditions' => 'pr.permission_id = Permissions.id',
            ],
            'r' => [
                'table' => 'roles',
                'type' => 'INNER',
                'conditions' => 'r.id = pr.role_id',
            ]
        ])
        ->where(['pr.role_id' => $user['role_id'], 
            'controller' =>'polls',
            'action IN' => ['add', 'index']
        ])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon'])
        ->distinct()->all();   
    }
    
}
