<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header Section Begin -->
<header class="header-section">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">

                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>

    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <?php if (isset($_SESSION['usuario'])) : ?>
                            <span class="float-left text-success"><a class="text text-dark" style="font-size: large">Bienvenido</a> <?php echo @$_SESSION['usuario']; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <?php if (!isset($_SESSION['usuario'])) : ?>
                                    <li><a href="<?php echo base_url(); ?>">INICIO</a></li>
                                    <li><a href="<?php echo base_url() . 'iniciar-sesion'; ?>">INICIAR SESION</a></li>
                                    <li><a href="<?php echo base_url() . 'registrar-usuario' ?>">REGISTRAR USUARIO</a></li>
                                    <li><a href="<?php echo base_url() . 'registrar-hotel'; ?>">REGISTRAR HOTEL</a></li>
                                <?php endif; ?>

                                <?php if (isset($_SESSION['usuario'])) : ?>
                                    <li><a href="<?php echo base_url().'mis-Reservas' ?>">Mi Reservas</a></li>
                                    <li><a href="<?php echo base_url() . 'cerrar-sesion' ?>">Cerrar sesion</a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->