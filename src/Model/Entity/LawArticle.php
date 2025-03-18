<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LawArticle Entity
 *
 * @property int $id
 * @property string $article_title
 * @property string $article_body
 * @property string $added_by
 * @property \Cake\I18n\FrozenDate $added_on
 * @property string $category
 * @property int $status
 * @property string|null $views
 */
class LawArticle extends Entity
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
        'article_title' => true,
        'article_body' => true,
        'added_by' => true,
        'added_on' => true,
        'category' => true,
        'status' => true,
        'views' => true,
    ];
}
