<?php
require('../helpers/report.php');
require('../models/proyectos.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Reporte de proyectos');

// Se instancia el módelo Categorías para obtener los datos.
$proyectos = new Proyectos;
// Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
if ($dataProyectos = $proyectos->readAllProyecto()) {
    // Se establece un color de relleno para los encabezados.
    $pdf->SetFillColor(225);
    // Se establece la fuente para los encabezados.
    $pdf->SetFont('Times', 'B', 11);
    // Se imprimen las celdas con los encabezados.
    $pdf->Cell(40, 10, utf8_decode('Nombre proyecto'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Seccion de grado'), 1, 0, 'C', 1);
    $pdf->Cell(42, 10, utf8_decode('Nivel académico'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Especialidad'), 1, 1, 'C', 1);
    // Se establece la fuente para los datos de los productos.
    $pdf->SetFont('Times', '', 11);
    // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
    foreach ($dataProyectos as $rowProyecto) {
        // Se imprimen las celdas con los datos de los productos.
        $pdf->Cell(40, 10, utf8_decode($rowProyecto['nombre_proyecto']), 1, 0);
        $pdf->Cell(40, 10, $rowProyecto['s'], 1, 0);
        $pdf->Cell(42, 10, $rowProyecto['n'], 1, 0);
        $pdf->Cell(40, 10, $rowProyecto['e'], 1, 1);
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay proyectos'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
