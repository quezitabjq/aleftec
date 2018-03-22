<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tipopais Model
 *
 * @property \Cake\ORM\Association\HasMany $Pais
 *
 * @method \App\Model\Entity\Tipopai get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tipopai newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tipopai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tipopai|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tipopai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tipopai[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tipopai findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TipopaisTable extends Table
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

        $this->table('tipopais');
        $this->displayField('descricao');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Pais', [
            'foreignKey' => 'tipopai_id'
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
