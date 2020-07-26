<?php
class Grados extends Validator
{
    private $id = null;
    private $aula = null;
    private $docente = null;
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

    public function setAul($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->aula = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDocente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->docente = $value;
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

    public function getAul()
    {
        return $this->aula;
    }

    public function getDocente()
    {
        return $this->docente;
    }

    public function getSeccion()
    {
        return $this->seccion;
    }

    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    public function searchGrado($value)
    {
        $sql = 'SELECT g.id_grado, nombre_aula, nombre_docente, s.seccion_estudiante, n.nivel_estudiante, especialidad_estudiante
                FROM Grados g INNER JOIN Aulas USING (id_aula) INNER JOIN Docentes USING (id_docente)
                INNER JOIN Secciones s ON g.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                INNER JOIN Especialidad USING (id_especialidad)
                WHERE nombre_aula ILIKE ? or nombre_docente ILIKE ? or seccion_estudiante ILIKE ? or nivel_estudiante ILIKE ? or especialidad_estudiante ILIKE ?    
                ORDER BY nombre_aula';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createGrado()
    {
        $sql = 'INSERT INTO Grados (id_aula, id_docente, id_seccion, id_especialidad)				
                values (?, ?, ?, ?)';
        $params = array($this->aula, $this->docente, $this->seccion, $this->especialidad);
        return Database::executeRow($sql, $params);
    }

    public function readAllGrado()
    {
        $sql = 'SELECT g.id_grado, nombre_aula, nombre_docente, s.seccion_estudiante, n.nivel_estudiante, especialidad_estudiante
                FROM Grados g INNER JOIN Aulas USING (id_aula) INNER JOIN Docentes USING (id_docente)
                INNER JOIN Secciones s ON g.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                INNER JOIN Especialidad USING (id_especialidad)
                ORDER BY nombre_aula';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneGrado()
    {
        $sql = 'SELECT g.id_grado, nombre_aula, nombre_docente, s.seccion_estudiante, n.nivel_estudiante, especialidad_estudiante
                FROM Grados g INNER JOIN Aulas USING (id_aula) INNER JOIN Docentes USING (id_docente)
                INNER JOIN Secciones s ON g.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                INNER JOIN Especialidad USING (id_especialidad)
                WHERE id_grado = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateGrado()
    {
        $sql = 'UPDATE Grados 
                SET id_aula = ?, id_docente = ?, id_seccion = ?, id_especialidad = ?
                WHERE id_grado = ?';
        $params = array($this->aula, $this->docente, $this->seccion, $this->especialidad, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteGrado()
    {
        $sql = 'DELETE FROM Grados 
                WHERE id_grado = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}