<?php
class Comentario {
    public $comentario;
    public $nombreusr;
    public $contenido;
    public $id;

    public function savecom(){
        include('conexion.php');
        $sql = "INSERT INTO comentariospag(Comentario, id_usuario) VALUES(?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("si",$this->comentario, $this->id);
        $stmt->execute();
        // $sql="INSERT INTO comentariospag(Comentario) VALUES('" . $this->comentario . "')";
    }

    public static function findcom() {
        include('conexion.php');
        $sql="SELECT
            usuarios.Nombre,
            usuarios.Foto,
            comentariospag.Comentario
            FROM comentariospag
            JOIN usuarios ON usuarios.Id_Usuario=comentariospag.id_usuario;
        ";
        return $con->query($sql);
    }
}