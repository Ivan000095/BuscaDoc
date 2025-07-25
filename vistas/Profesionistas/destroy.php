<?php
    require('../../modelos/Profesionista.php');
    $id= $_REQUEST['id'];
    $Profesionista = Profesionista::find($id);
    $Profesionista->destroy();
    echo '<meta http-equiv="refresh" content="0;url=/ServiFinder/vistas/Profesionistas">';
?>