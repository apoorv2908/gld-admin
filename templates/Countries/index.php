<?php
// Set the layout
$this->layout = 'admin_layout';

// Set the page title
$this->assign('title', 'Countries');
?>

<div class="content-header">
    <div >
        <h1 class="content-title"><?= __('List of Countries') ?></h1>
    </div>
</div>

<div class="content-card">
    <!-- Search Box -->
    <div class="d-flex justify-content-end mb-4">
        
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
        <?= $this->Form->control('search', [
            'label' => false,
            'value' => $search,
            'placeholder' => 'Search Country...',
            'class' => 'form-control '
        ]) ?>
        <?= $this->Form->end() ?>

        
    </div>

     <div class="table-responsive">
    <table class="table table-bordered border-dark table-sm">
        <thead class="table-light border-dark">
            <tr>
                <th>S no</th>
                <th><?= __('Country Name') ?></th>
                <th>Status</th>
                <th>Change Status</th> <!-- New Column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($countries)): ?>
                <?php foreach ($countries as $country): ?>
                    <tr>
                        <td><?= h($country->id) ?></td>
                        <td><?= h($country->name) ?></td>
                        <td>
                            <?= ($country->status == 1) ? 'Approved' : 'Suspended' ?>
                        </td>
                        <td >
                          

                            <div class="d-flex align-items-center "> <!-- Flex container with gap -->
        <?= $this->Form->control('status', [
            'type' => 'select',
            'options' => $statusOptions,
            'value' => $country->status,
            'label' => false,
        ]) ?>
    <?= $this->Form->button('Update', [
        'class' => "bi bi-arrow-repeat ms-3" // Prevent button from growing
    ]) ?>


                            <?= $this->Form->end() ?>
                            </div>

                        </td>
                       <td class="text-center">
    <a href="<?= $this->Url->build(['action' => 'edit', $country->id]) ?>" class="bi bi-pencil-fill">
    </a>
    <a href="<?= $this->Url->build(['action' => 'delete', $country->id]) ?>" class="bi bi-trash3 text-danger ms-3" 
       onclick="return confirm('Are you sure you want to delete this country?');">
    </a>
</td>

                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center"><?= __('No countries found') ?></td>
                </tr>
            <?php endif; ?>
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