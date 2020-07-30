<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/estudiantes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$estudiante = new Estudiantes;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
            $_POST = $estudiante->validateForm($_POST);
			if ($_POST['estudiante_buscar'] != '') {
				if ($result['dataset'] = $estudiante->searchEstudiante($_POST['estudiante_buscar'])) {
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
            $_POST = $estudiante->validateForm($_POST);
			if ($estudiante->setNombre_estudiante($_POST['nombre_estudiante'])) {
                if ($estudiante->setApellidos_estudiante($_POST['apellidos_estudiante'])) {
                    if ($estudiante->setEmail_estudiante($_POST['email_estudiante'])) {
                        if (isset($_POST['seccion'])) {
                            if ($estudiante->setSeccion($_POST['seccion'])) {
                                if (isset($_POST['especialidad'])) {
                                    if ($estudiante->setEspecialidad($_POST['especialidad'])) {
                                        if ($estudiante->createEstudiante()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Estudiante ingresado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }    
                                    } else {
                                        $result['exception'] = 'Especialidad invalida';
                                    }
                                } else {
                                    $result['exception'] = 'Selecciones una Especialidad';
                                }
                            } else {
                                $result['exception'] = 'Seccion invalida';
                            }
                        } else {
                            $result['exception'] = 'Selecciones una Sección';
                        }
                    } else {
                        $result['exception'] = 'Email invalido';
                    }
                } else {
                    $result['exception'] = 'Apellidos invalidos';
                }
			} else {
				$result['exception'] = 'Nombre invalido';
			}
			break;
		case 'readOne':
			if ($estudiante->setId($_POST['id_estudiante'])) {
				if ($result['dataset'] = $estudiante->readOneEstudiante()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Estudiante inexistente';
				}
			} else {
				$result['exception'] = 'Estudiante incorrecto';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $estudiante->readAllEstudiante()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Estudiante inexistente';
			}
			break;
        case 'update':            
			$_POST = $estudiante->validateForm($_POST);
			if ($estudiante->setId($_POST['id_estudiante'])) {
				if ($estudiante->readOneEstudiante()) {
					if ($estudiante->setNombre_estudiante($_POST['nombre_estudiante'])) {
                        if ($estudiante->setApellidos_estudiante($_POST['apellidos_estudiante'])) {
                            if ($estudiante->setEmail_estudiante($_POST['email_estudiante'])) {
                                if (isset($_POST['seccion'])) {
                                    if ($estudiante->setSeccion($_POST['seccion'])) {
                                        if (isset($_POST['especialidad'])) {
                                            if ($estudiante->setEspecialidad($_POST['especialidad'])) {
                                                if ($estudiante->updateEstudiante()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Estudiante modificado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = 'Especialidad invalida';
                                            }
                                        } else {
                                            $result['exception'] = 'Selecciones una Especialidad';
                                        }
                                    } else {
                                        $result['exception'] = 'Seccion invalida';
                                    }
                                } else {
                                    $result['exception'] = 'Selecciones una Sección';
                                }
                            } else {
                                $result['exception'] = 'Email invalido';
                            }
                        } else {
                            $result['exception'] = 'Apellidos invalidos';
                        }
                    } else {
                        $result['exception'] = 'Nombre invalido';
                    }
				} else {
					$result['exception'] = 'Estudiante inexistente';
				}
			} else {
				$result['exception'] = 'Estudiante incorrecto';
			}
			break;
		case 'delete':
			if ($estudiante->setId($_POST['id_estudiante'])) {
				if ($estudiante->readOneEstudiante()) {
					if ($estudiante->deleteEstudiante()) {
						$result['status'] = 1;
						$result['message'] = 'Estudiante eliminado correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Estudiante inexistente';
				}
			} else {
				$result['exception'] = 'Estudiante incorrecto';
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
