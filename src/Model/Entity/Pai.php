<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pai Entity
 *
 * @property int $id
 * @property int $tipopai_id
 * @property int $pessoa_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Tipopai $tipopai
 * @property \App\Model\Entity\Crianca[] $criancas
 */
class Pai extends Entity
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
        '*' => true,
        'id' => false
    ];
}
