<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Salutat Model
 *
 * @method \App\Model\Entity\Salutat newEmptyEntity()
 * @method \App\Model\Entity\Salutat newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Salutat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Salutat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Salutat findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Salutat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Salutat[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Salutat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salutat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Salutat[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salutat[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salutat[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Salutat[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SalutatTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('salutat');
        $this->setDisplayField('salutat_name');
        $this->setPrimaryKey('id');
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
            ->scalar('salutat_name')
            ->maxLength('salutat_name', 255)
            ->requirePresence('salutat_name', 'create')
            ->notEmptyString('salutat_name');

        return $validator;
    }
}
