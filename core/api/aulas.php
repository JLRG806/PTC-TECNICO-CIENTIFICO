<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/aulas.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$aula = new Aulas;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
			$_POST = $aula->validateForm($_POST);
			if ($_POST['aula_buscar'] != '') {
				if ($result['dataset'] = $aula->searchAula($_POST['aula_buscar'])) {
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
			$_POST = $aula->validateForm($_POST);
			print_r($_POST);
			if ($aula->setNombre_aula($_POST['nombre_aula'])) {
				if ($aula->setUbicacion_aula($_POST['ubicacion_aula'])) {
					if (is_uploaded_file($_FILES['foto_aula']['tmp_name'])) {
						if ($aula->setImagen_aula($_FILES['foto_aula'])) {
							if ($aula->createAula()) {
								$result['status'] = 1;
								$result['message'] = 'Aula Ingresada correctamente';
							} else {
								$result['exception'] = Database::getException();
							}
						} else {
							$result['exception'] = $aula->getImageError();
						}
					} else {
						$result['exception'] = 'Seleccione una foto';
					}
				} else {
					$result['exception'] = 'Ubicación invalida';
				}
			} else {
				$result['exception'] = 'Aula incorrecta';
			}
			break;
		case 'readOne':
			if ($aula->setId($_POST['id_aula'])) {
				if ($result['dataset'] = $aula->readOneAula()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Aula inexistente';
				}
			} else {
				$result['exception'] = 'Aula incorrecta';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $aula->readAllAula()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Aula inexistente';
			}
			break;
		case 'update':
			$_POST = $aula->validateForm($_POST);
			if ($aula->setId($_POST['id_aula'])) {
				if ($aula->readOneAula()) {
					if ($aula->setNombre_aula($_POST['nombre_aula'])) {
						if ($aula->setUbicacion_aula($_POST['ubicacion_aula'])) {
							if (is_uploaded_file($_FILES['foto_aula']['tmp_name'])) {
								if ($aula->setImagen_aula($_FILES['foto_aula'])) {
									if ($aula->updateAula()) {
										$result['status'] = 1;
										if ($aula->deleteFile($aula->getRuta(), $data['foto_aula'])) {
											$result['message'] = 'Aula modificada correctamente';
										} else {
											$result['message'] = 'Aula modificada pero no se borro la imagen anterior';
										}
									} else {
										$result['exception'] = Database::getException();
									}
								} else {
									$result['exception'] = $aula->getImageError();
								}
							} else {
								if ($aula->updateAula()) {
									$result['status'] = 1;
									$result['message'] = 'Aula modificada correctamente';
								} else {
									$result['exception'] = Database::getException();
								}
							}
						} else {
							$result['exception'] = 'Ubicación invalida';
						}
					} else {
						$result['exception'] = 'Nombre invalido';
					}
				} else {
					$result['exception'] = 'Aula inexistente';
				}
			} else {
				$result['exception'] = 'Aula incorrecto';
			}
			break;
		case 'delete':
			if ($aula->setId($_POST['id_aula'])) {
				if ($aula->readOneAula()) {
					if ($aula->deleteAula()) {
						$result['status'] = 1;
						$result['message'] = 'Aula eliminada correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Aula inexistente';
				}
			} else {
				$result['exception'] = 'Aula incorrecta';
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
