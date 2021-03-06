// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PROYECTO = '../core/api/proyectos.php?action=';
const API_DETALLE = '../core/api/detalle_proyecto.php?action=';
const API_GRADO = '../core/api/grados.php?action=readAll';

// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    fillSelect2( API_GRADO, 'grado', null );
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js    
    readRows( API_PROYECTO );    
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
                <td>${row.nombre_proyecto}</td>
                <td>${row.descripcion_proyecto}</td>
                <td>${row.id_grado}</td>
                <td>${row.n}</td>
                <td>${row.s}</td>
                <td>${row.e}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="#" onclick="openUpdateModal(${row.id_proyecto})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="fas fa-pencil-alt">Editar</i></a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="openDeleteDialog(${row.id_proyecto})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="fas fa-trash">Eliminar</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
}

function fillTable2( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.apellidos_estudiante}</td>
                <td>${row.nombre_estudiante}</td>
                <td>${row.puesto_estudiante}</td>
                <td>${row.s}</td>
                <td>                    
                    <a class="btn btn-danger btn-sm" href="#" onclick="openDeleteDialog2(${row.id_det_proyecto})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="fas fa-trash">Eliminar</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-subrows' ).html( content );
}

// Evento para mostrar los resultados de una búsqueda.
$( '#buscar' ).submit(function( event ) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows( API_PROYECTO, this );
});

function openDetailModal( id )
{
    $( '#save-form' )[0].reset();
    $( '.modal-header' ).css( 'background-color', '#3CB371' );
    $( '.modal-header' ).css( 'color', 'black' );
    $( '.modal-title' ).text( 'Detalle de Proyecto' );
    $( '#save-modal' ).modal( 'show' );
    /*let identifier = { id_proyecto: id };
    readRows2( API_DETALLE, identifier );*/
    // Se hace una consulta por medio a la api detalle en readOne de AJAX usando el id del proyecto
    $.ajax({
        dataType: 'json',
        url: API_DETALLE + 'readOne',
        data: { id_proyecto: id },
        type: 'post'
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {           
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.   
            document.getElementById('nombre_proyecto_det').innerText = response.dataset.nombre_proyecto
            document.getElementById('nombre_docente').innerText = response.dataset.nombre_docente
            document.getElementById('seccion').innerText = response.dataset.s
            document.getElementById('nivel').innerText = response.dataset.nivel_estudiante
            document.getElementById('especialidad').innerText = response.dataset.especialidad_estudiante
            var x = document.getElementById('descripcion_proyecto_det'); 
            x.value = response.dataset.descripcion_proyecto;             
        } else {
            sweetAlert( 2, result.exception, null );
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
// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    $( '#PROYECTO' )[0].reset()
    // Se hace una consulta por medio a la api proyecto en readOne de AJAX usando el id de la consulta readAll
    $.ajax({
        dataType: 'json',
        url: API_PROYECTO + 'readOne',
        data: { id_proyecto: id },
        type: 'post'
    })
    .done(function( response ){
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_proyecto' ).val( response.dataset.id_proyecto );
            $( '#nombre_proyecto' ).val( response.dataset.nombre_proyecto  );
            $( '#descripcion_proyecto' ).val( response.dataset.descripcion_proyecto );
            fillSelect2( API_GRADO, 'grado', response.dataset.id_grado )
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
$( '#PROYECTO' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_proyecto' ).val() ) {
        saveRow( API_PROYECTO, 'update', this, null );
    } else {
        saveRow( API_PROYECTO, 'create', this, null );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_proyecto: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_PROYECTO, identifier );
}

function openDeleteDialog2( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_det_proyecto: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_PROYECTO, identifier );
}