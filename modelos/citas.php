<?php
class cita{
    public $id;
    public $estado;
    public $idcliente;
    public $idDoctor;
    public $Detalle;
    public $fechahora;
    public $fechar;
    public $paciente;
    public $doctor;

    public function crear() {
        include('conexion.php');
        $sql = "INSERT INTO Cita (Id_Cliente, Id_Doctor, Detalle, FechaHora_Cita) VALUES(?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_Param("iiss", $this->idcliente, $this->idDoctor, $this->Detalle, $this->fechahora);
        $stmt->execute();
    }

    public static function find($id, $rol) {
        require('conexion.php');
        if ($rol == 'Doctor') {
        try {
            // Establecer idioma español para nombres de mes
            $sql1 = $con->prepare("SET lc_time_names = 'es_ES';");
            $sql1->execute();

            $sql = "SELECT Cita.Id_Cita as id,
                Cita.Detalle as Detalle,
                DATE_FORMAT(Cita.FechaHora_Realizacion, '%d %M %Y %H:%i') AS FechaR,
                DATE_FORMAT(Cita.FechaHora_Cita, '%d %M %Y %H:%i') AS FechaC,
                Cita.Estado as Estado,
                Clientes.Id_Cliente,
                u1.Nombre AS paciente,
                u2.Nombre AS doctor,
                Doctores.Id_Doctor
                FROM Cita
                JOIN Clientes ON Cita.Id_Cliente = Clientes.Id_Cliente
                JOIN Doctores ON Cita.Id_Doctor = Doctores.ID_Doctor
                JOIN Usuarios u1 ON Clientes.Id_Usuario = u1.Id_Usuario
                JOIN Usuarios u2 ON Doctores.Id_Usuario = u2.Id_Usuario
                WHERE Doctores.Id_Doctor = ? AND Cita.Estado = 'Pendiente';";

            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();

            $lista = [];
            while ($fila = $resultado->fetch_assoc()) {
                $cita = new Cita();
                $cita->id        = $fila['id'];
                $cita->paciente  = $fila['paciente'];
                $cita->Detalle   = $fila['Detalle'];
                $cita->fechahora = $fila['FechaC'];  // ← Fecha de la cita
                $cita->fechar    = $fila['FechaR'];  // ← Fecha de realización
                $lista[] = $cita;
            }

            $con->close();
            return $lista;

        } catch (Exception $e) {
            echo "Error al obtener citas: " . $e->getMessage();
            $con->close();
            return [];
        }
        } elseif ($rol == 'Usuario') {
            try {
                $sql1 = $con->prepare("SET lc_time_names = 'es_ES';");
                $sql1->execute();

                $sql2 = "SELECT Cita.Id_Cita as id,
                    Cita.Detalle as Detalle,
                    DATE_FORMAT(Cita.FechaHora_Cita,'%d %M %Y %H:%i') as fechaC,
                    Cita.Estado as Estado,
                    Clientes.Id_Cliente,
                    u1.Nombre AS paciente,
                    u2.Nombre AS doctor,
                    Doctores.Id_Doctor
                    FROM Cita
                    JOIN Clientes ON Cita.Id_Cliente = Clientes.Id_Cliente
                    JOIN Doctores ON Cita.Id_Doctor = Doctores.ID_Doctor
                    JOIN Usuarios u1 ON Clientes.Id_Usuario = u1.Id_Usuario
                    JOIN Usuarios u2 ON Doctores.Id_Usuario = u2.Id_Usuario
                    WHERE Clientes.Id_Cliente = ?";

                $stmt = $con->prepare($sql2);
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $resultado = $stmt->get_result();

                $lista = [];
                while ($fila = $resultado->fetch_assoc()) {
                    $cita = new Cita();
                    $cita->id = $fila['id'];
                    $cita->doctor = $fila['doctor'];
                    $cita->estado = $fila['Estado'];
                    $cita->Detalle = $fila['Detalle'];
                    $cita->fechahora = $fila['fechaC'];
                    $lista[] = $cita;
                }

                $con->close();
                return $lista;

            } catch (Exception $e) {
                echo "Error al obtener citas: " . $e->getMessage();
                $con->close();
                return [];
            }
        }
    }

    public static function aceptar($id) {
        require ('conexion.php');

        $sql = "UPDATE Cita
                SET Estado = 'Aceptada'
                WHERE Id_Cita = ?";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }   
    }
    public static function rechazar($id) {
        require ('conexion.php');

        $sql = "UPDATE Cita
                SET Estado = 'Rechazada'
                WHERE Id_Cita = ?";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
