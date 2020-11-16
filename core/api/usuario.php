<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/usuarios.php');
require_once('../libraries/usuarios.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
	session_start();
	// Se instancia la clase correspondiente.
	$usuario = new Usuarios;
	$mail = new PHPMailer;
	// Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
	$result = array('status' => 0, 'message' => null, 'exception' => null);
	// Se compara la acción a realizar cuando un administrador ha iniciado sesión.
	if (isset($_SESSION['id_usuario'])) {

		switch ($_GET['action']) {
				//accion para cerrar la secion actual.
			case 'logout':
				if (session_destroy()) {
					$result['status'] = 1;
					$result['message'] = 'Sesión eliminada correctamente';
				} else {
					$result['exception'] = 'Ocurrió un problema al cerrar la sesión';
				}
				break;
				//accion para leer los datos de usuarios existentes.
			case 'readProfile':
				if ($usuario->setId($_SESSION['id_usuario'])) {
					if ($result['dataset'] = $usuario->readOneUsuario()) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'Usuario inexistente';
					}
				} else {
					$result['exception'] = 'Usuario incorrecto';
				}
				break;
				//accion para editar el perfil de usuario.
			case 'editProfile':
				$_POST = $usuario->validateForm($_POST);
				if ($usuario->setId($_SESSION['id_usuario'])) {
					if ($data = $usuario->readOneUsuario()) {										
						if ($usuario->setNombre($_POST['nombre_usuario'])) {
							if ($usuario->setCorreo($_POST['email_usuario'])) {
								if (is_uploaded_file($_FILES['foto_usuario']['tmp_name'])) {
									if ($usuario->setImagen_usuario($_FILES['foto_usuario'])) {										
										if ($usuario->editProfileUser()) {
											$_SESSION['email_usuario'] = $usuario->getCorreo();
											$_SESSION['nombre_usuario'] = $usuario->getNombre();
											$_SESSION['foto_usuario'] = $usuario->getImagen_usuario();
											$result['status'] = 1;
											if ($usuario->deleteFile($usuario->getRuta(), $data['foto_usuario'])) {
												$result['message'] = 'Perfil modificado correctamente';
											} else {
												$result['message'] = 'Perfil modificado pero no se borro la imagen anterior';
											}
										} else {
											$result['exception'] = Database::getException();
										}
									} else {
										$result['exception'] = $usuario->getImageError();
									}
								} else {
									$result['exception'] = 'Ingrese una imagen';
								}
							} else {
								$result['exception'] = 'Correo incorrecto';
							}
						} else {
							$result['exception'] = 'Nombres incorrectos';
						}
					} else {
						$result['exception'] = 'Usuario inexistente';
					}
				} else {
					$result['exception'] = 'Usuario incorrecto';
				}
				break;
				//accion para editar la contraseña de usuario.
			case 'password':
				if ($usuario->setId($_SESSION['id_usuario'])) {
					$_POST = $usuario->validateForm($_POST);
					if ($_POST['clave_nueva_1'] != $_POST['nombre_usuario']) {
						if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
							if ($usuario->setPassword($_POST['clave_actual_1'])) {
								if ($usuario->checkPassword($_POST['clave_actual_1'])) {
									if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
										if ($_POST['clave_actual_1'] != $_POST['clave_nueva_1']) {
											if ($usuario->setPassword($_POST['clave_nueva_1'])) {
												if ($usuario->changePassword()) {
													$result['status'] = 1;
													$result['message'] = 'Contraseña cambiada correctamente';
												} else {
													$result['exception'] = Database::getException();
												}
											} else {
												$result['exception'] = 'La clave debe contener al menos: Una Mayuscula , una minuscula, un numero, minimo 8 caracteres y 1 caracter epecial';
											}
										} else {
											$result['exception'] = 'Clave actual y clave nueva no pueden ser iguales';
										}
									} else {
										$result['exception'] = 'Claves nuevas diferentes';
									}
								} else {
									$result['exception'] = 'Clave actual incorrecta';
								}
							} else {
								$result['exception'] = 'La clave debe contener al menos: Una Mayuscula , una minuscula, un numero, minimo 8 caracteres y 1 caracter epecial';
							}
						} else {
							$result['exception'] = 'Claves actuales diferentes';
						}
					} else {
						$result['exception'] = 'Claves igual a usuario, nombre o apellido';
					}
				} else {
					$result['exception'] = 'Usuario incorrecto';
				}
				break;
				//accion para buscar los usuarios deseados
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
				//accion para crear cuantas de usuarios 
			case 'create':
				$_POST = $usuario->validateForm($_POST);
				if ($usuario->setNombre($_POST['nombre'])) {
					if ($usuario->setCorreo($_POST['email'])) {
						if ($usuario->setEstado($_POST['estado'])) {
							if ($_POST['password'] != $_POST['nombre']) {
								if ($_POST['password'] == $_POST['password_con']) {
									if ($usuario->setPassword($_POST['password'])) {
										if (is_uploaded_file($_FILES['foto_usuario']['tmp_name'])) {
											if ($usuario->setImagen_usuario($_FILES['foto_usuario'])) {
												if ($usuario->createUsuario()) {
													$result['status'] = 1;
													$result['message'] = 'Usuario creado correctamente';
												} else {
													$result['exception'] = Database::getException();
												}
											} else {

												$result['exception'] = $usuario->getImageError();
											}
										} else {
											$result['exception'] = 'Seleccione una foto';
										}
									} else {
										$result['exception'] = 'La clave debe contener al menos: Una Mayuscula , una minuscula, un numero, minimo 8 caracteres y 1 caracter epecial';
									}
								} else {
									$result['exception'] = 'Claves diferentes';
								}
							} else {
								$result['exception'] = 'Clave igual a nombres';
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
				//accion para lleer si exuste usuarios.
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
				//accion para leer y mostrar todos los usuarios existentes
			case 'readAll':
				if ($result['dataset'] = $usuario->readAllUsuarios()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'Usuario inexistente';
				}
				break;
				//accion para actualizar registros de usuarios
			case 'update':
				$_POST = $usuario->validateForm($_POST);
				if ($usuario->setId($_POST['id_usuario'])) {
					if ($data = $usuario->readOneUsuario()) {
						if ($usuario->setNombre($_POST['nombre'])) {
							if ($usuario->setCorreo($_POST['email'])) {
								if ($usuario->setEstado($_POST['estado'])) {
									if (is_uploaded_file($_FILES['foto_usuario']['tmp_name'])) {
										if ($usuario->setImagen_usuario($_FILES['foto_usuario'])) {
											if ($usuario->updateUsuario()) {
												$result['status'] = 1;
												if ($usuario->deleteFile($usuario->getRuta(), $data['foto_usuario'])) {
													$result['message'] = 'Usuario modificada correctamente';
												} else {
													$result['message'] = 'Usuario modificada pero no se borro la imagen anterior';
												}
											} else {
												$result['exception'] = Database::getException();
											}
										} else {
											$result['exception'] = $usuario->getImageError();
										}
									} else {
										$result['exception'] = 'Foto incorrecto';
									}
								} else {
									$result['exception'] = 'Estado incorrecto';
								}
							} else {
								$result['exception'] = 'Email incorrecto';
							}
						} else {
							$result['exception'] = 'Usuario inexistente';
						}
					} else {
						$result['exception'] = 'Usuario incorrecto';
					}
				} else {
					$result['exception'] = 'Usuario incorrecto';
				}
				break;
				//accionp para eliminar usuarios existentes.
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
			case 'usuariosAI':
				if ($result['dataset'] = $usuario->usuariosAI()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay datos disponibles';
				}
				break;
			default:
				exit('Acción no disponible log');
		}
	} else {
		switch ($_GET['action']) {
			case 'readAll':
				if ($usuario->readAllUsuarios()) {
					$result['status'] = 1;
					$result['message'] = 'Existe al menos un usuario registrado';
				} else {
					$result['exception'] = 'No existen usuarios registrados';
				}
				break;
				//accion para registrarsi si en un dado caso no existiera un usuario.
			case 'register':
				$_POST = $usuario->validateForm($_POST);
				if ($result['dataset'] = $usuario->readAllUsuarios()) {
					$result['exception'] = 'Ya hay un usuario registrado';
				} else {
					if ($usuario->setNombre($_POST['nombres'])) {
						if ($usuario->setCorreo($_POST['correo'])) {
							if ($_POST['clave1'] != $_POST['nombres']) {
								if ($_POST['clave1'] == $_POST['clave2']) {
									if ($usuario->setPassword($_POST['clave1'])) {
										if ($usuario->createRow()) {
											$result['status'] = 1;
											$result['message'] = 'Usuario registrado correctamente';
										} else {
											$result['exception'] = Database::getException();
										}
									} else {
										$result['exception'] = 'La clave debe contener al menos: Una Mayuscula , una minuscula, un numero, minimo 8 caracteres y 1 caracter epecial';
									}
								} else {
									$result['exception'] = 'Claves diferentes';
								}
							} else {
								$result['exception'] = 'Claves igual a nombre o apellido';
							}
						} else {
							$result['exception'] = 'Correo incorrecto';
						}
					} else {
						$result['exception'] = 'Nombres incorrectos';
					}
				}
				break;
			case 'login':
				//accion para iniciar sesion en el sistema
				$_POST = $usuario->validateForm($_POST);
				//-print_r($_POST);
				if ($usuario->checkUser($_POST['email_usuario'])) {
					if ($usuario->setCorreo($_POST['email_usuario'])) {
						if ($result['dataset'] = $usuario->readOneUsuarioTries()) {
							if ($result['dataset']['intentos_usuario'] < 3) {
								if ($usuario->checkPassword($_POST['clave_usuario'])) {
									$result['status'] = 1;
									$result['message'] = 'Autenticación correcta';
									$_SESSION['id_usuario'] = $usuario->getId();
									$_SESSION['email_usuario'] = $usuario->getCorreo();
									$_SESSION['nombre_usuario'] = $usuario->getNombre();
									$_SESSION['foto_usuario'] = $usuario->getImagen_usuario();
								} else {
									$result['exception'] = 'Clave incorrecta';
								}
							} else {
								$result['exception'] = 'Usted tene un total de 3 intentos fallidos, intente de nuevo dento de 24 horas';
							}
						} else {
							$result['exception'] = 'error 2';
						}
					} else {
						$result['exception'] = 'error 1';
					}
				} else {
					$result['exception'] = 'Correo incorrecto';
				}
				break;
/*
			case 'codev':
				//accion para verificar el codigo
				$_POST = $usuario->validateForm($_POST);
				//-print_r($_POST);
				$mail->isSMTP();
				$mail->Host='smtp.gmail.com';
				$mail->Port=587;
				$mail->SMTPAuth=true;
				$mail->SMTPSecure='tls';
				$mail->Username='ptc2020noreply@gmail.com';
				$mail->Password='moon1428';

				$mail->setFrom($usuario->getCorreo(), $usuario->getNombre());
				$mail->addAddress($usuario->getCorreo());
				$mail->addReplyTo($usuario->getCorreo(), $usuario->getNombre());

				if ($usuario->checkUser($_POST['codigo_usuario'])) {
					
				} else {
					$result['exception'] = 'Codigo incorrecto';
				}
				break;*/
			default:
				exit('Acción no disponible fuera de la sesión');
		}
	}
	// Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
	header('content-type: application/json; charset=utf-8');
	// Se imprime el resultado en formato JSON y se retorna al controlador.
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
