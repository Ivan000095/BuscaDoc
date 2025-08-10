<?php
    require('modelos/Usuario.php');

    $usr = new Usuario();

    // Subida de imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['foto']['name'];
        $tmpPath = $_FILES['foto']['tmp_name'];

        $carpetaDestino = 'uploads/';

        $nombreUnico = uniqid() . '_' . basename($nombreArchivo);
        $rutaFinal = $carpetaDestino . $nombreUnico;

        if (move_uploaded_file($tmpPath, $rutaFinal)) {
            // Guardar ruta relativa
            $usr->foto = 'uploads/' . $nombreUnico;
        } else {
            $usr->foto = null; // evitar error si no se guarda
        }
    } else {
        $usr->foto = null;
    }

    // Datos del formulario
    $usr->nombre = $_POST['Nombre'];
    $usr->correo = $_POST['Correo'];
    $usr->pswd = $_POST['password'];
    $usr->Register();
    echo '<meta http-equiv="refresh" content="0;url=create.php">';
?>
