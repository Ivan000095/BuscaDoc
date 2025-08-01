<?php
    include('modelos/Usuario.php');
    session_start();
?>

<html>
    <?php include ('head.php')?>
    <body>
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
                                    Aqui encontrara contactos para una emergencia,enfermedad o cotizar precios.
                                    <br>
                                    <br>
                                    <a class="btn btn-outline-dark" href="/BuscaDoc/vistas/Doctores/vista.php"> Ver Doctores</a>
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
        <?php include('footer.php')?>
    </body>
</html>