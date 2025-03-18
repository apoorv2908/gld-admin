<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Journal Entity
 *
 * @property int $sno
 * @property string $journal_title
 * @property string $journal_body
 * @property \Cake\I18n\FrozenDate $added_on
 * @property string $added_by
 * @property bool $status
 */
class Journal extends Entity
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
        'journal_title' => true,
        'journal_body' => true,
        'added_on' => true,
        'added_by' => true,
        'status' => true,
    ];
}
