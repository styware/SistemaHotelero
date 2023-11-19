<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- DataTales Example -->
  <form action="<?php echo base_url() . 'registrar-habitacion' ?>" enctype="multipart/form-data" method="post">

  <div class="form-row">
      <div class="col-md-8 mb-3">
        <label for="validationServer01">Ciudad</label>
        <input type="text" class="form-control" name="ciudad" id="validationServer01">
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">Numero de Camas</label>
        <input type="number" class="form-control" name="n_camas" id="validationServer01">
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServer02">Numero maximo de personas</label>
        <input type="number" class="form-control" name="n_personas" id="validationServer02">
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="validationServer01">Precio</label>
        <input type="number" name="precio" class="form-control" id="validationServer01">
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="validationServer02">Numero de la habitacion</label>
        <input type="number" name="n_habitacion" class="form-control" id="validationServer02" value="Otto">
        <div class="valid-feedback">
          Looks good!
        </div>
      </div>
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" name="comida" id="comida">
      <label class="form-check-label" for="comida">Incluye comida?</label>
    </div>
    <br>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" name="aire" id="aire">
      <label class="form-check-label" for="aire">Incluye aire acondicionado?</label>
    </div>
    <br>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" name="wifi" id="wifi">
      <label class="form-check-label" for="wifi">Incluye Wifi?</label>
    </div>
    <br>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" name="tv" id="tv">
      <label class="form-check-label" for="tv">Incluye TV?</label>
    </div>
    <br>
    <div class="form-row">
      <div class="col-md-8 mb-3">
        <input type="file" name="imagen" accept="image/png/jpg" class="custom-file-input" id="validatedCustomFile">
        <label class="custom-file-label" for="validatedCustomFile">Seleccionar imagen</label>
      </div>
    </div>
    <button class="btn btn-primary" name="registrar" type="submit">Registrar habitacion</button>
  </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->