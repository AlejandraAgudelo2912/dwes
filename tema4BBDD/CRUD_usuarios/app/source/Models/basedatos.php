<?php

require_once __DIR__."/../config.php";
require_once __DIR__."/usuario.php";

class BaseDatos {
    private static $instancia;
    private $conexionPDO;
    private string $dbMotor;
    private string $Host;
    private string $database;
    private string $username;
    private string $Password;


    private function __construct() {

        global $dbMotor;
        global $mysqlHost;
        global $mysqlUser;
        global $mysqlPassword;
        global $mysqlDatabase;

       
        $this->dbMotor = $dbMotor;
        $this->Host = $mysqlHost;
        $this->database = $mysqlDatabase;
        $this->username = $mysqlUser;
        $this->Password = $mysqlPassword;

        $dsn = "$this->dbMotor:host=$this->Host;dbname=$this->database;charset=utf8mb4";
        $dsn_sinbbdd = "$this->dbMotor:host=$this->Host;charset=utf8mb4";

        try{
            $this->conexionPDO = new PDO($dsn, $this->username, $this->Password);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            $this->conexionPDO = null;
            //die("Error de conexión a la base de datos: " . $e->getMessage());
        }

    }

    public static function getInstance() {
        if (!self::$instancia) {
            self::$instancia = new Self();
        }
        return self::$instancia;
   
    }

    public function getConnection() {
        return $this->conexionPDO;
    }

    private function __clone() {}

    public function get_data($sql, $parametros = []) {
         
        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia->execute($parametros);
            return $sentencia;

        }catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
            die;
        }

    }

     public function crear_usuario(Usuario $_usuario){

        $sql = "INSERT INTO usuarios (nombre, apellidos, usuario, password, fecha_nac) 
             VALUES (:nombre, :apellidos, :usuario, :password, :fecha_nac)";

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":nombre",$_usuario->nombre);
            $sentencia -> bindParam(":apellidos",$_usuario->apellidos);
            $sentencia -> bindParam(":usuario",$_usuario->usuario);
            $sentencia -> bindParam(":password",$_usuario->password);
            $sentencia -> bindParam(":fecha_nac",$_usuario->fecha_nac->format("Y-m-d"));
            $sentencia -> execute();
            return true;

        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
            
        }

    }

    public function borrar_usuario(int $_id){

        $sql = "DELETE FROM usuarios WHERE id = :id";

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id",$_id);
            $sentencia -> execute();
            return true;

        }
        catch(PDOException $e){
            echo $e->getMessage();
            die;
        }

    }

    public function actualizar_usuario(Usuario $_usuario){

        $sql = "UPDATE usuarios 
                SET nombre = :nombre, apellidos = :apellidos, usuario = :usuario, password = :password, fecha_nac = :fecha_nac
                WHERE id = :id";

        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":nombre",$_usuario->nombre);
            $sentencia -> bindParam(":apellidos",$_usuario->apellidos);
            $sentencia -> bindParam(":usuario",$_usuario->usuario);
            $sentencia -> bindParam(":password",$_usuario->password);
            $sentencia -> bindParam(":fecha_nac",$_usuario->fecha_nac->format("Y-m-d"));
            $sentencia -> bindParam(":id",$_usuario->id);
            $sentencia -> execute();
            return true;

        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
            
        }

    }


}
