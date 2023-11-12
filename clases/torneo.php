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
        echo '<tr><th>ID</th><th>Nombre</th><th>Fecha</th><th>Dirección</th><th>Categoria</th><th>Genero</th><th colspan="2">Acciones</th></tr>';
        foreach ($insert as $row){

            echo '<tr>
                    <td>'.$row['IdTorneo'].'</td>
                    <td>'.$row['Nombre'].'</td>
                    <td>'.$row['Fecha'].'</td>
                    <td>'.$row['Dirección'].'</td>
                    <td>'.$row['Categoria'].'</td>
                    <td>'.$row['Sexo'].'</td>
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
            <input type="hidden" name="id" value="'.$row['IdTorneo'].'" required>
            <label >Nombre</label>
            <input type="text" name="nombre" value="'.$row['Nombre'].'" required>
            <label >Fecha</label>
            <input type="date" name="fecha" value="'.$row['Fecha'].'" required>
            <label >Direccion</label>
            <input type="text" name="direccion" value="'.$row['Dirección'].'" required>
            <label >Categoria</label>
            <select name="categoria" required>
                <option value="12/13" >12/13</option>
                <option value="12/13" >12/13</option>
                <option value="14/15" >14/15</option>
                <option value="16/17" >16/17</option>
                <option value="+18" >+18</option>
            </select>
            <div class="radio">
                <input type="radio" id="F" name="sexo" value="F">
                <label for="F">Femenino</label>
                <input type="radio" id="M" name="sexo" value="M" checked>
                <label for="M" >Masculino</label> 
            </div>
            <input type="submit" name="Ingresar">
        </form>';
             
        }
        
    }

    public function setTorneo(string $idTorneo, string $nombre, string $fecha, string $direccion, string $categoria, string $sexo){

        $actualizar = "UPDATE torneo set Nombre=:nombre, Fecha=:fecha, Dirección=:direccion, Categoria=:categoria, Sexo=:sexo WHERE IdTorneo=:IdTorneo";

        $stmt = $this->conexion->prepare($actualizar);
        $stmt->bindParam(':IdTorneo', $idTorneo, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->bindParam(':sexo', $sexo, PDO::PARAM_STR);
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
            <option value="'.$row['IdTorneo'].'">'.$row['Nombre'].' | '.$row['Fecha'].' | '.$row['Sexo'].' | '.$row['Categoria'].'</option>';
             
        }
    }

    public function listarKatas(){

        try{
            $sql = "SELECT * FROM kata";
            $insert = $this->conexion->prepare($sql);
            $arrData = array($insert);
            $resInsert = $insert->execute(); 
        }catch(PDOException $ex){
            echo "Ocurrio un error<br>";
            echo $ex->getMessage();
            exit;
        }
        echo '<div class="tanteador">
                  <table border="1">
                  <caption>LISTA KATA</caption>';
            echo '<thead><tr><th>ID</th><th>Nombre</th></tr></thead>';
            echo '<tbody>';
            foreach ($insert as $row){
                echo '<tr>
                        <td>'.$row['IdKata'].'</td>
                        <td>'.$row['Nombre'].'</td>
                      </tr>';
                 
            }
            echo '</tbody>
                </table>
                </div>';
            
    }


    public function competidorCalificando(){
        try {
            $sql = "SELECT IdTorneo FROM competidor WHERE Estado = 'calificando' LIMIT 1";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            
            
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
            
            if ($resultado) {
                return $resultado['IdTorneo'];
            } else {
                return null; 
            }
        } catch(PDOException $ex) {
            echo "Ocurrió un error<br>";
            echo $ex->getMessage();
            return null; 
        }
    }
    
}

   

?>