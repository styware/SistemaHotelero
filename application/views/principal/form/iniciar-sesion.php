<div class="booking-form">
    <?php if(!empty($msg)):  ?>
        <div class="alert alert-warning"> <?php echo $msg; ?> </div>
    <?php endif; ?>
    <h3>INICIAR SESION</h3>
    <form action="<?php base_url().'iniciar-sesion' ?>" method="post">
        <div class="check-date">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo">
        </div>
        <div class="check-date">
            <label for="clave">Contrseña:</label>
            <input type="password" name="clave" id="clave">
        </div>
		<a href="#" class="">Recuperar Contraseña</a>
        <button type="submit" name="iniciar">INGRESAR</button>
    </form>
</div>
