<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Profissaos
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Pais
 * @property \Cake\ORM\Association\HasMany $Pessoaeventos
 * @property \Cake\ORM\Association\HasMany $Pessoas
 *
 * @method \App\Model\Entity\Pessoa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pessoa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pessoa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pessoa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pessoa findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PessoasTable extends Table
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

        $this->table('pessoas');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Profissaos', [
            'foreignKey' => 'profissao_id',
            'joinType' => 'INNER'
        ]);
    
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Pais', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Pessoaeventos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Pessoas', [
            'foreignKey' => 'pessoa_id'
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
            ->requirePresence('sexo', 'create')
            ->notEmpty('sexo');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('cpf', 'create')
            ->notEmpty('cpf');

        $validator
            ->boolean('escolalideres')
            ->requirePresence('escolalideres', 'create')
            ->notEmpty('escolalideres');

        $validator
            ->boolean('encontro')
            ->requirePresence('encontro', 'create')
            ->notEmpty('encontro');

        $validator
            ->boolean('lidavanc')
            ->requirePresence('lidavanc', 'create')
            ->notEmpty('lidavanc');

        $validator
            ->requirePresence('formacao', 'create')
            ->notEmpty('formacao');

        $validator
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->requirePresence('telefone', 'create')
            ->notEmpty('telefone');

        $validator
            ->integer('nivel')
            ->requirePresence('nivel', 'create')
            ->notEmpty('nivel');

        $validator
            ->requirePresence('estadocivil', 'create')
            ->notEmpty('estadocivil');

        $validator
            ->requirePresence('cep', 'create')
            ->notEmpty('cep');

        $validator
            ->requirePresence('rua', 'create')
            ->notEmpty('rua');

        $validator
            ->allowEmpty('complemento');

        $validator
            ->integer('numero')
            ->requirePresence('numero', 'create')
            ->notEmpty('numero');

        $validator
            ->requirePresence('bairro', 'create')
            ->notEmpty('bairro');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['profissao_id'], 'Profissaos'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
