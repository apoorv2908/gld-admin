<?php
// Set the layout
$this->layout = 'admin_layout';

// Set the page title
$this->assign('title', 'Category');
?>

<div class="content-header">
    <div >
        <h1 class="content-title"><?= __('Directory Category') ?></h1>
    </div>
</div>

<div class="content-card">
    <!-- Search Box -->
    <div class="d-flex justify-content-end mb-4">
        
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
        <?= $this->Form->control('search', [
            'label' => false,
            'value' => $search,
            'placeholder' => 'Search Category...',
            'class' => 'form-control '
        ]) ?>
        <?= $this->Form->end() ?>
        <?= $this->Html->link(__('+ New Category'), ['action' => 'add'], ['class' => 'btn btn-primary ms-3']) ?>

        
    </div>

    <div class="table-responsive">
        <table class="table table-bordered border-dark">
            <thead class="table-light border-dark">
            <tr>
                <th><?= __('S No.') ?></th>
                <th><?= __('Category Title') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($category as $category): ?>
            <tr>
                <td><?= h($category->sno) ?></td>
                <td><?= h($category->category) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->sno], [
                        'class' => 'btn btn-primary text-white btn-sm'
                    ]) ?>
                    
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->sno], [
                        'class' => 'btn btn-danger text-white btn-sm',
                        'confirm' => __('Are you sure you want to delete # {0}?', $category->sno)
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