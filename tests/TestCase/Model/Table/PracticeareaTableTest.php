<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PracticeareaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PracticeareaTable Test Case
 */
class PracticeareaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PracticeareaTable
     */
    protected $Practicearea;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Practicearea',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Practicearea') ? [] : ['className' => PracticeareaTable::class];
        $this->Practicearea = $this->getTableLocator()->get('Practicearea', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Practicearea);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PracticeareaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\PracticeareaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
