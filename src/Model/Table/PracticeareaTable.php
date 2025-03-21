<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Practicearea Model
 *
 * @method \App\Model\Entity\Practicearea newEmptyEntity()
 * @method \App\Model\Entity\Practicearea newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Practicearea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Practicearea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Practicearea findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Practicearea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Practicearea[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Practicearea|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Practicearea saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Practicearea[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Practicearea[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Practicearea[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Practicearea[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PracticeareaTable extends Table
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

        $this->setTable('practicearea');
        $this->setDisplayField('practice_area_title');
        $this->setPrimaryKey('practice_area_id');
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
            ->scalar('practice_area_title')
            ->maxLength('practice_area_title', 255)
            ->requirePresence('practice_area_title', 'create')
            ->notEmptyString('practice_area_title');

        return $validator;
    }
}
