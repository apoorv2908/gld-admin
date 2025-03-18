<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Journal $journal
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Journal'), ['action' => 'edit', $journal->sno], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Journal'), ['action' => 'delete', $journal->sno], ['confirm' => __('Are you sure you want to delete # {0}?', $journal->sno), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Journal'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Journal'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="journal view content">
            <h3><?= h($journal->journal_title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Journal Title') ?></th>
                    <td><?= h($journal->journal_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Journal Body') ?></th>
                    <td><?= h($journal->journal_body) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added By') ?></th>
                    <td><?= h($journal->added_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sno') ?></th>
                    <td><?= $this->Number->format($journal->sno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added On') ?></th>
                    <td><?= h($journal->added_on) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $journal->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
