<?php
class Comentario {
    public $comentario;
    public $nombreusr;
    public $contenido;

    public function savecom(){
        include('conexion.php');
        $sql="INSERT INTO comentariospag(Comentario, NombreUsr) VALUES('" . $this->comentario . "', '" .$this->nombreusr . "')";
        return $con->query($sql);
    }

    public static function findcom() {
        include('conexion.php');
        $sql="SELECT * FROM comentariospag";
        return $con->query($sql);
    }
}