<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JournalTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JournalTable Test Case
 */
class JournalTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JournalTable
     */
    protected $Journal;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Journal',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Journal') ? [] : ['className' => JournalTable::class];
        $this->Journal = $this->getTableLocator()->get('Journal', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Journal);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\JournalTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
