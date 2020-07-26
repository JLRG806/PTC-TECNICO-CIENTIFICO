<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/especialidad.php');

if (isset($_GET['action'])) {
    session_start();
    $especialidad = new Especialidades;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    if (true) {        
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $especialidad->readAllBodegas()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay especialidades registradas';
                }
                break;
            case 'search':
                $_POST = $especialidad->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $especialidad->searchEspecialidad($_POST['search'])) {
                        $result['status'] = 1;
                        $rows = count($result['dataset']);
                        if ($rows > 1) {
                            $result['message'] = 'Se encontraron '.$rows.' coincidencias';
                        } else {
                            $result['message'] = 'Solo existe una coincidencia';
                        }
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $$especialidad->validateForm($_POST);
                if ($especialidad->setEspecialidad_estudiante($_POST['capacidad'])) {
                    if ($especialidad->createEspecialidad()) {
                        $result['status'] = 1;
                        $result['message'] = 'Especialidad creada correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Especialidad invalida';
                }                
                break;
            case 'readOne':
                if ($especialidad->setId($_POST['id_especialidad'])) {
                    if ($result['dataset'] = $especialidad->readOneEspecialidad()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Especialidad inexistente';
                    }
                } else {
                    $result['exception'] = 'Especialidad incorrecta';
                }
                break;
            case 'update':
                $_POST = $especialidad->validateForm($_POST);
                if ($especialidad->setId($_POST['id_especialidad'])){
                    if ($data = $especialidad->readOneEspecialidad()) {
                        if($especialidad->setEspecialidad_estudiante($_POST['capacidad'])) {
                            if ($especialidad->updateEspecialidad()) {
                                $result['status'] = 1;
                                $result['message'] = 'Especialidad modificada correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Capacidad invalida';
                        }
                    } else {
                        $result['exception'] = 'Especialidad inexistente';
                    }
                }else {
                    $result['exception'] = 'Especialidad incorrecta';
                }
                break;
            case 'delete':
                if ($especialidad->setId($_POST['id_especialidad'])) {
                    if ($data = $especialidad->readOneBodegas()) {
                        if ($especialidad->deleteBodegas()) {
                            $result['status'] = 1;
                            $result['message'] = 'Bodega eliminada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Bodega inexistente';
                    }
                } else {
                    $result['exception'] = 'Bodega incorrecta';
                }
                break;
            default:
                exit('Acción no disponible');
        }
        header('content-type: application/json; charset=utf-8');
        print(json_encode($result));
    } else {
        exit('Acceso no disponible');
    }
} else {
    exit('Recurso denegado');
}
?>