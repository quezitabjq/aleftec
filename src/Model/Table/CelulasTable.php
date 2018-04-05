<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Celulas Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Celula get($primaryKey, $options = [])
 * @method \App\Model\Entity\Celula newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Celula[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Celula|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Celula patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Celula[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Celula findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CelulasTable extends Table
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

        $this->setTable('celulas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('descricao')
            ->maxLength('descricao', 200)
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->scalar('tipocelula')
            ->maxLength('tipocelula', 200)
            ->requirePresence('tipocelula', 'create')
            ->notEmpty('tipocelula');

        $validator
            ->dateTime('hinicio')
            ->requirePresence('hinicio', 'create')
            ->notEmpty('hinicio');

        $validator
            ->dateTime('hfinal')
            ->requirePresence('hfinal', 'create')
            ->notEmpty('hfinal');

        $validator
            ->scalar('diaSemana')
            ->maxLength('diaSemana', 200)
            ->requirePresence('diaSemana', 'create')
            ->notEmpty('diaSemana');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 11)
            ->requirePresence('cep', 'create')
            ->notEmpty('cep');

        $validator
            ->scalar('lougadoro')
            ->maxLength('lougadoro', 200)
            ->requirePresence('lougadoro', 'create')
            ->notEmpty('lougadoro');

        $validator
            ->integer('numero')
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->scalar('complemento')
            ->maxLength('complemento', 200)
            ->allowEmpty('complemento');

        $validator
            ->scalar('bairro')
            ->maxLength('bairro', 200)
            ->requirePresence('bairro', 'create')
            ->notEmpty('bairro');

        $validator
            ->scalar('cidade')
            ->maxLength('cidade', 200)
            ->requirePresence('cidade', 'create')
            ->notEmpty('cidade');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 200)
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        $validator
            ->scalar('ativo')
            ->requirePresence('ativo', 'create')
            ->notEmpty('ativo');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
