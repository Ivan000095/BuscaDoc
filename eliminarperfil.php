<?php
session_start();
    include('modelos/Usuario.php');
    $id = $_REQUEST['id'];
    $Usuario = Usuario::buscar($_SESSION['cliente']);
    $Usuario->id= $_REQUEST['id'];
    $Usuario->destroy();
    echo '<meta http-equiv="refresh" content="0;url=logout.php">';
?>