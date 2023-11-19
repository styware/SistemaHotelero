<div class="booking-form">
    <?php if (isset($msg)) : ?>
        <div class=" alert alert-warning"><?php echo $msg ?></div>
    <?php endif; ?>
    <?php $validar = $this->session->flashdata('error_habitacion'); ?>
    <?php if (isset($validar)) : ?>
        <script>
            alert("La habitacion esta ocupada en esta fecha");
        </script>';

    <?php
        $this->session->unset_userdata('error_habitacion');

    endif; ?>
    <h3>Buscar habitacion</h3>
    <form action="<?php echo base_url() . 'buscar-habitacion'; ?>" method="POST">
        <div class="check-date">
            <label for="search">Lugar de hospedaje:</label>
            <input type="text" name="lugar" id="search">
        </div>
        <div class="check-date">
            <label for="date-in">Fecha de ingreso:</label>
            <input type="date" name="f_entrada" min="<?php echo date("Y-m-d");?>" id="date-in">

        </div>
        <div class="check-date">
            <label for="date-out">Fecha de salida:</label>
            <input type="date" name="f_salida" min="<?php echo date("Y-m-d");?>" id="date-out">

        </div>
        <button type="submit" name="verificar" value="verificar">VERIFICAR</button>
    </form>
</div>