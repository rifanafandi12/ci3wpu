<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">RIFAN Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider ">

    <!-- QUERY MENU -->
    <?php

    $role_id = $this->session->userdata('role_id');
    $QueryMenu = "
                SELECT user_menu.id, menu
                FROM user_menu 
                JOIN user_access_menu ON user_menu.id = user_access_menu.menu_id
                WHERE user_access_menu.role_id = $role_id
                ORDER BY user_access_menu.menu_id ASC
    ";
    $menu = $this->db->query($QueryMenu)->result_array();
    ?>
    <!-- Looping Menu -->
    <?php foreach ($menu as $m) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB MENU SESUAI SUB MENU -->
        <?php
        $MenuID = $m['id'];
        $QuerySubMenu = "
                            SELECT *
                            FROM user_sub_menu 
                            JOIN user_menu ON user_sub_menu.menu_id = user_menu.id
                            WHERE user_sub_menu.menu_id = $MenuID
                            AND user_sub_menu.is_active = 1
            ";

        $SubMenu = $this->db->query($QuerySubMenu)->result_array();

        ?>

        <?php foreach ($SubMenu as $sm) : ?>
            <!-- Nav Item - Dashboard -->
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon'] ?>"></i>
                    <span><?= $sm['title'] ?></span></a>
                </li>
            <?php endforeach; ?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block mt-3">
        <?php endforeach; ?>




        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>