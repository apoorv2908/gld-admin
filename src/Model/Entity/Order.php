<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate $orderDate
 * @property int $paymentStatus
 * @property string $invoiceNumber
 * @property \Cake\I18n\FrozenDate $invoiceDate
 * @property string $amount
 * @property string $paymentMode
 * @property string $userName
 * @property string $userId
 * @property string $emailId
 * @property string $listingId
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'orderDate' => true,
        'paymentStatus' => true,
        'invoiceNumber' => true,
        'invoiceDate' => true,
        'amount' => true,
        'paymentMode' => true,
        'userName' => true,
        'userId' => true,
        'emailId' => true,
        'listingId' => true,
    ];
}
