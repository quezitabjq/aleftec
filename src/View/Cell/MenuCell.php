<?php
namespace App\View\Cell;

use Cake\View\Cell;
use Cake\ORM\TableRegistry;
use Cake\View\CellTrait;
/**
 * Menu cell
 */
class MenuCell extends Cell
{

     use CellTrait;
    private $permissionsRolesTable;
    //public $menuFilho;
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
        */
      
       $menuPai = $this->getMenusPais($user);
       
     
      
        $menuFilho = $this->getMenusFilhos($user, $menuPai);
        $menuNeto = $this->getMenusFilhos($user,$menuFilho);
        
       
        $this->set('menuPai', $menuPai);
        $this->set('menuFilho', $menuFilho);
        $this->set('menuNeto', $menuNeto);
     
      
    }

    public function getMenusPais($user)
    {
        $this->loadModel('Permissions');

        $consulta=  $this->Permissions->find()
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
        ->where(['pr.role_id' => $user['role_id'],'pai is null'])
       // ->order(['pai' => 'DESC'])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon','Permissions.id','pai'])
        ->distinct()->all();
       
        return $consulta;
    }

    public function getMenusFilhos($user, $menuPai)
    {
      $consulta=[]; 
      $vari=$menuPai->toArray(); 
 // var_dump(json_encode($menuPai));
       $this->loadModel('Permissions');
      for($i=0 ; $i<sizeof($vari) ; $i++) {
            $consulta[$i]=$vari[$i]->id;
      
      }
     //var_dump(json_encode($consulta));
        
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
        ->where(['pr.role_id' => $user['role_id'], 'Permissions.pai in' => $consulta,'action in'=>['index','add','']])
        ->select(['pr.role_id', 'controller', 'action', 'name', 'icon','Permissions.id','pai'])
        ->all();
       
        
    }

    
    
}
