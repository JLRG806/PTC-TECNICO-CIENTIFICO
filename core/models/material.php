<?php

class Material extends Validator
{
    private $id = null;

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function searchMaterial($value)
    {
        $sql = 'SELECT id_equipo, nombre_equipo, descripcion_equipo, cantidad, nombre_estudiante, tipo_equipo, estado_equipo, imagen_equipo
                FROM Equipo e INNER JOIN Estudiantes USING (id_estudiante)
				INNER JOIN Tipo_equipo t ON e.id_tipo_equipo = t.id_tipo_equipo
                WHERE nombre_equipo ILIKE ? or descripcion_equipo ILIKE ? 
                ORDER BY id_equipo';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function readAllMaterial()
    {
        $sql = 'SELECT id_equipo, nombre_equipo, descripcion_equipo, cantidad, nombre_estudiante, tipo_equipo, estado_equipo, imagen_equipo 
                FROM Equipo e INNER JOIN Estudiantes USING (id_estudiante)
                INNER JOIN Tipo_equipo t ON e.id_tipo_equipo = t.id_tipo_equipo
                ORDER BY id_equipo';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneMaterial()
    {
        $sql = 'SELECT id_equipo, nombre_equipo, descripcion_equipo, cantidad, nombre_estudiante, tipo_equipo, estado_equipo, imagen_equipo 
                FROM Equipo e INNER JOIN Estudiantes USING (id_estudiante)
                INNER JOIN Tipo_equipo t ON e.id_tipo_equipo = t.id_tipo_equipo
                ORDER BY id_equipo
                WHERE id_equipo = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

}
