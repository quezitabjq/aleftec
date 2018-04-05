<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Generos Model
 *
 * @property \App\Model\Table\LivrosTable|\Cake\ORM\Association\HasMany $Livros
 *
 * @method \App\Model\Entity\Genero get($primaryKey, $options = [])
 * @method \App\Model\Entity\Genero newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Genero[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Genero|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Genero patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Genero[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Genero findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GenerosTable extends Table
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

        $this->setTable('generos');
        $this->setDisplayField('descricao');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Livros', [
            'foreignKey' => 'genero_id'
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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 250)
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        return $validator;
    }
}
