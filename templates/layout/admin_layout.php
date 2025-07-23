<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?= $this->fetch('title') ?></title>
  
  <!-- Include all your existing head content -->
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Nunito|Poppins" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <?= $this->Html->css(['boxicons.min', 'quill.snow', 'quill.bubble', 'remixicon', 'mega', 'style']) ?>
  
  <?= $this->Html->script(['vendor/apexcharts/apexcharts.min.js']) ?>
  <!-- Include all other JS files as in your original -->
  
  <style>
    /* Include all the CSS styles from the new layout I provided earlier */
    :root {
        --topbar-height: 60px;
        --sidebar-width: 250px;
        /* ... rest of the CSS variables ... */
    }
    /* ... rest of the CSS rules ... */
  </style>
</head>

<body>
    <!-- Topbar -->
    <header class="topbar">
        <div class="logo">LOGO</div>
        <div class="topbar-right">
            <button class="toggle-sidebar mobile-only">
                <i class="fas fa-bars"></i>
            </button>
            <div class="user-profile">
                <div class="user-avatar">JD</div>
                <span class="user-name">John Doe</span>
            </div>
        </div>
    </header>
    
    <!-- Main Container -->
    <div class="main-container">
        <!-- Sidebar -->
        <?= $this->element('sidebar') ?>
        
        <!-- Overlay for mobile -->
        <div class="overlay"></div>
        
        <!-- Main Content -->
        <main class="main-content">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </main>
    </div>

    <?= $this->Html->script(['main.js']) ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleButtons = document.querySelectorAll('.toggle-sidebar');
            const overlay = document.querySelector('.overlay');
            
            // Toggle sidebar
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    sidebar.classList.toggle('collapsed');
                    
                    // For mobile, we show/hide the sidebar completely
                    if (window.innerWidth <= 768) {
                        sidebar.classList.toggle('open');
                        overlay.classList.toggle('open');
                    }
                });
            });
            
            // Close sidebar when clicking overlay (mobile only)
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('open');
                overlay.classList.remove('open');
            });
            
          
            // Handle submenu toggle clicks
            const submenuToggles = document.querySelectorAll('.sidebar-nav a.collapsed');
            submenuToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.id.replace('-toggle', '');
                    const submenu = document.getElementById(targetId);
                    
                    // Toggle the collapsed class
                    this.classList.toggle('collapsed');
                    
                    // Toggle the submenu
                    if (submenu) {
                        submenu.classList.toggle('show');
                    }
                    
                    // Prevent closing on mobile when clicking to expand
                    if (window.innerWidth <= 768) {
                        e.stopPropagation();
                    }
                });
            });
            
            // Set current year in footer
            document.getElementById('currentYear').textContent = new Date().getFullYear();
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    // On desktop, ensure sidebar is visible
                    sidebar.classList.remove('open');
                    overlay.classList.remove('open');
                }
            });
        });
    </script>

    <?= $this->fetch('script') ?>
</body>
</html>