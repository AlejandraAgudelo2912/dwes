<?php 
namespace App\models;
require __DIR__ . '/../../vendor/autoload.php';

use PDO;
use PDOException;
use PDOStatement;


class Basedatos
{
    private PDO|null $conexionPDO;

    public function __construct()
    {
        $configPath = __DIR__ . '/../config.json';
        $config = json_decode(file_get_contents($configPath), true);

        $dbmotor = $config["dbMotor"];
        $host = $config["mysqlHost"];
        $user = $config["mysqlUser"];
        $password = $config["mysqlPassword"];
        $database = $config["mysqlDatabase"];

        $dsn = "$dbmotor:host=$host;dbname=$database;charset=utf8mb4";

        try{
            $this->conexionPDO = new PDO($dsn, $user, $password);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e){
            $this->conexionPDO = null;
        }
            
    }

    public function estaConectado() : bool {
        if($this->conexionPDO==null){
            return false;
        }else{
            return true;
        }
        
    }

    public function get_data(string $sql, array $parametros = []): PDOStatement | null{
        try {

            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia->execute($parametros);
            return $sentencia;

        } catch (PDOException $e) {
            return null;
        }
        
    }

    /**    
     * public function crear_tarea(Tarea $tarea){
    *   $sql = "INSERT INTO tareas (descripcion, fecha_creacion, completada) VALUES (:descripcion, NOW(), 0)";
    *     $descripcion = $tarea->getDescripcion();
      *   try{
        *     $sentencia = $this->conexionPDO->prepare($sql);
          * *   $sentencia->bindParam(':descripcion', $descripcion);
           *  $sentencia->execute();
            * return true;
        * }
        * catch (PDOException $e){
          *   return false;
        * }
    * }

    * public function borrar_tarea(int $_id){
      *   $sql = "DELETE FROM tareas WHERE id = :id";
        * $id=$_id;

        * try{
          *   $sentencia=$this->conexionPDO->prepare($sql);
            * $sentencia->bindParam(":id", $id);
            * $sentencia->execute();
            * return true;
        * }catch(PDOException $e){
          *   return false;
        * }
    * } 
    */
    
}
