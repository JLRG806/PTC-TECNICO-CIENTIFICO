<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/secciones.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$seccion = new Secciones;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
            $_POST = $seccion->validateForm($_POST);
			if ($_POST['seccion_buscar'] != '') {
				if ($result['dataset'] = $seccion->searchSeccion($_POST['seccion_buscar'])) {                                            
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
            $_POST = $seccion->validateForm($_POST);
			if ($seccion->setSeccion_estudiante($_POST['seccion_estudiante'])) {
                if (isset($_POST['nivel'])) {
                    if ($seccion->setNivel($_POST['nivel'])) {
                        if ($seccion->createSeccion()) {
                            $result['status'] = 1;
                            $result['message'] = 'Sección ingresada correctamente';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Nivel incorrecto';
                    }	
                } else {
                    $result['exception'] = 'Seleccione un Nivel';
                }	
			} else {
				$result['exception'] = 'Sección incorrecta';
			}
			break;
		case 'readOne':
			if ($seccion->setId($_POST['id_seccion'])) {
				if ($result['dataset'] = $seccion->readOneSeccion()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Sección inexistente';
				}
			} else {
				$result['exception'] = 'Sección incorrecta';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $seccion->readAllSeccion()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Sección inexistente';
			}
			break;
		case 'update':
			$_POST = $seccion->validateForm($_POST);
			if ($seccion->setId($_POST['id_seccion'])) {
				if ($seccion->readOneSeccion()) {
					if ($seccion->setSeccion_estudiante($_POST['seccion_estudiante'])) {
                        if (isset($_POST['nivel'])) {
                            if ($seccion->setNivel($_POST['nivel'])) {
                                if ($seccion->updateSeccion()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Sección modificada correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Nivel incorrecto';
                            }	
                        } else {
                            $result['exception'] = 'Seleccione un Nivel';
                        }	
                    } else {
                        $result['exception'] = 'Sección incorrecta';
                    }
				} else {
					$result['exception'] = 'Sección inexistente';
				}
			} else {
				$result['exception'] = 'Sección incorrecta';
			}
			break;
		case 'delete':
			if ($seccion->setId($_POST['id_seccion'])) {
				if ($seccion->readOneSeccion()) {
					if ($seccion->deleteSeccion()) {
						$result['status'] = 1;
						$result['message'] = 'Sección eliminada correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Sección inexistente';
				}
			} else {
				$result['exception'] = 'Sección incorrecta';
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
