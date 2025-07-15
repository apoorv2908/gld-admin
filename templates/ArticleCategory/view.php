<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ArticleCategory $articleCategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Article Category'), ['action' => 'edit', $articleCategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Article Category'), ['action' => 'delete', $articleCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articleCategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Article Category'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Article Category'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articleCategory view content">
            <h3><?= h($articleCategory->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($articleCategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Article Category') ?></th>
                    <td><?= $this->Number->format($articleCategory->article_category) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $articleCategory->status === null ? '' : $this->Number->format($articleCategory->status) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
