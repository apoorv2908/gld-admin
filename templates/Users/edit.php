<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Category: Add</title>
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
  
  <style>
    .required-asterisk {
      color: red;
      margin-left: 3px;
    }
  </style>
</head>

<body>

<?= $this->element('topbar') ?>
<div class="row">
    <div class= "col-md-2">
    <?= $this->element('sidebar') ?>
    </div>

    <div class="section col-md-10 mt-2">
    <div class="mx-4">
        <h4><?= __('Edit User') ?></h4>
        <hr>

            <?= $this->Form->create($user, ['id' => 'adminForm']) ?>
            <div class="table-responsive">
            <div >
            <div class="col-12 fw-bold">
        <?= $this->Form->control('firstname', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label', 'text' => 'First Name<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Name'
        ]) ?>


 <?= $this->Form->control('lastname', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label mt-4', 'text' => 'Last Name<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Name'
        ]) ?>


 <?= $this->Form->control('email', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label mt-4', 'text' => 'Email<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Name'
        ]) ?>

         <?= $this->Form->control('created', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label mt-4', 'text' => 'Joining Date<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Name'
        ]) ?>

         <?= $this->Form->control('password', [
            'class' => 'form-control', 
            'label' => ['class' => 'form-label mt-4', 'text' => 'Password<span class="required-asterisk">*</span>', 'escape' => false],
            'required' => true,
            'placeholder' => 'Name'
        ]) ?>


                <label class= "mt-4">Status<span class="required-asterisk">*</span></label>
    <div class="form-check">
        <?= $this->Form->radio('status', [
            '1' => ' Active',
            '0' => ' Suspended'
        ], [
            'class' => 'form-check-input',
            'label' => [
                'class' => 'form-check-label d-flex justify-content-start'
            ],
            'templates' => [
                'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
                'radioWrapper' => '{{label}}'
            ]
        ]) ?>
    </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary', 'id' => 'submitBtn']) ?>
    </div>
            </div>
        </div>
            <?= $this->Form->end() ?>
    </div>
</div>

</div>

<?= $this->Html->script(['main.js']) ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('adminForm');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const submitBtn = document.getElementById('submitBtn');
    
    // Real-time validation
    confirmPassword.addEventListener('input', function() {
        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity('Passwords do not match');
            confirmPassword.classList.add('is-invalid');
        } else {
            confirmPassword.setCustomValidity('');
            confirmPassword.classList.remove('is-invalid');
        }
    });
    
    // Form submission validation
    form.addEventListener('submit', function(e) {
        // Check all required fields
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('is-invalid');
                isValid = false;
            } else {
                field.classList.remove('is-invalid');
            }
        });
        
        // Special check for password match
        if (password.value !== confirmPassword.value) {
            confirmPassword.classList.add('is-invalid');
            isValid = false;
        }
        
        if (!isValid) {
            e.preventDefault();
            alert('Please fill all required fields correctly.');
        }
    });
    
    // Remove invalid class when user starts typing
    form.querySelectorAll('input, select').forEach(element => {
        element.addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('is-invalid');
            }
        });
    });
});
</script>
</html>