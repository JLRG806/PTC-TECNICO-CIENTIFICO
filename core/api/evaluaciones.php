<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/evaluacion.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se instancia la clase correspondiente.
    $evaluacion = new Evaluacion;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch ($_GET['action']) {
        case 'search':
            $_POST = $evaluacion->validateForm($_POST);
            if ($_POST['evaluacion'] != '') {
                if ($result['dataset'] = $evaluacion->searchEvaluacion($_POST['evaluacion_buscar'])) {
                    $result['status'] = 1;
                    $rows = count($result['dataset']);
                    if ($rows > 1) {
                        $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
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
            $_POST = $evaluacion->validateForm($_POST);
            if (isset($_POST['grado'])) {
                if ($evaluacion->setGrado($_POST['grado'])) {
                    if (isset($_POST['evaluador'])) {
                        if ($evaluacion->setEvaluador($_POST['evaluador'])) {
                            if ($evaluacion->setObservaciones($_POST['observaciones'])) {
                                if ($evaluacion->createEvaluacion()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Evaluación ingresada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                } 
                            } else {
                                $result['exception'] = 'Observacion invalida';
                            }
                        } else {
                            $result['exception'] = 'Evaluador invalido';
                        }
                    } else {
                        $result['exception'] = 'Selecciones un Evaluador';
                    }
                } else {
                    $result['exception'] = 'Grado invalido';
                }
            } else {
                $result['exception'] = 'Selecciones un Grado';
            }
            break;
        case 'readOne':
            if ($evaluacion->setId($_POST['id_evaluacion'])) {
                if ($result['dataset'] = $evaluacion->readOneEvaluacion()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Evaluación inexistente';
                }
            } else {
                $result['exception'] = 'Evaluación incorrecta';
            }
            break;
        case 'readAll':
            if ($result['dataset'] = $evaluacion->readAllEvaluacion()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Evaluación inexistente';
            }
            break;
        case 'update':
            $_POST = $evaluacion->validateForm($_POST);
            if ($evaluacion->setId($_POST['id_evaluacion'])) {
                if ($evaluacion->readOneEvaluacion()) {
                    if (isset($_POST['grado'])) {
                        if ($evaluacion->setGrado($_POST['grado'])) {
                            if (isset($_POST['evaluador'])) {
                                if ($evaluacion->setEvaluador($_POST['evaluador'])) {
                                    if ($evaluacion->setObservaciones($_POST['observaciones'])) {
                                        if ($evaluacion->updateEvaluacion()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Evaluación modificada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        } 
                                    } else {
                                        $result['exception'] = 'Observacion invalida';
                                    }
                                } else {
                                    $result['exception'] = 'Evaluador invalido';
                                }
                            } else {
                                $result['exception'] = 'Selecciones un Evaluador';
                            }
                        } else {
                            $result['exception'] = 'Grado invalido';
                        }
                    } else {
                        $result['exception'] = 'Selecciones un Grado';
                    }
                } else {
                    $result['exception'] = 'Evaluador inexistente';
                }
            } else {
                $result['exception'] = 'Evaluador incorrecto';
            }
            break;
        case 'delete':
            if ($evaluacion->setId($_POST['id_evaluacion'])) {
                if ($evaluacion->readOneEvaluacion()) {
                    if ($evaluacion->deleteEvaluacion()) {
                        $result['status'] = 1;
                        $result['message'] = 'Evaluación eliminada correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Evaluación inexistente';
                }
            } else {
                $result['exception'] = 'Evaluación incorrecta';
            }
            break;
        default:
            exit('Acción no disponible log');
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
