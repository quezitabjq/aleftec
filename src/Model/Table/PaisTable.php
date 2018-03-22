<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pais Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tipopais
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\HasMany $Criancas
 *
 * @method \App\Model\Entity\Pai get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pai newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pai|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pai[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pai findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PaisTable extends Table
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

        $this->table('pais');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Tipopais', [
            'foreignKey' => 'tipopai_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Criancas', [
            'foreignKey' => 'pai_id'
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
        $rules->add($rules->existsIn(['tipopai_id'], 'Tipopais'));
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));

        return $rules;
    }
}
