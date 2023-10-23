<?php
  class Login extends Conexion
  {
    private $conexion;

    public function __construct(){
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
  
    public function loguearse(string $user, string $pass)
    {
          try {
              $sql = "SELECT * FROM usuarios WHERE id = :user AND pass = :pass";
              $verificarUsuario = $this->conexion->prepare($sql);
              $verificarUsuario->bindParam(':user', $user, PDO::PARAM_STR);
              $verificarUsuario->bindParam(':pass', $pass, PDO::PARAM_STR);
              $verificarUsuario->execute();
  
              if ($verificarUsuario->rowCount() > 0) {
                  if ($user == 'administrador') {
                    session_start();
                    $_SESSION[$user] = $user;
                    header("location: paginas/menuAdministrador.php?user=".$user);
                  } else{
                    session_start();
                    $_SESSION[$user] = $user;
                    header("location: paginas/estadoJuez.php?user=".$user);
                  }
              } else {
                echo "Usuario o contraseña incorrectos";
              }
          } catch (PDOException $e) {
              echo "Error en la consulta: " . $e->getMessage();
          }
      }

      public function cerrarSesion(string $user){
        session_start();
        unset($_SESSION[$user]);
        header("location: ../index.php");
      }
  }

   
?>