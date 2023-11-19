<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <form action="<?php echo base_url().'registrar-hotel-admin' ?>" method="post">
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">Nombre del hotel</label>
        <input type="text" name="nombre" class="form-control" id="validationServer01" required>
        <div class="valid-feedback"></div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServer02">Nombre del encargado</label>
        <input type="text" name="encargado" class="form-control  " id="validationServer02" required>
        <div class="valid-feedback"></div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">Correo</label>
        <input type="email" name="correo" class="form-control  " id="validationServer01" required>
        <div class="valid-feedback"></div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServer02">Identificacion</label>
        <input type="text" name="cc" class="form-control  " id="validationServer02" required>
        <div class="valid-feedback"></div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">Numero de Telefono</label>
        <input type="number" name="telefono" class="form-control  " id="validationServer01" required>
        <div class="valid-feedback"></div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">Contraseña</label>
        <input type="password" name="clave" class="form-control  " id="validationServer01" required>
        <div class="valid-feedback"></div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServer02">Confirmar contrseña</label>
        <input type="password" name="c_clave" class="form-control  " id="validationServer02" required>
        <div class="valid-feedback"></div>
      </div>
    </div>
    <button class="btn btn-primary" name="registrar" type="submit">Registrar Hotel</button>
  </form>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->