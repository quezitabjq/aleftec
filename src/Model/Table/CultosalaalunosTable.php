<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cultosalaalunos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cultosalas
 * @property \Cake\ORM\Association\BelongsTo $Alunos
 *
 * @method \App\Model\Entity\Cultosalaaluno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cultosalaaluno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cultosalaaluno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cultosalaaluno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cultosalaaluno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cultosalaaluno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cultosalaaluno findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CultosalaalunosTable extends Table
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

        $this->table('cultosalaalunos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cultosalas', [
            'foreignKey' => 'cultosala_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Alunos', [
            'foreignKey' => 'aluno_id',
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
            ->requirePresence('responsavel', 'create')
            ->notEmpty('responsavel');

        $validator
            ->requirePresence('codaluno', 'create')
            ->notEmpty('codaluno');

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
        $rules->add($rules->existsIn(['cultosala_id'], 'Cultosalas'));
        $rules->add($rules->existsIn(['aluno_id'], 'Alunos'));

        return $rules;
    }
}
