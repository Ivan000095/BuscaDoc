<?php 
require('modelos/Usuario.php');
$correo = $_REQUEST['Correo'];
$password = $_REQUEST['password'];
$user = Usuario::valida($correo, $password);
if ($user != null) {
    echo '<meta http-equiv="refresh" content="0;url=index.php?Rol=' . $user -> Rol . '">';
} else {
    echo '<meta http-equiv="refresh" content="0;url=Create.php?error=1">';
}
?>
