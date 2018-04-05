<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Livros Model
 *
 * @property \App\Model\Table\AutorsTable|\Cake\ORM\Association\BelongsTo $Autors
 * @property \App\Model\Table\GenerosTable|\Cake\ORM\Association\BelongsTo $Generos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Livro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Livro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Livro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Livro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Livro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Livro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Livro findOrCreate($search, callable $callback = null, $options = [])
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

        $this->setTable('livros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->scalar('codigolivro')
            ->maxLength('codigolivro', 250)
            ->requirePresence('codigolivro', 'create')
            ->notEmpty('codigolivro');

        $validator
            ->scalar('responsavel')
            ->maxLength('responsavel', 200)
            ->requirePresence('responsavel', 'create')
            ->notEmpty('responsavel');

        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 200)
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->scalar('resumo')
            ->maxLength('resumo', 500)
            ->requirePresence('resumo', 'create')
            ->notEmpty('resumo');

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
