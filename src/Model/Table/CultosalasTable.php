<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cultosalas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cultos
 * @property \Cake\ORM\Association\BelongsTo $Salas
 * @property \Cake\ORM\Association\HasMany $Cultosalaalunos
 *
 * @method \App\Model\Entity\Cultosala get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cultosala newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cultosala[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cultosala|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cultosala patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cultosala[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cultosala findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CultosalasTable extends Table
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

        $this->table('cultosalas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cultos', [
            'foreignKey' => 'culto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Salas', [
            'foreignKey' => 'sala_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Cultosalaalunos', [
            'foreignKey' => 'cultosala_id'
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
            ->date('dataCulto')
            ->requirePresence('dataCulto', 'create')
            ->notEmpty('dataCulto');

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
        $rules->add($rules->existsIn(['culto_id'], 'Cultos'));
        $rules->add($rules->existsIn(['sala_id'], 'Salas'));

        return $rules;
    }
}
