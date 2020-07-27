<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/usuarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	// Se instancia la clase correspondiente.
	$usuario = new Usuarios;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	switch ($_GET['action']) {
		case 'search':
			$_POST = $usuario->validateForm($_POST);
			if ($_POST['usuario_buscar'] != '') {
				if ($result['dataset'] = $usuario->searchUsuario($_POST['usuario_buscar'])) {
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
			$_POST = $usuario->validateForm($_POST);
			if ($usuario->setNombre($_POST['nombre'])) {
				if ($usuario->setCorreo($_POST['email'])) {
					if ($usuario->setEstado($_POST['estado'])) {
						if ($_POST['password'] == $_POST['password_con']) {
							if ($usuario->setPassword($_POST['password'])) {
								if ($usuario->createUsuario()) {
									$result['status'] = 1;
									$result['message'] = 'Usuario creado correctamente';
								} else {
									$result['exception'] = Database::getException();
								}
							} else {
								$result['exception'] = 'Clave menor a 6 caracteres';
							}
						} else {
							$result['exception'] = 'Claves diferentes';
						}
					} else {
						$result['exception'] = 'Estado incorrecto';
					}
				} else {
					$result['exception'] = 'Correo incorrecto';
				}
			} else {
				$result['exception'] = 'Nombre incorrecto';
			}
			break;
		case 'readOne':
			if ($usuario->setId($_POST['id_usuario'])) {
				if ($result['dataset'] = $usuario->readOneUsuario()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Usuario inexistente';
				}
			} else {
				$result['exception'] = 'Usuario incorrecto';
			}
			break;
		case 'readAll':
			if ($result['dataset'] = $usuario->readAllUsuarios()) {
				$result['status'] = 1;
			} else {
				$result['exception'] = 'Usuario inexistente';
			}
			break;
		case 'update':
			$_POST = $usuario->validateForm($_POST);
			if ($usuario->setId($_POST['id_usuario'])) {
				if ($usuario->readOneUsuario()) {
					if ($usuario->setNombre($_POST['nombre'])) {
						if ($usuario->setCorreo($_POST['email'])) {
							if ($usuario->setEstado($_POST['estado'])) {
								if ($usuario->updateUsuario()) {
									$result['status'] = 1;
									$result['message'] = 'Usuario modificado correctamente';
								} else {
									$result['exception'] = Database::getException();
								}
							} else {
								$result['exception'] = 'Estado incorrecto';
							}
						} else {
							$result['exception'] = 'Correo incorrecto';
						}
					} else {
						$result['exception'] = 'Nombre incorrecto';
					}
				} else {
					$result['exception'] = 'Usuario inexistente';
				}
			} else {
				$result['exception'] = 'Usuario incorrecto';
			}
			break;
		case 'delete':
			if ($usuario->setId($_POST['id_usuario'])) {
				if ($usuario->readOneUsuario()) {
					if ($usuario->deleteUsuario()) {
						$result['status'] = 1;
						$result['message'] = 'Usario eliminado correctamente';
					} else {
						$result['exception'] = Database::getException();
					}
				} else {
					$result['exception'] = 'Usuario inexistente';
				}
			} else {
				$result['exception'] = 'Usuario incorrecto';
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
