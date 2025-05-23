<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Useroles Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 *
 * @method \App\Model\Entity\Userole newEmptyEntity()
 * @method \App\Model\Entity\Userole newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Userole> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Userole get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Userole findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Userole patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Userole> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Userole|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Userole saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Userole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Userole>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Userole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Userole> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Userole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Userole>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Userole>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Userole> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserolesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('useroles');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('role_id')
            ->notEmptyString('role_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['role_id'], 'Roles'), ['errorField' => 'role_id']);

        return $rules;
    }
}
