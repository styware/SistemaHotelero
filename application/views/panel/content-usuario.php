<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios registrados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cedula</th>
                            <th>Fecha Nacimiento</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (@$usuario) : ?>
                            <?php foreach ($usuario as $usuarios) : ?>
                                <tr>
                                    <td><?php echo $usuarios->_id ?> </td>
                                    <td><?php echo $usuarios->nombre ?></td>
                                    <th><?php echo $usuarios->cedula ?></th>
                                    <th><?php echo $usuarios->nacimiento ?></th>
                                    <th><?php echo $usuarios->correo ?></th>
                                    <th>
                                        <a class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#editar<?php echo $usuarios->_id; ?>">Editar</a>

                                        <a class="btn btn-danger btn-sm float-right" href="<?php echo base_url().'eliminar-usuario/'.$usuarios->_id ?>">Eliminar</a>
                                    </th>
                                </tr>

                                <div class="modal fade" id="editar<?php echo $usuarios->_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modificar datos del usuario</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url() . 'editar-usuario/' . $usuarios->_id ?>" method="post">

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre" value="<?php echo @$usuarios->nombre ?>" id="recipient-name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Apellido</label>
                                                        <input type="text" class="form-control" name="apellido" value="<?php echo @$usuarios->apellido ?>" id="recipient-name">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Fecha de nacimiento</label>
                                                        <input class="form-control" min="" max="" value="<?php echo @$usuarios->nacimiento ?>" type="date" name="f_nacimiento" id="message-text"></input>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Telefono</label>
                                                        <input type="text" class="form-control" name="telefono" value="<?php echo @$usuarios->telefono ?>" id="recipient-name">
                                                    </div>

                                                    <div class="modal-footer">

                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <input type="submit" class="btn btn-primary" name="modificar" value="Modificar"></input>
                                                    </div>

                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;  ?>
                        <?php endif; ?>
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