<?php
    require('../../modelos/citas.php');
    $cita = new Cita();
    $cita->idcliente = $_GET['idcliente'];
    $cita->idDoctor = $_GET['idDoctor'];
    $cita->Detalle = $_GET['Detalle'];
    $cita->fechahora = $_GET['FechaHora_Cita'];
    $cita->crear();
    echo '<meta http-equiv="refresh" content="0;url=vista.php?cita=1">';
?>
