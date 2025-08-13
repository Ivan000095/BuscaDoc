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
        try {
            // Establecer nombres de mes/día en español
            $con->query("SET lc_time_names = 'es_ES';");

            // Ejecutar la consulta
            $sql = $con->prepare("
                SELECT
                    Usuarios.Nombre,
                    Usuarios.Foto,
                    ComentariosPag.Comentario,
                    DATE_FORMAT(ComentariosPag.FechaHora, '%d %M %Y %H:%i') AS FechaHora
                FROM ComentariosPag
                JOIN Usuarios ON Usuarios.Id_Usuario = ComentariosPag.id_usuario
                ORDER BY ComentariosPag.FechaHora DESC
            ");
            $sql->execute();

            // Devolver directamente el resultado para usar fetch_assoc()
            return $sql->get_result();

        } catch (Exception $e) {
            error_log("Error en findcom: " . $e->getMessage());
            return false;
        }
    }
}
