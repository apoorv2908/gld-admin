







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
      <h1>User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
    <aside class="column">
        <div class="side-nav">
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit User</h5>

                <!-- Vertical Form -->
              <!-- Vertical Form -->
              <?= $this->Form->create($registration, ['class' => 'row g-3']) ?>
    <div class="col-12">
        <?= $this->Form->control('firstname', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'First Name']
        ]) ?>
    </div>
    <div class="col-12">
        <?= $this->Form->control('lastname', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Last Name']
        ]) ?>
    </div>
    <div class="col-12">
        <?= $this->Form->control('email', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Email']
        ]) ?>
    </div>
    <div class="col-12">
        <?= $this->Form->control('contact', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Contact No']
        ]) ?>
    </div>
    <div>
    <?= $this->Form->control('country', [
    'class' => 'form-control', 
    'label' => ['class' => 'form-label', 'text' => 'Country'],
    'id' => 'country',
    'data-selected' => h($registration->country)
]) ?>
</div>
<div>
<?= $this->Form->control('state', [
    'class' => 'form-control', 
    'label' => ['class' => 'form-label', 'text' => 'State'],
    'id' => 'state',
    'data-selected' => h($registration->state)
]) ?>
</div>
<div>
<?= $this->Form->control('city', [
    'class' => 'form-control', 
    'label' => ['class' => 'form-label', 'text' => 'City'],
    'id' => 'city',
    'data-selected' => h($registration->city)
]) ?>
</div>

    <div class="col-12">
        <?= $this->Form->control('password', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Password']
        ]) ?>
    </div>
    <div class="text-center">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->button(__('Reset'), ['type' => 'reset', 'class' => 'btn btn-secondary']) ?>
    </div>
<?= $this->Form->end() ?>


            </div>
        </div>
    </div>
</div>

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
  <?= $this->Html->script(['location-dropdown.js']) ?>


</body>
</html>
