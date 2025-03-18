<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Journal Model
 *
 * @method \App\Model\Entity\Journal newEmptyEntity()
 * @method \App\Model\Entity\Journal newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Journal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Journal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Journal findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Journal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Journal[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Journal|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Journal saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Journal[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Journal[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Journal[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Journal[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class JournalTable extends Table
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

        $this->setTable('journal');
        $this->setDisplayField('journal_title');
        $this->setPrimaryKey('sno');
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
            ->scalar('journal_title')
            ->maxLength('journal_title', 255)
            ->requirePresence('journal_title', 'create')
            ->notEmptyString('journal_title');

        $validator
            ->scalar('journal_body')
            ->maxLength('journal_body', 255)
            ->requirePresence('journal_body', 'create')
            ->notEmptyString('journal_body');

        $validator
            ->date('added_on')
            ->requirePresence('added_on', 'create')
            ->notEmptyDate('added_on');

        $validator
            ->scalar('added_by')
            ->maxLength('added_by', 255)
            ->requirePresence('added_by', 'create')
            ->notEmptyString('added_by');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        return $validator;
    }
}
