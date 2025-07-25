<?php
    require('modelos/comentario.php');
    $comentario = new Comentario();
    $comentario->comentario = $_REQUEST['comentario'];
    $comentario->nombreusr = $_REQUEST['nombreusr'];
    $comentario->savecom();
    echo '<meta http-equiv="refresh" content="0;url=/ServiFinder/index.php#comentarios">';
?>