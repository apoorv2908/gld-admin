<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Listing Entity
 *
 * @property int $id
 * @property string $salutation
 * @property string $firstname
 * @property string $lastname
 * @property int $country
 * @property int $state
 * @property int $city
 * @property string $pincode
 * @property string $street_address
 * @property string|null $street_address_2
 * @property string $email
 * @property string|null $website
 * @property string|null $phone
 * @property string $mobile
 * @property string $image
 * @property string|null $qualification
 * @property string|null $affiliating_bar_council_assoc
 * @property string|null $reg_no
 * @property string|null $practicing_since
 * @property string|null $court_of_practice
 * @property string|null $practice_area
 * @property string|null $brief_detail
 * @property string $free_consultation
 * @property string|null $law_firm
 * @property string|null $designation
 * @property string|null $estd_year
 * @property string $listing_id
 * @property string $listing_type
 * @property int $user_id
 * @property string $status
 * @property bool|null $is_suspended
 * @property string|null $listing_status
 * @property string $country_name
 * @property string $state_name
 * @property string $city_name
 * @property string $practice_area_name
 * @property \Cake\I18n\FrozenTime $date_added
 * @property string|null $assoc_council_name_1
 * @property string|null $assoc_council_name_2
 * @property string|null $assoc_council_name_3
 * @property string|null $phoneCode
 * @property string|null $mobileCode
 *
 * @property \App\Model\Entity\Country $countryInfo
 * @property \App\Model\Entity\User $user
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
        'salutation' => true,
        'firstname' => true,
        'lastname' => true,
        'country' => true,
        'state' => true,
        'city' => true,
        'pincode' => true,
        'street_address' => true,
        'street_address_2' => true,
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
        'is_suspended' => true,
        'listing_status' => true,
        'country_name' => true,
        'state_name' => true,
        'city_name' => true,
        'practice_area_name' => true,
        'date_added' => true,
        'assoc_council_name_1' => true,
        'assoc_council_name_2' => true,
        'assoc_council_name_3' => true,
        'phoneCode' => true,
        'mobileCode' => true,
        'countryInfo' => true,
        'user' => true,
    ];
}
