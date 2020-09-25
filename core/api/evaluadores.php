<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/evaluadores.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se instancia la clase correspondiente.
    $evaluador = new Evaluadores;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch ($_GET['action']) {
        case 'search':
            $_POST = $evaluador->validateForm($_POST);
            if ($_POST['jurado_buscar'] != '') {
                if ($result['dataset'] = $evaluador->searchEvaluador($_POST['jurado_buscar'])) {
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
        case 'report':
            $_POST = $evaluador->validateForm($_POST);
			if ($_POST['buscador'] != '') {
				if ($result['dataset'] = $evaluador->searchReporte($_POST['buscador'])) {
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
            $_POST = $evaluador->validateForm($_POST);
            if ($evaluador->setNombre_evaluador($_POST['nombres'])) {
                if ($evaluador->setApellidos_evaluador($_POST['apellidos'])) {
                    if ($evaluador->setEmail_evaluador($_POST['email'])) {
                        if ($evaluador->setTelefono_evaluador($_POST['telefono'])) {
                            if ($evaluador->setLugar_procedencia($_POST['procedencia'])) {
                                if ($evaluador->setOcupacion($_POST['ocupacion'])) {
                                    if ($evaluador->setEstado_evaluador($_POST['estado'])) {
                                        if ($evaluador->createEvaluador()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Evaluador creado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Ocupación incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Lugar procedencia incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Telefono incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Correo incorrecto';
                    }
                } else {
                    $result['exception'] = 'Apellidos incorrecto';
                }
            } else {
                $result['exception'] = 'Nombres incorrecto';
            }
            break;
        case 'readOne':
            if ($evaluador->setId($_POST['id_evaluador'])) {
                if ($result['dataset'] = $evaluador->readOneEvaluador()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Evaluador inexistente';
                }
            } else {
                $result['exception'] = 'Evaluador incorrecto';
            }
            break;
        case 'readAll':
            if ($result['dataset'] = $evaluador->readAllEvaluador()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Evaluador inexistente';
            }
            break;
        case 'update':
            $_POST = $evaluador->validateForm($_POST);
            if ($evaluador->setId($_POST['id_evaluador'])) {
                if ($evaluador->readOneEvaluador()) {
                    if ($evaluador->setNombre_evaluador($_POST['nombres'])) {
                        if ($evaluador->setApellidos_evaluador($_POST['apellidos'])) {
                            if ($evaluador->setEmail_evaluador($_POST['email'])) {
                                if ($evaluador->setTelefono_evaluador($_POST['telefono'])) {
                                    if ($evaluador->setLugar_procedencia($_POST['procedencia'])) {
                                        if ($evaluador->setOcupacion($_POST['ocupacion'])) {
                                            if ($evaluador->setEstado_evaluador($_POST['estado'])) {
                                                if ($evaluador->updateEvaluador()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Evaluador actualizado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = 'Estado incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Ocupación incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Lugar procedencia incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Telefono incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrecto';
                    }
                } else {
                    $result['exception'] = 'Evaluador inexistente';
                }
            } else {
                $result['exception'] = 'Evaluador incorrecto';
            }
            break;
        case 'delete':
            if ($evaluador->setId($_POST['id_evaluador'])) {
                if ($evaluador->readOneEvaluador()) {
                    if ($evaluador->deleteEvaluador()) {
                        $result['status'] = 1;
                        $result['message'] = 'Evaluador eliminado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Evaluador inexistente';
                }
            } else {
                $result['exception'] = 'Evaluador incorrecto';
            }
            break;
        case 'cantidadEstadoEvaluador':
            if ($result['dataset'] = $evaluador->cantidadEstadoEvaluador()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay datos disponibles';
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
