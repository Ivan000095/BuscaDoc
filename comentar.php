<?php
    session_start();
    require('modelos/comentario.php');
    $comentario = new Comentario();
    $comentario->id = $_REQUEST['id'];
    $comentario->comentario = $_REQUEST['comentario'];
    $comentario->savecom();
    echo '<meta http-equiv="refresh" content="0;url=/BuscaDoc/comentarios.php?Rol='.$_SESSION['Rol'].'">';
?>