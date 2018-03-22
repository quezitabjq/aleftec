<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pessoa Entity
 *
 * @property int $id
 * @property string $nome
 * @property string $sexo
 * @property string $email
 * @property string $cpf
 * @property bool $escolalideres
 * @property bool $encontro
 * @property bool $lidavanc
 * @property string $formacao
 * @property string $descricao
 * @property string $telefone
 * @property int $nivel
 * @property string $estadocivil
 * @property string $cep
 * @property string $rua
 * @property string $complemento
 * @property int $numero
 * @property string $bairro
 * @property int $profissao_id
 * @property int $pessoa_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $user_id
 *
 * @property \App\Model\Entity\Profissao $profissao
 * @property \App\Model\Entity\Pessoa[] $pessoas
 * @property \App\Model\Entity\Pai[] $pais
 * @property \App\Model\Entity\Pessoaevento[] $pessoaeventos
 */
class Pessoa extends Entity
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
