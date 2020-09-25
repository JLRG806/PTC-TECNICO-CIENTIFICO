<?php
require('../helpers/report.php');
require('../models/proyectos.php');
require('../models/estudiantes.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Material Ingresado por el Estudiante');

// Se instancia el módelo Categorías para obtener los datos.
$estudiante = new Estudiantes;

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = $actual_link; 
$url_components = parse_url($url); 
parse_str($url_components['query'], $params); 

if ($estudiante->setId($params['id'])) {
    if ($dataEstudiantes = $estudiante->readOneEstudiante()) {
        // Se establece un color de relleno para los encabezados.
        $pdf->SetFillColor(255, 255, 255);
        // Se establece la fuente para los encabezados.
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->Ln();
        $pdf->Cell(170, 10, utf8_decode('Detalles del Estudiante'), 0, 1, 'C', 1);
        $pdf->Ln();
        // Se imprimen las celdas con los encabezados.            
        $pdf->Cell(90, 10, utf8_decode('Nombre: '.$dataEstudiantes['nombre_estudiante']), 0, 0, 'L', 1);
        $pdf->Cell(90, 10, utf8_decode('Apellidos: '.$dataEstudiantes['apellidos_estudiante']), 0, 1, 'L', 1);
        
        $pdf->Cell(90, 10, utf8_decode('Correo: '.$dataEstudiantes['email_estudiante']), 0, 0, 'L', 1);
        $pdf->Cell(60, 10, utf8_decode('Nivel: '.$dataEstudiantes['nivel_estudiante']), 0, 1, 'L', 1);

        $pdf->Cell(60, 10, utf8_decode('Sección (si aplica): '.$dataEstudiantes['seccion']), 0, 0, 'L', 1);
        $pdf->Cell(60, 10, utf8_decode('Especialidad (si aplica): '.$dataEstudiantes['especialidad_estudiante']), 0, 1, 'L', 1);        

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