<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orders Model
 *
 * @method \App\Model\Entity\Order newEmptyEntity()
 * @method \App\Model\Entity\Order newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Order[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Order get($primaryKey, $options = [])
 * @method \App\Model\Entity\Order findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Order patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Order[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Order|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OrdersTable extends Table
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

        $this->setTable('orders');
        $this->setDisplayField('invoiceNumber');
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
            ->date('orderDate')
            ->requirePresence('orderDate', 'create')
            ->notEmptyDate('orderDate');

        $validator
            ->integer('paymentStatus')
            ->requirePresence('paymentStatus', 'create')
            ->notEmptyString('paymentStatus');

        $validator
            ->scalar('invoiceNumber')
            ->maxLength('invoiceNumber', 255)
            ->requirePresence('invoiceNumber', 'create')
            ->notEmptyString('invoiceNumber');

        $validator
            ->date('invoiceDate')
            ->requirePresence('invoiceDate', 'create')
            ->notEmptyDate('invoiceDate');

        $validator
            ->scalar('amount')
            ->maxLength('amount', 255)
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('paymentMode')
            ->maxLength('paymentMode', 255)
            ->requirePresence('paymentMode', 'create')
            ->notEmptyString('paymentMode');

        $validator
            ->scalar('userName')
            ->maxLength('userName', 255)
            ->requirePresence('userName', 'create')
            ->notEmptyString('userName');

        $validator
            ->scalar('userId')
            ->maxLength('userId', 255)
            ->requirePresence('userId', 'create')
            ->notEmptyString('userId');

        $validator
            ->scalar('emailId')
            ->maxLength('emailId', 255)
            ->requirePresence('emailId', 'create')
            ->notEmptyString('emailId');

        $validator
            ->scalar('listingId')
            ->maxLength('listingId', 255)
            ->requirePresence('listingId', 'create')
            ->notEmptyString('listingId');

        return $validator;
    }
}
