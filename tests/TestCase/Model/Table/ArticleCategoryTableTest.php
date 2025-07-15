<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticleCategoryTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticleCategoryTable Test Case
 */
class ArticleCategoryTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticleCategoryTable
     */
    protected $ArticleCategory;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ArticleCategory',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ArticleCategory') ? [] : ['className' => ArticleCategoryTable::class];
        $this->ArticleCategory = $this->getTableLocator()->get('ArticleCategory', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ArticleCategory);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ArticleCategoryTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
