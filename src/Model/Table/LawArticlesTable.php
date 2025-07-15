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
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
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

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);

          $this->belongsTo('ArticleCategory', [
            'foreignKey' => 'id',
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
            ->scalar('short_desc')
            ->maxLength('short_desc', 255)
            ->allowEmptyString('short_desc');

        $validator
            ->scalar('article_body')
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
            ->scalar('user_id')
            ->maxLength('user_id', 255)
            ->notEmptyString('user_id');

        $validator
            ->scalar('category')
            ->maxLength('category', 255)
            ->requirePresence('category', 'create')
            ->notEmptyString('category');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->integer('views')
            ->allowEmptyString('views');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
