<?php

class Nivel extends Validator
{
    //Se crean los atributos que necesitaremos para los metodos a utilizar (se crean los campos que estan en la base)
    private $id = null;
    private $nivel_estudiante = null;

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
        if ($this->validateString($value, 1, 50)) {
            $this->nivel_estudiante = $value;
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
        return $this->nivel_estudiante;
    }
    //Creación de los metodos a utilizar en nuestra programación

    //Metodo usado para buscar un registro en la tabla Niveles
    public function searchNivel($value)
    {
        $sql = 'SELECT id_nivel, nivel_estudiante
                FROM Niveles
                WHERE nivel_estudiante ILIKE ?
                ORDER BY nivel_estudiante';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    //Metodo usado para crear un nuevo registro en la tabla Niveles
    public function createNivel()
    {
        $sql = 'INSERT INTO Niveles(nivel_estudiante)
                VALUES(?)';
        $params = array($this->nivel_estudiante);
        return Database::executeRow($sql, $params);
    }

    //Metodo para mostrar todos los registros de la tabla Niveles
    public function readAllNivel()
    {
        $sql = 'SELECT id_nivel, nivel_estudiante
                FROM Niveles
                ORDER BY nivel_estudiante';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Metodo para motrar un registro seleccionado
    public function readOneNivel()
    {
        $sql = 'SELECT id_nivel, nivel_estudiante
                FROM Niveles
                WHERE id_nivel = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Metodo para actualizar un Nivel
    public function updateNivel()
    {
        $sql = 'UPDATE Niveles
                SET nivel_estudiante = ?
                WHERE id_nivel = ?';
        $params = array($this->nivel_estudiante, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar un Nivel
    public function deleteNivel()
    {
        $sql = 'DELETE FROM Niveles
                WHERE id_nivel = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
