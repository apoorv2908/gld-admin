



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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

</head>

<body>

 
<?= $this->element('topbar') ?>


<?= $this->element('sidebar') ?>
    <main id="main" class="main">
    <div class="pagetitle">
      <h1>Journals</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Journals</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
     
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
                <div class = "d-flex justify-content-between">
                <h5 class="card-title">Journals</h5>
                <div>
                <?= $this->Html->link(__(' + Add New'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm mt-3']) ?>

</div>


                </div>

<div class = "table-responsive">
              <table class="table datatable">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('sno') ?></th>
                    <th><?= $this->Paginator->sort('journal_title') ?></th>
                    <th><?= $this->Paginator->sort('journal_body') ?></th>
                    <th><?= $this->Paginator->sort('added_on') ?></th>
                    <th><?= $this->Paginator->sort('added_by') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Calculate the starting number based on the current page and items per page
                $start = $this->Paginator->param('page') > 1 ? (($this->Paginator->param('page') - 1) * $this->Paginator->param('perPage')) : 0;
                foreach ($journal as $index => $journal): ?>
                <tr>

                <tr>
                    <td><?= $this->Number->format($journal->sno) ?></td>
                    <td><?= h($journal->journal_title) ?></td>
                    <td><?= h($journal->journal_body) ?></td>
                    <td><?= h($journal->added_on) ?></td>
                    <td><?= h($journal->added_by) ?></td>
                    <td><?= h($journal->status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $journal->sno]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $journal->sno]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $journal->sno], ['confirm' => __('Are you sure you want to delete # {0}?', $journal->sno)]) ?>
                    </td>
                </tr>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
              </table>
              <!-- End Table with stripped rows -->

                  </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    </main><!-- End #main -->

   <!-- End #main -->

  <!-- ======= Footer ======= -->
 
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?= $this->Html->script(['vendor/apexcharts/apexcharts.min.js']) ?>
  <?= $this->Html->script(['vendor/bootstrap/js/bootstrap.bundle.min.js']) ?>
  <?= $this->Html->script(['vendor/chart.js/chart.umd.js']) ?>

  <?= $this->Html->script(['vendor/echarts/echarts.min.js']) ?>
  <?= $this->Html->script(['vendor/quill/quill.js']) ?>

  <?= $this->Html->script(['vendor/simple-datatables/simple-datatables.js']) ?>

  <?= $this->Html->script(['vendor/tinymce/tinymce.min.js']) ?>

  <?= $this->Html->script(['vendor/php-email-form/validate.js']) ?>


  <!-- Template Main JS File -->
  <?= $this->Html->script(['main.js']) ?>

</body>
</html>
