<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Suspended Listings</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <?= $this->Html->css(['boxicons.min', 'quill.snow', 'quill.bubble', 'remixicon', 'mega', 'style']) ?>

  <?= $this->Html->script(['vendor/apexcharts/apexcharts.min.js']) ?>
  <?= $this->Html->script(['vendor/bootstrap/js/bootstrap.bundle.min.js']) ?>
  <?= $this->Html->script(['vendor/chart.js/chart.umd.js']) ?>
  <?= $this->Html->script(['vendor/echarts/echarts.min.js']) ?>
  <?= $this->Html->script(['vendor/quill/quill.js']) ?>
  <?= $this->Html->script(['vendor/simple-datatables/simple-datatables.js']) ?>
  <?= $this->Html->script(['vendor/tinymce/tinymce.min.js']) ?>
  <?= $this->Html->script(['vendor/php-email-form/validate.js']) ?>

  <?= $this->Html->css(['cake']) ?>
  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>

<body>

<?= $this->element('topbar') ?>
<div class="row">
<?= $this->element('sidebar') ?>


    <div class="section col-md-9 mt-2">
    <div class="countries index content">
      <div class = "d-flex justify-content-between">
      <h4><?= __('Suspended Listings') ?></h4>
</div>
   
        <hr>

        <!-- Search Box -->
        <div class=" d-flex justify-content-end mb-2">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
            <?= $this->Form->control('search', [
                'label' => false,
                'value' => $search,
                'placeholder' => 'Search Listing...',
                'class' => 'form-control'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>

        <div class="table-responsive">
        <table class="table table-striped">
    <thead class="table-light">
        <tr>
            <th><?= __('S No.') ?></th>
            <th><?= $this->Paginator->sort('listing Id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('listing_category') ?></th>
            <th><?= $this->Paginator->sort('user Id') ?></th>
            <th><?= __('Toggle Status') ?></th>
            <th><?= __('Current Status') ?></th>
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
    <?= $this->Html->link(h($listing->listing_id), ['controller' => 'Listings', 'action' => 'view', $listing->id], ['escape' => false]) ?>
</td>
            <td><?= h($listing->firstname). ' ' . h($listing->lastname) ?></td>
            <td><?= h($listing->email) ?></td>
            <td><?= h($listing->listing_type) ?></td>
            <td><?= h($listing->user_id) ?></td>
           <td>
    <?= $this->Form->create(null, ['url' => ['action' => 'index'], 'type' => 'post']) ?>
    <?= $this->Form->hidden('listing_id', ['value' => $listing->id]) ?>
   <?= $this->Form->select('status', [
    '0' => '--Pending Approval--',
    '1' => 'Approve',
    '2' => 'Suspend'
], [
    'value' => ($listing->status == 1) ? '1' : (($listing->is_suspended == 1) ? '2' : '0'),
    'onchange' => 'this.form.submit()',
    'class' => 'form-control'
]) ?>

    <?= $this->Form->end() ?>
</td>

<td>
    <?php
    $status = $listing->listing_status;
    $statusColor = ($status == 'Approved') ? 'green' : (($status == 'Suspended') ? 'red' : 'blue');
    ?>
    <span style="color: <?= $statusColor ?>; font-weight: bold;">
        <?= h($status) ?>
    </span>
</td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $listing->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $listing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listing->id)]) ?>
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
</div>

</div>

<?= $this->Html->script(['main.js']) ?>

</body>
</html>
