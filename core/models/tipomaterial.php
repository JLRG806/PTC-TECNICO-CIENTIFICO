<?php
class Tipomaterial extends Validator
{
    private $id = null;
    private $tipo_material = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipo_Material($value)
    {
        if ($this->validateAlphanumeric($value, 1, 25)) {
            $this->tipo_material = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTipo_Material()
    {
        return $this->tipo_material;
    }

    public function searchTipo_Material($value)
    {
        $sql = 'SELECT id_tipo_equipo, tipo_equipo
                FROM Tipo_equipo
                WHERE tipo_equipo ILIKE ?
                ORDER BY id_tipo_equipo';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createTipo_Material()
    {
        $sql = 'INSERT INTO Tipo_equipo (tipo_equipo)
                VALUES(?)';
        $params = array($this->tipo_material);
        return Database::executeRow($sql, $params);
    }

    public function readAllTipo_Material()
    {
        $sql = 'SELECT id_tipo_equipo, tipo_equipo
                FROM Tipo_equipo
                ORDER BY id_tipo_equipo';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneTipo_Material()
    {
        $sql = 'SELECT id_tipo_equipo, tipo_equipo
                FROM Tipo_equipo
                WHERE id_tipo_equipo = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateTipo_Material()
    {
        $sql = 'UPDATE Tipo_equipo
                SET tipo_equipo = ?
                WHERE id_tipo_equipo = ?';
        $params = array($this->tipo_material, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteTipo_Material()
    {
        $sql = 'DELETE FROM Tipo_equipo
                WHERE id_tipo_equipo = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}