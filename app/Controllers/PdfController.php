<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PdfController extends Controller
{
    public function index()
    {
        // Datos simulados que podrías obtener de un modelo o base de datos
        $data['records'] = [
            ['Nombre' => 'Ana', 'Apellido' => 'López', 'Edad' => 25],
            ['Nombre' => 'Carlos', 'Apellido' => 'García', 'Edad' => 30],
            ['Nombre' => 'Lucía', 'Apellido' => 'Hernández', 'Edad' => 35],
        ];

        // Cargar la vista con los datos
        return view('pdf_view', $data);
    }

    public function generatePdf()
    {
        // Recibir datos enviados desde la vista
        //$datosTabla1 = $this->request->getPost('datosTabla1');

        $recordsJson = $this->request->getPost('datosTabla1');
        $datosTabla1 = json_decode($recordsJson, true); // Decodificar a un array asociativo

        
        // Cargar la librería FPDF
        require_once APPPATH . 'Libraries/fpdf/fpdf.php';

        // Crear una instancia de FPDF
        $pdf = new \FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Título del documento
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode('Listado de Valoraciones'), 0, 1, 'C');
        $pdf->Ln(10); // Espacio después del título

        // Definir cabecera de tabla
        $pdf->SetFont('Arial', 'B', 12); // Aumentamos tamaño para encabezados
        $pdf->SetFillColor(200, 200, 200); // Color de fondo gris para encabezados
        $pdf->SetTextColor(0, 0, 0); // Texto en negro
        
        // Encabezado de la tabla
        $pdf->Cell(30, 10, utf8_decode('Dni'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Título'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado1'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado2'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado3'),1,0,'C');
        $pdf->Cell(50, 10, utf8_decode('Materia'),1,0,'C');
        $pdf->Cell(20, 10, utf8_decode('Puntaje'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Alta'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Actualización'),1,0,'C');
        $pdf->Ln();

        // Agregar los datos
        foreach ($datosTabla1 as $row) {
            
            $pdf->Cell(30, 10, utf8_decode($row['dni']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['titulo_det']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j1']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j2']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j3']),1,0,'C');
            $pdf->Cell(50, 10, utf8_decode($row['materia']),1,0,'C');
            $pdf->Cell(20, 10, utf8_decode($row['puntaje']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['fecha_alta']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['fecha_modifica']),1,0,'C');
            $pdf->Ln();
        }

        // Salida del PDF
        $pdf->Output('D', 'reporte.pdf');
    }

    public function generatePdfPorMateria()
    {
        // Recibir datos enviados desde la vista
        //$datosTabla1 = $this->request->getPost('datosTabla1');

        $recordsJson = $this->request->getPost('datosTabla1');
        $datosTabla1 = json_decode($recordsJson, true); // Decodificar a un array asociativo

    
        $mat = '';
        foreach ($datosTabla1 as $registro): 
            $materia = $registro['materia'];
            // recuperamos el primer registro y cortamos el bucle
            break;
        endforeach; 
        
        $titulo = 'Listado de valoraciones para la materia:'." ".$materia;
        
        // Cargar la librería FPDF
        require_once APPPATH . 'Libraries/fpdf/fpdf.php';

        // Crear una instancia de FPDF
        $pdf = new \FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Título del documento
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode($titulo), 0, 1, 'C');
        $pdf->Ln(10); // Espacio después del título

        // Definir cabecera de tabla
        $pdf->SetFont('Arial', 'B', 12); // Aumentamos tamaño para encabezados
        $pdf->SetFillColor(200, 200, 200); // Color de fondo gris para encabezados
        $pdf->SetTextColor(0, 0, 0); // Texto en negro

        // Encabezado de la tabla
        
        $pdf->Cell(30, 10, utf8_decode('Dni'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Título'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado1'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado2'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado3'),1,0,'C');
        $pdf->Cell(50, 10, utf8_decode('Materia'),1,0,'C');
        $pdf->Cell(20, 10, utf8_decode('Puntaje'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Alta'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Actualización'),1,0,'C');
        $pdf->Ln();

        // Agregar los datos
        foreach ($datosTabla1 as $row) {
            
            $pdf->Cell(30, 10, utf8_decode($row['dni']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['titulo_det']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j1']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j2']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j3']),1,0,'C');
            $pdf->Cell(50, 10, utf8_decode($row['materia']),1,0,'C');
            $pdf->Cell(20, 10, utf8_decode($row['puntaje']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['fecha_alta']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['fecha_modifica']),1,0,'C');
            $pdf->Ln();
        }

        // Salida del PDF
        $pdf->Output('D', 'reporte.pdf');
    }

    public function generatePdfPorDocente()
    {
        // Recibir datos enviados desde la vista
        //$datosTabla1 = $this->request->getPost('datosTabla1');

        $recordsJson = $this->request->getPost('datosTabla1');
        $datosTabla1 = json_decode($recordsJson, true); // Decodificar a un array asociativo

    
        $n = '';
        $a = '';
        foreach ($datosTabla1 as $registro): 
           $n = $registro['nombre'];
           $a = $registro['apellido'];
          // recuperamos el primer registro y cortamos el bucle
          break;
         endforeach; 
        
        $titulo = 'Listado de valoraciones docente:'.$n." ".$a;

        //$titulo = 'Listado de valoraciones para la materia:'." ".$materia;
        
        // Cargar la librería FPDF
        require_once APPPATH . 'Libraries/fpdf/fpdf.php';

        // Crear una instancia de FPDF
        $pdf = new \FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);

        // Título del documento
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode($titulo), 0, 1, 'C');
        $pdf->Ln(10); // Espacio después del título

        // Definir cabecera de tabla
        $pdf->SetFont('Arial', 'B', 12); // Aumentamos tamaño para encabezados
        $pdf->SetFillColor(200, 200, 200); // Color de fondo gris para encabezados
        $pdf->SetTextColor(0, 0, 0); // Texto en negro

        // Encabezado de la tabla
        
        $pdf->Cell(30, 10, utf8_decode('Dni'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Título'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado1'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado2'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Jurado3'),1,0,'C');
        $pdf->Cell(50, 10, utf8_decode('Materia'),1,0,'C');
        $pdf->Cell(20, 10, utf8_decode('Puntaje'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Alta'),1,0,'C');
        $pdf->Cell(30, 10, utf8_decode('Actualización'),1,0,'C');
        $pdf->Ln();

        // Agregar los datos
        foreach ($datosTabla1 as $row) {
            
            $pdf->Cell(30, 10, utf8_decode($row['dni']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['titulo_det']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j1']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j2']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['j3']),1,0,'C');
            $pdf->Cell(50, 10, utf8_decode($row['materia']),1,0,'C');
            $pdf->Cell(20, 10, utf8_decode($row['puntaje']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['fecha_alta']),1,0,'C');
            $pdf->Cell(30, 10, utf8_decode($row['fecha_modifica']),1,0,'C');
            $pdf->Ln();
        }

        // Salida del PDF
        $pdf->Output('D', 'reporte.pdf');
    }
}
