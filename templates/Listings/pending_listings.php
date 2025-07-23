<?php
// Set the layout
$this->layout = 'admin_layout';

// Set the page title
$this->assign('title', 'Pending Listings');
?>

<div class="content-header">
    <div >
        <h1 class="content-title"><?= __('Pending Listings') ?></h1>
    </div>
</div>

<div class="content-card">
    <!-- Search Box -->
    <div class="d-flex justify-content-end mb-4">
        
        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
        <?= $this->Form->control('search', [
            'label' => false,
            'value' => $search,
            'placeholder' => 'Search Listings...',
            'class' => 'form-control '
        ]) ?>
        <?= $this->Form->end() ?>

        
    </div>

    <div class="table-responsive">
        <table class="table table-bordered border-dark table-sm">
    <thead class="table-light border-dark">
        <tr>
            <th><?= __('S No.') ?></th>
            <th>Listing Id</th>
            <th>Name</th>
                        <th>User Id</th>
            <th>Email</th>
                        <th>Listing Category</th>
            <th>Listing Type</th>

            <th>Listing Status</th>
            <th><?= __('Change Status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $start = $this->Paginator->param('page') > 1 ? (($this->Paginator->param('page') - 1) * $this->Paginator->param('perPage')) : 0;
        foreach ($listings as $index => $listing): ?>
        <tr>
            <td><?= $start + $index + 1 ?></td>
<td>
<?= $this->Html->link(
    h($listing->listing_id),
    'https://www.unitedlawhouse.com/gld_web/searchdirectory/' . 
    (($listing->listing_type === 'Lawyer') ? 'view-lawyer-profile' : 'view-lawfirm-profile') . 
    '/' . $listing->id,
    ['escape' => false, 'target' => '_blank']
) ?></td>
            <td><?= h($listing->firstname). ' ' . h($listing->lastname) ?></td>
                        <td><?= h($listing->user_id) ?></td>
            <td><?= h($listing->email) ?></td>
            <td><?= h($listing->listing_type) ?></td>
            <td>Basic</td>
            <td style="font-size: small;">
   <?php
if ($listing->is_suspended == 1) {
    $statusText = 'Suspended'; // If suspended, it should be 'Suspended' regardless of status
} elseif ($listing->status == 1) {
    $statusText = 'Approved'; // If not suspended and status is 1, it's 'Approved'
} else {
    $statusText = 'Pending for Approval'; // If status is 0 and not suspended, it's 'Pending for Approval'
}
?>

    <?= h($statusText) ?>
</td>

           <td>
    <?= $this->Form->create(null, ['url' => ['action' => 'index'], 'type' => 'post']) ?>
    <?= $this->Form->hidden('listing_id', ['value' => $listing->id]) ?>
   <?= $this->Form->select('status', [
    '0' => 'Pending',
    '1' => 'Approve',
    '2' => 'Suspend'
], [
    'value' => ($listing->status == 1) ? '1' : (($listing->is_suspended == 1) ? '2' : '0'),
    'onchange' => 'this.form.submit()',
]) ?>

    <?= $this->Form->end() ?>
</td>



         <td class="actions text-center">
         
    <?= $this->Form->postLink(
        __(''),
        ['action' => 'delete', $listing->id],
        [
            'confirm' => __('Are you sure you want to delete # {0}?', $listing->id),
            'class' => 'bi bi-trash3 text-danger ' // Bootstrap-styled button
        ]
    ) ?>
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