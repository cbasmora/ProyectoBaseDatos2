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
        date_default_timezone_set('America/Bogota'); // Establecer la zona horaria de Colombia
        $hoy = date('d/m/Y H:i:s');
        $this->Cell(320, 10, utf8_decode('Fecha y hora de impresión: ' . $hoy), 0, 0, 'C'); // Fecha de la página
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


//--------------------ACÁ COMIENZA LA TABLLA DEl PDF-----------------------//

$resultado = $conexion->query($consulta);
if ($resultado->num_rows > 0) {
    $producto = $resultado->fetch_assoc();

    // Mostrar los datos del producto en la tabla
    // Definir los datos de los productos en un arreglo

    function addEncabezado($pdf, $titulo) {
        $pdf->SetFillColor(54,96,146,255);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode($titulo), 1, 1, 'C', 1); // 1 al final para que el borde sea completo
        $pdf->Ln(5); // Espacio entre el encabezado y el contenido
    }
    $pdf->SetTextColor(255, 255, 255);
    addEncabezado($pdf, 'INFORMACIÓN DEL EQUIPO');
    $pdf->SetTextColor(0, 0, 0);

$productos = [
    'PACI (Id):' => $producto['id'],
    'Nombre:' => $producto['nombre'],
    'Dirección IP:' => $producto['direccion_ip'],
    'Dirección MAC:' => $producto['direccion_mac'],
    'Ubicación:' => $producto['ubicacion'],
    'Responsable:' => $producto['responsable'],
    'Número Serial:' => $producto['numero_serial'],
    'Categorías:' => $producto['categorias']
];
//
// Función para agregar una fila de detalles al PDF
function addDetalle($pdf, $titulo, $contenido) {
    $pdf->SetFillColor(220,230,241,255);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, utf8_decode($titulo), 1, 0, 'L', 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(75, 10, utf8_decode($contenido), 1, 'C', 0);
}




// Función para dibujar un cuadrado
function drawSquare($pdf, $x, $y, $size) {
    $pdf->Rect($x, $y, $size, $size);
}

// Establecer el color de la línea del cuadrado (en este caso, negro)
$pdf->SetDrawColor(0, 0, 0);

// Coordenadas donde se ubicará el cuadrado y dimensiones
$x = 10;
$y = 53;
$width = 50;
$height = 80;

// Dibujar el cuadrado encima de todos los objetos
drawSquare($pdf, $x, $y, $height);

// Iterar sobre los productos y agregar sus detalles al PDF
foreach ($productos as $titulo => $contenido) {
    $pdf->SetX(90);
    addDetalle($pdf, $titulo, $contenido);
}

// Consulta SQL para obtener la imagen
$sql = "SELECT imagen FROM productos WHERE id = $id";

// Obtener la imagen y mostrarla en el PDF
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    // Crear un archivo temporal con extensión .png
    $archivo_temporal = tempnam(sys_get_temp_dir(), 'img');
    $archivo_temporal .= '.png';

    // Escribir la información de la imagen BLOB en el archivo temporal
    file_put_contents($archivo_temporal, $fila['imagen']);

    // Cargar la imagen en el documento PDF
    $pdf->Image($archivo_temporal, 15, 57, 70, 70); // Ajustar las coordenadas y dimensiones según tu diseño

    // Eliminar el archivo temporal
    unlink($archivo_temporal);
} else {
    echo "No se encontró ninguna imagen en la base de datos.";
}

function barrabaja($pdf, $titulo) {
    $pdf->SetFillColor(54,96,146,255);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, utf8_decode($titulo), 1, 1, 'C', 1); // 1 al final para que el borde sea completo
    $pdf->Ln(5); // Espacio entre el encabezado y el contenido
}
$pdf->Ln(10); // Espacio adicional antes de la tabla
$pdf->SetTextColor(255, 255, 255);
barrabaja($pdf, 'INFORMACIÓN ADICIONAL');
$pdf->SetTextColor(0, 0, 0);

// Datos para la tabla
$datos = array(
    array('Dato 1', 'Dato 2', 'Dato 3', 'Dato 4'),
    array('Dato 5', 'Dato 6', 'Dato 7', 'Dato 8'),
    array('Dato 9', 'Dato 10', 'Dato 11', 'Dato 12'),
    array('Dato 13', 'Dato 14', 'Dato 15', 'Dato 16'),
    array('Dato 17', 'Dato 18', 'Dato 19', 'Dato 20'),
    array('Dato 21', 'Dato 22', 'Dato 23', 'Dato 24'),
);

// Encabezados de la tabla
$pdf->SetFillColor(54, 96, 146); // Color de fondo de las celdas de encabezado
$pdf->SetTextColor(255, 255, 255); // Color del texto de encabezado
$pdf->SetFont('Arial', 'B', 12); // Fuente, negrita, tamaño 12

$encabezados = array('TIPO', 'MARCA', 'SERIAL', 'OBSERVACIÓN');

// Encabezados de la tabla
$pdf->SetFillColor(54, 96, 146); // Color de fondo de las celdas de encabezado
$pdf->SetTextColor(255, 255, 255); // Color del texto de encabezado
$pdf->SetFont('Arial', 'B', 12); // Fuente, negrita, tamaño 12

foreach ($encabezados as $encabezado) {
    $pdf->Cell(45, 10, utf8_decode($encabezado), 1, 0, 'C', 1); // Celdas de encabezado
}
// Contenido de la tabla
$pdf->SetTextColor(0, 0, 0); // Restaurar el color del texto a negro
$pdf->SetFont('Arial', '', 12); // Restaurar la fuente a Arial, tamaño normal

// Asegurar que el cursor esté en la posición correcta debajo de los encabezados
$pdf->SetY($pdf->GetY() + 10); // Mover el cursor hacia abajo para dejar espacio entre los encabezados y los datos

foreach ($datos as $fila) {
    // Mostrar los datos en celdas separadas
    foreach ($fila as $dato) {
        $pdf->Cell(45, 10, utf8_decode($dato), 1, 0, 'C');
    }
    $pdf->Ln(); // Salto de línea al final de cada fila
}


function addFirma($pdf, $responsable) {
    // Calcular la posición central horizontal de la página
    $pdf->SetY(-35); // 50 unidades desde el borde inferior de la página
    $centroX = $pdf->GetPageWidth() / 2;
    $pdf->Line($centroX - 40, $pdf->GetY(), $centroX + 40, $pdf->GetY());

    // Configurar la fuente y el color del texto
    $pdf->SetTextColor(128, 128, 128); // Gris
    $pdf->SetFont('Arial', 'B', 10); // Fuente Arial, negrita, tamaño 10
    $pdf->SetFont('Arial', 'I', 8); // Tipo de fuente, cursiva, tamaño del texto
    $pdf->Cell(0, 10, utf8_decode('Firma del responsable'), 0, 1, 'C');

    // Restaurar el color y la fuente
    $pdf->SetTextColor(0, 0, 0); // Restaurar a negro
    $pdf->SetFont('Arial', '', 12); // Restaurar la fuente a Arial, tamaño normal

    $pdf->Cell(0, 1, utf8_decode($responsable), 0, 1, 'C');
    $pdf->Ln(10); // Espacio adicional después de la línea de firma
}



addFirma($pdf, $producto['responsable']);
$resultado = $conexion->query($consulta);

if ($resultado->num_rows > 0) {
    $producto = $resultado->fetch_assoc();

    // Mostrar los datos del producto en la tabla
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, utf8_decode('Notas del Producto ' . $producto['nombre']), 0, 1, 'C');
    $pdf->Ln(10);

    $query_notas = "SELECT id, nota, fecha, usuario FROM notas WHERE id_producto = $id";
    $result_notas = $conexion->query($query_notas);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'ID Nota', 1);
    $pdf->Cell(40, 10, 'Fecha', 1);
    $pdf->Cell(50, 10, 'Usuario', 1);
    $pdf->Cell(70, 10, 'Nota', 1);
    $pdf->Ln(); // Salto de línea después de la cabecera
    
    while ($row = $result_notas->fetch_assoc()) {
        // Contenido de la tabla
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(40, 10, $row['id'], 1);
        $pdf->Cell(40, 10, $row['fecha'], 1);
        $pdf->Cell(50, 10, $row['usuario'], 1);
        $pdf->MultiCell(70, 10, $row['nota'], 1); // Usamos MultiCell para notas largas
        $pdf->Ln(); // Salto de línea después de cada fila
    }}





// Salida del PDF
$pdf->Output('Prueba.pdf', 'I'); // Nombre de descarga y método de visualización (I->visualizar - D->descargar)

$conexion->close(); //
   }
