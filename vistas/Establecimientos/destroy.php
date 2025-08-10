<?php
    require('../../modelos/Farmacia.php');
    $Id_Farmacia = $_REQUEST['Id_Farmacia'];
    $Farmacia = Farmacia::find($Id_Farmacia);
    $Farmacia->destroy();
    echo '<meta http-equiv="refresh" content="0;url=index.php">';
?>
