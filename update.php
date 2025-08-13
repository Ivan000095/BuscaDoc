<?php
    session_start();
    require('modelos/Usuario.php');
    $usr=Usuario::buscar($_SESSION['cliente']);
    $usr->id = $_REQUEST['id'];
    $usr->idCliente = $_SESSION['cliente'];
    $usr->nombre = $_REQUEST['nombre'];
    $usr->correo = $_REQUEST['Correo'];
    $usr->fecha = $_REQUEST['fecha'];
    $usr->genero = $_REQUEST['genero'];
    $usr->Register();
    echo '<meta http-equiv="refresh" content="0;url=miperfil.php?Rol=' . $_SESSION['Rol'] .'&id=' . $_SESSION['cliente'] . '">';
?>
