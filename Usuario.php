<?php
class Usuario {
    public $id;
    public $idCliente;
    public $idDoctor;
    public $nombre;
    public $correo;
    public $pswd;
    public $Rol;
    public $foto;
    public $fecha;
    public $genero;
    public static function valida($correo, $pswd) {
        include('conexion.php');

        $sql = "SELECT u.*, c.Id_Cliente, d.Id_Doctor 
                FROM Usuarios u 
                LEFT JOIN Clientes c ON u.Id_Usuario = c.Id_Usuario 
                LEFT JOIN Doctores d ON u.Id_Usuario = d.Id_Usuario 
                WHERE u.Correo = ? AND u.pswd = SHA1(?)";
        
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
            $usuario->idCliente = ($usuario->Rol === "Usuario") ? $fila["Id_Cliente"] : null;
            $usuario->idDoctor = ($usuario->Rol === "Doctor") ? $fila["Id_Doctor"] : null;
            return $usuario;
        } else {
            return null;
        }
    }

    public function Register() {
        include('conexion.php');
        if($this->id==0){
            try {
                $con->begin_transaction();

                $Rol = 'Usuario';
                $pswdHash = SHA1($this->pswd);
                $sql1=$con->prepare("INSERT INTO Usuarios(Nombre, Correo, Foto, pswd, Rol) VALUES(?,?,?,?,?)");
                $sql1->bind_param("sssss", $this->nombre, $this->correo, $this->foto, $pswdHash, $Rol);
                $sql1->execute();
                $this->id = $con->insert_id;

                $sql2=$con->prepare("INSERT INTO Clientes(F_Nacimiento, Genero, Id_Usuario) VALUES(?,?,?)");
                $sql2->bind_param("ssi",$this->fecha, $this->genero, $this->id);
                $sql2->execute();

                $con->commit();
                $con->close();
                return true;

            } catch (Exception $e) {
                $con->rollback();   
                echo "Error en la transacción: " . $e->getMessage();
                $con->close();
                return false; 
            }
        } else {
            $con->begin_transaction();
            try {
                $Rol = 'Usuario';
                $sql1=$con->prepare("UPDATE Usuarios SET Correo=?, Nombre=? where Id_Usuario=?");
                $sql1->bind_param("sss", $this->correo, $this->nombre, $this->id);
                $sql1->execute();

                $sql2=$con->prepare("UPDATE Clientes SET F_Nacimiento=?, Genero=? WHERE Id_Cliente=?");
                $sql2->bind_param("sss",$this->fecha, $this->genero, $this->idCliente);
                $sql2->execute();

                $con->commit();
                $con->close();
                return true;

            } catch (Exception $e) {
                $con->rollback();   
                echo "Error en la transacción: " . $e->getMessage();
                $con->close();
                return false; 
            }
        }
    }

    public static function buscar($id) {
        include('conexion.php');
        $sql= "SELECT Usuarios.Nombre,
        Usuarios.Id_Usuario,
		Usuarios.Rol,
		Usuarios.Correo,
		Usuarios.Foto,
		Usuarios.pswd,
		Clientes.F_Nacimiento,
		Clientes.Genero
		FROM Clientes
		JOIN Usuarios ON Clientes.Id_Usuario=Usuarios.Id_Usuario
		WHERE Clientes.Id_Cliente=?
        ";
        $stmt=$con->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado && $fila = $resultado->fetch_assoc()) {
            $usuario = new Usuario();
            $usuario->id = $fila["Id_Usuario"];
            $usuario->nombre = $fila["Nombre"];
            $usuario->correo = $fila['Correo'];
            $usuario->pswd = $fila['pswd'];
            $usuario->Rol = $fila['Rol'];
            $usuario->fecha = $fila['F_Nacimiento'];
            $usuario->genero = $fila['Genero'];
            $usuario->foto = $fila['Foto'];
            return $usuario;
        } else {
            return null;
        }
    }

    public function destroy() {
        include('conexion.php');
        $sql ="DELETE FROM Usuarios WHERE Id_Usuario=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        return null;
    }
}
