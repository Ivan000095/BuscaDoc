<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    if (isset($_SESSION["Rol"]) && $_SESSION['Rol'] == 'Administrador') {
    include('../../modelos/Doctor.php');
    $doctores=Doctor::lista();
?>

<html lang="en">
    <?php  include('../../head.php') ?>
    <body>
        
        <?php if (isset($_GET['doctoragregado']) && $_GET['doctoragregado'] == 1){ ?>
        <script>
            window.addEventListener('load', () => {
                var modal = new bootstrap.Modal(document.getElementById('modal'));
                modal.show();
            });
        </script>
        <?php } elseif (isset($_GET['cambio']) && $_GET['cambio'] == 1){ ?>
        <script>
            window.addEventListener('load', () => {
                var modal = new bootstrap.Modal(document.getElementById('modal2'));
                modal.show();
            });
        </script>
        <?php } ?>

        <?php  include('../../menu.php') ?>

        <div id="contenido" class="">
        <br>
          <h1 id="titulo">Doctores</h1>
          <a href="reporte.php" class="btn btn-outline-success" id="btnrepo" target="blank"><i class="bi bi-filetype-pdf"></i> Reporte en PDF</a>
          <a href="agregar.php" class="btn btn-outline-success" id="btnadd"><i class="bi bi-person-add"></i> Agregar</a>
          <br>
          <br>
          <table class="table table-striped" id="tabla-catalogo">
            <br>
            <tr>
              <th>Especialidad</th>
              <th>Nombre</th>
              <th>Cédula</th>
              <th>Descripción</th>
              <th>Género</th>
              <th>Ubicación</th>
              <th>Acciones</th>
            </tr>
            <?php
            foreach ($doctores as $d){
            ?>
            <tr>
                <td><?php echo $d->nombreespe; ?></td>
                <td><?php echo $d->nombre; ?></td>
                <td><?php echo $d->cedula; ?></td>
                <td><?php echo $d->descripcion; ?></td>
                <td><?php echo $d->genero; ?></td>
                <td><?php echo $d->ubicacion; ?></td>
                <td>
                  <div class="row">
                    <div class="col-6">
                      <a href="edit.php?id=<?php echo $d->idDoctor; ?>">
                        <button style="border: none; background: none;"><i class="bi bi-pencil-fill brav"></i></button>
                      </a>
                    </div>
                    <div class="col-6">
                      <form action="destroy.php?idDoctor=<?php echo $d->idDoctor; ?>" method="POST" id="form<?php echo $d->idDoctor; ?>" class="inline">
                          <button style="border: none; background: none;" type="button" onclick="borrar(<?php echo $d->idDoctor ?>, '<?php echo $d->nombre ?>')"><i class="bi bi-trash brav"></i></button>
                      </form>  
                    </div>
                  </div> 
                </td>
              </tr>
              <?php
              }
              ?>
          </table>
        </div>
        <?php  include('../../footer.php') ?>

        <div class="row">
            <div class="col-4">
                <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body text-success fs-5">
                                    Doctor agregado con éxito
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
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body text-success fs-5">
                                    Cambios registrados
                            </div>
                            <div class="modal-footer">
                                <a href="index.php?Rol=<?php echo $_SESSION['Rol']; ?>"><button type="button" class="btn btn-outline-success" >Cerrar</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script type="text/javascript">
          function borrar(idDoctor, nombre ){
            var continuar = confirm('¿Desea borrar el Registro de '+ nombre + '?');
            if (continuar){
              var formulario = document.getElementById('form' + idDoctor);
              formulario.submit();
            }
          }
    </script>
</html>

<?php 
    } else {
      echo '<meta http-equiv="refresh" content="0;url=/BuscaDoc/create.php?advertencia=1">';
    }
?>
