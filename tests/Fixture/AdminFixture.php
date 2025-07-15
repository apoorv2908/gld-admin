<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AdminFixture
 */
class AdminFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'admin';
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
                'name' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'role' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'place_of_posting' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'profile' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
