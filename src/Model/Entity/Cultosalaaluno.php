<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cultosalaaluno Entity
 *
 * @property int $id
 * @property int $cultosala_id
 * @property int $aluno_id
 * @property string $responsavel
 * @property \Cake\I18n\Time $created
 * @property string $codaluno
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Cultosala $cultosala
 * @property \App\Model\Entity\Aluno $aluno
 */
class Cultosalaaluno extends Entity
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
