<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Administrador</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() . 'panel-admin' ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Principal</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'ver-hoteles' ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Gestionar hoteles</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'ver-usuarios' ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Gestionar usuarios</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() . 'registrar-hotel-admin' ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Registrar hoteles</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->