<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livros Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Autors
 * @property \Cake\ORM\Association\BelongsTo $Generos
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Livro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livro findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LivrosTable extends Table
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

        $this->table('livros');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Autors', [
            'foreignKey' => 'autor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Generos', [
            'foreignKey' => 'genero_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
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
            ->requirePresence('codigolivro', 'create')
            ->notEmpty('codigolivro');

        $validator
            ->requirePresence('responsavel', 'create')
            ->notEmpty('responsavel');

        $validator
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

     

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
        $rules->add($rules->existsIn(['autor_id'], 'Autors'));
        $rules->add($rules->existsIn(['genero_id'], 'Generos'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
