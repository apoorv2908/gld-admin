<div >
    <aside id="sidebar" class="sidebar hira">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <?= $this->Html->link(
                    '<span> <i class="bi bi-speedometer2"></i> Dashboard</span>',
                    ['controller' => 'Dashboard', 'action' => 'index'],
                    ['escape' => false, 'class' => 'nav-link']
                ) ?>
            </li>

             <li class="nav-item">
                <?= $this->Html->link(
                    '<span><i class="bi bi-person-vcard-fill"></i> Admin</span>',
                    ['controller' => 'Admin', 'action' => 'index'],
                    ['escape' => false, 'class' => 'nav-link']
                ) ?>
            </li>

            <li class="nav-item hira">
                <a class="nav-link collapsed" data-bs-target="#location-nav" data-bs-toggle="collapse">
                    <span> <i class="bi bi-globe-americas-fill"></i>Location Master</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="location-nav" class="nav-content collapse fs-6" data-bs-parent="#sidebar-nav">
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Countries</span>', ['controller' => 'Countries', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>States</span>', ['controller' => 'States', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Cities</span>', ['controller' => 'Cities', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                </ul>
            </li>

            <!-- Master -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#master-nav" data-bs-toggle="collapse">
                    <span><i class="bi bi-tools"></i>Master</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="master-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                                        <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Salutat</span>', ['controller' => 'Salutat', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>

                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Categories</span>', ['controller' => 'Category', 'action' => 'index'], ['escape' => false, 'class' => 'mx-3 nav-link']) ?></li>
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Practice Areas</span>', ['controller' => 'Practicearea', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                                  <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Article Category</span>', ['controller' => 'ArticleCategory', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>

                </ul>
            </li>

            <!-- Article -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#article-nav" data-bs-toggle="collapse">
                    <span><i class="bi bi-pencil-fill"></i>Law Article</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="article-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>All Articles</span>', ['controller' => 'LawArticles', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span> Article Pending for Approval</span>', ['controller' => 'LawArticles', 'action' => 'pendingLawArticle'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                </ul>
            </li>

            <!-- Listings -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#listing-nav" data-bs-toggle="collapse">
                    <span> <i class="bi bi-hdd-stack-fill"></i>Listings</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="listing-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>All Listings</span>', ['controller' => 'Listings', 'action' => 'index'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Listings Pending for Approval</span>', ['controller' => 'Listings', 'action' => 'pendingListings'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>All Suspended Listings</span>', ['controller' => 'Listings', 'action' => 'suspendedListings'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>
                    <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Edited Listings Pending Approval</span>', ['controller' => 'Listings', 'action' => 'editedListings'], ['escape' => false, 'class' => 'nav-link mx-3']) ?></li>

                </ul>
            </li>

            
            <li class="nav-item">
                <?= $this->Html->link(
                    '<span><i class="bi bi-people-fill"></i>All Registrations</span>',
                    ['controller' => 'Users', 'action' => 'index'],
                    ['escape' => false, 'class' => 'nav-link']
                ) ?>
            </li>

           <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse">
        <span><i class="bi bi-cart-check-fill"></i>Orders</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="orders-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>All Orders</span>', ['controller' => 'Orders', 'action' => 'index'], ['escape' => false, 'class' => 'mx-3 nav-link']) ?></li>
        <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Unpaid Orders</span>', ['controller' => 'Orders', 'action' => 'unpaidOrders'], ['escape' => false, 'class' => 'mx-3 nav-link']) ?></li>
        <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Paid Orders</span>', ['controller' => 'Orders', 'action' => 'paidOrders'], ['escape' => false, 'class' => ' mx-3 nav-link']) ?></li>
        <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>All Invoices</span>', ['controller' => 'Orders', 'action' => 'invoice'], ['escape' => false, 'class' => 'mx-3 nav-link']) ?></li>
    </ul>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#others-nav" data-bs-toggle="collapse">
        <span><i class="bi bi-dash-square"></i></i>Others</span>
        <i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="others-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Other State</span>', ['controller' => 'States', 'action' => 'otherStates'], ['escape' => false, 'class' => 'mx-3 nav-link']) ?></li>
        <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Other City</span>', ['controller' => 'Cities', 'action' => 'otherCities'], ['escape' => false, 'class' => ' mx-3 nav-link']) ?></li>
        <li><?= $this->Html->link('<i class="bi bi-circle"></i><span>Other Practice Area</span>', ['controller' => 'Practicearea', 'action' => 'otherPracticeareas'], ['escape' => false, 'class' => 'mx-3 nav-link']) ?></li>
    </ul>
</li>



<p class="mb-0 text-white">
 @ GLD <span id="currentYear"></span> 
</p>                   
            <script>
  document.getElementById("currentYear").textContent = new Date().getFullYear();
</script>

            











        </ul>
    </aside>
</div>

