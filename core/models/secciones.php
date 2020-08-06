<?php
class Secciones extends Validator
{
    private $id = null;
    private $nivel = null;
    private $seccion_estudiante = null;

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

    public function searchSeccion($value)
    {
        $sql = 'SELECT id_seccion, seccion_estudiante, nivel_estudiante
                FROM Secciones INNER JOIN Niveles USING (id_nivel)
                WHERE seccion_estudiante ILIKE ?
                ORDER BY seccion_estudiante';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createSeccion()
    {
        $sql = 'INSERT INTO Secciones (seccion_estudiante, id_nivel)
                VALUES(?, ?)';
        $params = array($this->seccion_estudiante, $this->nivel);
        return Database::executeRow($sql, $params);
    }

    public function readAllSeccion()
    {
        $sql = 'SELECT id_seccion, seccion_estudiante, nivel_estudiante
                FROM Secciones INNER JOIN Niveles USING (id_nivel)
                ORDER BY seccion_estudiante';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readNivel()
    {
        $sql = 'SELECT id_seccion, seccion_estudiante
                FROM Secciones INNER JOIN Niveles USING (id_nivel)
                WHERE id_nivel = ?';
        $params = array($this->nivel);
        return Database::getRow($sql, $params);
    }

    public function readOneSeccion()
    {
        $sql = 'SELECT id_seccion, seccion_estudiante, nivel_estudiante
                FROM Secciones INNER JOIN Niveles USING (id_nivel)
                WHERE id_seccion = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateSeccion()
    {
        $sql = 'UPDATE Secciones 
                SET seccion_estudiante = ?, id_nivel = ?
                WHERE id_seccion = ?';
        $params = array($this->seccion_estudiante, $this->nivel, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteSeccion()
    {
        $sql = 'DELETE FROM Secciones 
                WHERE id_seccion = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}