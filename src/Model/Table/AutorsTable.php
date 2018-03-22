<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Autors Model
 *
 * @property \Cake\ORM\Association\HasMany $Livros
 *
 * @method \App\Model\Entity\Autor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Autor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Autor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Autor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Autor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Autor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Autor findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AutorsTable extends Table
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

        $this->table('autors');
        $this->displayField('descricao');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Livros', [
            'foreignKey' => 'autor_id'
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
