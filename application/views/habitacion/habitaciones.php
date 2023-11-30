<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Sona Template">
	<meta name="keywords" content="Sona, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Habitaciones</title>

	<!-- Css Styles -->
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/bootstrap.min.css'; ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/font-awesome.min.css'; ?> " type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/elegant-icons.css'; ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/flaticon.css'; ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/owl.carousel.min.css'; ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/nice-select.css'; ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/jquery-ui.min.css'; ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/magnific-popup.css'; ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/slicknav.min.css'; ?>" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/style.css'; ?>" type="text/css">
</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Breadcrumb Section Begin -->
	<div class="breadcrumb-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-text">
						<h2>HABITACIONES DISPONIBLES</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Section End -->

	<!-- Rooms Section Begin -->

	<section class="rooms-section spad">
		<div class="container">
			<div class="row">
				<?php foreach ($habitacion as $habitaciones) : ?>
					<div class="col-lg-4 col-md-6">
						<div class="room-item">
							<img width="360" height="250" src="<?php echo base_url() . 'asset/habitaciones_registradas/' . $habitaciones->imagen ?> ">
							<div class="ri-text">
								<h4><?php echo $habitaciones->ciudad ?></h4>
								<h3><?php echo $habitaciones->precio ?>$<span>/Por dia</span></h3>
								<table>
									<tbody>

										<tr>
											<td class="r-o">max personas:</td>
											<td> <?php echo $habitaciones->n_personas ?></td>
										</tr>
										<tr>
											<td class="r-o">Nº de camas:</td>
											<td><?php echo $habitaciones->n_camas ?></td>
										</tr>
										<tr>
											<td class="r-o">Services:</td>
											<td><?php echo $habitaciones->comida ? "Comida," : "" ?>
												<?php echo $habitaciones->aire ? "Aire," : "" ?>
												<?php echo $habitaciones->wifi  ? "Wifi," : "" ?>
												<?php echo $habitaciones->television ? "TV," : "" ?></td>

											<?php if (
												$habitaciones->comida == false && $habitaciones->aire == false && $habitaciones->wifi == false
												&& $habitaciones->television == false
											) : ?>
												<td>No</td>
											<?php endif; ?>
										</tr>
										<tr>
											<td class="r-o">Hotel :</td>
											<td> <?php echo @$habitaciones->hotel ?></td>
										</tr>
									</tbody>
								</table>
								<div class="">
									<a href="" class="primary-btn " data-toggle="modal" data-target="#exampleModalCenter<?php echo $habitaciones->_id ?>">RESERVAR</a>
									<a href="<?php echo base_url() . 'detalles/' . $habitaciones->_id ?>" style="margin: 50px" class="primary-btn">Detalles</a>
								</div>

								<?php if (isset($_SESSION['usuario'])) : ?>
									<div class="modal fade" id="exampleModalCenter<?php echo $habitaciones->_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Quiere realizar esta reservar?</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="<?php echo base_url() . 'reservar/' . $habitaciones->_id ?>" method="post">

														<table>
															<tbody>

																<tr>
																	<td class="r-o">Fecha de entrada:</td>
																	<td> <?php echo $_SESSION['entrada'] ?></td>
																</tr>
																<tr>
																	<td class="r-o">Fecha de salida:</td>
																	<td><?php echo $_SESSION['salida'] ?></td>
																</tr>
																<tr>
																	<td class="r-o">Dias de estadia:</td>
																	<td><?php echo $_SESSION['dias'] ?></td>
																</tr>
																<tr>
																	<td class="r-o">Nº de habitacion:</td>
																	<td><?php echo $habitaciones->n_habitacion ?></td>
																</tr>
																<tr>
																	<td class="r-o">Total a pagar:</td>
																	<td><?php echo $habitaciones->precio * $_SESSION['dias'] ?></td>
																</tr>
															</tbody>
														</table>

													</form>
												</div>
												<div class="modal-footer">
													<a type="button" class="text-white btn btn-secondary" data-dismiss="modal">Cancelar</a>
													<a type="button" class="text-white btn btn-success" href="<?php echo base_url() . 'reservar/' . $habitaciones->_id .
																													'/' . $habitaciones->precio . '/' . $habitaciones->n_habitacion ?>">Confirmar</a>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<!-- Modal -->
								<?php if (!isset($_SESSION['usuario'])) : ?>
									<div class="modal fade" id="exampleModalCenter<?php echo $habitaciones->_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Para reservar debes iniciar sesion</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>

												<div class="modal-footer">
													<a type="button" class="text-white btn btn-info" href="<?php echo base_url() . 'registrar-usuario' ?>">Crear una cuenta</a>
													<a type="button" class="text-white btn btn-primary" href="<?php echo base_url() . 'iniciar-sesion' ?>">Iniciar sesion</a>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<div class="col-lg-12">
					<div class="room-pagination">
						<a href="#">1</a>
						<a href="#">2</a>
						<a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Rooms Section End -->

	<!-- Button trigger modal -->



	<!-- Search model Begin -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch"><i class="icon_close"></i></div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

	<!-- Js Plugins -->
	<script src="<?php echo base_url() . '/asset/js/jquery-3.3.1.min.js'; ?>"></script>
	<script src="<?php echo base_url() . '/asset/js/bootstrap.min.js'; ?>"></script>
	<script src="<?php echo base_url() . '/asset/js/jquery.magnific-popup.min.js'; ?>"></script>
	<script src="<?php echo base_url() . '/asset/js/jquery.nice-select.min.js'; ?>"></script>
	<script src="<?php echo base_url() . '/asset/js/jquery-ui.min.js'; ?>"></script>
	<script src="<?php echo base_url() . '/asset/js/jquery.slicknav.js'; ?>"></script>
	<script src="<?php echo base_url() . '/asset/js/owl.carousel.min.js'; ?>"></script>
	<script src="<?php echo base_url() . '/asset/js/main.j'; ?>s"></script>
</body>

</html>
