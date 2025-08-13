<?php
    session_start();
    if (isset($_SESSION["Rol"]) && $_SESSION['Rol'] == 'Usuario' ) {
    include('modelos/citas.php');
    $citas= cita::find($_SESSION['cliente'], $_SESSION["Rol"]);
?>

<html lang="en">
    <?php  include('head.php') ?>
    <body>
        <?php  include('menu.php') ?>
        <div id="contenido">
            <br>
          <h1 id="titulo">Mis citas</h1>
          <br>
          <div class="lista">
            <ul class="list-group list-group-light">
                <?php if ($citas!=null) {
                    foreach ($citas as $c) {
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <div class="fw-bold">Cita a: <?php echo $c->doctor; ?>, <?php echo $c->fechahora; ?></div>
                            <div class="text-muted">Detalle: <?php echo $c->Detalle; ?></div>
                        </div>
                        <?php switch($c->estado) { 
                            case 'Rechazada': ?>
                                <span class="badge rounded-pill bg-danger text-white">Rechazada</span>
                                <?php
                                break;
                            case 'Aceptada': ?>
                                <span class="badge rounded-pill bg-success text-white">Aceptada</span>
                                <?php 
                                break;
                            case 'Pendiente': ?>
                                <span class="badge rounded-pill bg-info text-dark">Pendiente</span>
                                <?php
                                break;
                            } ?>
                    </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <br>
        <?php  include('footer.php') ?>
    </body>
    <script type="text/javascript">
</html>

<?php 
    } else {
      echo '<meta http-equiv="refresh" content="0;url=/BuscaDoc/create.php">';
    }
?>
