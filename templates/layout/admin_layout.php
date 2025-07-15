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
        :root {
            --topbar-height: 60px;
            --sidebar-width: 250px;
            --sidebar-collapsed-width: 70px;
            --primary-color: #3498db;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #f5f5f5;
        }
        
        /* Topbar Styles */
        .topbar {
            height: var(--topbar-height);
            background-color: white;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 100;
            position: relative;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        /* Main Container */
        .main-container {
            display: flex;
            flex: 1;
            overflow: hidden;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--dark-color);
            color: white;
            transition: width 0.3s ease;
            overflow-y: auto;
            height: calc(100vh - var(--topbar-height));
        }
        
        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }
        
        .sidebar-nav {
            list-style: none;
            padding: 20px 0;
        }
        
        .sidebar-nav .nav-item {
            position: relative;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            transition: background-color 0.2s;
            white-space: nowrap;
            overflow: hidden;
        }
        
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link.active {
            background-color: var(--primary-color);
        }
        
        .nav-link i {
            margin-right: 15px;
            font-size: 1.2rem;
            min-width: 24px;
        }
        
        .sidebar.collapsed .nav-link span {
            display: none;
        }
        
        .sidebar.collapsed .nav-link i {
            margin-right: 0;
            font-size: 1.5rem;
        }
        
        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 15px 0;
        }
        
        /* Submenu styles */
        .nav-content {
            list-style: none;
            padding-left: 0;
            background-color: rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-height: 0;
            transition: max-height 0.3s ease;
        }
        
        .nav-content.show {
            max-height: 500px; /* Adjust based on your content */
        }
        
        .nav-content .nav-link {
            padding-left: 50px;
            font-size: 0.9rem;
        }
        
        .sidebar.collapsed .nav-content {
            display: none;
        }
        
        .bi-chevron-down {
            transition: transform 0.3s;
            margin-left: auto;
        }
        
        .nav-link.collapsed .bi-chevron-down {
            transform: rotate(-90deg);
        }
        
        /* Footer */
        .sidebar-footer {
            padding: 20px;
            text-align: center;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 20px;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #f5f5f5;
        }
        
        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .content-title {
            font-size: 1.5rem;
            color: var(--dark-color);
        }
        
        .toggle-sidebar {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: var(--dark-color);
        }
        
        .content-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
        }
        
        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 90;
                height: calc(100vh - var(--topbar-height));
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .sidebar.collapsed {
                width: var(--sidebar-width);
                transform: translateX(-100%);
            }
            
            .sidebar.collapsed.open {
                transform: translateX(0);
            }
            
            .overlay {
                position: fixed;
                top: var(--topbar-height);
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 80;
                display: none;
            }
            
            .overlay.open {
                display: block;
            }
        }
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
            
            // Handle sidebar menu item clicks
            const menuLinks = document.querySelectorAll('.sidebar-nav a.nav-link:not(.collapsed)');
            menuLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (this.getAttribute('href') === '#') return;
                    
                    e.preventDefault();
                    
                    // Update active state
                    document.querySelectorAll('.sidebar-nav .nav-link').forEach(el => {
                        el.classList.remove('active');
                    });
                    this.classList.add('active');
                    
                    // Update the parent if this is a submenu item
                    if (this.closest('.nav-content')) {
                        const parentLink = this.closest('.nav-item').previousElementSibling;
                        if (parentLink) parentLink.classList.add('active');
                    }
                    
                    // Update content title
                    const title = this.querySelector('span') ? this.querySelector('span').textContent : 'Dashboard';
                    document.getElementById('content-title').textContent = title;
                    
                    // Simulate content loading (replace with actual AJAX call in your implementation)
                    document.getElementById('main-content-area').innerHTML = `
                        <h2>${title}</h2>
                        <p>This is the ${title} page content.</p>
                        <p>In a real application, this would load the actual content via AJAX or server-side rendering.</p>
                    `;
                    
                    // On mobile, close sidebar after selection
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('open');
                        overlay.classList.remove('open');
                    }
                });
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