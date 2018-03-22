<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoaeventos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $Eventos
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Pessoaevento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pessoaevento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pessoaevento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pessoaevento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pessoaevento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoaevento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoaevento findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PessoaeventosTable extends Table
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

        $this->table('pessoaeventos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Eventos', [
            'foreignKey' => 'evento_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('formapgt', 'create')
            ->notEmpty('formapgt');

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
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['evento_id'], 'Eventos'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
