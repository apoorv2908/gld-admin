


 <div class = "col-3">
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
<?= $this->Html->link(
    '<i class="bi bi-grid text-dark"></i><span> Dashboard</span>', 
    ['controller' => 'Dashboard', 'action' => 'index'], 
    ['escape' => false, 'class' => 'nav-link text-dark']
) ?>
</li>

<li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse">
    <i class="bi bi-menu-button-wide text-dark"></i>
    <span class = "text-dark">Master Data</span>
    <i class="bi bi-chevron-down ms-auto"></i>
</a>
<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle text-dark"></i><span>Categories</span>',
            ['controller' => 'Category', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link text-dark']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle text-dark"></i><span>Practice Areas</span>',
            ['controller' => 'Practicearea', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link text-dark']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle text-dark"></i><span>Countries</span>',
            ['controller' => 'Countries', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link text-dark']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle text-dark"></i><span>States</span>',
            ['controller' => 'States', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link text-dark']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle text-dark"></i><span>Cities</span>',
            ['controller' => 'Cities', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link text-dark']
        ) ?>
    </li>
</ul>
</li>


<li class="nav-item">
<?= $this->Html->link(
    '<i class="bi bi-substack text-dark"></i><span> Law Articles</span>', 
    ['controller' => 'LawArticles', 'action' => 'index'], 
    ['escape' => false, 'class' => 'nav-link text-dark']
) ?>
</li>



<li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse">
    <i class="bi bi-person-square text-dark"></i>
    <span class = "text-dark">Listings</span>
</a>
<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
     <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle text-dark"></i><span>All Listings</span>',
            ['controller' => 'Listings', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link text-dark']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle text-dark"></i><span>Pending Listings</span>',
            ['controller' => 'Listings', 'action' => 'pendingListings'],
            ['escape' => false, 'class' => 'nav-link text-dark']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle text-dark"></i><span>Suspended Listings</span>',
            ['controller' => 'Listings', 'action' => 'suspendedListings'],
            ['escape' => false, 'class' => 'nav-link text-dark']
        ) ?>
    </li>
    
</ul>
</li>


<li class="nav-item">
<?= $this->Html->link(
    '<i class="bi bi-people-fill text-dark"></i><span>Users</span>', 
    ['controller' => 'Users', 'action' => 'index'], 
    ['escape' => false, 'class' => 'nav-link text-dark']
) ?>
</li>


<li class="nav-item">
<?= $this->Html->link(
    '<i class="bi bi-cash-stack text-dark"></i><span>Transactions</span>', 
    ['controller' => 'Transaction', 'action' => 'index'], 
    ['escape' => false, 'class' => 'nav-link text-dark']
) ?>
</li>

 
</aside>
</div>

