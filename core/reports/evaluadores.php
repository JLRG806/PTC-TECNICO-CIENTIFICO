<?php
require('../helpers/report.php');
require('../models/evaluadores.php');
require('../models/proyectos.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Proyectos evaluados por sus respectivos evaluadores');

// Se instancia el módelo Categorías para obtener los datos.
$evaluador = new Evaluadores;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataEvaluador = $evaluador->readAllEvaluador()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataEvaluador as $rowEvaluador) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Evaluador: '.$rowEvaluador['nombre_evaluador']), 1, 1, 'C', 1);
        // Se instancia el módelo Productos para obtener los datos.
        $evaluacion = new Proyectos;
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($evaluacion->setNombre_proyecto($rowEvaluador['id_evaluador'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataEvaluacion = $evaluacion->readProyectosEvaluados()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(47, 10, utf8_decode('Lugar procednecia'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Aula'), 1, 0, 'C', 1);
                $pdf->Cell(47, 10, utf8_decode('Proyecto'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Observaciones'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataEvaluacion as $rowEvaluacion) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(47, 10, utf8_decode($rowEvaluacion['lugar_procedencia']), 1, 0);
                    $pdf->Cell(46, 10, $rowEvaluacion['nombre_aula'], 1, 0);
                    $pdf->Cell(47, 10, $rowEvaluacion['nombre_proyecto'], 1, 0);
                    $pdf->Cell(46, 10, $rowEvaluacion['observaciones'], 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay evaluacion para este jurado'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en una evaluación'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay evaluadores para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>