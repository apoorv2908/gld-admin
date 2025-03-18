
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Practice Area</title>
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
      <h4><?= __('Practice Area') ?></h4>
      <?= $this->Html->link(__('+ New Practicearea'), ['action' => 'add'], ['class' => 'btn btn-primary float-end mb-3']) ?>
</div>
   
        <hr>

        <!-- Search Box -->
        <div class=" d-flex justify-content-end mb-2">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
            <?= $this->Form->control('search', [
                'label' => false,
                'value' => $search,
                'placeholder' => 'Search Practice Area...',
                'class' => 'form-control'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-light">
                <tr>
                <th><?= __('S No.') ?></th>
                    <th><?= $this->Paginator->sort('practice_area_title') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                $start = $this->Paginator->param('page') > 1 ? (($this->Paginator->param('page') - 1) * $this->Paginator->param('perPage')) : 0;
                foreach ($practicearea as $index => $practice): ?>
                <tr>
                    <td><?= $start + $index + 1 ?></td>
                    <td><?= h($practice->practice_area_title) ?></td>
                   
                    <td class="actions">
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $practice->practice_area_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $practice->practice_area_id], ['confirm' => __('Are you sure you want to delete # {0}?', $practice->practice_area_id)]) ?>
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
