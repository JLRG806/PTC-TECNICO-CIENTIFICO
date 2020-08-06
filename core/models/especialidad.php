<?php
class Especialidades extends Validator
{
    private $id = null;
    private $especialidad_estudiante = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEspecialidad_estudiante($value)
    {
        if ($this->validateAlphanumeric($value, 1, 25)) {
            $this->especialidad_estudiante = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEspecialidad_estudiante()
    {
        return $this->especialidad_estudiante;
    }

    public function searchEspecialidad($value)
    {
        $sql = 'SELECT id_especialidad, especialidad_estudiante
                FROM Especialidad
                WHERE especialidad_estudiante ILIKE ?
                ORDER BY especialidad_estudiante';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createEspecialidad()
    {
        $sql = 'INSERT INTO Especialidad (especialidad_estudiante)
                VALUES(?)';
        $params = array($this->especialidad_estudiante);
        return Database::executeRow($sql, $params);
    }

    public function readAllEspecialidad()
    {
        $sql = 'SELECT id_especialidad, especialidad_estudiante
                FROM Especialidad
                ORDER BY especialidad_estudiante';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneEspecialidad()
    {
        $sql = 'SELECT id_especialidad, especialidad_estudiante
                FROM Especialidad
                WHERE id_especialidad = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateEspecialidad()
    {
        $sql = 'UPDATE Especialidad
                SET especialidad_estudiante = ?
                WHERE id_especialidad = ?';
        $params = array($this->especialidad_estudiante, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteEspecialidad()
    {
        $sql = 'DELETE FROM Especialidad
                WHERE id_especialidad = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}