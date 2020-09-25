<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/proyectos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$proyecto = new Proyectos;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
            $_POST = $proyecto->validateForm($_POST);
			if ($_POST['proyecto_buscar'] != '') {
				if ($result['dataset'] = $proyecto->searchProyecto($_POST['proyecto_buscar'])) {
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
		case 'report':
            $_POST = $proyecto->validateForm($_POST);
			if ($_POST['buscador'] != '') {
				if ($result['dataset'] = $proyecto->searchReporte($_POST['buscador'])) {
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
            $_POST = $proyecto->validateForm($_POST);
			if ($proyecto->setNombre_proyecto($_POST['nombre_proyecto'])) {
				if ($proyecto->setDescripcion_proyecto($_POST['descripcion_proyecto'])) {
                    if (isset($_POST['grado'])) {
                        if ($proyecto->setGrado($_POST['grado'])) {
                            if ($proyecto->createProyecto()) {
								$result['status'] = 1;
								$result['message'] = 'Proyecto ingresado correctamente';
							} else {
								$result['exception'] = Database::getException();
							}
                        } else {
                            $result['exception'] = 'Grado invalido';
                        }
                    } else {
                        $result['exception'] = 'Seleccione un Grado';
                    }
                } else {
                    $result['exception'] = 'Descripción invalida';
                }
			} else {
				$result['exception'] = 'Nombre Invalido';
			}
			break;
		case 'readOne':
			if ($proyecto->setId($_POST['id_proyecto'])) {
				if ($result['dataset'] = $proyecto->readOneProyecto()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Proyecto inexistente';
				}
			} else {
				$result['exception'] = 'Proyecto incorrecta';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $proyecto->readAllProyecto()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Proyecto inexistentes';
			}
			break;
		case 'update':			
			$_POST = $proyecto->validateForm($_POST);
			if ($proyecto->setId($_POST['id_proyecto'])) {
				if ($proyecto->readOneProyecto()) {
					if ($proyecto->setNombre_proyecto($_POST['nombre_proyecto'])) {
						if ($proyecto->setDescripcion_proyecto($_POST['descripcion_proyecto'])) {
							if (isset($_POST['grado'])) {
								if ($proyecto->setGrado($_POST['grado'])) {
									if ($proyecto->updateProyecto()) {
										$result['status'] = 1;
										$result['message'] = 'Grado modificado correctamente';
									} else {
										$result['exception'] = Database::getException();
									}
								} else {
									$result['exception'] = 'Grado invalido';
								}
							} else {
								$result['exception'] = 'Seleccione un Grado';
							}
						} else {
							$result['exception'] = 'Descripción invalida';
						}
					} else {
						$result['exception'] = 'Nombre Invalido';
					}
				} else {
					$result['exception'] = 'Proyecto inexistente';
				}
			} else {
				$result['exception'] = 'Proyecto incorrecto';
			}
			break;
		case 'delete':
			if ($proyecto->setId($_POST['id_proyecto'])) {
				if ($proyecto->readOneProyecto()) {
					if ($proyecto->deleteProyecto()) {
						$result['status'] = 1;
						$result['message'] = 'Proyecto eliminado correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Proyecto inexistente';
				}
			} else {
				$result['exception'] = 'Proyecto incorrecta';
			}
			break;
		case 'cantidadProyectosNivel':
			if ($result['dataset'] = $proyecto->cantidadProyectosNivel()) {
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