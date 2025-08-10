<?php 
    require('../../modelos/Farmacia.php');
    $Id_Farmacia = $_REQUEST['Id_Farmacia'];
    $Farmacia = Farmacia::find($Id_Farmacia);
    $Farmacia -> Nombre = $_REQUEST['Nombre'];
    $Farmacia -> Descripcion = $_REQUEST['Descripcion'];
    $Farmacia -> Horario = $_REQUEST['Horario'];
    $Farmacia -> Dias_labo = $_REQUEST['Dias_labo'];
    $Farmacia -> DireccionyRef= $_REQUEST['DireccionyRef'];

    $Farmacia -> save();
    echo '<meta http-equiv="refresh" content="0;url=index.php">';

?>
