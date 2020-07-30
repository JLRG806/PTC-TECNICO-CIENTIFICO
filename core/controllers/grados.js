// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_GRADO = '../core/api/grados.php?action=';
const API_AULA = '../core/api/aulas.php?action=readAll';
const API_DOCENTE = '../core/api/docentes.php?action=readAll';
const API_SECCION = '../core/api/secciones.php?action=readAll';
const API_ESPECIALIDAD = '../core/api/especialidad.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    fillSelect( API_AULA, 'aula', null );
    fillSelect( API_DOCENTE, 'docente', null );
    fillSelect( API_SECCION, 'seccion', null );
    fillSelect( API_ESPECIALIDAD, 'especialidad', null );
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows( API_GRADO );
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
                <td>${row.nombre_aula}</td>
                <td>${row.nombre_docente}</td>
                <td>${row.seccion_estudiante}</td>
                <td>${row.especialidad_estudiante}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="#" onclick="openUpdateModal(${row.id_grado})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="fas fa-pencil-alt">Editar</i></a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="openDeleteDialog(${row.id_grado})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="fas fa-trash">Eliminar</i></a>
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
    searchRows( API_GRADO, this );
});

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#GRADO' )[0].reset();

    $.ajax({
        dataType: 'json',
        url: API_GRADO + 'readOne',
        data: { id_grado: id },
        type: 'post'
    })
    .done(function( response ){
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_grado' ).val( response.dataset.id_grado );
            fillSelect( API_AULA, 'aula', response.dataset.nombre_aula )
            fillSelect( API_DOCENTE, 'docente', response.dataset.nombre_docente )
            fillSelect( API_SECCION, 'seccion', response.dataset.seccion_estudiante )
            fillSelect( API_ESPECIALIDAD, 'especialidad', response.dataset.especialidad_estudiante )
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
$( '#GRADO' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_grado' ).val() ) {
        saveRow( API_GRADO, 'update', this, null );
    } else {
        saveRow( API_GRADO, 'create', this, null );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_grado: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_GRADO, identifier );
}
