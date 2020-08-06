// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_ESTUDIANTE = '../core/api/estudiantes.php?action=';
const API_ESPECIALIDAD = '../core/api/especialidad.php?action=readAll';
const API_NIVEL = '../core/api/nivel.php?action=readAll';
const API_SECCION = '../core/api/secciones.php?action=readAll';
// Método que se ejecuta cuando el documento está listo.
$( document ).ready(function() {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js   
    fillSelect( API_ESPECIALIDAD, 'especialidad', null );  
    fillSelect( API_NIVEL, 'nivel', null );             
    readRows( API_ESTUDIANTE );    
});

function f1(){
    var r=document.getElementById('seccion');
    for(i=0;i<r.length;i++)
    if(r.options[i].selected==true)
    {
        r.remove(i);
        i--;
    }
}

$(document).on('change', "#nivel", function () {
    var e = document.getElementById("nivel");
    var id_s = e.options[e.selectedIndex].value;
    console.log(id_s);
    var opcion = e.options[e.selectedIndex].text;
    var selectBox = document.getElementById("seccion");
    //readNivel( id_s,'seccion', null );
    
    let newOption = new Option('Seleccione una sección','0');
        
    /*let newOption5 = new Option('E','5');
    let newOption6 = new Option('A-1','6');
    let newOption7 = new Option('A-2','7');
    let newOption8 = new Option('A-3','8');
    let newOption9 = new Option('A-4','9');
    let newOption10 = new Option('A-5','10');
    let newOption11 = new Option('B-1','11');
    let newOption12 = new Option('B-2','12');
    let newOption13 = new Option('B-3','13');
    let newOption14 = new Option('B-4','14');
    let newOption15 = new Option('B-5','15');*/

    if (opcion == '7°') {
        f1();
        let newOption1 = new Option('A','1');
        let newOption2 = new Option('B','2');
        let newOption3 = new Option('C','3');
        selectBox.add(newOption1,undefined);
        selectBox.add(newOption2,undefined);
        selectBox.add(newOption3,undefined);
    } else if (opcion == '8°') {
        f1();
        let newOption1 = new Option('A','4');
        let newOption2 = new Option('B','5');
        let newOption3 = new Option('C','6');
        let newOption4 = new Option('D','7');
        selectBox.add(newOption1,undefined);
        selectBox.add(newOption2,undefined);
        selectBox.add(newOption3,undefined);
        selectBox.add(newOption4,undefined);
    } else if (opcion == '9°') {
        f1();
        $('#especialidad').val('0');
        let newOption1 = new Option('A','8');
        let newOption2 = new Option('B','9');
        let newOption3 = new Option('C','10');
        let newOption4 = new Option('E','11');
        let newOption5 = new Option('D','12');
        selectBox.add(newOption1,undefined);
        selectBox.add(newOption2,undefined);
        selectBox.add(newOption3,undefined);
        selectBox.add(newOption4,undefined);
        selectBox.add(newOption5,undefined);
    } else if (opcion == 'Primer Año') {
        f1();
        let newOption6 = new Option('A-1','13');
        let newOption7 = new Option('A-2','14');
        let newOption8 = new Option('A-3','15');
        let newOption9 = new Option('A-4','16');
        let newOption10 = new Option('A-5','17');
        let newOption11 = new Option('B-1','18');
        let newOption12 = new Option('B-2','19');
        let newOption13 = new Option('B-3','20');
        let newOption14 = new Option('B-4','21');
        let newOption15 = new Option('B-5','22');
        selectBox.add(newOption6,undefined);
        selectBox.add(newOption7,undefined);
        selectBox.add(newOption8,undefined);
        selectBox.add(newOption9,undefined);
        selectBox.add(newOption10,undefined);
        selectBox.add(newOption11,undefined);
        selectBox.add(newOption12,undefined);
        selectBox.add(newOption13,undefined);
        selectBox.add(newOption14,undefined);
        selectBox.add(newOption15,undefined);
    } else if (opcion == 'Segundo Año') {
        f1();
        let newOption6 = new Option('A-1','23');
        let newOption7 = new Option('A-2','24');
        let newOption8 = new Option('A-3','25');
        let newOption9 = new Option('A-4','26');
        let newOption10 = new Option('A-5','27');
        let newOption11 = new Option('B-1','28');
        let newOption12 = new Option('B-2','29');
        let newOption13 = new Option('B-3','30');
        let newOption14 = new Option('B-4','31');
        let newOption15 = new Option('B-5','32');
        selectBox.add(newOption6,undefined);
        selectBox.add(newOption7,undefined);
        selectBox.add(newOption8,undefined);
        selectBox.add(newOption9,undefined);
        selectBox.add(newOption10,undefined);
        selectBox.add(newOption11,undefined);
        selectBox.add(newOption12,undefined);
        selectBox.add(newOption13,undefined);
        selectBox.add(newOption14,undefined);
        selectBox.add(newOption15,undefined);
    } else if (opcion == 'Tercer Año') {
        f1();
        let newOption6 = new Option('A-1','33');
        let newOption7 = new Option('A-2','34');
        let newOption8 = new Option('A-3','35');
        let newOption9 = new Option('A-4','36');
        let newOption10 = new Option('A-5','37');
        let newOption11 = new Option('B-1','38');
        let newOption12 = new Option('B-2','39');
        let newOption13 = new Option('B-3','40');
        let newOption14 = new Option('B-4','41');
        let newOption15 = new Option('B-5','42');
        selectBox.add(newOption6,undefined);
        selectBox.add(newOption7,undefined);
        selectBox.add(newOption8,undefined);
        selectBox.add(newOption9,undefined);
        selectBox.add(newOption10,undefined);
        selectBox.add(newOption11,undefined);
        selectBox.add(newOption12,undefined);
        selectBox.add(newOption13,undefined);
        selectBox.add(newOption14,undefined);
        selectBox.add(newOption15,undefined);
    }
});

function readNivel( id, selectId, selected )
{
    $.ajax({
        dataType: 'json',
        url: API_SECCION + 'readNivel',
        data: { id_nivel: id },
        type: 'post'
    })
    .done(function( response ) {
        if ( response.status ) {
            let content = '';
            if ( ! selected ) {
                content += '<option value="0" disabled selected>Seleccione una opción</option>';
            }
            response.dataset.forEach(function( row ) {
                value = Object.values( row )[0];
                text = Object.values( row )[1];
                if ( value != selected ) {
                    content += `<option value="${value}">${text}</option>`;
                } else {
                    content += `<option value="${value}" selected>${text}</option>`;
                }
            });
            $( '#' + selectId ).html( content );
        } else {
            $( '#' + selectId ).html( '<option value="">No hay opciones disponibles</option>' );
        }
    })
    .fail(function( jqXHR ) {
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}

// Función para llenar la tabla con los datos enviados por readRows().
function fillTable( dataset )
{
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.apellidos_estudiante}</td>
                <td>${row.nombre_estudiante}</td>
                <td>${row.email_estudiante}</td>
                <td>${row.nivel}</td>
                <td>${row.seccion}</td>                
                <td>${row.especialidad_estudiante }</td>
                <td>
                    <a class="btn btn-info btn-sm" href="#" onclick="openUpdateModal(${row.id_estudiante})" class="blue-text tooltipped" data-tooltip="Actualizar"><i class="fas fa-pencil-alt">Editar</i></a>
                    <a class="btn btn-danger btn-sm" href="#" onclick="openDeleteDialog(${row.id_estudiante})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="fas fa-trash">Eliminar</i></a>
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
    searchRows( API_ESTUDIANTE, this );
});

// Función que prepara formulario para modificar un registro.
function openUpdateModal( id )
{
    // Se limpian los campos del formulario.
    f1();
    fillSelect( API_SECCION, 'seccion', null )
    $( '#ESTUDIANTES' )[0].reset();
    $.ajax({
        dataType: 'json',
        url: API_ESTUDIANTE + 'readOne',
        data: { id_estudiante: id },
        type: 'post'
    })
    .done(function( response ){
        // Se comprueba si la API ha retornado una respuesta satisfactoria, de lo contrario se muestra un mensaje de error.
        if ( response.status ) {
            // Se inicializan los campos del formulario con los datos del registro seleccionado previamente.
            $( '#id_estudiante' ).val( response.dataset.id_estudiante );
            $( '#nombre_estudiante' ).val( response.dataset.nombre_estudiante );
            $( '#apellidos_estudiante' ).val( response.dataset.apellidos_estudiante );
            $( '#email_estudiante' ).val( response.dataset.email_estudiante );
            fillSelect( API_SECCION, 'seccion', response.dataset.id_seccion )
            fillSelect( API_ESPECIALIDAD, 'especialidad', response.dataset.id_especialidad )
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
$( '#ESTUDIANTES' ).submit(function( event ) {
    event.preventDefault();
    // Se llama a la función que crea o actualiza un registro. Se encuentra en el archivo components.js
    // Se comprueba si el id del registro esta asignado en el formulario para actualizar, de lo contrario se crea un registro.
    if ( $( '#id_estudiante' ).val() ) {
        saveRow( API_ESTUDIANTE, 'update', this, null );
    } else {
        saveRow( API_ESTUDIANTE, 'create', this, null );
    }
});

// Función para establecer el registro a eliminar mediante el id recibido.
function openDeleteDialog( id )
{
    // Se declara e inicializa un objeto con el id del registro que será borrado.
    let identifier = { id_estudiante: id };
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete( API_ESTUDIANTE, identifier );
}
