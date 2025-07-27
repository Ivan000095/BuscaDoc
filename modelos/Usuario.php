<?php
class Usuario {
    public $correo;
    public $pswd;
    public $Rol;
    public $foto;

    public static function valida($correo, $pswd) {
        include('conexion.php');
        $sql = "SELECT * FROM Usuarios WHERE Correo = '$correo' AND pswd = '$pswd'";
        $resultado = $con->query($sql);
        if ($resultado && $fila = $resultado->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->correo = $fila['Correo'];
            $usuario->password = $fila['password'];
            $usuario->Rol = $fila['Rol'];

            return $usuario;
        } else {
            return null;
        }
    }
    public function Register() {
        include('conexion.php');
        $sql="INSERT INTO Usuarios(Correo, Foto, pswd, Rol) VALUES('" . $this->correo . "', '" . $this->foto . "', '" . $this->pswd . "', 'Usuario')";
        return $con->query($sql);
    }
}