<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/detalle_proyecto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$detalle_proyecto = new Detalle_Proyecto;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'readOne':
			if ($detalle_proyecto->setId($_POST['id_proyecto'])) {
				if ($result['dataset'] = $detalle_proyecto->readOneDetalle_Proyecto()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Proyecto inexistente';
				}
			} else {
				$result['exception'] = 'Proyecto incorrecta';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $detalle_proyecto->readAllDetalle_Proyecto()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Proyecto inexistentes';
			}
			break;
		case 'delete':
			if ($detalle_proyecto->setId($_POST['id_det_proyecto'])) {
				if ($detalle_proyecto->readOneDetalle_Proyecto()) {
					if ($detalle_proyecto->deleteDetalle_Proyecto()) {
						$result['status'] = 1;
						$result['message'] = 'Estudiante eliminado del grupo correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Estudiante o id inexistente';
				}
			} else {
				$result['exception'] = 'Id incorrecto';
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
