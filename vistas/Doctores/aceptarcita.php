<?php
    require('../../modelos/citas.php');
    $cita = new Cita();
    $id=$_GET['id'];
    $cita->aceptar($id);
    echo '<meta http-equiv="refresh" content="0;url=vercitas.php?' . $_SESSION['Rol']. '&id='.$_SESSION['doctor'].'">';
?>
