<?php
//se incluye la plantilla en la cual ya esta establecido el pie de pagina y encabezado
ob_start();
session_start();
include("../../lib/fpdf/fpdf.php");
include("../../lib/database.php");
include("../../lib/validator.php");
    
    
    class PDF extends FPDF
    {
        function Header()
        {
         // generar un pdf en forma horizontal con una hoja tamaño letter y con dimensiones en milimetros
        //Orientación:
        //* P o Portrait (normal) por defecto
        //* L o Landscape (apaisado)
        //Unidad
        //* pt: punto
        //* mm: milimetro por defecto
        //* cm: centimetro
        //* in: pulgada
        //Formato (texto sensible a minúscula/mayúscula)
        //* A3
        //* A4
        //* A5
        //* Letter
        //* Legal
            $registro = date("Y-m-d");
            $this->Image('../../img/logo/logo.png', 10, 10, 30);
            $this->SetFont('Arial', 'B', 15);
            $this->Cell(33);
            $this->Cell(120,7, 'EMPRESA AUTOSFLASH',0,0,'L');
            $this->SetFont('Arial', '', 11);
            $this->ln(4);
            $this->Cell(33);
            $this->Cell(120,7, 'Visitanos en: https://www.autosflash.com',0,0,'L');
            $this->ln(4);
            $this->Cell(33);
            $this->Cell(120,7, utf8_decode('Número de contacto: 7867 4261'),0,0,'L');
            $this->ln(4);
            $this->Cell(33);
            $this->Cell(120,7, utf8_decode('autosflash@hotmail.com'),0,0,'L');
            $this->ln(4);
            $this->Cell(33);
            $this->Cell(120,7, utf8_decode('Avenidad Escalon, 65 calle poniente, San Salvador, El Salvador'),0,0,'L');
            $this->ln(4);
            $this->Cell(33);
            $this->Cell(120,7, utf8_decode('Fecha: '.$registro),0,0,'L');
            $this->ln(10);
           
            $this->Ln(8);
            
        }
        function Footer()
		{
            //se hacen las espesificaciones para el footer del PDF, el tipo de letra, numero de pagina y la alineacion
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
            $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'',0,0,'C');
            $this->Ln(5);
            $this->Cell(0,10,'San Salvador, El Salvador:  '.strftime("%A %d de %B del %Y"),0,0,'C');
        
            function morepagestable($datas, $lineheight=13)
             {
                // Algunas cosas para establecer y ' recuerdan '
                $l = $this->lMargin;
                $startheight = $h = $this->GetY();
                $startpage = $currpage = $maxpage = $this->page;
               
                // Calcular todo el ancho
                $fullwidth = 0;
                foreach($this->tablewidths AS $width) {
                 $fullwidth += $width;
                }
            }
        }	
    }


?>