<?php
require('../helpers/report.php');
require('../models/grados.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Reporte de grados');

// Se instancia el módelo Categorías para obtener los datos.
$grados = new Grados;
// Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
if ($dataGrado = $grados->readAllGrado()) {
    // Se establece un color de relleno para los encabezados.
    $pdf->SetFillColor(225);
    // Se establece la fuente para los encabezados.
    $pdf->SetFont('Times', 'B', 11);
    // Se imprimen las celdas con los encabezados.
    $pdf->Cell(30, 10, utf8_decode('Nombre aula'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Nombre docente'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Seccion de grado'), 1, 0, 'C', 1);
    $pdf->Cell(42, 10, utf8_decode('Nivel académico'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Especialidad'), 1, 1, 'C', 1);
    // Se establece la fuente para los datos de los productos.
    $pdf->SetFont('Times', '', 11);
    // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
    foreach ($dataGrado as $rowGrado) {
        // Se imprimen las celdas con los datos de los productos.
        $pdf->Cell(30, 10, utf8_decode($rowGrado['nombre_aula']), 1, 0);
        $pdf->Cell(40, 10, $rowGrado['nombre_docente'], 1, 0);
        $pdf->Cell(40, 10, $rowGrado['seccion_estudiante'], 1, 0);
        $pdf->Cell(42, 10, $rowGrado['nivel_estudiante'], 1, 0);
        $pdf->Cell(40, 10, $rowGrado['especialidad_estudiante'], 1, 1);
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay grados'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
