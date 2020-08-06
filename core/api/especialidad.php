<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/especialidad.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$especialidad = new Especialidades;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		//accion para buscar especialidades academicas
		case 'search':
            $_POST = $especialidad->validateForm($_POST);
			if ($_POST['especialidad_buscar'] != '') {
				if ($result['dataset'] = $especialidad->searchEspecialidad($_POST['especialidad_buscar'])) {
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
			//accion para crear registros de especialidades academicas
		case 'create':
            $_POST = $especialidad->validateForm($_POST);
			if ($especialidad->setEspecialidad_estudiante($_POST['especialidad_estudiante'])) {
				if ($especialidad->createEspecialidad()) {
					$result['status'] = 1;
					$result['message'] = 'Especialidad ingresada correctamente';
				} else {
					$result['exception'] = Database::getException();
				}
			} else {
				$result['exception'] = 'Especialidad incorrecta';
			}
			break;
			//accion para leer un registro o variado de especialidades academicas
		case 'readOne':
			if ($especialidad->setId($_POST['id_especialidad'])) {
				if ($result['dataset'] = $especialidad->readOneEspecialidad()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Especialidad inexistente';
				}
			} else {
				$result['exception'] = 'Especialidad incorrecta';
			}
			break;
			//accion para leer y mostrar todos los registros de especialidades academicas
		case 'readAll':
			if ($result['dataset'] = $especialidad->readAllEspecialidad()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Especialidad inexistente';
			}
			break;
			//accion para actualizar registros en la base de datos.
		case 'update':
			$_POST = $especialidad->validateForm($_POST);
			if ($especialidad->setId($_POST['id_especialidad'])) {
				if ($especialidad->readOneEspecialidad()) {
					if ($especialidad->setEspecialidad_estudiante($_POST['especialidad_estudiante'])) {
						if ($especialidad->updateEspecialidad()) {
							$result['status'] = 1;
							$result['message'] = 'Especialidad modificada correctamente';
						} else {
							$result['exception'] = Database::getException();
						}
					} else {
						$result['exception'] = 'Especialidad incorrecta';
					}
				} else {
					$result['exception'] = 'Especialidad inexistente';
				}
			} else {
				$result['exception'] = 'Especialidad incorrecta';
			}
			break;
			//accion para borrar registros de especialidades academicas
		case 'delete':
			if ($especialidad->setId($_POST['id_especialidad'])) {
				if ($especialidad->readOneEspecialidad()) {
					if ($especialidad->deleteEspecialidad()) {
						$result['status'] = 1;
						$result['message'] = 'Especialidad eliminada correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Especialidad inexistente';
				}
			} else {
				$result['exception'] = 'Especialidad incorrecta';
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
