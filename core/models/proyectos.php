<?php
class Proyectos extends Validator
{
    private $id = null;
    private $nombre_proyecto = null;
    private $descripcion_proyecto = null;
    private $codigo_proyecto = null;
    private $grado = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre_proyecto($value)
    {
        if ($this->validateString($value, 1, 50)) {
            $this->nombre_proyecto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion_proyecto($value)
    {
        if ($this->validateString($value, 1, 50)) {
            $this->descripcion_proyecto = $value;
            return true;
        } else {
            return false;
        }
    }
    
    function generarCodigo() {
        $key = '';
        $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($pattern)-1;
        for($i=0;$i < 6;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    }

    public function setCodigo_proyecto()
    {
        $value = generarCodigo();
        if ($this->validateString($value)) {
            $this->codigo_proyecto = $value;
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

    public function getId()
    {
        return $this->id;
    }

    public function getNombre_proyecto()
    {
        return $this->nombre_proyecto;
    }

    public function getDescripcion_proyecto()
    {
        return $this->descripcion_proyecto;
    }

    public function getCodigo_proyecto()
    {
        return $this->codigo_proyecto;
    }

    public function getGrado()
    {
        return $this->Grado;
    }

    public function searchProyecto($value)
    {
        $sql = 'SELECT id_proyecto, nombre_proyecto, descripcion_proyecto, codigo_proyecto, s.seccion_estudiante, n.nivel_estudiante, e.especialidad_estudiante
                FROM Proyectos p INNER JOIN Grados g USING (id_grado)
                INNER JOIN Secciones s ON g.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                INNER JOIN Especialidad e ON g.id_especialidad = e.id_especialidad
                WHERE nombre_proyecto ILIKE ? or descripcion_proyecto ILIKE ?
                ORDER BY nombre_proyecto';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function searchReporte($value)
    {
        $sql = 'SELECT nombre_proyecto as "a", n.nivel_estudiante as "b", especialidad_estudiante as "c", id_proyecto as "id"
                FROM Proyectos
                INNER JOIN Grados g USING (id_grado)
                INNER JOIN Especialidad e ON e.id_especialidad = g.id_especialidad 
                INNER JOIN Secciones s ON g.id_seccion = s.id_seccion
                INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                WHERE nombre_proyecto ILIKE ? or descripcion_proyecto ILIKE ?';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }
    
    public function createProyecto()
    {
        $sql = 'INSERT INTO Proyectos (nombre_proyecto, descripcion_proyecto, id_grado)
                VALUES(?, ?, ?)';
        $params = array($this->nombre_proyecto, $this->descripcion_proyecto, $this->grado);
        return Database::executeRow($sql, $params);

    }

    public function readAllProyecto()
    {
        $sql = 'SELECT id_proyecto, nombre_proyecto, descripcion_proyecto, id_grado, s.seccion_estudiante as "s", n.nivel_estudiante as "n", e.especialidad_estudiante as "e"
                FROM Proyectos p INNER JOIN Grados g USING (id_grado)
                INNER JOIN Secciones s ON g.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                INNER JOIN Especialidad e ON g.id_especialidad = e.id_especialidad
                ORDER BY nombre_proyecto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneProyecto()
    {
        $sql = 'SELECT id_proyecto, nombre_proyecto, descripcion_proyecto, id_grado,  s.seccion_estudiante, n.nivel_estudiante, e.especialidad_estudiante
                FROM Proyectos p INNER JOIN Grados g USING (id_grado)
                INNER JOIN Secciones s ON g.id_seccion = s.id_seccion INNER JOIN Niveles n ON n.id_nivel = s.id_nivel
                INNER JOIN Especialidad e ON g.id_especialidad = e.id_especialidad
                WHERE id_proyecto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function readOneDetalle_Proyecto()
    {
        $sql = 'SELECT id_det_proyecto, nombre_proyecto, codigo_proyecto, s.seccion_estudiante as "s", n.nivel_estudiante, especialidad_estudiante, apellidos_estudiante, nombre_estudiante, puesto_estudiante, nombre_docente
                FROM Detalle_Proyecto d INNER JOIN Estudiantes e USING (id_estudiante) INNER JOIN Proyectos p USING (id_proyecto)
                INNER JOIN Grados g ON p.id_grado = g.id_grado INNER JOIN Secciones s ON g.id_seccion = s.id_seccion 
                INNER JOIN Niveles n ON n.id_nivel = s.id_nivel INNER JOIN Especialidad c ON g.id_especialidad = c.id_especialidad
                INNER JOIN Docentes k ON g.id_docente  = k.id_docente 
                WHERE id_proyecto = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }
    
    public function updateProyecto()
    {
        $sql = 'UPDATE Proyectos 
                SET nombre_proyecto = ?, descripcion_proyecto = ?, id_grado = ?
                WHERE id_proyecto = ?';
        $params = array($this->nombre_proyecto, $this->descripcion_proyecto, $this->grado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteProyecto()
    {
        $sql = 'DELETE FROM Proyectos 
                WHERE id_proyecto = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    /*Consultas para generar reportes*/

    public function readProyectosEvaluados()
    {
        $sql = 'SELECT nombre_evaluador, lugar_procedencia, nombre_aula, nombre_proyecto, observaciones
                FROM Evaluacion INNER JOIN Grados USING(id_grado)
                INNER JOIN Aulas USING(id_aula)
                INNER JOIN Evaluadores USING(id_evaluador) 
                INNER JOIN Proyectos USING(id_proyecto)
                WHERE id_evaluador = ?
                ORDER BY nombre_evaluador';
        $params = array($this->nombre_proyecto);
        return Database::getRows($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    public function cantidadProyectosNivel()
    {
        $sql = 'SELECT n.nivel_estudiante , COUNT(p.id_proyecto) cantidad
        FROM proyectos p
        INNER JOIN grados g ON p.id_grado=g.id_grado
        INNER JOIN secciones s ON g.id_seccion=s.id_seccion
        INNER JOIN niveles n ON s.id_nivel = n.id_nivel
        GROUP BY n.id_nivel , n.nivel_estudiante';
        $params = null;
        return Database::getRows($sql, $params);
    }

}