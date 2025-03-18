<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JournalFixture
 */
class JournalFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'journal';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'sno' => 1,
                'journal_title' => 'Lorem ipsum dolor sit amet',
                'journal_body' => 'Lorem ipsum dolor sit amet',
                'added_on' => '2024-07-26',
                'added_by' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
            ],
        ];
        parent::init();
    }
}
