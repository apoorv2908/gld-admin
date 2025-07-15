<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edit <?= h($lawArticle->article_title) ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Summernote CSS -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

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
  <style>
    .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-control {
        height: 45px;
        border-radius: 5px;
    }
    .note-editor.note-frame {
        border: 1px solid #ced4da;
        border-radius: 5px;
    }
    .btn-submit {
        background-color: #0d6efd;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-submit:hover {
        background-color: #0b5ed7;
    }
  </style>
</head>

<body>

<?= $this->element('topbar') ?>
<div class="row">
<?= $this->element('sidebar') ?>

    <div class="section col-md-9 mt-2">
        <div class="law-articles form content">
            <h3>Edit Law Article</h3>
            <hr>
            
            <?= $this->Flash->render() ?>
            
            <div class="form-container">
                <?= $this->Form->create($lawArticle) ?>
                
                <div class="form-group">
                    <?= $this->Form->control('article_title', [
                        'class' => 'form-control',
                        'label' => 'Article Title'
                    ]) ?>
                </div>

                   <div class="form-group">
                    <?= $this->Form->control('short_desc', [
                        'class' => 'form-control',
                        'label' => 'Short Description'
                    ]) ?>
                </div>
                
                <div class="form-group">
                    <?= $this->Form->label('article_body', 'Article Content'); ?>
                    <?= $this->Form->textarea('article_body', [
                        'id' => 'summernote',
                        'class' => 'form-control',
                        'rows' => '10'
                    ]) ?>
                </div>
                
           
                
                <div class="form-group">
                    <?= $this->Form->control('category', [
                        'class' => 'form-control',
                        'label' => 'Article Category',
                        'options' => $practiceAreas,
                        'empty' => '-- Select Practice Area --'
                    ]) ?>
                </div>
                
           <div class="form-group">


    <!-- other rows -->
        <label>Current Status</label>
        <div>
            <?php if ($lawArticle->status == 1): ?>
                <span >Approved</span>
            <?php else: ?>
                <span>Suspended</span>
            <?php endif; ?>
        </div>
        </div>
    <!-- other rows -->
    <label>Status</label>
    <div class="form-check">
        <?= $this->Form->radio('status', [
            '1' => ' Approved',
            '0' => ' Suspended'
        ], [
            'class' => 'form-check-input',
            'label' => [
                'class' => 'form-check-label mx-5'
            ],
            'templates' => [
                'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
                'radioWrapper' => '{{label}}'
            ]
        ]) ?>
    </div>
</div>
                
                <div class="form-group">
                    <?= $this->Form->button(__('Save Changes'), [
                        'class' => 'btn btn-primary btn-submit'
                    ]) ?>
                </div>
                
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<!-- Summernote JS -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    
    // Make sure Summernote content is submitted with the form
    $('form').submit(function() {
        var content = $('#summernote').summernote('code');
        $('#summernote').val(content);
        return true;
    });
});
</script>

<?= $this->Html->script(['main.js']) ?>

</body>
</html>