<?php
class Evaluadores extends Validator
{
    private $id = null;
    private $nombre_evaluador = null;
    private $apellidos_evaluador = null;
    private $email_evaluador = null;
    private $telefono_evaluador = null;
    private $lugar_procedencia = null;
    private $ocupacion = null;
    private $estado_evaluador = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre_evaluador($value)
    {
        if ($this->validateAlphabetic($value, 1, 40)) {
            $this->nombre_evaluador = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos_evaluador($value)
    {
        if ($this->validateAlphabetic($value, 1, 40)) {
            $this->apellidos_evaluador = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmail_evaluador($value)
    {
        if ($this->validateEmail($value)) {
            $this->email_evaluador = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono_evaluador($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono_evaluador = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setLugar_procedencia($value)
    {
        if ($this->validateString($value, 1, 40)) {
            $this->lugar_procedencia = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setOcupacion($value)
    {
        if ($this->validateString($value, 1, 30)) {
            $this->ocupacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado_evaluador($value)
    {
        if ($this->validateAlphabetic($value, 8, 20)) {
            $this->estado_evaluador = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre_evaluador()
    {
        return $this->nombre_evaluador;
    }

    public function getApellidos_evaluador()
    {
        return $this->apellidos_evaluador;
    }

    public function getEmail_evaluador()
    {
        return $this->email_evaluador;
    }

    public function getTelefono_evaluador()
    {
        return $this->telefono_evaluador;
    }

    public function getLugar_procedencia()
    {
        return $this->lugar_procedencia;
    }

    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    public function getEstado_evaluador()
    {
        return $this->estado_evaluador;
    }

    public function searchEvaluador($value)
    {
        $sql = 'SELECT id_evaluador, nombre_evaluador, apellidos_evaluador, email_evaluador, telefono_evaluador, lugar_procedencia, ocupacion, estado_evaluador
                FROM Evaluadores
                WHERE nombre_evaluador ILIKE ? or apellidos_evaluador ILIKE ? or email_evaluador ILIKE ? 
                ORDER BY id_evaluador';
        $params = array("%$value%", "%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createEvaluador()
    {
        $sql = 'INSERT INTO Evaluadores (nombre_evaluador, apellidos_evaluador, email_evaluador, telefono_evaluador, lugar_procedencia, ocupacion, estado_evaluador)
                VALUES(?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre_evaluador, $this->apellidos_evaluador, $this->email_evaluador, $this->telefono_evaluador, $this->lugar_procedencia, $this->ocupacion, $this->estado_evaluador);
        return Database::executeRow($sql, $params);
    }

    public function readAllEvaluador()
    {
        $sql = 'SELECT id_evaluador, nombre_evaluador, apellidos_evaluador, email_evaluador, telefono_evaluador, lugar_procedencia, ocupacion, estado_evaluador
                FROM Evaluadores
                ORDER BY estado_evaluador';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneEvaluador()
    {
        $sql = 'SELECT id_evaluador, nombre_evaluador, apellidos_evaluador, email_evaluador, telefono_evaluador, lugar_procedencia, ocupacion, estado_evaluador
                FROM Evaluadores
                WHERE id_evaluador = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateEvaluador()
    {
        $sql = 'UPDATE Evaluadores 
                SET nombre_evaluador = ?, apellidos_evaluador = ?, email_evaluador = ?, telefono_evaluador = ?, lugar_procedencia = ?, ocupacion = ?, estado_evaluador = ?
                WHERE id_evaluador = ?';
        $params = array($this->nombre_evaluador, $this->apellidos_evaluador, $this->email_evaluador, $this->telefono_evaluador, $this->lugar_procedencia, $this->ocupacion, $this->estado_evaluador, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteEvaluador()
    {
        $sql = 'DELETE FROM Evaluadores 
                WHERE id_evaluador = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

}