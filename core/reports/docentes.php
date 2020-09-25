<?php
require('../helpers/report.php');
require('../models/docentes.php');
require('../models/aulas.php');
require('../models/grados.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Docentes en grados asignados');

// Se instancia el módelo Categorías para obtener los datos.
$docentes = new Docente;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataDocentes = $docentes->readAllDocente()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataDocentes as $rowDocentes) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Docente: '.$rowDocentes['nombre_docente']), 1, 1, 'C', 1);
        // Se instancia el módelo Productos para obtener los datos.
        $aula = new Aulas;
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($aula->setNombre_aula($rowDocentes['id_docente'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataAulas = $aula->readDocentesxAulas()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(136, 10, utf8_decode('Aula'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataAulas as $rowAula) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(50, 10, utf8_decode($rowAula['nombre_aula']), 1, 1);
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay docentes para esta aula'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en un docente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay aulas asignadas para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>