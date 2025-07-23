

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Global Law Directory</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Vendor CSS Files -->
  <?= $this->Html->css(['boxicons.min']) ?>


  <?= $this->Html->css(['quill.snow']) ?>
  <?= $this->Html->css(['quill.bubble']) ?>

  <?= $this->Html->css(['remixicon']) ?>

  <?= $this->Html->css(['mega']) ?>


  <!-- Template Main CSS File -->
  <?= $this->Html->css(['style']) ?>



</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              
              <div class="card mb-3">

                <div class="card-body">

                
<div class="row">
  
    <div >
        <div >
            <div class="card-body">
                <h5 class="card-title">Login</h5>

                <!-- Bootstrap Form with CakePHP -->
                <?= $this->Form->create(null, ['class' => 'row g-3 needs-validation', 'novalidate' => true, 'type' => 'post']) ?>
    <div class="col-12">
        <div class="input-group has-validation">
            <?= $this->Form->text('email', ['class' => 'form-control', 'id' => 'yourUsername', 'required' => true, 'placeholder' => "Email"]) ?>
            <div class="invalid-feedback">Please enter your username.</div>
        </div>
    </div>

    <div class="col-12">
        <?= $this->Form->password('password', ['class' => 'form-control', 'id' => 'yourPassword', 'required' => true, 'placeholder' => "Password"]) ?>
        <div class="invalid-feedback">Please enter your password!</div>
    </div>


    <div class="col-12">
        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary w-100']) ?>
    </div>
<?= $this->Form->end() ?>

                <!-- End of Bootstrap Form -->

            </div>
        </div>
    </div>
</div>
                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a class = "text-primary">Aritone Global Ventures Ltd</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
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