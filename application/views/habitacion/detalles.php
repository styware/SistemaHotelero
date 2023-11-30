<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo base_url() . '/asset/css/detalles_style.css' ?>" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
	<title>Document</title>
</head>

<body class="body">
	<?php foreach ($hb as $detalle) : ?>
		<header class="header">
			<h1>Hotel <?php echo $detalle->hotel ?></h1>
		</header>

		<section class="sectionDatos">
			<div class="divImg">

				<img class="imgIni" src="<?php echo base_url() . 'asset/habitaciones_registradas/' . $detalle->imagen ?>" alt="imagenH" />
				<div class="Hotel">
					<h1 class="tituloHotel">Habitación numero <?php echo $detalle->n_habitacion ?></h1>
					<br>
					<div class="hotelDatos">
						<div class="datosHotel">
							<p class="parrafoDatosH">
								Precio: <span class="precio">$ <?php echo $detalle->precio ?>/dia</span>
							</p>
							<p class="parrafoDatosH">Categoría: <?php echo @$detalle->categoria ?></p>
							<p class="parrafoDatosH">max personas: <?php echo $detalle->n_personas ?></p>
							<p class="parrafoDatosH">N de camas: <?php echo $detalle->n_camas ?></p>
							<p class="parrafoDatosH">Servicios: <?php echo $detalle->comida ? "Comida," : "" ?>
								<?php echo $detalle->aire ? "Aire," : "" ?>
								<?php echo $detalle->wifi  ? "Wifi," : "" ?>
								<?php echo $detalle->television ? "TV," : "" ?></p>
						</div>
						<div class="separar">
							<div>
								<img src="<?php echo base_url() . '/asset/img/habitacion_detalles/visa.svg' ?>" alt="visa">
								<img src="<?php echo base_url() . '/asset/img/habitacion_detalles/mastercard.svg' ?>" alt="mastercard">
								<img src="<?php echo base_url() . '/asset/img/habitacion_detalles/efecty.svg' ?>" alt="efecty">
								<img src="<?php echo base_url() . '/asset/img/habitacion_detalles/pse.svg' ?>" alt="pse">
							</div>
							<!-- <button class="botonSeparar" data-toggle="modal" data-target="#exampleModalCenter" <?php echo $detalle->_id ?>>SEPARAR</button> -->
						</div>
					</div>

				</div>

				<div class="destacado">
					<h1>Destacado</h1>
					<div class="itemDestacados">
						<div class="itemsD">
							<img class="iconosD" src="<?php echo base_url() . '/asset/img/habitacion_detalles/spray.svg' ?>" alt="spary" />
							<span>Limpieza</span>
						</div>
						<div class="itemsD">
							<img class="iconosD" src="<?php echo base_url() . '/asset/img/habitacion_detalles/medal.svg' ?>" alt="medal" />
							<span>Calidad precio</span>
						</div>
						<div class="itemsD">
							<img class="iconosD" src="<?php echo base_url() . '/asset/img/habitacion_detalles/door.svg' ?>" alt="door" />
							<span>Servicio de recepción 24h</span>
						</div>
						<div class="itemsD">
							<img class="iconosD" src="<?php echo base_url() . '/asset/img/habitacion_detalles/wifi_icon.svg' ?>" alt="wifi" />
							<span>Wifi gratis</span>
						</div>
					</div>
				</div>
			</div>
			<div class="divCalificaciones">
				<div class="comentar">
					<div class="divEstrellas">
						<svg class="start" id="start1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
						</svg>
						<svg class="start" id="start2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
						</svg>
						<svg class="start" id="start3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
						</svg>
						<svg class="start" id="start4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
						</svg>
						<svg class="start" id="start5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
							<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
						</svg>
					</div>

					<form action="" class="formulario">
						<textarea class="textareaComentario" name="comentarios" id="" cols="30" rows="5" placeholder="Pon un comentario"></textarea>
						<input class="inputComentar" type="submit" value="COMENTAR" />
					</form>
				</div>
				<div class="comentarios">
					<div class="cartaUsuario">
						<img class="imgUsuario" src="<?php echo base_url() . '/asset/img/habitacion_detalles/Usuario.png' ?>" alt="usuario" />
						<div class="comentarioUsuario">
							<div class="nombreCalifica">
								<h4>Jorge Luis</h4>
								<div>
									<svg class="startU" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
									</svg>
									<svg class="startU" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
									</svg>
									<svg class="startU" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
									</svg>
									<svg class="startU" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
									</svg>
									<svg class="startU" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
										<path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" />
									</svg>
								</div>
							</div>
							<p>
								Me parece un buen servicio atienden bien y son muy responsables
								con las reservas.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endforeach; ?>
</body>

</html>
