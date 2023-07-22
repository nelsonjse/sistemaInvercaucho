<?php
require('vista/assets/fpdf/fpdf.php');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        
        
        date_default_timezone_set('America/Caracas');
        // Arial bold 15
        $this->SetFont('Arial','',10);
        // Movernos a la derecha
        $this->Cell(70);
        //Logo
        $this->Cell(193,10, strftime("Fecha: %d de ".$meses[date('n')-1]." del %Y "),0,0,'C');
        $this->Ln(1);
        $this->Cell(316,20, strftime("Hora: %r"),0,0,'C');
        $this->Ln(7);

        $this->SetFont('Arial','B',16);
        $this->Image('vista/assets/images/logoinver.jpg',10,8,33); 
        // Título
        $this->SetMargins(10,10,10);
        $this->Cell(190,20,'Invercaucho C.A.',0,0,'C');
        $this->Ln(1);
        $this->SetFont('Arial','',10);
        $this->Cell(310,20,'Rif: J-5002343',0,0,'C');
        $this->Ln(5);
        $this->Cell(315,20,'Tlf: 0424-6543423',0,0,'C');
        $this->Ln(5);
        $this->Cell(330,20,'Direccion: Km 3 Via Quibor',0,0,'C');
        ;
        
        $this->SetFont('Arial','B',14);
        // Salto de línea
        $this->Ln(30);
        $this->Cell(0,0,'Reporte Inventario',0,0,'C');
        $this->Ln(10);
        $this->SetFillColor(255, 154, 154);
        $this->SetDrawColor(173, 0, 0);
        $this->SetFont('Arial','B',14);
        $this->Cell(120, 10, 'Producto', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Cantidad', 1, 0, 'C', 1);
        $this->Cell(40, 10, 'Precio C/U', 1, 1, 'C', 1);

       

    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }

/////////////YOOOOOOOOOO
// class PDF extends FPDF
// {
//     // Cabecera de página
//     function Header()
//     {
        
//         // Arial bold 15
//         $this->SetFont('Arial','B',16);
//         // Movernos a la derecha
//         $this->Cell(70);
//         // Título
//         $this->Cell(50,10,'Reporte Inventario',0,0,'C');
//         // Salto de línea
//         $this->Ln(20);

//         $this->Cell(120, 10, 'Producto', 1, 0, 'C', 0);
//         $this->Cell(30, 10, 'Cantidad', 1, 0, 'C', 0);
//         $this->Cell(40, 10, 'Precio C/U', 1, 1, 'C', 0);
//     }

//     // Pie de página
//     function Footer()
//     {
//         // Posición: a 1,5 cm del final
//         $this->SetY(-15);
//         // Arial italic 8
//         $this->SetFont('Arial','I',8);
//         // Número de página
//         $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
//     }
//     }






?>