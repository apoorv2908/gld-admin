<?php
// Set the layout
$this->layout = 'admin_layout';

// Set the page title
$this->assign('title', 'Admins');
?>

<div class="content-header">
    <div >
        <h1 class="content-title"><?= __('List of Admin') ?></h1>
    </div>
</div>

<div class="content-card">
    <!-- Search Box -->
    <div class="d-flex justify-content-end mb-4">
        
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
        <?= $this->Form->control('search', [
            'label' => false,
            'value' => $search,
            'placeholder' => 'Search Admin...',
            'class' => 'form-control '
        ]) ?>
        <?= $this->Form->end() ?>
      <?= $this->Html->link(__('+ New Admin'), ['action' => 'add'], ['class' => 'btn btn-primary ms-3']) ?>

        
    </div>

    <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead class="table-light border-dark">
                <tr>
                <th><?= __('S No.') ?></th>
                    <th><?= __('Name') ?></th>
                                        <th><?= __('Designation') ?></th>
                    <th><?= __('Place of Posting') ?></th>
                    <th><?= __('Mobile No') ?></th>
                                        <th><?= __('Email') ?></th>
                    <th><?= __('Username') ?></th>
                    <th><?= __('Profile') ?></th>


                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>

               <tbody>
                
                <?php
        $start = $this->Paginator->param('page') > 1 ? (($this->Paginator->param('page') - 1) * $this->Paginator->param('perPage')) : 0;
        foreach ($admin as $index => $admin): ?>
                <tr>
                        <td><?= $start + $index + 1 ?></td>
                    <td><?= h($admin->name) ?></td>
                                        <td><?= h($admin->role) ?></td>
                    <td><?= h($admin->place_of_posting) ?></td>
                    <td><?= h($admin->phone) ?></td>
                    <td><?= h($admin->email) ?></td>
                                        <td><?= h($admin->username) ?></td>
                                                            <td><?= h($admin->profile) ?></td>



                   <td >
                   <a href="<?= $this->Url->build(['action' => 'edit', $admin->id]) ?>" class="bi bi-pencil-fill">
    </a>
  
    

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