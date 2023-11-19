<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hoteles registrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Encargado</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hotel as $hoteles) : ?>
                            <tr>
                                <td><?php echo $hoteles->_id ?></td>
                                <td><?php echo $hoteles->nombre ?></td>
                                <td><?php echo $hoteles->encargado ?></td>
                                <td><?php echo $hoteles->telefono ?></td>
                                <td><?php echo $hoteles->correo ?></td>
                                <td>
                                    <a class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#editar<?php echo $hoteles->_id; ?>">Editar</a>

                                    <a class="btn btn-danger btn-sm float-right" href="<?php echo base_url().'eliminar-hotel/'.$hoteles->_id ?>">Eliminar</a>
                            </tr>

                            <div class="modal fade" id="editar<?php echo $hoteles->_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modificar datos del los Hotel</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url() . 'editar-hotel/' . $hoteles->_id ?>" method="post">

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nombre</label>
                                                    <input type="text" class="form-control" name="nombre" value="<?php echo @$hoteles->nombre ?>" id="recipient-name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Encargado</label>
                                                    <input type="text" class="form-control" name="encargado" value="<?php echo @$hoteles->encargado ?>" id="recipient-name">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Telefono</label>
                                                    <input type="text" class="form-control" name="telefono" value="<?php echo @$hoteles->telefono ?>" id="recipient-name">
                                                </div>

                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <input type="submit" class="btn btn-primary" name="modificar" value="Modificar"></input>
                                                </div>

                                            </form>

                                        </div>

                                    </div>
                                </div>
                            <?php endforeach;  ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->