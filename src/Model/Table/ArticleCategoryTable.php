<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticleCategory Model
 *
 * @method \App\Model\Entity\ArticleCategory newEmptyEntity()
 * @method \App\Model\Entity\ArticleCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArticleCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ArticleCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArticleCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ArticleCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ArticleCategoryTable extends Table
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

        $this->setTable('article_category');
        $this->setDisplayField('id');
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
            ->scalar('article_category')
            ->maxLength('article_category', 255)
            ->requirePresence('article_category', 'create')
            ->notEmptyString('article_category');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        return $validator;
    }
}
