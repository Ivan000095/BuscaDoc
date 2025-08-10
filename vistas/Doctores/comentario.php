<?php
    require('../../modelos/Doctor.php');
    $comentario = new Doctor();
    $idDoctor = $_REQUEST['idDoctor'];
    $comentario->puntuacion = $_REQUEST['calificacion'];
    $comentario->comentario = $_REQUEST['comentario'];
    $comentario->id = $_REQUEST['idu'];
    $comentario->saveres($idDoctor);
    echo '<meta http-equiv="refresh" content="0;url=/BuscaDoc/vistas/Doctores/vista.php?Rol=Usuario">';
?>