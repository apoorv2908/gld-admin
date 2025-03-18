<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LawArticlesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LawArticlesTable Test Case
 */
class LawArticlesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LawArticlesTable
     */
    protected $LawArticles;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LawArticles',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LawArticles') ? [] : ['className' => LawArticlesTable::class];
        $this->LawArticles = $this->getTableLocator()->get('LawArticles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LawArticles);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LawArticlesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
