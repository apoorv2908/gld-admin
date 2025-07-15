
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Law Articles</title>
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
<div class= "col-md-2">
    <?= $this->element('sidebar') ?>
    </div>

    <div class="section col-md-10 mt-2">
    <div class="mx-4">
      <div class = "d-flex justify-content-between">
      <h4><?= __('Pending Articles') ?></h4>
</div>
   
        <hr>

        <!-- Search Box -->
        <div class=" d-flex justify-content-end mb-2">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'index']]) ?>
            <?= $this->Form->control('search', [
                'label' => false,
                'value' => $search,
                'placeholder' => 'Search Law Articles...',
                'class' => 'form-control'
            ]) ?>
            <?= $this->Form->end() ?>
        </div>

        <div class="table-responsive">
  <table class="table table-bordered table-sm border-dark">
    <thead class="table-light border-dark ">
        <tr>
            <th><?= $this->Paginator->sort('article id') ?></th>
            <th><?= $this->Paginator->sort('article_title') ?></th>
            <th><?= $this->Paginator->sort('added_on') ?></th>
            <th><?= $this->Paginator->sort('added_by') ?></th>
            <th>Current Status</th>
            <th>Status Action</th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lawArticles as $lawArticle): ?>
        <tr>
            <td><?= $this->Number->format($lawArticle->id) ?></td>
<td>
    <?= $this->Html->link(h($lawArticle->article_title), ['action' => 'view', $lawArticle->id], ['class' => 'article-link']) ?>
</td>            <td><?= h($lawArticle->added_on) ?></td>
            <td><?= h($lawArticle->added_by) ?></td>

            <!-- Current Status Column -->
            <td>
                <?php 
                    $statusLabels = ['Pending', 'Approved', 'Suspended'];
                    echo h($statusLabels[$lawArticle->status]); 
                ?>
            </td>

            <!-- Status Dropdown -->
            <td>
                <select class="status-dropdown" data-id="<?= $lawArticle->id ?>">
                    <option value="0" <?= $lawArticle->status == 0 ? 'selected' : '' ?>>Pending</option>
                    <option value="1" <?= $lawArticle->status == 1 ? 'selected' : '' ?>>Approved</option>
                    <option value="2" <?= $lawArticle->status == 2 ? 'selected' : '' ?>>Suspended</option>
                </select>
            </td>

<td class="actions">
    
    <?= $this->Form->postLink('Delete', ['action' => 'delete', $lawArticle->id], [
        'class' => 'text-white btn btn-danger btn-sm',
        'confirm' => __('Are you sure you want to delete "{0}"?', h($lawArticle->article_title))
    ]) ?>
</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        </div>

        <!-- Paginator -->
        <div class="paginator">
            <ul class="pagination justify-content-center">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p class="text-center"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
    </div>
</div>

</div>

<?= $this->Html->script(['main.js']) ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".status-dropdown").forEach(dropdown => {
        dropdown.addEventListener("change", function() {
            let articleId = this.getAttribute("data-id");  // Get article ID
            let newStatus = this.value;  // Get new status

            fetch(`<?= $this->Url->build(['controller' => 'LawArticles', 'action' => 'toggleStatus']) ?>/${articleId}/${newStatus}`, {
                method: "POST",
                headers: { "X-Requested-With": "XMLHttpRequest" }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Status updated successfully!");
                    location.reload();
                } else {
                    alert("Failed to update status.");
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
</script>


</body>
</html>
