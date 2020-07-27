<?php
class Usuarios extends Validator
{

    private $id = null;
    private $nombre = null;
    private $correo = null;
    private $password = null;
    private $estado = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateString($value, 1, 50)) {
            $this->nombre = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPassword($value)
    {
        if ($this->validatePassword($value)) {
            $this->password = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateString($value, 1, 50)){
            $this->estado = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getEstado(){
        return $this->estado;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function searchUsuario($value)
    {
        $sql = 'SELECT nombre_usuario, email_usuario, contrasena_usuario, estado_usuario
                FROM Usuarios
                WHERE nombre_usuario ILIKE ?
                ORDER BY id_usuario';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createUsuario()
    {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO Usuarios (nombre_usuario, email_usuario, contrasena_usuario, estado_usuario)
                VALUES(?, ?, ?, ?)';
        $params = array($this->nombre, $this->correo, $hash, $this->estado);
        return Database::executeRow($sql, $params);

    }

    public function readAllUsuarios()
    {
        $sql = 'SELECT nombre_usuario, email_usuario, estado_usuario
                FROM Usuarios
                ORDER BY id_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneUsuario()
    {
        $sql = 'SELECT nombre_usuario, email_usuario, estado_usuario
                FROM Usuarios 
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateUsuario()
    {
        $sql = 'UPDATE Usuarios
                SET nombre_usuario = ?, email_usuario = ?, estado_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->nombre, $this->correo, $this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteUsuario()
    {
        $sql = 'DELETE FROM Usuarios 
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
