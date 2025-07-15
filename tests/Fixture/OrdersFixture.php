<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'orderDate' => '2025-05-06',
                'paymentStatus' => 1,
                'invoiceNumber' => 'Lorem ipsum dolor sit amet',
                'invoiceDate' => '2025-05-06',
                'amount' => 'Lorem ipsum dolor sit amet',
                'paymentMode' => 'Lorem ipsum dolor sit amet',
                'userName' => 'Lorem ipsum dolor sit amet',
                'userId' => 'Lorem ipsum dolor sit amet',
                'emailId' => 'Lorem ipsum dolor sit amet',
                'listingId' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
