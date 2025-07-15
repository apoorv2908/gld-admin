<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SalutatFixture
 */
class SalutatFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'salutat';
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
                'salutat_name' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
