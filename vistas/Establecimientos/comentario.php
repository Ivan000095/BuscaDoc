<?php
    require('../../modelos/Farmacia.php');
    $comentario = new Farmacia();
    $Id_Farmacia = $_REQUEST['Id_Farmacia'];
    $comentario->Comentario = $_REQUEST['Comentario'];
    $comentario->Puntuacion = $_REQUEST['Puntuacion'];
    $comentario->NombreUsr = $_REQUEST['NombreUsr'];
    $comentario->saveres($Id_Farmacia);
    echo '<meta http-equiv="refresh" content="0;url=vista.php">';
?>
