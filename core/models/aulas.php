<?php
class Aulas extends Validator
{
    private $id = null;
    private $nombre_aula = null;
    private $ubicacion_aula = null;
    private $imagen_aula = null;
    private $archivo = null;
    private $ruta = '../../../resources/img/aulas/';

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre_aula($value)
    {
        if ($this->validateString($value, 1, 20)) {
            $this->nombre_aula = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUbicacion_aula($value)
    {
        if ($this->validateString($value, 1 , 100)) {
            $this->ubicacion_aula = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setImagen_aula($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen_aula = $this->getImageName();
            $this->archivo = $file;
            return true;
        } else {
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre_aula()
    {
        return $this->nombre_aula;
    }

    public function getUbicacion_aula()
    {
        return $this->ubicacion_aula;
    }

    public function getImagen_aula()
    {
        return $this->imagen_aula;
    }

    public function getRuta()
    {
        return $this->ruta;
    }


    public function searchAula($value)
    {
        $sql = 'SELECT id_aula, nombre_aula, ubicacion_aula, imagen_aula
                FROM Aulas
                WHERE nombre_aula ILIKE ?
                ORDER BY nombre_aula';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createAula()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen_aula)) {
            $sql = 'INSERT INTO Aulas (nombre_aula, ubicacion_aula, imagen_aula)
                    VALUES(?, ?, ?)';
            $params = array($this->nombre_aula, $this->ubicacion_aula, $this->imagen_aula);
            return Database::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    public function readAllAula()
    {
        $sql = 'SELECT id_aula, nombre_aula, ubicacion_aula, imagen_aula
                FROM Aulas
                ORDER BY nombre_aula';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOneAula()
    {
        $sql = 'SELECT id_aula, nombre_aula, ubicacion_aula, imagen_aula
                FROM Aulas
                WHERE id_aula = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateAula()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen_aula)) {
            $sql = 'UPDATE Aulas 
                    SET nombre_aula = ?, ubicacion_aula = ?, imagen_aula = ?
                    WHERE id_aula = ?';
            $params = array($this->nombre_aula, $this->ubicacion_aula, $this->imagen_aula, $this->id);
        } else {
            $sql = 'UPDATE Aulas 
                    SET nombre_aula = ?, ubicacion_aula = ?
                    WHERE id_aula = ?';
            $params = array($this->nombre_aula, $this->ubicacion_aula, $this->id);
        }
        return Database::executeRow($sql, $params);
    }

    public function deleteAula()
    {
        $sql = 'DELETE FROM Aulas 
                WHERE id_aula = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}