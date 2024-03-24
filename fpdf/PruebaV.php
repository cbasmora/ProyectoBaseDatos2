<?php

$id = $_GET['id'];
$consulta = "SELECT * FROM productos WHERE id = $id";

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      $this->SetFont('Arial', 'B', 14);
      $this->Cell(0, 8, utf8_decode('CLÍNICA MEINTEGRAL S.A.S'), 0, 1, 'C');
      $this->SetFont('Arial', '', 10);
      $this->Cell(0, 5, utf8_decode('HOJAS DE VIDA EQUIPOS DE COMPUTO'), 0, 1, 'C');
      $this->Cell(0, 5, utf8_decode('APOYO TECNOLÓGICO Y GESTIÓN DE LA INFORMACIÓN'), 0, 1, 'C');
      
      $this->SetDrawColor(200, 200, 200); // Color gris para la línea
      $this->SetLineWidth(0.5); // Grosor de la línea
      $this->Line(10, $this->GetY(), $this->GetPageWidth() - 10, $this->GetY()); // Dibuja la línea horizontal
      
      $this->Image('logo.png', 10, 5, 40); // Logo de la empresa
      $this->SetFont('Arial', 'B', 10); // Tipo de fuente, negrita, tamaño del texto
      $this->Ln(10); // Salto de línea de 10 unidades después de la línea

      $posX = $this->GetX();
      $posY = $this->GetY();
  
      // Calcula el ancho del documento
      $anchoDoc = $this->GetPageWidth();
  
      // Posiciona el cursor en la esquina superior derecha
      $this->SetXY($anchoDoc - 40, 15);
  
      $this->SetFont('Arial', '', 8);
      $this->Cell(0, 5, utf8_decode('Código: M-HV-EC-01'), 0, 1, 'R');
      $this->Cell(0, 5, utf8_decode('Versión: 2.0  Año: 2024'), 0, 1, 'R');
  
      // Restaura la posición original
      $this->SetXY($posX, $posY);

   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); // Tipo de fuente, cursiva, tamaño del texto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); // Número de página

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); // Tipo de fuente, cursiva, tamaño del texto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // Fecha de la página
   }
}

$pdf = new PDF();
$pdf->AddPage(); // Agregar una página
$pdf->AliasNbPages(); // Mostrar el número total de páginas

// Realizar la consulta para obtener la información del producto
// Aquí deberías tener un manejo adecuado de errores y de sanitización de variables para evitar inyección de SQL
$conexion = new mysqli("localhost", "root", "123", "inventario");
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}


$resultado = $conexion->query($consulta);
if ($resultado->num_rows > 0) {
    $producto = $resultado->fetch_assoc();

    // Mostrar los datos del producto en la tabla
    $pdf->SetX(90);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(181, 249, 255); //color de la celda azul//


    $pdf->Cell(35, 10, utf8_decode('ID:'), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12); //le le quita la negrita 'B' que estoy colocando en las CELL//
    $pdf->MultiCell(75, 10, utf8_decode($producto['id']), 1, 'C', 0);

    $pdf->SetX(90);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, utf8_decode('Nombre:'), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12); //le le quita la negrita 'B' que estoy colocando en las CELL//
    $pdf->MultiCell(75, 10, utf8_decode($producto['nombre']), 1, 'C', 0);
    
    $pdf->SetX(90);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, utf8_decode('Dirección IP:'), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12); //le le quita la negrita 'B' que estoy colocando en las CELL//
    $pdf->MultiCell(75, 10, utf8_decode($producto['direccion_ip']), 1, 'C', 0);
    
    $pdf->SetX(90);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, utf8_decode('Dirección MAC:'), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12); //le le quita la negrita 'B' que estoy colocando en las CELL//
    $pdf->MultiCell(75, 10, utf8_decode($producto['direccion_mac']), 1, 'C', 0);
   
    $pdf->SetX(90);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, utf8_decode('Ubicación:'), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12); //le le quita la negrita 'B' que estoy colocando en las CELL//
    $pdf->MultiCell(75, 10, utf8_decode($producto['ubicacion']), 1, 'C', 0);
    
    $pdf->SetX(90);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, utf8_decode('Responsable:'), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12); //le le quita la negrita 'B' que estoy colocando en las CELL//
    $pdf->MultiCell(75, 10, utf8_decode($producto['responsable']), 1, 'C', 0);
    
    $pdf->SetX(90);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, utf8_decode('Número Serial:'), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12); //le le quita la negrita 'B' que estoy colocando en las CELL//
    $pdf->MultiCell(75, 10, utf8_decode($producto['numero_serial']), 1, 'C', 0);
    
    $pdf->SetX(90);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, utf8_decode('Categorías:'), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12); //le le quita la negrita 'B' que estoy colocando en las CELL//
    $pdf->MultiCell(75, 10, utf8_decode($producto['categorias']), 1, 'C', 0);
    $sql = "SELECT imagen FROM productos WHERE id = $id";
// Definir función para dibujar un cuadrado
function drawSquare($pdf, $x, $y, $size) {
   $pdf->Rect($x, $y, $size, $size);
}

// Establecer el color de la línea del cuadrado (en este caso, negro)
$pdf->SetDrawColor(0, 0, 0);

// Coordenadas donde se ubicará el cuadrado y dimensiones
$x = 10;
$y = 38;
$width = 50;
$height = 80;

// Dibujar el cuadrado encima de todos los objetos
drawSquare($pdf, $x, $y, $height);

    $resultado = $conexion->query($sql);
    
    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
    
        // Crear un archivo temporal con extensión .png
        $archivo_temporal = tempnam(sys_get_temp_dir(), 'img');
        $archivo_temporal .= '.png';
    
        // Escribir la información de la imagen BLOB en el archivo temporal
        file_put_contents($archivo_temporal, $fila['imagen']);
    
        // Cargar la imagen en el documento PDF
        $pdf->Image($archivo_temporal, 15, 43, 70, 70); // Ajusta las coordenadas y dimensiones según tu diseño
    
        // Eliminar el archivo temporal
        unlink($archivo_temporal);
    } else {
        echo "No se encontró ninguna imagen en la base de datos.";
    }
// Salida del PDF
$pdf->Output('Prueba.pdf', 'I'); // Nombre de descarga y método de visualización (I->visualizar - D->descargar)

$conexion->close(); //
   }
