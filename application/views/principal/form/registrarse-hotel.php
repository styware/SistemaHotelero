<div class="booking-form">
    <?php if (isset($msg)) : ?>
        <div class="alert alert-warning"><?php echo $msg ?></div>
    <?php endif; ?>
    <h3>REGISTRAR HOTEL</h3>
    <form action="<?php echo base_url() . 'registrar-hotel' ?>" method="post">
        <div class="check-date">
            <label for="name">Nombre del hotel:</label>
            <input type="text" name="nombre" id="name">
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <div class="check-date">
                    <label for="name">Encargado:</label>
                    <input type="text" name="encargado" id="name">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="check-date">
                    <label for="ruta">Identificacion:</label>
                    <input type="text" name="cc" id="ruta">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <div class="check-date">
                    <label for="correo">Correo:</label>
                    <input type="email" name="correo" id="correo">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="check-date">
                    <label for="celular">Numero de telefono:</label>
                    <input type="number" name="telefono" id="celular">
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-6 mb-3">
                <div class="check-date">
                    <label for="clave">Contrseña:</label>
                    <input type="password" name="clave" id="clave">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="check-date">
                    <label for="clave-2">Confirmar contrseña:</label>
                    <input type="password" name="c_clave" id="clave-2">
                </div>
            </div>
        </div>
        <button type="submit" name="registrar">REGISTRAR</button>
    </form>
</div>