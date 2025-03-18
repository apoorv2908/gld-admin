




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
        <h4><?= __('Practice Areas') ?></h4>
        <hr>

        <?= $this->Form->create($lawArticle) ?>
<div class="table-responsive">
    <div class="practicearea form content">
        <div class="col-12 fw-bold">
            <?= $this->Form->control('article_title', [
                'class' => 'form-control', 
                'label' => ['class' => 'form-label', 'text' => 'Article Title*']
            ]) ?>
        </div>

        <div class="col-12 mt-3 fw-bold">
            <?= $this->Form->control('article_body', [
                'class' => 'form-control', 
                'label' => ['class' => 'form-label', 'text' => 'Article Body*']
            ]) ?>
        </div>

        <div class="col-12 mt-3 fw-bold">
            <?= $this->Form->control('category', [
                'type' => 'select',
                'options' => $practiceAreas,
                'empty' => '-- Select Practice Area --',
                'class' => 'form-control',
                'label' => ['class' => 'form-label', 'text' => 'Category*']
            ]) ?>
        </div>

        <div class="col-12 mt-3 fw-bold">
            <?= $this->Form->control('added_on', [
                'class' => 'form-control', 
                'label' => ['class' => 'form-label', 'text' => 'Added on*'],
                'readonly' => true,
                'value' => date('Y-m-d')
            ]) ?>
        </div>

        <div class="col-12 mt-3 fw-bold">
            <?= $this->Form->control('added_by', [
                'class' => 'form-control', 
                'label' => ['class' => 'form-label', 'text' => 'Added by*'],
                'readonly' => true,
                'value' => 'Admin'
            ]) ?>
        </div>
        
        <div class="d-flex justify-content-end mt-3">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>


        <!-- Paginator -->
    </div>
</div>

</div>

<?= $this->Html->script(['main.js']) ?>

</body>
</html>
