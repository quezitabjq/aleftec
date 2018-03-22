<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Crianca Entity
 *
 * @property int $id
 * @property string $nome
 * @property \Cake\I18n\Time $nascimento
 * @property int $pai_id
 * @property bool $alergia
 * @property string $descalergia
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Pai $pai
 * @property \App\Model\Entity\Aluno[] $alunos
 */
class Crianca extends Entity
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
