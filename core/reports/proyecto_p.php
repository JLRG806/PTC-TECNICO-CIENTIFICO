<?php
require('../helpers/report.php');
require('../models/proyectos.php');
require('../models/estudiantes.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Detalles del Proyecto');

// Se instancia el módelo Categorías para obtener los datos.
$proyecto = new Proyectos;

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = $actual_link; 
$url_components = parse_url($url); 
parse_str($url_components['query'], $params); 

if ($proyecto->setId($params['id'])) {
    if ($dataProyectos = $proyecto->readOneProyecto()) {
        // Se establece un color de relleno para los encabezados.
        $pdf->SetFillColor(255, 255, 255);
        // Se establece la fuente para los encabezados.
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->Ln();
        // Se imprimen las celdas con los encabezados.            
        $pdf->Cell(60, 10, utf8_decode('Nombre del Proyecto: '.$dataProyectos['nombre_proyecto']), 0, 1, 'L', 1);

        
        $pdf->Cell(60, 10, utf8_decode('Descripción: '.$dataProyectos['descripcion_proyecto']), 0, 1, 'L', 1);

        $pdf->Cell(60, 10, utf8_decode('Nivel: '.$dataProyectos['nivel_estudiante']), 0, 0, 'L', 1);
        $pdf->Cell(60, 10, utf8_decode('Sección (si aplica): '.$dataProyectos['seccion_estudiante']), 0, 0, 'L', 1);
        $pdf->Cell(60, 10, utf8_decode('Especialidad (si aplica): '.$dataProyectos['especialidad_estudiante']), 0, 1, 'L', 1);
        
        $pdf->Ln();
        $pdf->Cell(170, 10, utf8_decode('Integrantes'), 0, 1, 'C', 1);
        $estudiante = new Estudiantes; 
        if ($estudiante->setId($params['id'])) {
            if ($dataEstudiantes = $estudiante->readEstudiantesProyecto()) {  
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Helvetica', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(40, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(40, 10, utf8_decode('Apellidos'), 1, 0, 'C', 1);
                $pdf->Cell(60, 10, utf8_decode('Correo Institucional'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Cargo'), 1, 1, 'C', 1);      
                $pdf->SetFont('Helvetica', '', 11);    
                foreach ($dataEstudiantes as $rowEstudiante) {
                    $pdf->Cell(40, 10, utf8_decode($rowEstudiante['nombre_estudiante']), 1, 0);
                    $pdf->Cell(40, 10, utf8_decode($rowEstudiante['apellidos_estudiante']), 1, 0);
                    $pdf->Cell(60, 10, $rowEstudiante['email_estudiante'], 1, 0);
                    $pdf->Cell(30, 10, utf8_decode($rowEstudiante['puesto_estudiante']), 1, 1);                    
                }           
            }  else {
                $pdf->Cell(0, 10, utf8_decode('Ocurrio un problema al intentar generar el ticket'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrio un problema al intentar generar el ticket'), 1, 1);
        }
    } else {
        $pdf->Cell(0, 10, utf8_decode('No hay proyectos para mostrar'), 1, 1);
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay proyectos para mostrar'), 1, 1);
}
$pdf->Output();
?>