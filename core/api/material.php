<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/material.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$material = new Material;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
            $_POST = $material->validateForm($_POST);
			if ($_POST['material_buscar'] != '') {
				if ($result['dataset'] = $material->searchMaterial($_POST['material_buscar'])) {
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
		case 'readOne':
			if ($material->setId($_POST['id_material'])) {
				if ($result['dataset'] = $material->readOneMaterial()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Material inexistente';
				}
			} else {
				$result['exception'] = 'Material incorrecto';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $material->readAllMaterial()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Material inexistente';
			}
			break;
		case 'cantidadMaterialTipo':
			if ($result['dataset'] = $material->cantidadMaterialTipo()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'No hay datos disponibles';
			}
			break;
		case 'cantidadEquiposEstado':
			if ($result['dataset'] = $material->cantidadEquiposEstado()) {
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
