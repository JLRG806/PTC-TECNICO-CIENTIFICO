<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/grados.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$grado = new Grados;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
            $_POST = $grado->validateForm($_POST);
			if ($_POST['grado_buscar'] != '') {
				if ($result['dataset'] = $grado->searchGrado($_POST['grado_buscar'])) {
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
            $_POST = $grado->validateForm($_POST);
			if (isset($_POST['aula'])) {
                if ($grado->setAula($_POST['aula'])) {
                    if (isset($_POST['docente'])) {
                        if ($grado->setDocente($_POST['docente'])) {
                            if (isset($_POST['seccion'])) {
                                if ($grado->setSeccion($_POST['seccion'])) {
                                    if (isset($_POST['especialidad'])) {
                                        if ($grado->setEspecialidad($_POST['especialidad'])) {
                                            if ($grado->createGrado()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Grado ingresado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();
                                            }
                                        } else {
                                            $result['exception'] = 'Especialidad invalida';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una Especialidad';
                                    }
                                } else {
                                    $result['exception'] = 'Seccion invalida';
                                }
                            } else {
                                $result['exception'] = 'Seleccione una Sección';
                            }
                        } else {
                            $result['exception'] = 'Docente invalida';
                        }
                    } else {
                        $result['exception'] = 'Seleccione un Docente';
                    }
                } else {
                    $result['exception'] = 'Aula invalida';
                }
            } else {
                $result['exception'] = 'Seleccione una Aula';
            }
			break;
		case 'readOne':
			if ($grado->setId($_POST['id_grado'])) {
				if ($result['dataset'] = $grado->readOneGrado()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Grado inexistente';
				}
			} else {
				$result['exception'] = 'Grado incorrecto';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $grado->readAllGrado()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Grados inexistentes';
			}
			break;
        case 'update':            
			$_POST = $grado->validateForm($_POST);
			if ($grado->setId($_POST['id_grado'])) {
				if ($grado->readOneGrado()) {
					if (isset($_POST['aula'])) {
                        if ($grado->setAula($_POST['aula'])) {
                            if (isset($_POST['docente'])) {
                                if ($grado->setDocente($_POST['docente'])) {
                                    if (isset($_POST['seccion'])) {
                                        if ($grado->setSeccion($_POST['seccion'])) {
                                            if (isset($_POST['especialidad'])) {
                                                if ($grado->setEspecialidad($_POST['especialidad'])) {
                                                    if ($grado->updateGrado()) {
                                                        $result['status'] = 1;
                                                        $result['message'] = 'Grado modificado correctamente';
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = 'Especialidad invalida';
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una Especialidad';
                                            }
                                        } else {
                                            $result['exception'] = 'Seccion invalida';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una Sección';
                                    }
                                } else {
                                    $result['exception'] = 'Docente invalida';
                                }
                            } else {
                                $result['exception'] = 'Seleccione un Docente';
                            }
                        } else {
                            $result['exception'] = 'Aula invalida';
                        }
                    } else {
                        $result['exception'] = 'Seleccione una Aula';
                    }
				} else {
					$result['exception'] = 'Grado inexistente';
				}
			} else {
				$result['exception'] = 'Grado incorrecta';
			}
			break;
		case 'delete':
			if ($grado->setId($_POST['id_grado'])) {
				if ($grado->readOneGrado()) {
					if ($grado->deleteGrado()) {
						$result['status'] = 1;
						$result['message'] = 'Grado eliminado correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Grado inexistente';
				}
			} else {
				$result['exception'] = 'Grado incorrecto';
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
