<?php
 require_once("../conexion/conexion.php");

 class Torneo extends Conexion {
    
     private $nombre;
     private $fecha;
     private $direccion;
     private $categoria;
     private $sexo;

     public function __construct(){
         $this->conexion = new Conexion();
         $this->conexion = $this->conexion->connect();
     }

     public function insertarTorneo(string $nombre, string $fecha, string $direccion, string $categoria, string $sexo){

        
        $this->nombre = $nombre;
        $this->fecha = $fecha;
        $this->direccion = $direccion;
        $this->categoria = $categoria;
        $this->sexo = $sexo;

        $sql = "INSERT INTO torneo(Nombre, Fecha, Dirección, Categoria, Sexo) VALUES(?,?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->nombre,$this->fecha,$this->direccion,$this->categoria,$this->sexo);
        $resInsert = $insert->execute($arrData);
        $idInsert = $this->conexion->lastInsertId();
        return $idInsert;
    }

    public function eliminarTorneo($id) {
        $consulta = "DELETE FROM torneo WHERE IdTorneo = :id";
        
        try {
            $stmt = $this->conexion->prepare($consulta);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return true; 
        } catch (PDOException $ex) {
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            return false;  
        }
    }

    public function listarTorneos(){
        try{
            $sql = "SELECT * FROM torneo";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($insert);
            $resInsert = $insert->execute(); 
        }catch(PDOException $ex){
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            exit;
        }
        echo '<table border=1>';
        echo '<tr><th>ID</th><th>Nombre</th><th>Fecha</th><th>Dirección</th><th>Categoria</th><th colspan="2">Acciones</th></tr>';
        foreach ($insert as $row){

            echo '<tr>
                    <td>'.$row['IdTorneo'].'</td>
                    <td>'.$row['Nombre'].'</td>
                    <td>'.$row['Fecha'].'</td>
                    <td>'.$row['Dirección'].'</td>
                    <td>'.$row['Categoria'].'</td>
                    <td>

                    <a href="eliminarTorneo.php?id='.$row['IdTorneo'].'">Eliminar</a>
                        
                    </td>
                    <td>
                    <a href="modificarTorneo.php?id='.$row['IdTorneo'].'">Editar</a>
                    </td>
                  </tr>';
             
        }
        echo '</table>';
        
    }


    public function getTorneo($id){

        try{
            $sql = "SELECT * FROM torneo WHERE IdTorneo = :id";
            $insert = $this->conexion->prepare($sql);
            $insert->bindParam(':id', $id, PDO::PARAM_INT);
            $arrData = array($insert);
            $resInsert = $insert->execute(); 
        }catch(PDOException $ex){
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            exit;
        }
        foreach ($insert as $row){
            echo '<form action="actualizarTorneo.php" method="GET">
            <input type="hidden" name="id" value="'.$row['IdTorneo'].'">
            <label >Nombre</label>
            <input type="text" name="nombre" value="'.$row['Nombre'].'">
            <label >Fecha</label>
            <input type="date" name="fecha" value="'.$row['Fecha'].'">
            <label >Direccion</label>
            <input type="text" name="direccion" value="'.$row['Dirección'].'">
            <label >Categoria</label>
            <select name="categoria">
                <option value="12/13" >12/13</option>
                <option value="12/13" >12/13</option>
                <option value="14/15" >14/15</option>
                <option value="16/17" >16/17</option>
                <option value="+18" >+18</option>
            </select>
            <input type="submit" name="Ingresar">
        </form>';
             
        }
        
    }

    public function setTorneo(string $idTorneo, string $nombre, string $fecha, string $direccion, string $categoria){

        $actualizar = "UPDATE torneo set Nombre=:nombre, Fecha=:fecha, Dirección=:direccion, Categoria=:categoria WHERE IdTorneo=:IdTorneo";

        $stmt = $this->conexion->prepare($actualizar);
        $stmt->bindParam(':IdTorneo', $idTorneo, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->execute();

    }

    public function selectDeTorneos(){

        try{
            $sql = "SELECT * FROM torneo";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($insert);
            $resInsert = $insert->execute(); 
        }catch(PDOException $ex){
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            exit;
        }
           
        foreach ($insert as $row){
            echo '
            <option value="'.$row['IdTorneo'].'">'.$row['Nombre'].' | '.$row['Fecha'].' | '.$row['Categoria'].'</option>';
             
        }
    }
    
}


?>