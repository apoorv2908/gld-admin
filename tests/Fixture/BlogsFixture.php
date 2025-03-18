<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BlogsFixture
 */
class BlogsFixture extends TestFixture
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
                'sno' => 1,
                'blog_title' => 'Lorem ipsum dolor sit amet',
                'blog_body' => 'Lorem ipsum dolor sit amet',
                'blog_id' => 1,
                'added_on' => '2024-07-26',
                'added_by' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
            ],
        ];
        parent::init();
    }
}
