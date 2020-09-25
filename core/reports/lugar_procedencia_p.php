<?php
require('../helpers/report.php');
require('../models/evaluadores.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Evaluadores por Lugar de Procedencia');

// Se instancia el módelo Categorías para obtener los datos.
$evaluador = new Evaluadores;

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = $actual_link; 
$url_components = parse_url($url); 
parse_str($url_components['query'], $params); 

if ($evaluador->setLugar_procedencia($params['n'])) {
    if ($dataEvaluadores = $evaluador->readEvaluadorProcedencia()) {
        $pdf->SetFillColor(225);
        // Se establece la fuente para los encabezados.
        $pdf->SetFont('Helvetica', 'B', 11);
        // Se imprimen las celdas con los encabezados.
        $pdf->Cell(170, 10, utf8_decode('Lugar de Procedencia: '.$params['n']), 0, 1, 'C', 1);
        
        $pdf->Ln();  
        $pdf->SetFont('Helvetica', '', 11);    
        foreach ($dataEvaluadores as $rowEvaluador) {
            $pdf->SetFillColor(255, 255, 255);
            $pdf->Cell(100, 10, utf8_decode('Nombre: '.$rowEvaluador['nombre_evaluador']), 0, 0, 'L', 1);
            $pdf->Cell(60, 10, utf8_decode('Apellidos: '.$rowEvaluador['apellidos_evaluador']), 0, 1, 'L', 1);

            $pdf->Cell(100, 10, utf8_decode('Correo: '.$rowEvaluador['email_evaluador']), 0, 0, 'L', 1);
            $pdf->Cell(60, 10, utf8_decode('Ocupación: '.$rowEvaluador['ocupacion']), 0, 1, 'L', 1);

            $pdf->Cell(100, 10, utf8_decode('Telefóno: '.$rowEvaluador['telefono_evaluador']), 0, 0, 'L', 1);
            $pdf->Cell(60, 10, utf8_decode('Estado: '.$rowEvaluador['estado_evaluador']), 0, 1, 'L', 1);  
            $pdf->Ln();               
        }     
    } else {
        $pdf->Cell(0, 10, utf8_decode('No hay proyectos para mostrar'), 1, 1);
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay proyectos para mostrar'), 1, 1);
}
$pdf->Output();
?>