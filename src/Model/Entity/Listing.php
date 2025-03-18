<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Listing Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property int $country
 * @property int $state
 * @property int $city
 * @property string $pincode
 * @property string $street_address
 * @property string $email
 * @property string $website
 * @property string $phone
 * @property string $mobile
 * @property string $image
 * @property string|null $qualification
 * @property string $affiliating_bar_council_assoc
 * @property string|null $reg_no
 * @property string|null $practicing_since
 * @property string|null $court_of_practice
 * @property string|null $practice_area
 * @property string $brief_detail
 * @property string $free_consultation
 * @property string|null $law_firm
 * @property string|null $designation
 * @property string|null $estd_year
 * @property string $listing_id
 * @property string $listing_type
 * @property int $user_id
 * @property string $status
 *
 * @property \App\Model\Entity\Listing[] $listings
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\ListingsData[] $listings_data
 */
class Listing extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'firstname' => true,
        'lastname' => true,
        'country' => true,
        'state' => true,
        'city' => true,
        'pincode' => true,
        'street_address' => true,
        'email' => true,
        'website' => true,
        'phone' => true,
        'mobile' => true,
        'image' => true,
        'qualification' => true,
        'affiliating_bar_council_assoc' => true,
        'reg_no' => true,
        'practicing_since' => true,
        'court_of_practice' => true,
        'practice_area' => true,
        'brief_detail' => true,
        'free_consultation' => true,
        'law_firm' => true,
        'designation' => true,
        'estd_year' => true,
        'listing_id' => true,
        'listing_type' => true,
        'user_id' => true,
        'status' => true,
        'listings' => true,
        'user' => true,
        'listings_data' => true,
    ];
}
