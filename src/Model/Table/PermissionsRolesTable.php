<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
/**
* 
*/
class PermissionsRolesTable extends Table
{
	
	public function initialize(array $config)
    {
    	parent::initialize($config);
        $this->belongsTo('Permissions');
        $this->belongsTo('Roles');
    }
}