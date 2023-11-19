<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Mis reservas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='<?php echo base_url() . '/asset/css/mi_reserva.css' ?>'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src='<?php echo base_url() . '/asset/js/main.js' ?>'></script>
</head>

<body>
    <div class="container-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-offset-1 col-md-10">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form class="form-horizontal pull-right">
                                    <div class="form-group">
                                        <a href="<?php echo base_url() ?>">
                                            <i class="bi bi-arrow-left float-left text-white"></i>
                                        </a>
                                        <?php if (@$estado == false) : ?>
                                            <h4 class="float-right" style="color:#FFFFFF">No tiene reservas pendientes</h4>
                                        <?php endif; ?>
                                        <?php if (@$estado) : ?>
                                            <h4 class="float-right" style="color:#FFFFFF">Tus reservas</h4>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">

                            <thead>
                                <tr>
                                    <th>Nº de habitacion</th>
                                    <th>Fecha de entrada</th>
                                    <th>Fecha de salida</th>
                                    <th>Dias de estadia</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if (@$reserva) : ?>
                                    <?php foreach (@$reserva as $registro) : ?>
                                        <tr>
                                            <td><?php echo @$registro->n_habitacion; ?></td>
                                            <td><?php echo $registro->entrada->toDateTime()->format('Y-m-d'); ?></td>
                                            <td><?php echo $registro->salida->toDateTime()->format('Y-m-d') ?></td>
                                            <td><?php echo @$registro->dias_estadia; ?></td>
                                            <td><?php echo @$registro->precio_total; ?></td>
                                            <td>
                                            <a href="" class="btn btn-danger btn-sm float-center" data-toggle="modal" data-target="#exampleModalCenter<?php echo $registro->_id ?>">Eliminar</a>

                                                <!-- <a class="btn btn-danger btn-sm float-right" href="#">Eliminar</a>  -->
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModalCenter<?php echo $registro->_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Esta seguro de cancelar esta reserva?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <a type="button" class="text-white btn btn-dark" data-dismiss="modal">Cancelar</a>
                                                        <a type="button" class="text-white btn btn-danger" href="<?php echo base_url() . 'eliminar-reserva/'.$registro->_id ?>">Confirmar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;  ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6"> <b></b>   <b></b> </div>
                            <div class="col-sm-6 col-xs-6">
                                <ul class="pagination hidden-xs pull-right">
                                    <li><a href="#">«</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>