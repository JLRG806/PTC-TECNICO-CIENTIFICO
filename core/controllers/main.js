const API_PROYECTOS = '../core/api/proyectos.php?action=';
const API_MATERIAL = '../core/api/material.php?action=';
const API_USUARIO = '../core/api/usuario.php?action=';
const API_DOCENTE = '../core/api/docentes.php?action=';
const API_EVALUADORES = '../core/api/evaluadores.php?action=';

$( document ).ready(function() {
    graficaCantidadProyectosNivel()
    graficaCantidadMaterialTipo()
    graficaUsuariosAI()
    graficaDocentesNivel()
    graficaEquiposEstado()
    graficaEstadoEvaluador()
});


//Graficas estaticas
//1
function graficaCantidadProyectosNivel()
{
    $.ajax({
        dataType: 'json',
        url: API_PROYECTOS + 'cantidadProyectosNivel',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let nivel_estudiante = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                nivel_estudiante.push( row.nivel_estudiante );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
           pieGraph( 'cantidadProyectosNivel', nivel_estudiante, cantidad, 'Cantidad de proyectos');
        } else {
            $( '#cantidadProyectosNivel' ).remove();
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
//2
function graficaCantidadMaterialTipo()
{
    $.ajax({
        dataType: 'json',
        url: API_MATERIAL + 'cantidadMaterialTipo',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let tipo_equipo = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                tipo_equipo.push( row.tipo_equipo);
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            horizntalBarGraph( 'cantidadMaterialTipo', tipo_equipo, cantidad, 'Cantidad de material');
        } else {
            $( '#cantidadMaterialTipo' ).remove();
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
//3
function graficaUsuariosAI()
{
    $.ajax({
        dataType: 'json',
        url: API_USUARIO + 'usuariosAI',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let estado_usuario = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                estado_usuario.push( row.estado_usuario);
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph2( 'usuariosAI', estado_usuario, cantidad, 'Usuarios');
        } else {
            $( '#usuariosAI' ).remove();
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
//4
function graficaDocentesNivel()
{
    $.ajax({
        dataType: 'json',
        url: API_DOCENTE + 'cantidadDocentesNivel',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let nivel_estudiante = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                nivel_estudiante.push( row.nivel_estudiante );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            lineGraph( 'cantidadDocentesNivel', nivel_estudiante, cantidad, 'Cantidad de docentes');
        } else {
            $( '#cantidadDocentesNivel' ).remove();
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
//5
function graficaEquiposEstado()
{
    $.ajax({
        dataType: 'json',
        url: API_MATERIAL + 'cantidadEquiposEstado',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let estado_equipo = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                estado_equipo.push( row.estado_equipo );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            barGraph2( 'cantidadEquiposEstado', estado_equipo, cantidad, 'Cantidad de equipo');
        } else {
            $( '#cantidadEquiposEstado' ).remove();
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
//6
function graficaEstadoEvaluador()
{
    $.ajax({
        dataType: 'json',
        url: API_EVALUADORES + 'cantidadEstadoEvaluador',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let estado_evaluador = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                estado_evaluador.push( row.estado_evaluador);
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            doughnutGraph( 'cantidadEstadoEvaluador', estado_evaluador, cantidad, 'Cantidad en este estado');
        } else {
            $( '#cantidadEstadoEvaluador' ).remove();
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
//7
function graficaEstudiantesNivelAcademico()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'cantidadEstudiantesNivelAcademico',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let categorias = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                categorias.push( row.nombre_categoria );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            lineGraph( 'cantidadEstudiantesNivelAcademico', categorias, cantidad, 'Cantidad de estudiantes');
        } else {
            $( '#cantidadEstudiantesNivelAcademico' ).remove();
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
//8
function graficaCategorias()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'cantidadProductosCategoria',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let categorias = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                categorias.push( row.nombre_categoria );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            lineGraph( 'chart', categorias, cantidad, 'Cantidad de productos', 'Cantidad de productos por categoría' );
        } else {
            $( '#chart' ).remove();
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
//9
function graficaCategorias()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'cantidadProductosCategoria',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let categorias = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                categorias.push( row.nombre_categoria );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            lineGraph( 'chart', categorias, cantidad, 'Cantidad de productos', 'Cantidad de productos por categoría' );
        } else {
            $( '#chart' ).remove();
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
//10
function graficaCategorias()
{
    $.ajax({
        dataType: 'json',
        url: API_PRODUCTOS + 'cantidadProductosCategoria',
        data: null
    })
    .done(function( response ) {
        // Se comprueba si la API ha retornado datos, de lo contrario se remueve la etiqueta canvas asignada para la gráfica.
        if ( response.status ) {
            // Se declaran los arreglos para guardar los datos por gráficar.
            let categorias = [];
            let cantidad = [];
            // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
            response.dataset.forEach(function( row ) {
                // Se asignan los datos a los arreglos.
                categorias.push( row.nombre_categoria );
                cantidad.push( row.cantidad );
            });
            // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
            lineGraph( 'chart', categorias, cantidad, 'Cantidad de productos', 'Cantidad de productos por categoría' );
        } else {
            $( '#chart' ).remove();
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


//Graficas Parametrizadas   