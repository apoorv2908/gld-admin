



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
            <h4><?= h($lawArticle->article_title) ?></h4>
        <hr>

        <div class="column-responsive column-80">
            <table>
    <tr>
        <th><?= __('Article Title') ?></th>
                <td><?= h($lawArticle->article_title) ?></td>

    </tr>

    <tr>
        <th><?= __('Article Body') ?></th>
                <td><?= nl2br(h(strip_tags($lawArticle->article_body))) ?></td>

    </tr>
 
    <tr>
        <th><?= __('Added By') ?></th>
        <td><?= h($lawArticle->added_by) ?></td>
    </tr>
    <tr>
        <th><?= __('Category') ?></th>
        <td><?= h($lawArticle->category) ?></td>
    </tr>
    <tr>
        <th><?= __('Views') ?></th>
        <td><?= h($lawArticle->views) ?></td>
    </tr>
 
    <tr>
        <th><?= __('Status') ?></th>
        <td><?= $this->Number->format($lawArticle->status) ?></td>
    </tr>
    <tr>
        <th><?= __('Added On') ?></th>
        <td><?= h($lawArticle->added_on) ?></td>
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
