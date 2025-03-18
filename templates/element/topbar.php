
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center d-none d-lg-block">
    <?= $this->Html->image('Logo3.png', [
        'style' => 'width: auto; height: auto;' // Adjust the width and height as needed
    ]) ?>
</a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
     
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown">

         
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

        <?php if (isset($loggedInUser)): ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= h($loggedInUser->email) ?></span>
          </a><!-- End Profile Iamge Icon -->
          <?php else: ?>
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>" class="navbar-item">Login</a>
            <?php endif; ?>
          
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           

           <li>
    <?= $this->Html->link(
        '<i class="mx-1 bi bi-person"></i><span>My Profile</span>', 
        ['controller' => 'Admin', 'action' => 'view', $loggedInUser->id ], 

        ['escape' => false, 'class' => 'nav-link text-dark d-flex align-items-center']
    ) ?>
</li>


<li>
    <hr class="dropdown-divider">
</li>

<li>
    <?= $this->Html->link(
        '<i class="mx-1 bi bi-box-arrow-right"></i><span> Logout</span>', 
        ['controller' => 'Admin', 'action' => 'logout'], 
        ['escape' => false, 'class' => 'nav-link text-dark d-flex align-items-center']
    ) ?>
</li>


          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

    



</body>

</html>