<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/docentes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$docente = new Docente;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		//accion para buscar coincidencias de docentes en la BD
		case 'search':
            $_POST = $docente->validateForm($_POST);
			if ($_POST['docente_buscar'] != '') {
				if ($result['dataset'] = $docente->searchDocente($_POST['docente_buscar'])) {
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
			//accion para crear registros de docentes
		case 'create':
            $_POST = $docente->validateForm($_POST);
			if ($docente->setNombre_docente($_POST['nombre_docente'])) {
				if ($docente->setEmail_docente($_POST['email_docente'])) {
                    if ($docente->setEdad_docente($_POST['fecha_nacimiento'])) {
                        if ($docente->setTelefono_docente($_POST['telefono_docente'])) {
                            if ($docente->setDui_docente($_POST['dui_docente'])) {
                                if ($docente->createDocente()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Docente Ingresado correctamente';
                                } else {
                                    $result['exception'] = Database::getException();
                                }                
                            } else {
                                $result['exception'] = 'DUI invalido';
                            }
                        } else {
                            $result['exception'] = 'Telefóno invalido';
                        }
                    } else {
                        $result['exception'] = 'Edad invalida';
                    }
                } else {
                    $result['exception'] = 'Email invalido';
                }
			} else {
				$result['exception'] = 'Nombre invalido';
			}
			break;
			//accion para leer en la bd un docente en especifico
		case 'readOne':
			if ($docente->setId($_POST['id_docente'])) {
				if ($result['dataset'] = $docente->readOneDocente()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Docente inexistente';
				}
			} else {
				$result['exception'] = 'Docente incorrecto';
			}
			break;
			//accion para leer los docentes existentes para luego mostrarlos en la view
		case 'readAll':
			if ($result['dataset'] = $docente->readAllDocente()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Docente inexistente';
			}
			break;
			//accion para actualizar regidtro de docente
		case 'update':
			$_POST = $docente->validateForm($_POST);
			if ($docente->setId($_POST['id_docente'])) {
				if ($docente->readOneDocente()) {
					if ($docente->setNombre_docente($_POST['nombre_docente'])) {
                        if ($docente->setEmail_docente($_POST['email_docente'])) {
                            if ($docente->setEdad_docente($_POST['fecha_nacimiento'])) {
                                if ($docente->setTelefono_docente($_POST['telefono_docente'])) {
                                    if ($docente->setDui_docente($_POST['dui_docente'])) {
                                        if ($docente->updateDocente()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Docente modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'DUI invalido';
                                    }
                                } else {
                                    $result['exception'] = 'Telefóno invalido';
                                }
                            } else {
                                $result['exception'] = 'Edad invalida';
                            }
                        } else {
                            $result['exception'] = 'Email invalido';
                        }
                    } else {
                        $result['exception'] = 'Nombre invalido';
                    }
				} else {
					$result['exception'] = 'Docente inexistente';
				}
			} else {
				$result['exception'] = 'Docente incorrecto';
			}
			break;
			//accion para borrar registros de docentes
		case 'delete':
			if ($docente->setId($_POST['id_docente'])) {
				if ($docente->readOneDocente()) {
					if ($docente->deleteDocente()) {
						$result['status'] = 1;
						$result['message'] = 'Docente eliminado correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Docente inexistente';
				}
			} else {
				$result['exception'] = 'Docente incorrecto';
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
