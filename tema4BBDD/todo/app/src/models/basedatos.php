<?php 
namespace App\models;
require __DIR__ . '/../../vendor/autoload.php';

use PDO;
use PDOException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PDOStatement;


class Basedatos
{
    private PDO|null $conexionPDO;
    private Logger $log;
    private bool $conectado;

    public function __construct()
    {
        $this->log = new Logger('app');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../../app.log'));
 
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
            $this->conectado = true;
        }
        catch (PDOException $e){
            $this->conexionPDO = null;
            $this->conectado = false;
            $this->log->error("Fallo en el CONSTRUCTOR creando el objeto PDO");
            $this->log->error($e->getMessage(),['archivo:'=>'basedatos.php']);
        }
            
    }//fin constructor

    public function estaConectado(){
        return $this->conectado;
    }

    public function get_data(string $sql, array $parametros = []): PDOStatement | null{
        try {

            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia->execute($parametros);
            return $sentencia;

        } catch (PDOException $e) {
            $this->log->error("Error en get_data");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return null;
        }
        
    }

    public function crear_tarea(Tarea $tarea){
        $sql = "INSERT INTO tareas (descripcion, fecha_creacion, completada) VALUES (:descripcion, NOW(), 0)";
        $descripcion = $tarea->getDescripcion();
        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia->bindParam(':descripcion', $descripcion);
            $sentencia->execute();
            return true;
        }
        catch (PDOException $e){
            $this->log->error("Error en crear_tarea");
            $this->log->error($e->getMessage(), ['archivo:' => 'basedatos.php']);
            return false;
        }
    }

    public function borrar_tarea(int $_id){
        $sql = "DELETE FROM tareas WHERE id = :id";
        $id=$_id;

        try{
            $sentencia=$this->conexionPDO->prepare($sql);
            $sentencia->bindParam(":id", $id);
            $sentencia->execute();
            return true;
        }catch(PDOException $e){
            $this->log->error("Error en borrar: ");
            $this->log->error($e->getMessage(), ['archivo:'=>'basedatos.php']);
            return false;
        }
    }

    public function completar_tarea(int $_id){
        $sql = "UPDATE tareas SET completada = TRUE WHERE id = :id";
        $id=$_id;

        try{
            $sentencia=$this->conexionPDO->prepare($sql);
            $sentencia->bindParam(":id", $id);
            $sentencia->execute();
            return true;
        }catch(PDOException $e){
            $this->log->error("Error en actualizar: ");
            $this->log->error($e->getMessage(), ['archivo:'=>'basedatos.php']);
            return false;
        }
    }
    
}
