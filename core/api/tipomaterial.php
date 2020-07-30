<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/tipomaterial.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$tmaterial = new Tipomaterial;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
            $_POST = $tmaterial->validateForm($_POST);
			if ($_POST['tipoequipo_buscar'] != '') {
				if ($result['dataset'] = $tmaterial->searchTipo_Material($_POST['tipoequipo_buscar'])) {
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
            $_POST = $tmaterial->validateForm($_POST);
			if ($tmaterial->setTipo_Material($_POST['tipoequipo'])) {
				if ($tmaterial->createTipo_Material()) {
					$result['status'] = 1;
					$result['message'] = 'Tipo equipo ingresado correctamente';
				} else {
					$result['exception'] = Database::getException();
				}
			} else {
				$result['exception'] = 'Tipo equipo incorrecta';
			}
			break;
		case 'readOne':
			if ($tmaterial->setId($_POST['id_tipoequipo'])) {
				if ($result['dataset'] = $tmaterial->readOneTipo_Material()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Tipo material inexistente';
				}
			} else {
				$result['exception'] = 'Tipo material incorrecta';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $tmaterial->readAllTipo_Material()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Tipo material inexistente';
			}
			break;
		case 'update':
			$_POST = $tmaterial->validateForm($_POST);
			if ($tmaterial->setId($_POST['id_tipoequipo'])) {
				if ($tmaterial->readOneTipo_Material()) {
					if ($tmaterial->setTipo_Material($_POST['tipoequipo'])) {
						if ($tmaterial->updateTipo_Material()) {
							$result['status'] = 1;
							$result['message'] = 'Tipo material modificada correctamente';
						} else {
							$result['exception'] = Database::getException();
						}
					} else {
						$result['exception'] = 'Tipo material incorrecta';
					}
				} else {
					$result['exception'] = 'Tipo material inexistente';
				}
			} else {
				$result['exception'] = 'Tipo material incorrecta';
			}
			break;
		case 'delete':
			if ($tmaterial->setId($_POST['id_tipoequipo'])) {
				if ($tmaterial->readOneTipo_Material()) {
					if ($tmaterial->deleteTipo_Material()) {
						$result['status'] = 1;
						$result['message'] = 'Tipo equipo eliminada correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Tipo equipo inexistente';
				}
			} else {
				$result['exception'] = 'Tipo equipo incorrecta';
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
