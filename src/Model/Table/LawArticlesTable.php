<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LawArticles Model
 *
 * @method \App\Model\Entity\LawArticle newEmptyEntity()
 * @method \App\Model\Entity\LawArticle newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LawArticle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LawArticle get($primaryKey, $options = [])
 * @method \App\Model\Entity\LawArticle findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LawArticle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LawArticle[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LawArticle|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LawArticle saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LawArticle[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LawArticle[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LawArticle[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LawArticle[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LawArticlesTable extends Table
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

        $this->setTable('law_articles');
        $this->setDisplayField('article_title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Practicearea', [
            'foreignKey' => 'category',
            'joinType' => 'INNER'
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
            ->scalar('article_title')
            ->maxLength('article_title', 255)
            ->requirePresence('article_title', 'create')
            ->notEmptyString('article_title');

        $validator
            ->scalar('article_body')
            ->maxLength('article_body', 255)
            ->requirePresence('article_body', 'create')
            ->notEmptyString('article_body');

        $validator
            ->scalar('added_by')
            ->maxLength('added_by', 100)
            ->requirePresence('added_by', 'create')
            ->notEmptyString('added_by');

        $validator
            ->date('added_on')
            ->requirePresence('added_on', 'create')
            ->notEmptyDate('added_on');

        $validator
            ->scalar('category')
            ->maxLength('category', 255)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('views')
            ->maxLength('views', 50)
            ->allowEmptyString('views');

        return $validator;
    }
}
