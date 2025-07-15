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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $articleCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $articleCategory->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Article Category'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="articleCategory form content">
            <?= $this->Form->create($articleCategory) ?>
            <fieldset>
                <legend><?= __('Edit Article Category') ?></legend>
                <?php
                    echo $this->Form->control('article_category');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
