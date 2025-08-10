<?php

class Farmacia{

    public $Id_Farmacia;
    public $Nombre;
    public $Descripcion;
    public $Horario;
    public $Dias_labo;
    public $Foto;
    public $DireccionyRef;
    public $Comentario;
    public $Puntuacion;
    public $fechahorar;
    public $NombreUsr;
    
    public static function lista() {
        $lista = [];
        include('conexion.php');

        $sql = 'SELECT Farmacias.Id_Farmacia,
		 Farmacias.Nombre,
		 Farmacias.Descripcion,
		 Farmacias.Horario,
		 Farmacias.Dias_labo,
		 Farmacias.Foto,
		 Farmacias.DireccionyRef,
		 avg(resenafar.Puntuacion) AS puntuacion
		 FROM Farmacias
		 left JOIN resenafar ON Farmacias.Id_Farmacia=resenafar.Id_Farmacia
		 GROUP BY Farmacias.Id_Farmacia;';
        $resultado = $con->query($sql);
        while ($fila = $resultado->fetch_assoc()) {
            $elemento = new Farmacia();
            $elemento->Id_Farmacia = $fila['Id_Farmacia'];
            $elemento->Nombre = $fila['Nombre'];
            $elemento->Descripcion = $fila['Descripcion'];
            $elemento->Puntuacion = $fila['puntuacion'];
            $elemento->Horario = $fila['Horario'];
            $elemento->Dias_labo = $fila['Dias_labo'];
            $elemento->Foto = $fila['Foto'];
            $elemento->DireccionyRef = $fila['DireccionyRef'];
           
           
            $lista[] = $elemento;
        }

        return $lista;
    }

    public static function find($Id_Farmacia) {
        //Aquí buscamos un registro por su id
        $lista = [];
        include('conexion.php');

        $sql = 'SELECT * FROM Farmacias WHERE Id_Farmacia=' . $Id_Farmacia;
        $resultado = $con->query($sql);
        if ($fila = $resultado->fetch_assoc()) {
            $elemento = new Farmacia();
            $elemento->Id_Farmacia = $fila['Id_Farmacia'];
            $elemento->Nombre = $fila['Nombre'];
            $elemento->Descripcion = $fila['Descripcion'];
            $elemento->Horario = $fila['Horario'];
            $elemento->Dias_labo = $fila['Dias_labo'];
            $elemento->Foto = $fila['Foto'];
            $elemento->DireccionyRef = $fila['DireccionyRef'];
            return $elemento;
        }
         return NULL;
    }

    public function save() {
        //Aquí guardamos datos
        include('conexion.php');
        
        if($this -> Id_Farmacia==0){
        $sql = "INSERT INTO Farmacias (Nombre, Descripcion, Horario, Dias_labo, Foto, DireccionyRef) VALUES('". $this -> Nombre . "','". $this -> Descripcion . "', 
        '". $this -> Horario . "','". $this -> Dias_labo . "','". $this -> Foto . "','". $this -> DireccionyRef . "')";
        } else {
            
            $sql = "UPDATE Farmacias SET Nombre='". $this -> Nombre . "', Descripcion='". $this -> Descripcion . "', Horario='". $this -> Horario . "', Dias_labo='". $this -> Dias_labo . "', Foto='". $this -> Foto . "', DireccionyRef='". $this -> DireccionyRef . "' WHERE Id_Farmacia=" . $this->Id_Farmacia;
            
        }
        
        
        return $con->query($sql);
    
    }

    public function destroy() {
        //Aquí eliminamos datos
        include('conexion.php');
        $sql = "DELETE FROM Farmacias WHERE Id_Farmacia=". $this -> Id_Farmacia;
        return $con -> query($sql);
    }

    public function saveres($Id_Farmacia){
        include('conexion.php');
        $sql="INSERT INTO Resenafar(Comentario, Puntuacion, NombreUsr, Id_Farmacia) VALUES('" . $this->Comentario . "', " . $this->Puntuacion . ", '" . $this->NombreUsr . "', $Id_Farmacia)";
        return $con->query($sql);
    }

    public static function findres($Id_Farmacia) {
        include('conexion.php');
        $sql = "SELECT * FROM Resenafar WHERE Id_Farmacia=" . $Id_Farmacia;
        return $con->query($sql);
    }
}
?>
