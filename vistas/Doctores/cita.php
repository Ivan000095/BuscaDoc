<html>
   <?php
    session_start();
    if(isset($_SESSION['Rol']) && $_SESSION['Rol'] == 'Usuario') {
    $idDoctor = $_REQUEST['idDoctor'];
    include('../../modelos/Doctor.php');
    $Doctor = Doctor::find($idDoctor);
    include('../../head.php');
   ?>
<body>
    <?php include('../../menu.php')?>
    <div id="contenido"> 
        <br>
        <h1 id="titulo">Cita a <?php echo $Doctor->nombre ?></h1>
        <br>
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
        <?php if (isset($_GET['error']) && $_GET['error'] == 1){ ?>
        <script>
            window.addEventListener('load', () => {
                var modal = new bootstrap.Modal(document.getElementById('modal'));
                modal.show();
            });
        </script>
        <?php } ?>
        <form action="realizarcita.php" method="GET" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $_SESSION['cliente']; ?>" name="idcliente"/>
        <input type="hidden" value="<?php echo $Doctor->idDoctor;?>" name="idDoctor"/>
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Detalle" class="form-label">Escriba los detalles de su cita:</label>
                <textarea type="text" name="Detalle" id="Detalle" class="form-control" rows="3" required></textarea>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="FechaHora_Cita" class="form-label">Escoja a que horas desea su cita:</label>
                <input type="datetime-local" id="FechaHora_Cita" name="FechaHora_Cita" class="form-control" required/>
            </div>
        </div>     
        <br>
        <div class="row justify-content-center">
            <div class="col-4">
                <input type="reset" value="Limpiar" class="btn btn-outline-success me-2">
                <input type="submit" value="Solicitar cita" class="btn btn-outline-success me-2">
            </div>
        </div>
      </form>
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

    <?php include('../../footer.php')?>
    </body>
</html>

<?php 
    } else {
      echo '<meta http-equiv="refresh" content="0;url=/BuscaDoc/create.php?advertencia=1">';
    }
?>