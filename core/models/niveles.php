<?php
class Niveles extends Validator
{
    private $id = null;
    private $nivel_estudiante = null;

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
        if ($this->validateNivel($value)) {
            $this->nivel_estudiante = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNivel()
    {
        return $this->nivel_estudiante;
    }

    public function searchNivel($value)
    {
        $sql = 'SELECT id_nivel, nivel_estudiante
                FROM Niveles
                WHERE nivel_estudiante ILIKE ?
                ORDER BY nivel_estudiante';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createNivel()
    {
        $sql = 'INSERT INTO Niveles (nivel_estudiante)
                VALUES(?)';
        $params = array($this->nivel_estudiante);
        return Database::executeRow($sql, $params);
    }

    public function readAllNivel()
    {
        $sql = 'SELECT id_nivel, nivel_estudiante
                FROM Niveles
                ORDER BY nivel_estudiante';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneNivel()
    {
        $sql = 'SELECT id_nivel, nivel_estudiante
                FROM Niveles
                WHERE id_nivel = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateNivel()
    {
        $sql = 'UPDATE Niveles
                SET nivel_estudiante = ?
                WHERE id_nivel = ?';
        $params = array($this->nivel_estudiante, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteNivel()
    {
        $sql = 'DELETE FROM Niveles
                WHERE id_nivel = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
