<?php
require('../helpers/report.php');
require('../models/estudiantes.php');
require('../models/material.php');
require('../models/especialidad.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Material entrado por los alumnos');

// Se instancia el módelo Categorías para obtener los datos.
$estudiantes = new Estudiantes;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataEstudiante = $estudiantes->readAllEstudiante()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataEstudiante as $rowEstudiante) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Estudiante: '.$rowEstudiante['nombre_estudiante']), 1, 1, 'C', 1);
        // Se instancia el módelo Productos para obtener los datos.
        $especialidad = new Especialidades;
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($especialidad->setEspecialidad_estudiante($rowEstudiante['id_estudiante'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataEspecialidad = $especialidad->readEstudiantesxMaterial()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(47, 10, utf8_decode('Codigo'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Especialidad'), 1, 0, 'C', 1);
                $pdf->Cell(47, 10, utf8_decode('Material'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Cantidad'), 1, 1, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataEspecialidad as $rowEspecialidad) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(47, 10, utf8_decode($rowEspecialidad['codigo_estudiante']), 1, 0);
                    $pdf->Cell(46, 10, $rowEspecialidad['especialidad_estudiante'], 1, 0);
                    $pdf->Cell(47, 10, $rowEspecialidad['nombre_equipo'], 1, 0);
                    $pdf->Cell(46, 10, $rowEspecialidad['cantidad'], 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay material ingresado por este alumno'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en un estudiante'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay estudiantes para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>