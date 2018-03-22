<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salas Model
 *
 * @property \Cake\ORM\Association\HasMany $Alunos
 * @property \Cake\ORM\Association\HasMany $Cultosalas
 *
 * @method \App\Model\Entity\Sala get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sala newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sala[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sala|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sala patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sala[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sala findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SalasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('salas');
        $this->displayField('nomesala');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Alunos', [
            'foreignKey' => 'sala_id'
        ]);
        $this->hasMany('Cultosalas', [
            'foreignKey' => 'sala_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nomesala', 'create')
            ->notEmpty('nomesala');

        $validator
            ->integer('faixainicial')
            ->requirePresence('faixainicial', 'create')
            ->notEmpty('faixainicial');

        $validator
            ->integer('faixafinal')
            ->requirePresence('faixafinal', 'create')
            ->notEmpty('faixafinal');

        return $validator;
    }
}
