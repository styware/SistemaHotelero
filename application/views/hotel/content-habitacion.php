<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Habitaciones</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ciudad</th>
                            <th>Nº de habitacion</th>
                            <th>Precio</th>
                            <th>Nº de camas</th>
                            <th>Nº de personas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($habitacion as $habitaciones) : ?>
                            <tr>
                                <td><?php echo $habitaciones->ciudad ?></td>
                                <td><?php echo $habitaciones->n_habitacion ?></td>
                                <td><?php echo $habitaciones->precio ?></td>
                                <td><?php echo $habitaciones->n_camas ?></td>
                                <td><?php echo $habitaciones->n_personas ?></td>
                                <td>
                                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editar<?php echo $habitaciones->_id; ?>">Editar</a>
                                    <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'eliminar-habitacion/' . $habitaciones->_id ?>">Eliminar</a>
                                </td>
                                <div class="modal fade" id="editar<?php echo $habitaciones->_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modificar datos del los Hotel</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url() . 'editar-habitacion/' . $habitaciones->_id ?>" method="post">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Ciudad</label>
                                                        <input type="text" class="form-control" name="ciudad" value="<?php echo @$habitaciones->ciudad ?>" id="recipient-name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Numero de camas</label>
                                                        <input type="text" class="form-control" name="n_camas" value="<?php echo @$habitaciones->n_camas ?>" id="recipient-name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Numero maximo de personas</label>
                                                        <input type="text" class="form-control" name="n_personas" value="<?php echo @$habitaciones->n_personas ?>" id="recipient-name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Precio</label>
                                                        <input type="text" class="form-control" name="precio" value="<?php echo @$habitaciones->precio ?>" id="recipient-name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Numero de la habitacion</label>
                                                        <input type="text" class="form-control" name="n_habitacion" value="<?php echo @$habitaciones->n_habitacion ?>" id="recipient-name">
                                                    </div>

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <input type="submit" class="btn btn-primary" name="modificar" value="Modificar"></input>
                                                    </div>

                                                </form>

                                            </div>

                                        </div>
                                    </div>
                            </tr>
                        <?php endforeach;  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->