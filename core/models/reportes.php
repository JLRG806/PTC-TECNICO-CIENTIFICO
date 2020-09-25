<?php
class Reportes extends Validator
{
    private $id = null;
    private $a = null;
    private $b = null;
    private $c = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setA($value)
    {
        if ($this->validateString($value, 1, 25)) {
            $this->a = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setB($value)
    {
        if ($this->validateString($value, 1, 50)) {
            $this->b = $value;
            return true;
        } else {
            return false;
        }
    }
    
    public function setC($value)
    {
        if ($this->validateString($value, 1, 100)) {
            $this->c = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function getC()
    {
        return $this->c;
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
}