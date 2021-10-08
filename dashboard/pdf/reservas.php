<?php
 //se incluye la plantilla en la cual ya esta establecido el pie de pagina y encabezado
 
    include 'plantilla.php';

    //se realiza la consulta y se verifica que el usuario este logiado
    if(isset($_SESSION['nombre_usuario'])){
        if(isset($_GET['id']) && ctype_digit($_GET['id'])) 
        {
            $sql="SELECT nombre_cliente FROM clientes WHERE codigo_cliente = ?";
            $params = array($_GET['id']);
            $data = Database::getRows($sql, $params);
            //print_r($data);
            if( $data == null)
            {
                header("location: ../clientes/index.php");
            }
            else
            {
                $sql = "SELECT C.nombre_cliente, C.apellido_cliente, C.dui_cliente, C.telefono_cliente, C.correo_cliente, R.fecha_reserva,
                R.codigo_reserva, V.nombre_vehiculo, V.precio_vehiculo, V.anio_vehiculo FROM (reservaciones R INNER JOIN clientes C ON 
                R.codigo_cliente=C.codigo_cliente)INNER JOIN vehiculos V ON R.codigo_vehiculo=V.codigo_vehiculo WHERE C.codigo_cliente=?";
                $params = array($_GET['id']);
                $data = Database::getRows($sql, $params);
                if( $data == null)
                {
                    header("location: ../clientes/index.php");
                
                }
                else
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
                    $pdf = new PDF('P','mm','Letter');
        
                    #Establecemos los márgenes izquierda, arriba y derecha: 
                    $pdf->SetMargins(10, 10 , 10); 
                    
                    #Establecemos el margen inferior: 
                    $pdf->SetAutoPageBreak(true,10);  
        
                    //variable para controlar el numero de paginas
                    $pdf->AliasNbPages();
                    
                    //Esta función nos añade una página nueva al documento pdf. 
                    $pdf->AddPage();
        
                    //se recorre la consulta para obtener ciertos datos
                    foreach($data as $row)
                    {
                    }
                    //Cell(float w [, float h [, string texto [, mixed borde [, int ln [, string align [, boolean fill )
                    //w: ancho de la celda. Si ponemos 0 la celda se extiende hasta el margen derecho.
                    //H: alto de la celda.
                    //Texto: el texto que le vamos a añadir.
                    //Borde: nos dice si van a ser visibles o no. si es 0 no serán visibles, si es 1 se verán los bordes.
                    //Ln: nos dice donde se empezara a escribir después de llamar a esta función. Siendo 0 a la derecha, 1 al comienzo de la siguiente línea, 2 debajo.
                    //Align: para alinear el texto. L alineado a la izquierda, C centrado y R alineado a la derecha.
                    //Fill: nos dice si el fondo de la celda va a ir con color o no. los valores son True o False
                    $pdf->Cell(15,7, utf8_decode('Cliente:'),0,0,'L');
                    $pdf->Cell(45,7, utf8_decode($row['nombre_cliente']." ".$row['apellido_cliente']),0,1,'L');
                    $pdf->Cell(10,7, utf8_decode('DUI:'),0,0,'L');
                    $pdf->Cell(45,7, utf8_decode($row['dui_cliente']),0,1,'L');
                    $pdf->Cell(17,7, utf8_decode('Telefono:'),0,0,'L');
                    $pdf->Cell(30,7, utf8_decode($row['telefono_cliente']),0,1,'L');
                    $pdf->Cell(35,7, utf8_decode('Correo Electronico:'),0,0,'L');
                    $pdf->Cell(45,7, utf8_decode($row['correo_cliente']),0,1,'L');
        
                    //se establece el tipo de letra
                    $pdf->SetFont('Arial', 'B', 13);
                    $pdf->Ln(10);
                    $pdf->Cell(15);
                    $pdf->Cell(170,10, 'Reservas Realizadas',0,0,'C');
                    $pdf->Ln(15);
                    
                    //se coloca los encabezados de la tabla ademas de poner el color de fondo y color de letra
                    $pdf->SetFillColor(0,0,0);
                    $pdf->SetTextColor(255,255 ,255);
                    $pdf->SetFont('Arial','B',11);
                    $pdf->Cell(5);
                    $pdf->Cell(30,6,'Codigo Reserva',0,0,'C',1);
                    $pdf->Cell(1);
                    $pdf->Cell(35,6,'Fecha Reserva',0,0,'C',1);
                    $pdf->Cell(1);
                    $pdf->Cell(50,6,'Vehiculo',0,0,'C',1);
                    $pdf->Cell(1);
                    $pdf->Cell(22,6,utf8_decode('Año'),0,0,'C',1);
                    $pdf->Cell(1);
                    $pdf->Cell(24,6,'Precio',0,0,'C',1);
                    $pdf->Ln(6);
                    $pdf->SetFillColor(208, 211, 212);
                    $pdf->SetFont('Arial','',11);
                    $pdf->SetTextColor(0,0 ,0);
                    $pdf->Ln(1);
                    $subtotal=0;
                    // se recorre la consulta y se colocan en las celdas los datos obtenidos
                    foreach($data as $row)
                    {
                        $pdf->Cell(5);
                        $pdf->Cell(30,6,utf8_decode($row['codigo_reserva']),0,0,'C',1);
                        $pdf->Cell(35,6,utf8_decode($row['fecha_reserva']),0,0,'C',1);
                        $pdf->Cell(50,6,utf8_decode($row['nombre_vehiculo']),0,0,'C',1);
                        $pdf->Cell(25,6,utf8_decode($row['anio_vehiculo']),0,0,'C',1);
                        $pdf->Cell(25,6,utf8_decode($row['precio_vehiculo']),0,1,'C',1);
                        $pdf->Ln(1);
                        $subtotal=$row['precio_vehiculo']+$subtotal;
                    }
                    $pdf->Cell(117);
                    $pdf->SetFillColor(0,0,0);
                    $pdf->SetTextColor(255,255 ,255);
                    $pdf->SetFont('Arial','B',11);
                    $pdf->Cell(26,6,utf8_decode('TOTAL($)'),0,0,'C',1);
                    $pdf->Cell(1);
                    $pdf->SetFillColor(208, 211, 212);
                    $pdf->SetFont('Arial','',11);
                    $pdf->SetTextColor(0,0 ,0);
                    $pdf->Cell(26,6,utf8_decode($subtotal),0,1,'C',1);
                    $pdf->Output();

                }
            }
        }
        else{
            header("location: ../clientes/index.php");
        }
    } 
    else 
    {
         header("location: ../main/login.php");
    }
?>