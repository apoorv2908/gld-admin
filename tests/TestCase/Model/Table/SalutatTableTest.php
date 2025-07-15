<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalutatTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalutatTable Test Case
 */
class SalutatTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SalutatTable
     */
    protected $Salutat;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Salutat',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Salutat') ? [] : ['className' => SalutatTable::class];
        $this->Salutat = $this->getTableLocator()->get('Salutat', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Salutat);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SalutatTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
