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

    public function checkUser($correo)
    {
        $sql = 'SELECT id_usuario FROM usuarios WHERE email_usuario = ?';
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->correo = $correo;
            return true;
        } else {
            return false;
        }
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $estado = 'Activo';
        $sql = 'INSERT INTO usuarios(nombre_usuario, email_usuario, contrasena_usuario,estado_usuario)
                VALUES(?, ?, ?, ?, ?)';
        $params = array($this->nombres, $this->correo, $hash, $estado);
        return Database::executeRow($sql, $params);
    }

    public function checkPassword($password)
    {
        $sql = 'SELECT contrasena_usuario FROM usuarios WHERE id_usuario = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave_usuario'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET contrasena_usuario = ? WHERE id_usuario = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE usuarios
                SET nombres_usuario = ?, apellidos_usuario = ?, correo_usuario = ?, alias_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function searchUsuario($value)
    {
        $sql = 'SELECT id_usuario, nombre_usuario, email_usuario, contrasena_usuario, estado_usuario
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
        $sql = 'SELECT id_usuario, nombre_usuario, email_usuario, estado_usuario
                FROM Usuarios
                ORDER BY id_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneUsuario()
    {
        $sql = 'SELECT id_usuario, nombre_usuario, email_usuario, estado_usuario
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
