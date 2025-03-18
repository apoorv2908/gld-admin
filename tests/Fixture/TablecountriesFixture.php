<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TablecountriesFixture
 */
class TablecountriesFixture extends TestFixture
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
                'country' => 'Lorem ipsum dolor sit ',
                'country_iso' => 'Lo',
            ],
        ];
        parent::init();
    }
}
