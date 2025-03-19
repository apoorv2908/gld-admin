








<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My Profile</title>
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
        font-size: 16px;
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
   <div><h4>My Details</h4></div>
</div>




        <div class="column-responsive column-80">
            <table>
    <tr>
        <th><?= __('Name') ?></th>
        <td><?= h($admin->name) ?> </td>
  </tr>

   <tr>
        <th><?= __('Username') ?></th>
        <td><?= h($admin->username) ?> </td>
  </tr> <tr>
        <th><?= __('Role') ?></th>
        <td><?= h($admin->role) ?> </td>
  </tr>
   <tr>
        <th><?= __('Phone') ?></th>
        <td><?= h($admin->phone) ?> </td>
  </tr>

 <tr>
    <th><?= __('Password') ?></th>
    <td>
        ******** <!-- Hide actual password for security -->
        <?= $this->Html->link(
            'Change Password', 
            ['controller' => 'Admin', 'action' => 'edit', $admin->id], 
            ['class' => 'btn btn-sm btn-warning ms-2']
        ) ?>
    </td>
</tr>

  <tr>
        <th><?= __('Email') ?></th>
        <td><?= h($admin->email) ?> </td>
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
