<?php
class Usuarios extends Validator
{
    //Se crean los atributos que necesitaremos para los metodos a utilizar (se crean los campos que estan en la base)
    private $id = null;
    private $nombre = null;
    private $correo = null;
    private $password = null;
    private $estado = null;
    private $imagen_usuario = null;
    private $archivo = null;
    private $ruta = '../resources/img/fotos_usuario/';

    //Creando los SET de cada atributo establecidos

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
        } else {
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
        if ($this->validateString($value, 1, 50)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen_usuario($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen_usuario = $this->getImageName();
            $this->archivo = $file;
            return true;
        } else {
            return false;
        }
    }

    //Creando los GET de los atributos establecidos

    public function getEstado()
    {
        return $this->estado;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImagen_usuario()
    {
        return $this->imagen_usuario;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    //Creación de los metodos a utilizar en nuestra programación

    //Este metodo nos sirve para verificar que usuario esta logeado y que pueda visualizar sus datos en su pantalla
    public function checkUser($correo)
    {
        $sql = 'SELECT id_usuario , nombre_usuario, foto_usuario FROM usuarios WHERE email_usuario = ?';
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->nombre = $data['nombre_usuario'];
            $this->correo = $correo;
            $this->imagen_usuario = $data['foto_usuario'];
            return true;
        } else {
            return false;
        }
    }

    //Este metodo sirve para crear un nuevo registro si aun no hay ninguno en la base de datos
    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $estado = 'Activo';
        $foto = 'usuario.png';
        $sql = 'INSERT INTO usuarios(nombre_usuario, email_usuario, contrasena_usuario, estado_usuario, foto_usuario)
                VALUES(?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->correo, $hash, $estado, $foto);
        return Database::executeRow($sql, $params);
    }

    //Metodo utilizado para validar la contraseña al momento de logearse
    public function checkPassword($password)
    {
        $sql = 'SELECT contrasena_usuario FROM usuarios WHERE id_usuario = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['contrasena_usuario'])) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo utilizado para actualizar o cambiar la contraseña de un usuario
    public function changePassword()
    {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET contrasena_usuario = ? WHERE id_usuario = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo utilizado para editar perfil de un usuario
    public function editProfileUser()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen_usuario)) {
            $sql = 'UPDATE usuarios 
                    SET nombre_usuario = ?, email_usuario = ?, foto_usuario = ?
                    WHERE id_usuario = ?';
            $params = array($this->nombre, $this->correo, $this->imagen_usuario, $this->id);
        } else {
            $sql = 'UPDATE usuarios 
                    SET nombre_usuario = ?, email_usuario = ?
                    WHERE id_usuario = ?';
            $params = array($this->nombre, $this->correo, $this->id);
        }
        return Database::executeRow($sql, $params);
    }


    public function editProfile()
    {
        $sql = 'UPDATE usuarios
                SET nombre_usuario = ?, correo_usuario = ?, foto_usuario = ?
                WHERE id_usuario = ?';
        $params = array($this->nombres, $this->apellidos, $this->correo, $this->alias, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo usado para buscar un registro en la tabla Usuario
    public function searchUsuario($value)
    {
        $sql = 'SELECT id_usuario, nombre_usuario, email_usuario, contrasena_usuario, estado_usuario
                FROM Usuarios
                WHERE nombre_usuario ILIKE ?
                ORDER BY id_usuario';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo usado para crear un nuevo registro en la tabla Usuario
    public function createUsuario()
    {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen_usuario)) {
            $sql = 'INSERT INTO Usuarios (nombre_usuario, email_usuario, contrasena_usuario, estado_usuario, foto_usuario)
                    VALUES(?, ?, ?, ?, ?)';
            $params = array($this->nombre, $this->correo, $hash, $this->estado, $this->imagen_usuario);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    //Metodo para mostrar todos los registros de la tabla Usuario
    public function readAllUsuarios()
    {
        $sql = 'SELECT id_usuario, nombre_usuario, email_usuario, estado_usuario, foto_usuario
                FROM usuarios
                ORDER BY id_usuario';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para motrar un registro seleccionado
    public function readOneUsuario()
    {
        $sql = 'SELECT id_usuario, nombre_usuario, email_usuario, estado_usuario, foto_usuario
                FROM Usuarios 
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar un usuario
    public function updateUsuario()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen_usuario)) {
            $sql = 'UPDATE Usuarios 
                     SET nombre_usuario = ?, email_usuario = ?, estado_usuario = ?, foto_usuario = ?
                    WHERE id_usuario = ?';
            $params = array($this->nombre, $this->correo, $this->estado, $this->imagen_usuario, $this->id);
        } else {
            $sql = 'UPDATE Usuarios
                SET nombre_usuario = ?, email_usuario = ?, estado_usuario = ?
                WHERE id_usuario = ?';
            $params = array($this->nombre, $this->correo, $this->estado, $this->id);
        }
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar un usuario
    public function deleteUsuario()
    {
        $sql = 'DELETE FROM Usuarios 
                WHERE id_usuario = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
