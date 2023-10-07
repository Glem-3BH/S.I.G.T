<?php

class Conexion {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "sigt";
    private $conect;

    public function __construct(){
        $connectionString = "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8";

        try{
            $this->conect = new PDO($connectionString,$this->user,$this->password);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<center><p style='color: green; display: inline-block; position: absolute; z-index: 1;'>Conexión estable</p></center>";
        }catch(Exception $e){
            $this->conect = 'Error de conexión';
            echo "ERROR: ".$e->getMessage();
        }
    }

    public function connect(){
        return $this->conect;
    }
}

?>