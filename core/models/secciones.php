<?php
class Secciones extends Validator
{
    //Se crean los atributos que necesitaremos para los metodos a utilizar (se crean los campos que estan en la base)
    private $id = null;
    private $nivel = null;
    private $seccion_estudiante = null;

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

    public function setNivel($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->nivel = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setSeccion_estudiante($value)
    {
        if ($this->validateString($value, 1, 4)) {
            $this->seccion_estudiante = $value;
            return true;
        } else {
            return false;
        }
    }

    //Creando los GET de los atributos establecidos
    public function getId()
    {
        return $this->id;
    }

    public function getNivel()
    {
        return $this->nivel;
    }

    public function getSeccion_estudiante()
    {
        return $this->seccion_estudiante;
    }

    //Creación de los metodos a utilizar en nuestra programación

    //Metodo usado para buscar un registro en la tabla Secciones
    public function searchSeccion($value)
    {
        $sql = 'SELECT id_seccion, seccion_estudiante, nivel_estudiante
                FROM Secciones INNER JOIN Niveles USING (id_nivel)
                WHERE seccion_estudiante ILIKE ?
                ORDER BY seccion_estudiante';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo usado para crear un nuevo registro en la tabla Secciones
    public function createSeccion()
    {
        $sql = 'INSERT INTO Secciones (seccion_estudiante, id_nivel)
                VALUES(?, ?)';
        $params = array($this->seccion_estudiante, $this->nivel);
        return Database::executeRow($sql, $params);
    }

    //Metodo para mostrar todos los registros de la tabla Secciones
    public function readAllSeccion()
    {
        $sql = 'SELECT id_seccion, seccion_estudiante, nivel_estudiante
                FROM Secciones INNER JOIN Niveles USING (id_nivel)
                ORDER BY seccion_estudiante';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para motrar un registro seleccionado
    public function readOneSeccion()
    {
        $sql = 'SELECT id_seccion, seccion_estudiante, nivel_estudiante
                FROM Secciones INNER JOIN Niveles USING (id_nivel)
                WHERE id_seccion = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readOneSeccionxNivel()
    {
        $sql = 'SELECT id_seccion, seccion_estudiante
                FROM Secciones INNER JOIN Niveles USING (id_nivel)
                WHERE id_nivel = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar una Seccion
    public function updateSeccion()
    {
        $sql = 'UPDATE Secciones 
                SET seccion_estudiante = ?, id_nivel = ?
                WHERE id_seccion = ?';
        $params = array($this->seccion_estudiante, $this->nivel, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar una seccion
    public function deleteSeccion()
    {
        $sql = 'DELETE FROM Secciones 
                WHERE id_seccion = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}