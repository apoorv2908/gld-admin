<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Tablecountries;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Tablecountries Test Case
 */
class TablecountriesTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\Tablecountries
     */
    protected $Tablecountries;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('countries') ? [] : ['className' => Tablecountries::class];
        $this->Tablecountries = $this->getTableLocator()->get('countries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Tablecountries);

        parent::tearDown();
    }
}
