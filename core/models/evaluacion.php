<?php
class Evaluacion extends Validator
{
    private $id = null;
    private $grado = null;
    private $evaluador = null;
    private $observaciones = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setGrado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->grado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEvaluador($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->evaluador = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setObservaciones($value)
    {
        if ($this->validateString($value, 1, 200)) {
            $this->observaciones = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getGrado()
    {
        return $this->grado;
    }

    public function getEvaluador()
    {
        return $this->evaluador;
    }

    public function getObservaciones()
    {
        return $this->observaciones;
    }

    public function searchEvaluacion($value)
    {
        $sql = 'SELECT id_evaluacion, s.seccion_estudiante, n.nivel_estudiante, especialidad_estudiante, apellidos_evaluador, nombre_evaluador, observaciones
                FROM Evaluacion e INNER JOIN Evaluadores USING (id_evaluador)
                INNER JOIN Grados g ON e.id_grado = g.id_grado  INNER JOIN Secciones s ON g.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                INNER JOIN Especialidad p ON g.id_especialidad = p.id_especialidad
                WHERE e.seccion_estudiante ILIKE ? or e.nivel_estudiante ILIKE ? or g.especialidad_estudiante ILIKE ? or apellidos_evaluadorILIKE ? or nombre_evaluador ILIKE ?
                ORDER BY apellidos_evaluador';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createEvaluacion()
    {
        $sql = 'INSERT INTO Evaluacion (id_grado, id_evaluador, observaciones)
                VALUES(?, ?, ?)';
        $params = array($this->grado, $this->evaluador, $this->observaciones);
        return Database::executeRow($sql, $params);

    }

    public function readAllEvaluacion()
    {
        $sql = 'SELECT id_evaluacion as "id", s.seccion_estudiante as "a", n.nivel_estudiante as "b", especialidad_estudiante as "c", apellidos_evaluador as "d", nombre_evaluador as "e", observaciones as "f"
                FROM Evaluacion e INNER JOIN Evaluadores USING (id_evaluador)
                INNER JOIN Grados g ON e.id_grado = g.id_grado  INNER JOIN Secciones s ON g.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                INNER JOIN Especialidad p ON g.id_especialidad = p.id_especialidad                
                ORDER BY apellidos_evaluador';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneEvaluacion()
    {
        $sql = 'SELECT id_evaluacion as "id", id_evaluador as "a", id_grado as "b", observaciones as "c"
                FROM Evaluacion           
                WHERE id_evaluacion = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateEvaluacion()
    {
        $sql = 'UPDATE Evaluacion 
                SET id_grado = ?, id_evaluador = ?, observaciones = ?
                WHERE id_evaluacion = ?';
        $params = array($this->grado, $this->evaluador, $this->observaciones, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteEvaluacion()
    {
        $sql = 'DELETE FROM Evaluacion 
                WHERE id_evaluacion = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
