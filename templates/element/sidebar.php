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
<aside class="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link active">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="bi bi-person-vcard-fill"></i>
                        <span>Admin</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" id="location-nav-toggle">
                        <i class="bi bi-globe-americas-fill"></i>
                        <span>Location Master</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="location-nav" class="nav-content">
                        <li class="nav-item">
                            <a href="/countries" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Countries</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/states" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>States</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/cities" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Cities</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Master -->
                <li class="nav-item">
                    <a class="nav-link collapsed" id="master-nav-toggle">
                        <i class="bi bi-tools"></i>
                        <span>Master</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="master-nav" class="nav-content">
                        <li class="nav-item">
                            <a href="/salutat" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Salutat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/category" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/practicearea" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Practice Areas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/article-category" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Article Category</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Article -->
                <li class="nav-item">
                    <a class="nav-link collapsed" id="article-nav-toggle">
                        <i class="bi bi-pencil-fill"></i>
                        <span>Law Article</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="article-nav" class="nav-content">
                        <li class="nav-item">
                            <a href="/law-articles" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>All Articles</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/law-articles/pending" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Article Pending for Approval</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Listings -->
                <li class="nav-item">
                    <a class="nav-link collapsed" id="listing-nav-toggle">
                        <i class="bi bi-hdd-stack-fill"></i>
                        <span>Listings</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="listing-nav" class="nav-content">
                        <li class="nav-item">
                            <a href="/listings" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>All Listings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listings/pending-listings" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Listings Pending for Approval</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listings/suspended-listings" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>All Suspended Listings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/listings/edited-listings" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Edited Listings Pending Approval</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="bi bi-people-fill"></i>
                        <span>All Registrations</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" id="orders-nav-toggle">
                        <i class="bi bi-cart-check-fill"></i>
                        <span>Orders</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="orders-nav" class="nav-content">
                        <li class="nav-item">
                            <a href="/orders" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>All Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/orders/unpaid" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Unpaid Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/orders/paid" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Paid Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/orders/invoice" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>All Invoices</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" id="others-nav-toggle">
                        <i class="bi bi-dash-square"></i>
                        <span>Others</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="others-nav" class="nav-content">
                        <li class="nav-item">
                            <a href="/states/other" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Other State</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/cities/other" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Other City</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/practicearea/other" class="nav-link mx-3">
                                <i class="bi bi-circle"></i>
                                <span>Other Practice Area</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="sidebar-footer">
                <p class="mb-0 text-white">
                    @ GLD <span id="currentYear"></span>
                </p>
            </div>
        </aside>