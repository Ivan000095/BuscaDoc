<?php
    include('modelos/Usuario.php');
    session_start();
?>

<html>
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
        </style>
   </head>
    <?php include ('head.php')?>
    <body>
        <?php if (isset($_GET['iniciosesion']) && $_GET['iniciosesion'] == 1){ ?>
        <script>
            window.addEventListener('load', () => {
                var modal = new bootstrap.Modal(document.getElementById('modal'));
                modal.show();
            });
        </script>
        <?php } elseif (isset($_GET['logout']) && $_GET['logout'] == 1){?>
            <script>
            window.addEventListener('load', () => {
                var modal = new bootstrap.Modal(document.getElementById('modal2'));
                modal.show();
            });
        </script>
        <?php } ?>
        <?php include ('menu.php')?>
        <!-- Aquí puede ir una imagen de presentación -->
         <header class="bg-dark py-5" style="background-image: url(img/fondo.png); ">
            <div class="container px-4 px-lg-5 my-5" id="presentacion">
                <div class="text-center">
                    <h1 class="display-4 fw-bolder">BuscaDoc</h1>
                    <p class="lead fw-normal text-white-80 font-italic mb-0">Un lugar para todas tus necesidades</p>
                </div>
            </div>
        </header>
        <section class="py-5" id="contenido">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-3 justify-content-center">   
                 <!--Doctor-->   
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="img/doctor.png" alt="Doctores" with="200px" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Doctores</h5>
                                    <!-- Descripcion-->
                                    Aqui encontrara contactos para una emergencia, enfermedad o cotizar precios.
                                    <br>
                                    <br>
                                    <?php if(isset($_SESSION['Rol'])) {?>
                                        <a class="btn btn-outline-dark" href="/BuscaDoc/vistas/Doctores/vista.php?Rol=<?php echo $_SESSION['Rol']; ?>"> Ver Doctores</a>
                                    <?php } else { ?>
                                        <a class="btn btn-outline-dark" href="/BuscaDoc/vistas/Doctores/vista.php"> Ver Doctores</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <!--Farmacia-->   
                     
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="img/farmacia.png" alt="Farmacia" with="200px"/>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">Farmacias</h5>
                            <!-- Descripcion-->
                            Encuentra fácilmente la farmacia que necesitas, según tu situación o urgencia.
                            <br>
                            <br>
                            <a class="btn btn-outline-dark" href="/BuscaDoc/vistas/Establecimientos/vista.php"> Ver Farmacias</a>
                        </div>
                    </div>
                </div>
            </div>         
        </section>

        <div class="row">
            <div class="col-4">
                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body text-success fs-5">
                                    Sesión Iniciada
                            </div>
                            <div class="modal-footer">
                                <a href="index.php?Rol=<?php echo $_SESSION['Rol']; ?>"><button type="button" class="btn btn-outline-success" >Cerrar</button></a>
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
                            <div class="modal-body text-success fs-5">
                                    Sesión cerrada
                            </div>
                            <div class="modal-footer">
                                <a href="index.php"><button type="button" class="btn btn-outline-success" >Cerrar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('footer.php')?>
    </body>
</html>