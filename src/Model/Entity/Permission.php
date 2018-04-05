<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Permission Entity
 *
 * @property int $id
 * @property string $controller
 * @property int $pai
 * @property string $action
 * @property \Cake\I18n\FrozenDate $created
 * @property \Cake\I18n\FrozenDate $modified
 * @property bool $active
 * @property string $name
 * @property string $icon
 *
 * @property \App\Model\Entity\Role[] $roles
 */
class Permission extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'controller' => true,
        'pai' => true,
        'action' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'name' => true,
        'icon' => true,
        'roles' => true
    ];
}
