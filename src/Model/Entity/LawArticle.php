<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LawArticle Entity
 *
 * @property int $id
 * @property string $article_title
 * @property string|null $short_desc
 * @property string $article_body
 * @property string $added_by
 * @property \Cake\I18n\FrozenDate $added_on
 * @property string $user_id
 * @property string $category
 * @property int $status
 * @property int|null $views
 *
 * @property \App\Model\Entity\ArticleCategory $article_category
 * @property \App\Model\Entity\User $user
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
        'short_desc' => true,
        'article_body' => true,
        'added_by' => true,
        'added_on' => true,
        'user_id' => true,
        'category' => true,
        'status' => true,
        'views' => true,
        'article_category' => true,
        'user' => true,
    ];
}
