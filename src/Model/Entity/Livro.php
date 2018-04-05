<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Livro Entity
 *
 * @property int $id
 * @property string $codigolivro
 * @property string $responsavel
 * @property int $autor_id
 * @property int $genero_id
 * @property string $titulo
 * @property string $resumo
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Autor $autor
 * @property \App\Model\Entity\Genero $genero
 * @property \App\Model\Entity\User $user
 */
class Livro extends Entity
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
        'codigolivro' => true,
        'responsavel' => true,
        'autor_id' => true,
        'genero_id' => true,
        'titulo' => true,
        'resumo' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'autor' => true,
        'genero' => true,
        'user' => true
    ];
}
