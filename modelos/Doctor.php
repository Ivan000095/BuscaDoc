<?php

class Doctor {
    public $idDoctor;
    public $idusr;
    public $idespecialidad;
    public $nombreespe;
    public $nombre;
    public $edad;
    public $cedula;
    public $correo;
    public $foto;
    public $password;
    public $telefono;
    public $fecha;
    public $idiomas;
    public $descripcion;
    public $genero;
    public $costo;
    public $horario;
    public $diaslab;
    public $ubicacion;
    public $puntuacion;
    public $comentario;
    public $id;

    //Consulta general
    public static function lista() {
        $lista = [];
        include('conexion.php');

        $sql = 'SELECT
        Doctores.Id_Doctor AS idDoctor, 
        Especialidades.Nombre AS nombreespe,
        Usuarios.Nombre AS nombre,
        DocEsp.Cedula AS cedula,
        Usuarios.correo AS correo, 
        Usuarios.Foto AS foto,
        TIMESTAMPDIFF(YEAR, Doctores.F_Nacimiento, CURDATE()) AS edad,
        (SELECT AVG(ResenaDoc.Puntuacion) FROM ResenaDoc where ResenaDoc.Id_Doctor = Doctores.Id_Doctor) AS Puntuacion,
        DocEsp.Telefono  AS telefono,
        Doctores.F_Nacimiento  AS  fecha,
        Doctores.Idioma  AS  idiomas,
        Doctores.Descripcion  AS  descripcion,
        Doctores.Genero AS genero,
        DocEsp.Costo AS costo,
        DocEsp.Horario AS horario,
        DocEsp.Dias_Labo AS diaslab,
        DocEsp.DireccionyRef AS ubicacion
        FROM Doctores
        JOIN Usuarios ON Doctores.Id_Usuario = Usuarios.Id_Usuario
        JOIN DocEsp ON Doctores.Id_Doctor = DocEsp.Id_Doctor
        JOIN Especialidades ON DocEsp.Id_Especialidad = Especialidades.Id_Especialidad
        left JOIN ResenaDoc ON ResenaDoc.Id_Doctor=Doctores.Id_Doctor;
        ';

        $resultado = $con->query($sql);
        while ($fila = $resultado->fetch_assoc()) {
            $doctor = new Doctor();
            $doctor->idDoctor = $fila['idDoctor'];
            $doctor->nombreespe = $fila['nombreespe'];
            $doctor->nombre = $fila['nombre'];
            $doctor->cedula = $fila['cedula'];
            $doctor->correo = $fila['correo'];
            $doctor->foto = $fila['foto'];
            $doctor->telefono = $fila['telefono'];
            $doctor->fecha = $fila['fecha'];
            $doctor->edad = $fila['edad'];
            $doctor->idiomas = $fila['idiomas'];
            $doctor->descripcion = $fila['descripcion'];
            $doctor->genero = $fila['genero'];
            $doctor->costo = $fila['costo'];
            $doctor->puntuacion = $fila['Puntuacion'];
            $doctor->horario = $fila['horario'];
            $doctor->diaslab = $fila['diaslab'];
            $doctor->ubicacion = $fila['ubicacion'];
            $lista[] = $doctor;
        }

        return $lista;
    }

    public static function find($idDoctor) {
        //Aquí buscamos un registro por su id
        $lista = [];
        include('conexion.php');

        $sql = 'SELECT
        Doctores.Id_Doctor AS idDoctor, 
        Especialidades.Nombre AS nombreespe,
        Usuarios.Id_Usuario As idusr,
        Usuarios.Nombre AS nombre,
        DocEsp.Cedula AS cedula,
        Usuarios.Correo AS correo, 
        Usuarios.Foto AS foto,
        DocEsp.Telefono  AS telefono ,
        Doctores.F_Nacimiento  AS  fecha,
        Doctores.Idioma  AS  idiomas,
        Doctores.Descripcion  AS  descripcion,
        Doctores.Genero AS genero,
        DocEsp.Id_Especialidad as idespecialidad,
        DocEsp.Costo AS costo,
        DocEsp.Horario AS horario,
        DocEsp.Dias_Labo AS diaslab,
        DocEsp.DireccionyRef AS ubicacion
        FROM Doctores
        JOIN Usuarios ON Doctores.Id_Usuario = Usuarios.Id_Usuario
        JOIN DocEsp ON Doctores.Id_Doctor = DocEsp.Id_Doctor
        JOIN Especialidades ON DocEsp.Id_Especialidad = Especialidades.Id_Especialidad
        WHERE Doctores.Id_Doctor = '. $idDoctor;

        $resultado = $con->query($sql);
        if ($fila = $resultado->fetch_assoc()) {
            $doctor = new Doctor();
            $doctor->idDoctor = $fila['idDoctor'];
            $doctor->idespecialidad = $fila['idespecialidad'];
            $doctor->nombreespe = $fila['nombreespe'];
            $doctor->idusr = $fila['idusr'];
            $doctor->nombre = $fila['nombre'];
            $doctor->cedula = $fila['cedula'];
            $doctor->correo = $fila['correo'];
            $doctor->foto = $fila['foto'];
            $doctor->telefono = $fila['telefono'];
            $doctor->fecha = $fila['fecha'];
            $doctor->idiomas = $fila['idiomas'];
            $doctor->descripcion = $fila['descripcion'];
            $doctor->genero = $fila['genero'];
            $doctor->costo = $fila['costo'];
            $doctor->horario = $fila['horario'];
            $doctor->diaslab = $fila['diaslab'];
            $doctor->ubicacion = $fila['ubicacion'];
            return $doctor;
        }
        return NULL;
    }

    public function save() {
        //Aquí guardamos datos
        include('conexion.php');
        if( $this->idDoctor==0 ) {
           try{
            $rol='Doctor';
            $pswd=SHA1($this->password);
            $con->begin_transaction();
            $sql1 = $con->prepare("INSERT INTO Usuarios(correo, Nombre, Foto, pswd, Rol) VALUES (?,?,?,?,?)");
            $sql1->bind_param("sssss", $this->correo, $this->nombre, $this->foto, $pswd, $rol);
            $sql1->execute();
            $this->idusr=$con->insert_id;

            $sql2 = $con->prepare("INSERT INTO Doctores(F_Nacimiento,Idioma,Descripcion,Genero,Id_Usuario) VALUES (?,?,?,?,?)");
            $sql2->bind_param("ssssi", $this->fecha,$this->idiomas,$this->descripcion,$this->genero,$this->idusr);
            $sql2->execute();
            $this->idDoctor=$con->insert_id;

            $sql3 = $con->prepare("INSERT INTO DocEsp(Id_Doctor,Id_Especialidad,Cedula,Telefono,Costo,Horario,Dias_labo,DireccionyRef) VALUES (?,?,?,?,?,?,?,?)");
            $sql3->bind_param("iissssss",$this->idDoctor,$this->idespecialidad,$this->cedula,$this->telefono,$this->costo,$this->horario,$this->diaslab,$this->ubicacion);
            $sql3->execute();

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
            try{
            $con->begin_transaction();
            $sql1 = $con->prepare("UPDATE Usuarios SET Correo=?, Nombre=? WHERE Id_Usuario = ?");
            $sql1->bind_param("ssi", $this->correo, $this->nombre, $this->idusr);
            $sql1->execute();

            $sql2 = $con->prepare("UPDATE Doctores SET F_Nacimiento = ?,Idioma = ?,Descripcion = ?,Genero = ? WHERE Id_Doctor = ?");
            $sql2->bind_param("ssssi", $this->fecha, $this->idiomas, $this->descripcion, $this->genero, $this->idDoctor);
            $sql2->execute();

            $sql3 = $con->prepare("UPDATE DocEsp SET Id_Especialidad=?, Cedula=?, Telefono=?, Costo = ?, Horario = ?, Dias_labo = ?, DireccionyRef = ? WHERE Id_Doctor = ?");
	    $sql3->bind_param("issdsssi",$this->idespecialidad,$this->cedula, $this->telefono,$this->costo,$this->horario,$this->diaslab,$this->ubicacion,$this->idDoctor);
            $sql3->execute();

            $con->commit();
            $con->close();
            return true;

         } catch (Exception $e) {
            $con->rollback();   
            echo "Error al actualizar: " . $e->getMessage();
            $con->close();
            return false;
        
        }
      }
    }

    public static function finds() {
    $lista = [];
    include('conexion.php');

    $sql = 'SELECT * FROM Especialidades;'; 
    $resultado = $con->query($sql);

    while ($fila = $resultado->fetch_assoc()) {
        $especialidad = new Doctor();
        $especialidad->idespecialidad = $fila['Id_Especialidad'];
        $especialidad->nombreespe = $fila['Nombre'];
        $lista[] = $especialidad;
    }
    return $lista;
    }

    public function destroy() {
        //Aquí eliminamos datos
        include('conexion.php');
        $sql = "DELETE FROM Usuarios WHERE Id_Usuario=" . $this->idusr;
        return $con->query($sql);
    }

    public function saveres($idDoc){
        include('conexion.php');
        $sql="INSERT INTO ResenaDoc(Puntuacion, Comentario, Id_Usuario, Id_Doctor) VALUES(?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("isii",$this -> puntuacion, $this->comentario, $this->id, $idDoc);
        $stmt->execute();
       
    }

    public static function findres($id) {
        include('conexion.php');
        $sql="SELECT ResenaDoc.Puntuacion, ResenaDoc.Comentario,usuarios.Foto, usuarios.Nombre FROM ResenaDoc JOIN usuarios 
        ON usuarios.Id_Usuario = ResenaDoc.Id_Usuario 
        WHERE Id_Doctor= " . $id;
        return $con->query($sql);
    }
}

?>
