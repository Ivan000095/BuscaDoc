<?php
session_start();
if (isset($_SESSION["Rol"])) {
	require ('modelos/Usuario.php');
	$id=$_REQUEST['id'];
	$usr = Usuario::buscar($id);
	?>
	<html>
		<style>
			body{margin-top:20px;
			color: #9b9ca1;
			}
			.bg-secondary-soft {
				background-color: rgba(208, 212, 217, 0.1) !important;
			}
			.rounded {
				border-radius: 5px !important;
			}
			.py-5 {
				padding-top: 3rem !important;
				padding-bottom: 3rem !important;
			}
			.px-4 {
				padding-right: 1.5rem !important;
				padding-left: 1.5rem !important;
			}
			.file-upload .square {
				height: 250px;
				width: 250px;
				margin: auto;
				vertical-align: middle;
				border: 1px solid #e5dfe4;
				background-color: #fff;
				border-radius: 5px;
			}
			.text-secondary {
				--bs-text-opacity: 1;
				color: rgba(208, 212, 217, 0.5) !important;
			}
			.btn-success-soft {
				color: #28a745;
				background-color: rgba(40, 167, 69, 0.1);
			}
			.btn-danger-soft {
				color: #dc3545;
				background-color: rgba(220, 53, 69, 0.1);
			}
			.form-control {
				display: block;
				width: 100%;
				padding: 0.5rem 1rem;
				font-size: 0.9375rem;
				font-weight: 400;
				line-height: 1.6;
				color: #29292e;
				background-color: #fff;
				background-clip: padding-box;
				border: 1px solid #e5dfe4;
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				border-radius: 5px;
				-webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
				transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
				transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
				transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
			}
		</style>
		<?php include('head.php');?>
		<body>
			<?php include('menu.php');?>
			<div class="container">
			<div class="row">
			<div class="col-12">
				<!-- Page title -->
				<div class="my-5">
					<h3>Mi perfil</h3>
					<hr>
				</div>
				<!-- Form START -->
				<form class="file-upload" action="update.php?Rol=<?php echo $_SESSION['Rol'] ?>&id=<?php echo $usr->id ?>" method="POST">
					<div class="row mb-5 gx-5">
						<!-- Contact detail -->
						<div class="col-xxl-8 mb-5 mb-xxl-0">
							<div class="bg-secondary-soft px-4 py-5 rounded">
								<div class="row g-3">
									<h4 class="mb-4 mt-0">Detalles de contacto</h4>
									<input type="hidden" value="<?php echo $usr->id ?>">
									<div class="col-md-6">
										<label class="form-label">Nombre *</label>
										<input type="text" class="form-control" aria-label="nombre" name="nombre" value="<?php echo $usr->nombre; ?>">
									</div>
									<!-- Email -->
									<div class="col-md-6">
										<label for="inputEmail4" class="form-label">Email *</label>
										<input type="email" class="form-control" name="Correo" id="inputEmail4" value="<?php echo $usr->correo; ?>">
									</div>
									<div class="col-md-6">
										<label class="form-label">Género</label><br>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="genero" id="genero_f" value="F" <?php if ($usr->genero == 'F') echo 'checked'; ?> required>
												<label class="form-check-label" for="genero_f">Femenino</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="genero" id="genero_m" value="M" <?php if ($usr->genero == 'M') echo 'checked';?>>
												<label class="form-check-label" for="genero_m">Masculino</label>
											</div>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="genero" id="genero_nb" value="no binario" <?php if ($usr->genero == 'no binario') echo 'checked'; ?>>
												<label class="form-check-label" for="genero_nb">No binario</label>
											</div>
										</label>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="fecha" class="form-label">Fecha de nacimiento</label>
											<input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $usr->fecha; ?>">
										</div>
									</div>
								</div>
							</div>

							<div class="col-xxl-0">
								<div class="bg-secondary-soft px-4 py-5 rounded">
									<div class="row g-3">
										<h4 class="my-4">Cambiar contraseña</h4>
										<!-- Old password -->
										<div class="col-md-6">
											<label for="exampleInputPassword1" class="form-label"> Contraseña anterior</label>
											<input type="password" class="form-control" id="exampleInputPassword1">
										</div>
										<!-- New password -->
										<div class="col-md-6">
											<label for="exampleInputPassword2" class="form-label">Nueva contraseña</label>
											<input type="password" class="form-control" id="exampleInputPassword2">
										</div>
										<!-- Confirm password -->
										<div class="col-md-12">
											<label for="exampleInputPassword3" class="form-label">Confirmar contraseña</label>
											<input type="password" class="form-control" id="exampleInputPassword3">
										</div>
									</div>
								</div>
							</div>

						</div>
						
						<!-- Upload profile -->
						<div class="col-xxl-4">
							<div class="bg-secondary-soft px-4 py-5 rounded">
								<div class="row g-3">
									<h4 class="mb-4 mt-0 xl-0">Foto de perfil</h4>
									<div class="text-center">
										<!-- Image upload -->
										<div style="width: 300px; height: 300px; overflow: hidden; border-radius: 10px;">
											<img src="<?php echo $usr->foto ?>" alt="tu foto" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div> <!-- Row END -->
					<!-- button -->
					<div class="gap-3 d-md-flex justify-content-md-start text-center">
						<a href="eliminarperfil.php?id=<?php echo $usr->id; ?>">
							<button type="button" class="btn btn-outline-danger btn-lg"> <i class="bi bi-exclamation-diamond"></i> Eliminar perfil</button>
						</>
						<input type="submit" class="btn btn-outline-success btn-lg" value="Actualizar perfil"></>
					</div>
					<br>
				</form>
				<br>
			</div>
		</div>
		</div>
		<br>
			<?php include('footer.php')?>
		</body>
	</html>
<?php 
    } else {
      echo '<meta http-equiv="refresh" content="0;url=/BuscaDoc/create.php">';
    }
?>