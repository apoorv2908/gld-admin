



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
  <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css') ?>

<?= $this->Html->script('https://code.jquery.com/jquery-3.5.1.min.js') ?>
<?= $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js') ?>
<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js') ?>


  <!-- Vendor CSS Files -->
  <?= $this->Html->css(['boxicons.min', 'quill.snow', 'quill.bubble', 'remixicon', 'mega', 'style']) ?>

</head>

<body>

 
<?= $this->element('topbar') ?>


<?= $this->element('sidebar') ?>

    <!-- Sidebar content -->
    <main id="main" class="main">

<div class="pagetitle">
  <h1>Journals</h1>
  <nav>
  <ol class="breadcrumb">
          <li class="breadcrumb-item"><a>Home</a></li>
          <li class="breadcrumb-item active">Journals</li>
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
            <h5 class="card-title">Add Journal</h5>

    <?= $this->Form->create($journal, ['class' => 'row g-3']) ?>
    <div class="col-12">
        <?= $this->Form->control('journal_title', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Journal Title']
        ]) ?>
    </div>
    <div class="col-12">
        <?= $this->Form->control('journal_body', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Journal Body', 'id' => 'summernote']
        ]) ?>
    </div>
    <div class="col-12">
        <?= $this->Form->control('added_on', [
            'type' => 'date',
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Added On']
        ]) ?>
    </div>
    <div class="col-12">
        <?= $this->Form->control('added_by', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'Added By']
        ]) ?>
    </div>
    <div class="col-12">
        <?= $this->Form->label('status', 'Status', ['class' => 'form-label']) ?>
        <div class="form-check">
            <?= $this->Form->radio('status', [
                ['value' => '1', 'text' => 'Enabled', 'class' => 'form-check-input'],
                ['value' => '0', 'text' => 'Disabled', 'class' => 'form-check-input']
            ], ['class' => ' form-check']) ?>
        </div>
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
<script>
$(document).ready(function() {
  $('#summernote').summernote({
    height: 300,   // set the height of the editor
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['insert', ['link', 'picture', 'video']]
    ]
  });
});
</script>


                <!-- Vertical Form -->

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

</body>
</html>
