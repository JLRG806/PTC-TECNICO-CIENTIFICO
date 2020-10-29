// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../core/api/usuario.php?action=';

// Función para verificar si existen usuarios en el sitio privado antes de iniciar sesión.
function checkUsuarios()
{
    $.ajax({
        dataType: 'json',
        url: API + 'readAll'
    })
    .done(function( response ) {
        // Se obtiene la ruta del documento en el servidor web.
        let current = window.location.pathname;
        // Se comprueba si la página web actual es register.php, de lo contrario seria index.php
        if ( current == '/PTC-TECNICO-CIENTIFICO/views/register.php' ) {
            // Si ya existe un usuario registrado se envía a iniciar sesión, de lo contrario se pide crear el primero.
            if ( response.status ) {
                sweetAlert( 3, response.message, 'index.php' );
            } else {
                sweetAlert( 4, 'Debe crear un usuario para comenzar', null );
            }
        } else {
            // Si ya existe al menos un usuario registrado se pide iniciar sesión, de lo contrario se envía a crear el primero.
            if ( response.status ) {
                sweetAlert( 4, 'Debe autenticarse para ingresar', null );
            } else {
                sweetAlert( 3, response.exception, 'register.php' );
            }
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Función que abre una caja de dialogo para confirmar el cierre de la sesión del usuario. Requiere el archivo sweetalert.min.js para funcionar.
function signOff()
{
    swal({
        title: 'Advertencia',
        text: '¿Desea cerrar la sesión?',
        icon: 'warning',
        buttons: [ 'No', 'Sí' ],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function( value ) {
        // Se verifica si fue cliqueado el botón Sí para hacer la petición de cerrar sesión, de lo contrario se continua con la sesión actual.
        if ( value ) {
            $.ajax({
                dataType: 'json',
                url: API + 'logout'
            })
            .done(function( response ) {
                // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
                if ( response.status ) {
                    sweetAlert( 1, response.message, 'index.php' );
                } else {
                    sweetAlert( 2, response.exception, null );
                }
            })
            .fail(function( jqXHR ) {
                // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                if ( jqXHR.status == 200 ) {
                    console.log( jqXHR.responseText );
                } else {
                    console.log( jqXHR.status + ' ' + jqXHR.statusText );
                }
            });
        } else {
            sweetAlert( 4, 'Puede continuar con la sesión', null );
        }
    });
}

// Función para mostrar el formulario de editar perfil con los datos del usuario que ha iniciado sesión.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar los campos. Se encuentra en el archivo components.js
    $.ajax({
        dataType: 'json',
        url: API + 'readProfile'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del usuario que ha iniciado sesión.
            $( '#nombre_usuario' ).val( response.dataset.nombre_usuario );
            $( '#email_usuario' ).val( response.dataset.email_usuario );
            
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});


// Evento para editar el perfil del usuario que ha iniciado sesión.
$( '#profile-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'editProfile',
        data: $( '#profile-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se cierra la caja de dialogo (modal) que contiene el formulario para editar perfil, ubicado en el archivo de las plantillas.
            
            sweetAlert( 1, response.message, 'main.php' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});

// Evento para cambiar la contraseña del usuario que ha iniciado sesión.
$( '#password-form' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'password',
        data: $( '#password-form' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se cierra la caja de dialogo (modal) que contiene el formulario para cambiar contraseña, ubicado en el archivo de las plantillas.
            $( '#password-modal' ).modal( 'close' );
            sweetAlert( 1, response.message, 'account.php' );
        } else {
            sweetAlert( 2, response.exception, null );
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});