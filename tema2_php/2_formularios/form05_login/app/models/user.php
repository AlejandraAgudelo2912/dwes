<?php

//Si quiero poder convertir a json el objeto con json_encode puedo:
//- hacer atributos publicos. Sencillo, pero no profesional
//- si los atributos son privados, debo implementar la interfaz JsonSerializable

class User implements JsonSerializable
{
    private $nombre;
    private $email;
    private $password; //guardaré un hash

    public function __construct($nombre, $email, $password)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        //Almacenamos el hash de la contraseña
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->password;
    }

    //setters
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public static function fromStdClass($obj) {
        $user = new User($obj->nombre, $obj->email, $obj->password);
        //$user->setPassword($obj->password);
        return $user;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'nombre' => $this->nombre,
            'email' => $this->email,
            'password' => $this->password
        ];
    }

    
}

