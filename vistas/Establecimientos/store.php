<?php 
    require('../../modelos/Farmacia.php');
    $Farmacia = new Farmacia(); 

    if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = $_FILES['Foto']['name'];
    $tmpPath = $_FILES['Foto']['tmp_name'];

    $nombreUnico = uniqid() . '_' . basename($nombreArchivo);
    $rutaFinal = __DIR__ . '/../../uploads/' . $nombreUnico;

    if (move_uploaded_file($tmpPath, $rutaFinal)) {
        $Farmacia->Foto = $nombreUnico;
    } else {
        echo "No se pudo mover el archivo.";
        $Farmacia->Foto = null;
    }
    } else {
        echo "Error al subir el archivo: " . $_FILES['Foto']['error'];
        $Farmacia->Foto = null;
    }


    // Asignación de otros campos
    $Farmacia->Nombre = $_REQUEST['Nombre'];
    $Farmacia->Descripcion = $_REQUEST['Descripcion'];
    $Farmacia->Horario = $_REQUEST['Horario'];
    $Farmacia->Dias_labo = $_REQUEST['Dias_labo'];
    $Farmacia->DireccionyRef = $_REQUEST['DireccionyRef'];

    // Guardar en la base de datos
    $Farmacia->save();

    echo '<meta http-equiv="refresh" content="0;url=index.php">';
?>
