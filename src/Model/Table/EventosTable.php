<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Pessoaeventos
 *
 * @method \App\Model\Entity\Evento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evento findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventosTable extends Table
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

        $this->table('eventos');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Pessoaeventos', [
            'foreignKey' => 'evento_id'
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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->decimal('valor')
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        $validator
            ->date('datainicio')
            ->requirePresence('datainicio', 'create')
            ->notEmpty('datainicio');

        $validator
            ->date('datafinal')
            ->requirePresence('datafinal', 'create')
            ->notEmpty('datafinal');

        $validator
            ->requirePresence('local', 'create')
            ->notEmpty('local');

        $validator
            ->integer('cep')
            ->requirePresence('cep', 'create')
            ->notEmpty('cep');

        $validator
            ->requirePresence('endereco', 'create')
            ->notEmpty('endereco');

        $validator
            ->integer('numero')
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->requirePresence('bairro', 'create')
            ->notEmpty('bairro');

        $validator
            ->integer('maxinscritos')
            ->requirePresence('maxinscritos', 'create')
            ->notEmpty('maxinscritos');

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
