<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Celula Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string $tipocelula
 * @property \Cake\I18n\FrozenTime $hinicio
 * @property \Cake\I18n\FrozenTime $hfinal
 * @property string $diaSemana
 * @property string $cep
 * @property string $lougadoro
 * @property int $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $estado
 * @property string $ativo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Celula extends Entity
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
        'descricao' => true,
        'tipocelula' => true,
        'hinicio' => true,
        'hfinal' => true,
        'diaSemana' => true,
        'cep' => true,
        'lougadoro' => true,
        'numero' => true,
        'complemento' => true,
        'bairro' => true,
        'cidade' => true,
        'estado' => true,
        'ativo' => true,
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'user' => true
    ];
}
