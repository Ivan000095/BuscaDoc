<?php
    session_start();
    if (isset($_SESSION["Rol"]) && $_SESSION['Rol'] == 'Doctor' ) {
    include('../../modelos/citas.php');
    $citas= cita::find($_SESSION['doctor'], $_SESSION["Rol"]);
?>

<html lang="en">
    <?php  include('../../head.php') ?>
    <body>
        <?php  include('../../menu.php') ?>
        <div id="contenido">
        <br>
          <h1 id="titulo">Mis citas</h1>
          <br>
          <table class="table table-striped" id="tabla-catalogo">
            <br>
            <tr>
              <th>Paciente</th>
              <th>Detalles</th>
              <th>Fecha de realización</th>
              <th>Fecha y hora de la cita</th>
              <th>Acciones</th>
            </tr>
            <?php
              if ($citas!=NULL){
                foreach ($citas as $c){
                ?>
                <tr>
                    <td><?php echo $c->paciente ?></td>
                    <td><?php echo $c->Detalle ?></td>
                    <td><?php echo $c->fechar ?></td>
                    <td><?php echo $c->fechahora ?></td>
                    <td>
                      <div class="row">
                        <div class="col-6">
                          <form action="aceptarcita.php?id=<?php echo $c->id ?>" method="POST" class="inline">
                              <button style="border: none; background: none;" type="submit" onclick="aceptar(<?php echo $c->id ?>, '<?php echo $c->paciente ?>')"><i class="bi bi-check brav"></i></button>
                          </form>
                        </div>
                          <div class="col-6">
                            <form action="rechazarcita.php?id=<?php echo $c->id ?>" method="POST" class="inline">
                                <button style="border: none; background: none;" type="submit" onclick="rechazar(<?php echo $c->id ?>, '<?php echo $c->paciente ?>')"><i class="bi bi-x-lg brav"></i></button>
                            </form>
                          </div> 
                        </div>
                      </div> 
                    </td>
                  </tr>
                  <?php
                }
              }
            ?>
          </table>
        </div>
        <?php  include('../../footer.php') ?>
    </body>
    <script type="text/javascript">
      function rechazar(id, paciente ){
        var continuar = confirm('¿Desea rechazar la cita de '+ paciente + '?');
        if (continuar){
          var formulario = document.getElementById('form' + id);
          formulario.submit();
        }
      }

      function aceptar(id, paciente ){
        var continuar = confirm('¿Desea aceptar la cita de '+ paciente + '?');
        if (continuar){
          var formulario = document.getElementById('form' + id);
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
