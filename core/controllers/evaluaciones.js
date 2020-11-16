// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_EVALUACIONES = '../core/api/evaluaciones.php?action=';
const API_GRADO = '../core/api/grados.php?action=readAll';
const API_EVALUADOR = '../core/api/evaluadores.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    fillSelect( API_GRADO, 'grado', null )
    fillSelect( API_EVALUADOR, 'evaluador', null )   
    readRows( API_EVALUACIONES );
});

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.a}</td>
                <td>${row.b}</td>
                <td>${row.c}</td>
                <td>${row.d}</td>
                <td>${row.e}</td>
                <td>${row.f}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="#" onclick="openUpdateModal(${row.id})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="fas fa-pencil-alt">Editar</i></a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="openDeleteDialog(${row.id})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="fas fa-trash">Eliminar</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
}

// Evento para mostrar los resultados de una búsqueda.
$( '#buscar' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_EVALUACIONES, this );
});

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#EVALUACION' )[0].reset();
    // Se hace una consulta por medio a la api evaluadores en readOne de AJAX usando el id de la consulta readAll
    $.ajax({
        dataType: 'json',
        url: API_EVALUACIONES + 'readOne',
        data: { id_evaluador: id },
        type: 'post'
    })
    .done(function( response ){
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_evaluador' ).val( response.dataset.id );
            $( '#observaciones' ).val( response.dataset.c );
            fillSelect( API_GRADO, 'grado', response.dataset.b )
            fillSelect( API_EVALUADOR, 'evaluador', response.dataset.a )
            // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
            //M.updateTextFields(); 
        } else {
            sweetAlert( 2, result.exception, null );
        }
    })
    .fail(function( jqXHR ){
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Evento para crear o modificar un registro.
$( '#EVALUACION' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_evaluacion' ).val() ) {
        saveRow( API_EVALUACIONES, 'update', this, null );
    } else {
        saveRow( API_EVALUACIONES, 'create', this, null );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_evaluacion: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_EVALUACIONES, identifier );
}
