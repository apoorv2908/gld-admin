<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>States</title>
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
      <h4><?= __('List of States') ?></h4>
</div>
   
        <hr>

        <!-- Search Box -->
        <div class=" d-flex justify-content-end mb-2">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
            <?= $this->Form->control('search', [
                'label' => false,
                'value' => $search,
                'placeholder' => 'Search State...',
                'class' => 'form-control'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-sm border-dark">
                <thead class="table-light border-dark">
                <tr>
                    <th>S.No</th>
                    <th><?= __('State ') ?></th>
                    <th><?= __('Country ') ?></th>
                    <th>Status</th>
                                        <th>Change Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $counter = 1;
                foreach ($states as $state): ?>
                <tr>
                    <td><?= $counter++ ?></td>
                    <td><?= h($state->name) ?></td>
                    <td><?= h($state->country->name) ?></td>
                    <td>
                        <?= $state->status == 1 ? 'Approved' : 'Suspended' ?>
                    </td> 
                    <td>
                        <?= $this->Form->create(null, ['url' => ['action' => 'updateStatus', $state->id]]) ?>


                                                <div class="d-flex align-items-center gap-2"> <!-- Flex container with gap -->
    <div class="flex-grow-1"> <!-- Let select take available space -->
        <?= $this->Form->control('status', [
            'type' => 'select',
            'options' => $statusOptions,
            'value' => $state->status,
            'label' => false,
            'class' => 'form-control' // Ensure consistent styling
        ]) ?>
    </div>
    <?= $this->Form->button('Update', [
        'class' => 'btn btn-primary flex-shrink-0' // Prevent button from growing
    ]) ?>
</div>



                    </td>   
                    <td>
                        
                        <?= $this->Form->end() ?>
                        <a href="<?= $this->Url->build(['action' => 'edit', $state->id]) ?>" class="btn btn-primary btn-sm">
                            <?= __('Edit') ?>
                        </a>
                        <a href="<?= $this->Url->build(['action' => 'delete', $state->id]) ?>" class="btn btn-danger btn-sm" 
                           onclick="return confirm('Are you sure you want to delete this state?');">
                            <?= __('Delete') ?>
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
</div>

</div>

<?= $this->Html->script(['main.js']) ?>

</body>
</html>