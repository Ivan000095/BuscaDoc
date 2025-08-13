<html>
   <?php 
    include('head.php'); 
   ?>
    <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
    <script>
        window.addEventListener('load', () => {
            var modal = new bootstrap.Modal(document.getElementById('modal'));
            modal.show();
        });
    </script>
    <?php endif; ?>
<body>  
    <?php include('menu.php')?>

    <!--<div id="contenido"> 
        <br>    
        <h1 id="titulo"><i class="bi bi-person-add"></i> Registrarme</h1>
        <br>
        <form action="crearusuario.php" method="POST" enctype="multipart/form-data">
<<<<<<< HEAD
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
        </div>
=======
        <!-- Nombre -->
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control" required>
            </div>
        </div>   
        <!-- Coreeo -->
>>>>>>> 0c0b401631ac69acadb048e8e7288ea10bbeeecb
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Correo" class="form-label">Correo</label>
                <input type="text" name="Correo" id="Correo" class="form-control" required>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>   
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="fecha" class="form-label">Fecha de nacimiento</label>
				<input type="date" class="form-control" name="fecha" id="fecha">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <label class="form-label">Género</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero_f" value="F">
                        <label class="form-check-label" for="genero_f">Femenino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero_m" value="M">
                        <label class="form-check-label" for="genero_m">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genero_nb" value="no binario">
                        <label class="form-check-label" for="genero_nb">No binario</label>
                    </div>
                </label>          
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-4">
                <input type="reset" value="Limpiar" class="btn btn-outline-success">
                <input type="submit" value="Registrarse" class="btn btn-outline-success">
            </div>
        </div>
      </form>
    </div>-->
    
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="crearusuario.php" method="POST" enctype="multipart/form-data">

                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                        <p class="lead fw-normal mb-0 me-3">Registrarme</p>
                    </div>
                    <br>
                    <!-- Correo -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="Correo" name="Correo" class="form-control form-control-lg"
                        placeholder="Ingrese su correo" />
                        <label class="form-label" for="Correo">Correo</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="nombre" name="nombre" class="form-control form-control-lg"
                        placeholder="Ingrese su nombre" />
                        <label class="form-label" for="nombre">Nombre</label>
                    </div>

                    <!-- Contraseña -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="password" id="password" name="password" class="form-control form-control-lg"
                        placeholder="Ingrese su contraseña" />
                        <label class="form-label" for="password">Contraseña</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="date" id="fecha" name="fecha" class="form-control form-control-lg"/>
                        <label class="form-label" for="fecha">Fecha de nacimiento</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label">Género</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="genero_f" value="F">
                                <label class="form-check-label" for="genero_f">Femenino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="genero_m" value="M">
                                <label class="form-check-label" for="genero_m">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="genero" id="genero_nb" value="no binario">
                                <label class="form-check-label" for="genero_nb">No binario</label>
                            </div>
                        </label>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg brav"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrarme</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">¿Ya tienes una cuenta? <a href="Create.php"
                            class="link-success">Iniciar sesión</a></p>
                    </div>

                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted">O</p>
                    </div>

                    <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" href="#!"
                        role="button">
                        <i class="bi bi-facebook me-2"></i>Registrarme como doctor
                    </a>

                    </form>
                </div>
                <div class="col-md-9 col-lg-6 col-xl-6">
                    <img src="img/login.png"
                    class="img-fluid" alt="Sample image">
                </div>
            </div>
        </div>
    </section>

    <?php include('footer.php')?>
    </body>
</html>
