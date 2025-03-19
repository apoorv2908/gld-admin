


 <div class = "col-3">
  <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
<?= $this->Html->link(
    '<i class="bi bi-grid "></i><span> Dashboard</span>', 
    ['controller' => 'Dashboard', 'action' => 'index'], 
    ['escape' => false, 'class' => 'nav-link text-']
) ?>
</li>

<li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse">
    <i class="bi bi-menu-button-wide "></i>
    <span class = "">Master Data</span>
    <i class="bi bi-chevron-down ms-auto"></i>
</a>
<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle "></i><span>Categories</span>',
            ['controller' => 'Category', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link ']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle "></i><span>Practice Areas</span>',
            ['controller' => 'Practicearea', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link ']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle "></i><span>Countries</span>',
            ['controller' => 'Countries', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link ']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle "></i><span>States</span>',
            ['controller' => 'States', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link ']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle "></i><span>Cities</span>',
            ['controller' => 'Cities', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link ']
        ) ?>
    </li>
</ul>
</li>


<li class="nav-item">
<?= $this->Html->link(
    '<i class="bi bi-substack "></i><span> Law Articles</span>', 
    ['controller' => 'LawArticles', 'action' => 'index'], 
    ['escape' => false, 'class' => 'nav-link ']
) ?>
</li>



<li class="nav-item">
<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse">
    <i class="bi bi-person-square "></i>
    <span class = "">Listings</span>
</a>
<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
     <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle "></i><span>All Listings</span>',
            ['controller' => 'Listings', 'action' => 'index'],
            ['escape' => false, 'class' => 'nav-link ']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle "></i><span>Pending Listings</span>',
            ['controller' => 'Listings', 'action' => 'pendingListings'],
            ['escape' => false, 'class' => 'nav-link ']
        ) ?>
    </li>
    <li>
        <?= $this->Html->link(
            '<i class="bi bi-circle "></i><span>Suspended Listings</span>',
            ['controller' => 'Listings', 'action' => 'suspendedListings'],
            ['escape' => false, 'class' => 'nav-link ']
        ) ?>
    </li>
    
</ul>
</li>


<li class="nav-item">
<?= $this->Html->link(
    '<i class="bi bi-people-fill "></i><span>Users</span>', 
    ['controller' => 'Users', 'action' => 'index'], 
    ['escape' => false, 'class' => 'nav-link ']
) ?>
</li>


 
</aside>
</div>

