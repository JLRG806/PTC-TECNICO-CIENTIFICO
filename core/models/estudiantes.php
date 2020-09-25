<?php

class Estudiantes extends Validator
{
    private $id = null;
    private $nombre_estudiante = null;
    private $apellidos_estudiante = null;
    private $email_estudiante = null;
    private $codigo_estudiante = null;
    private $seccion = null;
    private $especialidad = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre_estudiante($value)
    {
        if ($this->validateAlphabetic($value, 1, 80)) {
            $this->nombre_estudiante = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellidos_estudiante($value)
    {
        if ($this->validateAlphabetic($value, 1, 80)) {
            $this->apellidos_estudiante = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEmail_estudiante($value)
    {
        if ($this->validateStudentEmail($value)) {
            $this->email_estudiante = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCodigo_estudiante($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->email_estudiante = $value;
            return true;
        } else {
            return false;
        }
    }
    
    public function setSeccion($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->seccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEspecialidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->especialidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre_estudiante()
    {
        return $this->nombre_estudiante;
    }

    public function getApellidos_estudiante()
    {
        return $this->apellidos_estudiante;
    }

    public function getEmail_estudiante()
    {
        return $this->email_estudiante;
    }

    public function getCodigo_estudiante()
    {
        return $this->codigo_estudiante;
    }


    public function getEstudiante()
    {
        return $this->seccion;
    }

    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    public function searchEstudiante($value)
    {
        $sql = 'SELECT id_estudiante, nombre_estudiante, apellidos_estudiante, email_estudiante, s.seccion_estudiante, n.nivel_estudiante, especialidad_estudiante
                FROM Estudiantes e INNER JOIN Especialidad USING (id_especialidad)
				INNER JOIN Secciones s ON e.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                WHERE nombre_estudiante ILIKE ? or apellidos_estudiante ILIKE ? or email_estudiante ILIKE ?
                ORDER BY apellidos_estudiante';
        $params = array("%$value%", "%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createEstudiante()
    {
        $sql = 'INSERT INTO Estudiantes (nombre_estudiante, apellidos_estudiante, email_estudiante, id_seccion, id_especialidad)
                VALUES(?, ?, ?, ?, ?)';
        $params = array($this->nombre_estudiante, $this->apellidos_estudiante, $this->email_estudiante, $this->seccion, $this->especialidad);
        return Database::executeRow($sql, $params);
    }

    public function readAllEstudiante()
    {
        $sql = 'SELECT id_estudiante, nombre_estudiante, apellidos_estudiante, email_estudiante, s.seccion_estudiante as "seccion", n.nivel_estudiante as "nivel", especialidad_estudiante
                FROM Estudiantes e INNER JOIN Especialidad USING (id_especialidad)
                INNER JOIN Secciones s ON e.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel                
                ORDER BY apellidos_estudiante';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneEstudiante()
    {
        $sql = 'SELECT id_estudiante, nombre_estudiante, apellidos_estudiante, email_estudiante, s.seccion_estudiante as "seccion" , n.nivel_estudiante, especialidad_estudiante
                FROM Estudiantes e INNER JOIN Especialidad USING (id_especialidad)
                INNER JOIN Secciones s ON e.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel                
                WHERE id_estudiante = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readEstudiantesProyecto()
    {
        $sql = 'SELECT id_estudiante, nombre_estudiante, apellidos_estudiante, email_estudiante, puesto_estudiante
                FROM detalle_proyecto d INNER JOIN Estudiantes USING (id_estudiante)
                where id_proyecto = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function updateEstudiante()
    {
        $sql = 'UPDATE Estudiantes 
                SET nombre_estudiante = ?, apellidos_estudiante = ?, email_estudiante = ?, id_seccion = ?, id_especialidad = ?
                WHERE id_estudiante = ?';
        $params = array($this->nombre_estudiante, $this->apellidos_estudiante, $this->email_estudiante, $this->seccion, $this->especialidad, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteEstudiante()
    {
        $sql = 'DELETE FROM Estudiantes 
                WHERE id_estudiante = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
    
}