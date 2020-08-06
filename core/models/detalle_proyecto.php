<?php
class Detalle_Proyecto extends Validator
{

    private $id = null;
    private $proyecto = null;
    private $estudiante = null;
    private $puesto_estudiante = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }
    
    public function setProyecto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->proyecto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstudiante($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estudiante = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPuesto_estudiante($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->puesto_estudiante = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProyecto()
    {
        return $this->proyecto;
    }

    public function getEstudiante()
    {
        return $this->estudiante;
    }

    public function getPuesto_estudiante()
    {
        return $this->puesto_estudiante;
    }

    public function searchDetalle_Proyecto($value)
    {
        $sql = 'SELECT id_det_proyecto, nombre_proyecto, codigo_proyecto, s.seccion_estudiante, n.nivel_estudiante, especialidad_estudiante, apellidos_estudiante, nombre_estudiante, puesto_estudiante
                FROM Detalle_Proyecto d INNER JOIN Estudiantes e USING (id_estudiante) INNER JOIN Proyectos p USING (id_proyecto)
                INNER JOIN Grados g ON p.id_grado = g.id_grado INNER JOIN Secciones s ON g.id_seccion = s.id_seccion 
                INNER JOIN Niveles n ON n.id_nivel = s.id_nivel INNER JOIN Especialidad c ON g.id_especialidad = c.id_especialidad     
                WHERE nombre_proyecto ILIKE ? or codigo_proyecto ILIKE ?
                ORDER BY nombre_proyecto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createDetalle_Proyecto()
    {
        $sql = 'INSERT INTO Detalle_Proyecto (id_proyecto, id_estudiante, puesto_estudiante)
                VALUES(?, ?, ?)';
        $params = array($this->proyecto, $this->estudiante, $this->puesto_estudiante);
        return Database::executeRow($sql, $params);

    }

    public function readAllDetalle_Proyecto()
    {
        $sql = 'SELECT id_det_proyecto, nombre_proyecto, codigo_proyecto, s.seccion_estudiante, n.nivel_estudiante, especialidad_estudiante, apellidos_estudiante, nombre_estudiante, puesto_estudiante
                FROM Detalle_Proyecto d INNER JOIN Estudiantes e USING (id_estudiante) INNER JOIN Proyectos p USING (id_proyecto)
                INNER JOIN Grados g ON p.id_grado = g.id_grado INNER JOIN Secciones s ON g.id_seccion = s.id_seccion 
                INNER JOIN Niveles n ON n.id_nivel = s.id_nivel INNER JOIN Especialidad c ON g.id_especialidad = c.id_especialidad              
                ORDER BY nombre_proyecto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneDetalle_Proyecto()
    {
        $sql = 'SELECT id_det_proyecto, nombre_proyecto, descripcion_proyecto, codigo_proyecto, s.seccion_estudiante as "s", n.nivel_estudiante, especialidad_estudiante, apellidos_estudiante, nombre_estudiante, puesto_estudiante, nombre_docente
                FROM Detalle_Proyecto d INNER JOIN Estudiantes e USING (id_estudiante) INNER JOIN Proyectos p USING (id_proyecto)
                INNER JOIN Grados g ON p.id_grado = g.id_grado INNER JOIN Secciones s ON g.id_seccion = s.id_seccion 
                INNER JOIN Niveles n ON n.id_nivel = s.id_nivel INNER JOIN Especialidad c ON g.id_especialidad = c.id_especialidad                      
                WHERE id_det_proyecto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateDetalle_Proyecto()
    {
        $sql = 'UPDATE Detalle_Proyecto 
                SET id_proyecto = ?, id_estudiante = ?, puesto_estudiante = ?
                WHERE id_det_proyecto = ?';
        $params = array($this->proyecto, $this->estudiante, $this->puesto_estudiante, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteDetalle_Proyecto()
    {
        $sql = 'DELETE FROM Detalle_Proyecto 
                WHERE id_det_proyecto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
