<?php
// Set the layout
$this->layout = 'admin_layout';

// Set the page title
$this->assign('title', 'Law Articles');
?>

<div class="content-header">
    <div >
        <h1 class="content-title"><?= __('All Articles') ?></h1>
    </div>
</div>

<div class="content-card">
    <!-- Search Box -->
    <div class="d-flex justify-content-end mb-4">
        
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
        <?= $this->Form->control('search', [
            'label' => false,
            'value' => $search,
            'placeholder' => 'Search Law Articles...',
            'class' => 'form-control '
        ]) ?>
        <?= $this->Form->end() ?>

        
    </div>

    <div class="table-responsive">
  <table class="table table-bordered table-sm border-dark">
    <thead class="table-light border-dark">
        <tr>
            <th>Article Id</th>
            <th>Article Title</th>
            <th>Added On</th>
            <th>Added By</th>
            <th>Status</th>
            <th>Change Status</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lawArticles as $lawArticle): ?>
        <tr>
            <td><?= $this->Number->format($lawArticle->id) ?></td>
<td>
    <?= $this->Html->link(h($lawArticle->article_title), ['action' => 'edit', $lawArticle->id], ['class' => 'article-link']) ?>
</td>            <td><?= h($lawArticle->added_on) ?></td>
            <td><?= h($lawArticle->added_by) ?></td>

            <!-- Current Status Column -->
            <td>
                <?php 
                    $statusLabels = ['Pending', 'Approved', 'Suspended'];
                    echo h($statusLabels[$lawArticle->status]); 
                ?>
            </td>

            <!-- Status Dropdown -->
            <td>
                <select class="status-dropdown" data-id="<?= $lawArticle->id ?>">
                    <option value="0" <?= $lawArticle->status == 0 ? 'selected' : '' ?>>Pending</option>
                    <option value="1" <?= $lawArticle->status == 1 ? 'selected' : '' ?>>Approved</option>
                    <option value="2" <?= $lawArticle->status == 2 ? 'selected' : '' ?>>Suspended</option>
                </select>
            </td>

<td class="actions text-center">    
    <?= $this->Form->postLink('', ['action' => 'delete', $lawArticle->id], [
        'class' => 'bi bi-trash3 text-danger ',
        'confirm' => __('Are you sure you want to delete "{0}"?', h($lawArticle->article_title))
    ]) ?>
</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        </div>

    <!-- Paginator -->
    <div class="paginator">
        <ul class="pagination justify-content-center">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p class="text-center"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>