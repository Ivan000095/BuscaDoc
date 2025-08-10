<?php
class Usuario {
    public $id;
    public $nombre;
    public $correo;
    public $pswd;
    public $Rol;
    public $foto;

    public static function valida($correo, $pswd) {
        include('conexion.php');

        //sin prevención de inyección de código
        //$sql = "SELECT * FROM Usuarios WHERE Correo = '$correo' AND pswd = SHA1('$pswd')";
        //$resultado = $con->query($sql);

        
        $sql = "SELECT * FROM Usuarios WHERE Correo=? AND pswd = SHA1(?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $correo, $pswd);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $fila = $resultado->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->id = $fila["Id_Usuario"];
            $usuario->nombre = $fila["Nombre"];
            $usuario->correo = $fila['Correo'];
            $usuario->pswd = $fila['pswd'];
            $usuario->Rol = $fila['Rol'];
            return $usuario;
        } else {
            return null;
        }
    }
    public function Register() {
        include('conexion.php');
        $sql="INSERT INTO Usuarios(Nombre, Correo, Foto, pswd, Rol) VALUES('" . $this->nombre . "','" . $this->correo . "', '" . $this->foto . "', SHA1('" . $this->pswd . "'), 'Usuario')";
        return $con->query($sql);
    }
}