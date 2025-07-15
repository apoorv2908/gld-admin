
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users</title>
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
    <div class= "col-md-2">
    <?= $this->element('sidebar') ?>

    </div>


    <div class="section col-md-10 mt-2">
    <div class="mx-4">
      <div class = "d-flex justify-content-between">
      <h4><?= __('All Registrations') ?></h4>
</div>
   
        <hr>

        <!-- Search Box -->
        <div class=" d-flex justify-content-end mb-2">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
            <?= $this->Form->control('search', [
                'label' => false,
                'value' => $search,
                'placeholder' => 'Search Registrations...',
                'class' => 'form-control'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>

        <div class="table-responsive">
            <table class="table table-sm table-bordered border-dark">
                <thead class="table-light border-dark">
                <tr>
                <th><?= __('S No.') ?></th>
                                    <th><?= $this->Paginator->sort('user id') ?></th>

                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('join_date') ?></th>
                                        <th><?= $this->Paginator->sort('listing_type') ?></th>
                    <th><?= $this->Paginator->sort('listing id') ?></th>
                    <th><?= $this->Paginator->sort('listing_status') ?></th>

                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                $start = $this->Paginator->param('page') > 1 ? (($this->Paginator->param('page') - 1) * $this->Paginator->param('perPage')) : 0;
                foreach ($users as $index => $user): ?>
                <tr>
                    <td><?= $start + $index + 1 ?></td>
                                        <td><?= h($user->id) ?></td>

                   <td>
    <?= h($user->firstname . ' ' . $user->lastname) ?>
</td>


                    <td><?= h($user->email) ?> </td>
<td><?= h($user->created->format('Y-m-d')) ?></td>

                     <td>BL </td>
                  <td><?= h($user->listing_type == 'Lawyer' ? 'LA' : 'LF') . h($user->listingId) ?></td>
<td><?= h($user->listingStatus == 1 ? 'Active' : 'Inactive') ?></td>



                    <td class="actions">

                      <a href="<?= $this->Url->build(['action' => 'edit', $user->id]) ?>" class="btn btn-primary text-white btn-sm">
        <?= __('Edit') ?>
    </a>
<?= $this->Form->postLink(
     __('Delete'), 
    ['action' => 'delete', $user->id], 
    [
        'confirm' => __('Are you sure you want to delete # {0}?', $user->id), 
        'class' => 'btn btn-danger text-light btn-sm', 
        'escape' => false
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
</div>

</div>

<?= $this->Html->script(['main.js']) ?>

</body>
</html>
