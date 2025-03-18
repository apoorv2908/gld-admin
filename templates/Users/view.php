






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
   
</div>




        <div class="column-responsive column-80">
            <table>
    <tr>
        <th><?= __('Name') ?></th>
        <td><?= h($user->firstname) ?> <?= h($user->lastname) ?></td>
  </tr>

  

   <tr>
        <th><?= __('Location Info') ?></th>
                            <td><?= h($user->country). ', ' .$user->state. ', ' .$user->city ?></td>

  </tr>

  <tr>
        <th><?= __('Contact Info') ?></th>

                    <td><?= h($user->email) ?> <br><?= h($user->contact) ?></td>

  </tr>


   

   </table>

   <h4>Listings Added</h4>
    <?php if (!empty($user->listings)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Added On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user->listings as $index => $listing): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= h($listing->listing_type) ?></td>
                        <td><?= h($listing->listing_status) ?></td>
                        <td><?= h($listing->date_added) ?></td>
                        <td>
                            <?= $this->Html->link('View', ['controller' => 'Listings', 'action' => 'view', $listing->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No listings added yet.</p>
    <?php endif; ?>

    <h4>Law Articles</h4>
    <?php if (!empty($user->lawArticles)): ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Article Title</th>
                    <th>Published On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($user->lawArticles as $index => $lawArticle): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= h($lawArticle->article_title) ?></td>
                        <td><?= h($lawArticle->added_on) ?></td>
                        <td>
                            <?= $this->Html->link('View', ['controller' => 'LawArticles', 'action' => 'view', $article->id], ['class' => 'btn btn-sm btn-primary']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No law articles added yet.</p>
    <?php endif; ?>

    </div>

        <!-- Paginator -->
    </div>
</div>

</div>

<?= $this->Html->script(['main.js']) ?>

</body>
</html>
