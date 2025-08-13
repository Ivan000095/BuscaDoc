<html>
   <?php 
    include('head.php'); 
   ?>
   <head>
        <style>
            @media (min-width: 1200px) {
                .modal-xl {
                    --bs-modal-width: 500px!important;
                }
            }

            @media (min-width: 576px) {
                .modal {
                    --bs-modal-margin: 15%;
                    --bs-modal-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                }
            }
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
                }
                .h-custom {
                    height: calc(100% - 73px);
                }
                @media (max-width: 450px) {
                    .h-custom {
                height: 100%;
                }
            }
        </style>
   </head>
<body> 

    <?php include('menu.php')?>

    <?php if (isset($_GET['error']) && $_GET['error'] == 1){ ?>
        <script>
            window.addEventListener('load', () => {
                var modal = new bootstrap.Modal(document.getElementById('modal1'));
                modal.show();
            });
        </script>
        <?php } elseif (isset($_GET['advertencia']) && $_GET['advertencia'] == 1) { ?>
            <script>
                window.addEventListener('load', () => {
                var modal = new bootstrap.Modal(document.getElementById('modal2'));
                modal.show();
            });
            </script>
        <?php } elseif ((isset($_GET['usuariocreado']) && $_GET['usuariocreado'] == 1)) {?>
            <script>
                window.addEventListener('load', () => {
                var modal = new bootstrap.Modal(document.getElementById('modal3'));
                modal.show();
            });
            </script>
        <?php } ?>


    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-6">
                    <img src="img/login.png"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="validausuario.php" method="POST" enctype="multipart/form-data">

                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Iniciar sesión</p>
                        </div>
                        <br>
                        <!-- Correo -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="Correo" name="Correo" class="form-control form-control-lg"
                            placeholder="Ingrese su correo" />
                            <label class="form-label" for="Correo">Correo</label>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                            placeholder="Enter password" />
                            <label class="form-label" for="password">Contraseña</label>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-success btn-lg brav"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar sesión</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">¿No tienes una cuenta? <a href="Registro.php"
                                class="link-success">Registrarme</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-4">
            <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Error</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body text-danger fs-5">
                                Credenciales Incorrectas
                        </div>
                        <div class="modal-footer">
                            <a href="create.php"><button type="button" class="btn btn-outline-success">Cerrar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Advertencia</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body text-danger fs-5">
                                Debe iniciar sesión
                        </div>
                        <div class="modal-footer">
                            <a href="create.php"><button type="button" class="btn btn-outline-success">Cerrar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Mensaje</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body text-success fs-5">
                            Usuario creado con éxito
                        </div>
                        <div class="modal-footer">
                            <a href="create.php"><button type="button" class="btn btn-outline-success">Cerrar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php')?>
    </body>
</html>