<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LawArticlesFixture
 */
class LawArticlesFixture extends TestFixture
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
                'article_title' => 'Lorem ipsum dolor sit amet',
                'article_body' => 'Lorem ipsum dolor sit amet',
                'added_by' => 'Lorem ipsum dolor sit amet',
                'added_on' => '2024-08-01',
                'category' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'views' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
