



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
  <style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 12px;
    }
    th {
        background-color: #f4f4f4;
    }
    td {
        word-wrap: break-word;
        max-width: 600px;
    }
</style>
</head>

<body>

<?= $this->element('topbar') ?>
<div class="row">
<?= $this->element('sidebar') ?>


    <div class="section col-md-9 mt-2">
    <div class="countries index content">
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px; border-bottom: 1px solid #ddd;">
    <div>
        <h6>Listing Type: <?= h($listing->listing_type) ?></h6>
        <h6>Listing Id: <?= h($listing->listing_id) ?></h6>
                <h6>User Id: <?= h($listing->user_id) ?></h6>

    </div>
    <div>
        <h6>Status: 
            <?php 
                echo ($listing->status == 1) ? '<span style="color: green;">Approved</span>' : '<span style="color: red;">Pending</span>'; 
            ?>
        </h6>
    </div>
</div>




        <div class="column-responsive column-80">
            <table>
    <tr>
        <th><?= __('Name') ?></th>
        <td><?= h($listing->firstname) ?> <?= h($listing->lastname) ?></td>
  </tr>

   <tr>
        <th><?= __('Location') ?></th>
        <td><?= h($listing->country_name) ?> <?= h($listing->state_name) ?> <?= h($listing->city_name) ?></td>
  </tr>

   <tr>
        <th><?= __('Adderss') ?></th>
        <td><?= h($listing->street_address) ?> <?= h($listing->pincode) ?></td>
  </tr>
   <tr>
        <th><?= __('Contact Info') ?></th>
        <td><?= h($listing->email) ?> <?= h($listing->phone) ?> <?= h($listing->mobile) ?> </td>
  </tr>

   <tr>
        <th><?= __('Website') ?></th>
        <td><?= h($listing->website) ?> </td>
  </tr>
  

  <?php if ($listing->listing_type === 'Law Firm') : ?>
    <tr>
        <th><?= __('Designation') ?></th>
        <td><?= h($listing->designation) ?></td>
    </tr>
    <tr>
        <th><?= __('Established Year') ?></th>
        <td><?= h($listing->estd_year) ?></td>
    </tr>
    <tr>
        <th><?= __('Law Firm') ?></th>
        <td><?= h($listing->law_firm) ?></td>
    </tr>
<?php endif; ?>


  <?php if ($listing->listing_type === 'Lawyer') : ?>
    <tr>
        <th><?= __('Professional Qualification') ?></th>
        <td><?= h($listing->qualification) ?></td>
    </tr>
    <tr>
        <th><?= __('Affiliating (State Bar Council / Bar Association)') ?></th>
        <td><?= h($listing->affiliating_bar_council_assoc) ?></td>
    </tr>
    <tr>
        <th><?= __('Registration Number') ?></th>
        <td><?= h($listing->reg_no) ?></td>
    </tr>
     <tr>
        <th><?= __('Practicing Since') ?></th>
        <td><?= h($listing->practicing_since) ?></td>
    </tr>
<?php endif; ?>

 <tr>
        <th><?= __('Court of Practice') ?></th>
        <td><?= h($listing->court_of_practice) ?></td>
    </tr>

     <tr>
        <th><?= __('Practice Areas') ?></th>
        <td><?= h($listing->practice_area_name) ?></td>
    </tr>

     <tr>
        <th><?= __('Brief Profile') ?></th>
        <td><?= h($listing->brief_detail) ?></td>
    </tr> <tr>
        <th><?= __('Free Consultation') ?></th>
        <td><?= h($listing->free_consultation) ?></td>
    </tr>


   </table>
    </div>

        <!-- Paginator -->
    </div>
</div>

</div>

<?= $this->Html->script(['main.js']) ?>

</body>
</html>
