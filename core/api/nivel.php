<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/niveles.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$nivel = new Niveles;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
			$_POST = $nivel->validateForm($_POST);
			if ($_POST['nivel_buscar'] != '') {
				if ($result['dataset'] = $nivel->searchTipoU($_POST['nivel_buscar'])) {
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
            $_POST = $nivel->validateForm($_POST);
			if ($nivel->setNivel($_POST['nivel'])) {
				if ($nivel->createNivel()) {
					$result['status'] = 1;
					$result['message'] = 'Nivel Ingresado correctamente';
				} else {
					$result['exception'] = Database::getException();
				}
			} else {
				$result['exception'] = 'Nivel incorrecto';
			}
			break;
		case 'readOne':
			if ($nivel->setId($_POST['id_nivel'])) {
				if ($result['dataset'] = $nivel->readOneNivel()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Nivel inexistente';
				}
			} else {
				$result['exception'] = 'Nivel incorrecto';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $nivel->readAllNivel()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Nivel inexistente';
			}
			break;
		case 'update':
			$_POST = $nivel->validateForm($_POST);
			if ($nivel->setId($_POST['id_nivel'])) {
				if ($nivel->readOneNivel()) {
					if ($nivel->setNivel($_POST['nivel'])) {
						if ($nivel->updateNivel()) {
							$result['status'] = 1;
							$result['message'] = 'Nivel modificado correctamente';
						} else {
							$result['exception'] = Database::getException();
						}
					} else {
						$result['exception'] = 'Nivel incorrectos';
					}
				} else {
					$result['exception'] = 'Nivel inexistente';
				}
			} else {
				$result['exception'] = 'Nivel incorrecto';
			}
			break;
		case 'delete':
			if ($nivel->setId($_POST['id_nivel'])) {
				if ($nivel->readOneNivel()) {
					if ($nivel->deleteNivel()) {
						$result['status'] = 1;
						$result['message'] = 'Nivel eliminado correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Nivel inexistente';
				}
			} else {
				$result['exception'] = 'Nivel incorrecto';
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
