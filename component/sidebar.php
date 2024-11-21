<?php
$current_page = basename($_SERVER['REQUEST_URI']); // Mendapatkan nama halaman saat ini

function isActive($page) {
    global $current_page;
    return $current_page === $page ? 'active' : '';
}
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- Logo SVG -->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Dashboard</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        
        <li class="menu-item <?php echo isActive('dashboard.php'); ?>">
            <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item <?php echo isActive('admin-users.php'); ?>">
            <a href="admin-users.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics"> Manage User</div>
            </a>
        </li>

         <li class="menu-item <?php echo isActive('admin-kepengurusan.php'); ?>">
            <a href="admin-kepengurusan.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics"> Manage Kepengurusan</div>
            </a>
        </li>

        <li class="menu-item <?php echo isActive('admin-khas.php'); ?>">
            <a href="admin-khas.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Analytics"> Manage Khas</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Lainnya</span>
        </li>

        <li class="menu-item <?php echo isActive('logout.html'); ?>">
            <a href="logout.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Documentation">Keluar</div>
            </a>
        </li>
    </ul>
</aside>
