const API_ESTUDIANTE = '../core/api/estudiantes.php?action=';
const API_PROYECTO = '../core/api/proyectos.php?action=';
const API_EVALUADORES = '../core/api/evaluadores.php?action=';

$(document).ready(function () {
    $(".nav-tabs a").click(function () {
        $(this).tab('show');
    });    
});

var r = 0;

$('#tipo_reporte').submit(function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    reportType();
});

$( '#buscar' ).submit(function( event ) {
    event.preventDefault();
    if (r == 0) {
        
    } else if (r == 1) {
        searchReport( API_PROYECTO, this );
    } else if (r == 2) {
        searchReport( API_EVALUADORES, this );
    } else if (r == 3) {
        searchReport( API_ESTUDIANTE, this );
    }     
});

function reportType() {    
    if (!($(document.getElementById('estudiantes_op')).is(':checked')) &&
        !($(document.getElementById('proyectos_op')).is(':checked')) &&
        !($(document.getElementById('materiales_op')).is(':checked'))) {
            
            console.log("agregar mensaje ,seleccione un tipo de reporte,");

    }
    else if (document.getElementById('estudiantes_op').checked &&
        !($(document.getElementById('proyectos_op')).is(':checked')) &&
        !($(document.getElementById('materiales_op')).is(':checked'))) {
          
            $('.nav-tabs a[href="#m_parametros"]').tab('show');
            r = 1;

    } else if (document.getElementById('proyectos_op').checked &&
        !($(document.getElementById('estudiantes_op')).is(':checked')) &&
        !($(document.getElementById('materiales_op')).is(':checked'))) {

            $('.nav-tabs a[href="#m_parametros"]').tab('show');
            r = 2;

    } else if (document.getElementById('materiales_op').checked &&
        !($(document.getElementById('estudiantes_op')).is(':checked')) &&
        !($(document.getElementById('proyectos_op')).is(':checked'))) {

            $('.nav-tabs a[href="#m_parametros"]').tab('show');
            r = 3;

    }    
    return r;
}


function fillTable( dataset )
{
    let content = '';
    let url = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.forEach(function( row ) {
        if (r == 0) {
            
        } else if (r == 1) {
            url = `proyecto_p.php?id=${row.id}`;
            content += `
                <tr>
                    <td>${row.a}</td>
                    <td>${row.b}</td>
                    <td>${row.c}</td>
                    <td>                    
                        <a class="btn btn-info btn-sm" href="../core/reports/${url}" target="_blank" class="green-text tooltipped" data-tooltip="Reporte"><i class="fas fa-eye">Ver Reporte</i></a>
                    </td>
                </tr>
            `;
        } else if (r == 2) {
            url = `lugar_procedencia_p.php?id=${row.id}&n=${row.a}`;
            content += `
                <tr>
                    <td>${row.a}</td>
                    <td>                    
                        <a class="btn btn-info btn-sm" href="../core/reports/${url}" target="_blank" class="green-text tooltipped" data-tooltip="Reporte"><i class="fas fa-eye">Ver Reporte</i></a>
                    </td>
                </tr>
            `;
        } else if (r == 3) {
            //url = `ticket.php?id=${row.id_pedido}&c=${row.id_cliente}`;
            url = `estudiante_p.php?id=${row.id}`;
            content += `
                <tr>
                    <td>${row.a}</td>
                    <td>${row.b}</td>
                    <td>${row.c}</td>
                    <td>                    
                        <a class="btn btn-info btn-sm" href="../core/reports/${url}" target="_blank" class="green-text tooltipped" data-tooltip="Reporte"><i class="fas fa-eye">Ver Reporte</i></a>
                    </td>
                </tr>
            `;
        }        
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    $( '#tbody-rows' ).html( content );
}

function reportParameters() {
    
}
/*
document.getElementById('ifYes').style.display = 'none';
document.getElementById('ifYes').style.display = 'block';
$('#myTab a[href="#profile"]').tab('show') // Select tab by name
$('#myTab li:first-child a').tab('show') // Select first tab
$('#myTab li:last-child a').tab('show') // Select last tab
$('#myTab li:nth-child(3) a').tab('show') // Select third tab*/