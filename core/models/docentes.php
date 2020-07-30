<?php
class Docente extends Validator
{
    private $id = null;
    private $nombre_docente = null;
    private $email_docente = null;
    private $edad_docente = null;
    private $telefono_docente = null;
    private $dui_docente = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre_docente($value)
    {
        if ($this->validateAlphabetic($value, 1, 80)) {
            $this->nombre_docente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmail_docente($value)
    {
        if ($this->validateEmail($value)) {
            $this->email_docente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEdad_docente($value)
    {
        if ($this->validateAge($value)) {
            $this->edad_docente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono_docente($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono_docente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDui_docente($value)
    {
        if ($this->validateDui($value)) {
            $this->dui_docente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre_docente()
    {
        return $this->nombre_docente;
    }

    public function getEmail_docente()
    {
        return $this->email_docente;
    }

    public function getEdad_docente()
    {
        return $this->edad_docente;
    }

    public function getTelefono_docente()
    {
        return $this->telefono_docente;
    }

    public function getDui_docente()
    {
        return $this->dui_docente;
    }

    public function searchDocente($value)
    {
        $sql = 'SELECT id_docente, nombre_docente, email_docente, edad_docente, telefono_docente, dui_docente
                FROM Docentes
                WHERE nombre_docente ILIKE ?
                ORDER BY nombre_docente';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createDocente()
    {
        $sql = 'INSERT INTO Docentes (nombre_docente, email_docente, edad_docente, telefono_docente, dui_docente)
                VALUES(?, ?, ?, ?, ?)';
        $params = array($this->nombre_docente, $this->email_docente, $this->edad_docente, $this->telefono_docente, $this->dui_docente);
        return Database::executeRow($sql, $params);
    }

    public function readAllDocente()
    {
        $sql = 'SELECT id_docente, nombre_docente, email_docente, edad_docente, telefono_docente, dui_docente
                FROM Docentes
                ORDER BY nombre_docente';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneDocente()
    {
        $sql = 'SELECT id_docente, nombre_docente, email_docente, edad_docente, telefono_docente, dui_docente
                FROM Docentes
                WHERE id_docente = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateDocente()
    {
        $sql = 'UPDATE Docentes 
                SET nombre_docente = ?, email_docente = ?, edad_docente = ?, telefono_docente = ?, dui_docente = ?
                WHERE id_docente = ?';
        $params = array($this->nombre_docente, $this->email_docente, $this->edad_docente, $this->telefono_docente, $this->dui_docente, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteDocente()
    {
        $sql = 'DELETE FROM Docentes 
                WHERE id_docente = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}