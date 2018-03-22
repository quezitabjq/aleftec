<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profissaos Model
 *
 * @property \Cake\ORM\Association\HasMany $Pessoas
 *
 * @method \App\Model\Entity\Profissao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Profissao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Profissao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profissao|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profissao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Profissao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profissao findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProfissaosTable extends Table
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

        $this->table('profissaos');
        $this->displayField('descricao');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Pessoas', [
            'foreignKey' => 'profissao_id'
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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        return $validator;
    }
}
