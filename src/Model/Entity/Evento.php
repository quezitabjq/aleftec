<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $descricao
 * @property float $valor
 * @property \Cake\I18n\Time $datainicio
 * @property \Cake\I18n\Time $datafinal
 * @property string $local
 * @property int $cep
 * @property string $endereco
 * @property int $numero
 * @property string $bairro
 * @property int $maxinscritos
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Pessoaevento[] $pessoaeventos
 */
class Evento extends Entity
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
