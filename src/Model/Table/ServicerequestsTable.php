<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicerequests Model
 *
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Servicerequest newEmptyEntity()
 * @method \App\Model\Entity\Servicerequest newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Servicerequest> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicerequest get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Servicerequest findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Servicerequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Servicerequest> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicerequest|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Servicerequest saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Servicerequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Servicerequest>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Servicerequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Servicerequest> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Servicerequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Servicerequest>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Servicerequest>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Servicerequest> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServicerequestsTable extends Table
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

        $this->setTable('servicerequests');
        $this->setDisplayField('imageData');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('imageFile')
            ->requirePresence('imageFile', 'create')
            ->notEmptyString('imageFile');

        $validator
            ->scalar('latitude')
            ->maxLength('latitude', 50)
            ->requirePresence('latitude', 'create')
            ->notEmptyString('latitude');

        $validator
            ->scalar('longitude')
            ->maxLength('longitude', 50)
            ->requirePresence('longitude', 'create')
            ->notEmptyString('longitude');

        $validator
            ->scalar('observacao')
            ->maxLength('observacao', 250)
            ->allowEmptyString('observacao');

        $validator
            ->scalar('ativo')
            ->maxLength('ativo', 1)
            ->allowEmptyString('ativo');

        $validator
            ->notEmptyString('service_id');

        $validator
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
