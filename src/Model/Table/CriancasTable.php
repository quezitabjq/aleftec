<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Criancas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pais
 * @property \Cake\ORM\Association\HasMany $Alunos
 *
 * @method \App\Model\Entity\Crianca get($primaryKey, $options = [])
 * @method \App\Model\Entity\Crianca newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Crianca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Crianca|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Crianca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Crianca[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Crianca findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CriancasTable extends Table
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

        $this->table('criancas');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pais', [
            'foreignKey' => 'pai_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Alunos', [
            'foreignKey' => 'crianca_id'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->date('nascimento')
            ->requirePresence('nascimento', 'create')
            ->notEmpty('nascimento');

        $validator
            ->boolean('alergia')
            ->allowEmpty('alergia');

        $validator
            ->allowEmpty('descalergia');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['pai_id'], 'Pais'));

        return $rules;
    }
}
