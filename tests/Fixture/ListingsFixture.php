<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ListingsFixture
 */
class ListingsFixture extends TestFixture
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
                'firstname' => 'Lorem ipsum dolor sit amet',
                'lastname' => 'Lorem ipsum dolor sit amet',
                'country' => 1,
                'state' => 1,
                'city' => 1,
                'pincode' => 'Lorem ipsum d',
                'street_address' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'website' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'mobile' => 'Lorem ipsum dolor sit amet',
                'image' => 'Lorem ipsum dolor sit amet',
                'qualification' => 'Lorem ipsum dolor sit amet',
                'affiliating_bar_council_assoc' => 'Lorem ipsum dolor sit amet',
                'reg_no' => 'Lorem ipsum dolor sit amet',
                'practicing_since' => 'Lorem ip',
                'court_of_practice' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'practice_area' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'brief_detail' => 'Lorem ipsum dolor sit amet',
                'free_consultation' => 'Lorem ipsum dolor sit amet',
                'law_firm' => 'Lorem ipsum dolor sit amet',
                'designation' => 'Lorem ipsum dolor sit amet',
                'estd_year' => 'Lorem ipsum dolor sit amet',
                'listing_id' => 'Lorem ipsum dolor sit amet',
                'listing_type' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'status' => 'Lorem ip',
            ],
        ];
        parent::init();
    }
}
