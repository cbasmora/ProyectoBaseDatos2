<?php

$id = $_GET['id'];
$consulta = "SELECT * FROM productos WHERE id = $id";

require ('./fpdf.php');

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
            $this->SetTextColor(0, 0, 0);

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
$conexion = new mysqli("localhost", "root", "", "inventario");
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}


//--------------------ACÁ COMIENZA LA TABLLA DEl PDF-----------------------//

$resultado = $conexion->query($consulta);
if ($resultado->num_rows > 0) {
    $producto = $resultado->fetch_assoc();

    // Mostrar los datos del producto en la tabla
    // Definir los datos de los productos en un arreglo

    function addEncabezado($pdf, $titulo)
    {
        $pdf->SetFillColor(54, 96, 146, 255);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode($titulo), 1, 1, 'C', 1); // 1 al final para que el borde sea completo
        $pdf->Ln(5); // Espacio entre el encabezado y el contenido
    }
    $pdf->SetTextColor(255, 255, 255);
    addEncabezado($pdf, 'INFORMACIÓN DEL EQUIPO');
    $pdf->SetTextColor(0, 0, 0);

    $productos = [
        'Tipo:' => $producto['categorias'],
        'Fecha de Compra:' => $producto['fecha_fabricacion'],
        'Marca:' => $producto['Marca'],
        'Serial:' => $producto['numero_serial'],
        'Modelo:' => $producto['Modelo'],
        'Sistema Operativo:' => $producto['sistema_operativo'],
        'Procesador:' => $producto['procesador'],
        'Memoria Ram:' => $producto['memoria_ram'],


    ];
    //
// Función para agregar una fila de detalles al PDF
    function addDetalle($pdf, $titulo, $contenido)
    {
        $pdf->SetFillColor(220, 230, 241, 255);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->Cell(40, 10, utf8_decode($titulo), 1, 0, 'L', 1);

        $maxWidth = 70; // Ancho máximo permitido para el contenido
        $textWidth = $pdf->GetStringWidth($contenido);

        if ($textWidth <= $maxWidth) {
            // El contenido cabe dentro del ancho máximo, se muestra normalmente
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell($maxWidth, 10, utf8_decode($contenido), 1, 1, 'L', 0);
        } else {
            // El contenido es más ancho de lo permitido, se oculta
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell($maxWidth, 10, '...', 1, 1, 'L', 0);
        }
    }


    // Agregar celda para observaciones





    // Función para dibujar un cuadrado
    function drawSquare($pdf, $x, $y, $size)
    {
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
    // ACÁ ESTA EL ESPACIO PARA LAS OBSERVACIONES//

    $pdf->SetFont('Arial', '', 11);
    $pdf->SetFillColor(220, 230, 241);
    $pdf->MultiCell(0, 6, utf8_decode('OBSERVACIONES GENERALES: ' . $producto['observaciones']), 1, 'L', false);




    //ACÁ TERMINA EL ESPACIO PARA LAS OBSERVACIONES//
    // TABLA PARA PERIFERICOS----------------------------------------------------------------------------------
    function barraalta($pdf, $titulo)
    {
        $pdf->SetFillColor(54, 96, 146, 255);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode($titulo), 1, 1, 'C', 1); // 1 al final para que el borde sea completo
        $pdf->Ln(0); // Espacio entre el encabezado y el contenido
    }
    $pdf->Ln(7); // Espacio adicional antes de la tabla
    $pdf->SetTextColor(255, 255, 255);
    barraalta($pdf, 'INFORMACIÓN DISPOSITIVOS PERIFÉRICOS');
    $pdf->SetTextColor(0, 0, 0);


    $nuevaTabla = [
        ['S/N Monitor:' => $producto['monitor_serial'], 'S/N Teclado:' => $producto['teclado_serial']],
        ['S/N Mouse:' => $producto['mouse_serial'], 'Otro:' => $producto['otro_periferico']],
        // Añade más filas según sea necesario
    ];

    // Agrega un espacio antes de la nueva tabla
    $pdf->Ln(0);

    // Establece el ancho de las columnas
    $anchoColumnaTitulo = 40;
    $anchoColumnaContenido = 55;

    // Establece el color de fondo y la fuente para las celdas
    $pdf->SetFillColor(220, 230, 241);
    $pdf->SetFont('Arial', 'B', 11);

    // Agrega las celdas para cada fila de la tabla
    foreach ($nuevaTabla as $fila) {
        foreach ($fila as $titulo => $contenido) {
            // Celda para el título
            $pdf->Cell($anchoColumnaTitulo, 10, utf8_decode($titulo), 1, 0, 'L', 1);

            // Establece la fuente para el contenido (sin negrita)
            $pdf->SetFont('Arial', '', 11);

            // Celda para el contenido
            $pdf->Cell($anchoColumnaContenido, 10, utf8_decode($contenido), 1, 0, 'L', 0);

            // Restaura la fuente para el título (negrita)
            $pdf->SetFont('Arial', 'B', 11);
        }

        // Salto de línea al final de la fila
        $pdf->Ln();
    }
    // cierra TABLA PARA PERIFERICOS----------------------------------------------------------------------------------

    //TABLA PARA DATOS DE LA RED------------------------------------------------------------------------------------

    function barramedia($pdf, $titulo)
    {
        $pdf->SetFillColor(54, 96, 146, 255);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode($titulo), 1, 1, 'C', 1); // 1 al final para que el borde sea completo
        $pdf->Ln(0); // Espacio entre el encabezado y el contenido
    }
    $pdf->Ln(4); // Espacio adicional antes de la tabla
    $pdf->SetTextColor(255, 255, 255);
    barramedia($pdf, 'DATOS DE RED');
    $pdf->SetTextColor(0, 0, 0);


    $nuevaTabla = [
        ['Dirección IP:' => $producto['direccion_ip'], 'Dirección MAC:' => $producto['direccion_mac']],

        // Añade más filas según sea necesario
    ];

    // Agrega un espacio antes de la nueva tabla
    $pdf->Ln(0);

    // Establece el ancho de las columnas
    $anchoColumnaTitulo = 40;
    $anchoColumnaContenido = 55;

    // Establece el color de fondo y la fuente para las celdas
    $pdf->SetFillColor(220, 230, 241);
    $pdf->SetFont('Arial', 'B', 11);

    // Agrega las celdas para cada fila de la tabla
    foreach ($nuevaTabla as $fila) {
        foreach ($fila as $titulo => $contenido) {
            // Celda para el título
            $pdf->Cell($anchoColumnaTitulo, 10, utf8_decode($titulo), 1, 0, 'L', 1);

            // Establece la fuente para el contenido (sin negrita)
            $pdf->SetFont('Arial', '', 11);

            // Celda para el contenido
            $pdf->Cell($anchoColumnaContenido, 10, utf8_decode($contenido), 1, 0, 'L', 0);

            // Restaura la fuente para el título (negrita)
            $pdf->SetFont('Arial', 'B', 11);
        }

        // Salto de línea al final de la fila
        $pdf->Ln();
    }
    //CIERRA TABLA PARA DATOS DE LA RED------------------------------------------------------------------------------------




    function barrabaja($pdf, $titulo)
    {
        $pdf->SetFillColor(54, 96, 146, 255);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, utf8_decode($titulo), 1, 1, 'C', 1); // 1 al final para que el borde sea completo
        $pdf->Ln(0); // Espacio entre el encabezado y el contenido
    }
    $pdf->Ln(4); // Espacio adicional antes de la tabla
    $pdf->SetTextColor(255, 255, 255);
    barrabaja($pdf, 'UBICACIÓN DE INSTALACIÓN');
    $pdf->SetTextColor(0, 0, 0);

    //TABLA PARA LA UBICACIÓN Y RESPONSABLE ---------------------------------------------------------------------------------
    $nuevaTabla = [
        ['Ubicación:' => $producto['ubicacion'], 'Responsable:' => $producto['responsable']],
        // Añade más filas según sea necesario
    ];

    // Agrega un espacio antes de la nueva tabla
    $pdf->Ln(0);

    // Establece el ancho de las columnas
    $anchoColumnaTitulo = 40;
    $anchoColumnaContenido = 55;

    // Establece el color de fondo y la fuente para las celdas
    $pdf->SetFillColor(220, 230, 241);
    $pdf->SetFont('Arial', 'B', 11);

    // Agrega las celdas para cada fila de la tabla
    foreach ($nuevaTabla as $fila) {
        foreach ($fila as $titulo => $contenido) {
            // Celda para el título
            $pdf->Cell($anchoColumnaTitulo, 10, utf8_decode($titulo), 1, 0, 'L', 1);

            // Establece la fuente para el contenido (sin negrita)
            $pdf->SetFont('Arial', '', 11);

            // Celda para el contenido
            $pdf->Cell($anchoColumnaContenido, 10, utf8_decode($contenido), 1, 0, 'L', 0);

            // Restaura la fuente para el título (negrita)
            $pdf->SetFont('Arial', 'B', 11);
        }

        // Salto de línea al final de la fila
        $pdf->Ln();
    }

    //CIERRA TABLA PARA LA UBICACIÓN Y RESPONSABLE ---------------------------------------------------------------------------------


    function addFirma($pdf, $responsable)
    {
        // Calcular la posición central horizontal de la página
        $pdf->SetY(-35); // 50 unidades desde el borde inferior de la página
        $centroX = $pdf->GetPageWidth() / 2;
        $pdf->Line($centroX - 40, $pdf->GetY(), $centroX + 40, $pdf->GetY());

        // Configurar la fuente y el color del texto
        $pdf->SetTextColor(128, 128, 128); // Gris
        $pdf->SetFont('Arial', 'B', 11); // Fuente Arial, negrita, tamaño 10
        $pdf->SetFont('Arial', 'I', 8); // Tipo de fuente, cursiva, tamaño del texto
        $pdf->Cell(0, 10, utf8_decode('Responsable del equipo'), 0, 1, 'C');

        // Restaurar el color y la fuente
        $pdf->SetTextColor(0, 0, 0); // Restaurar a negro
        $pdf->SetFont('Arial', '', 11); // Restaurar la fuente a Arial, tamaño normal

        // Mover hacia arriba para colocar el nombre más arriba
        $pdf->SetY($pdf->GetY() - 15); // Puedes ajustar el valor (-20) según sea necesario

        // Configurar la fuente y el tamaño del texto para que parezca una firma
        $pdf->SetFont('Arial', 'I', 18); // Fuente Arial, cursiva, tamaño 18
        $pdf->SetTextColor(128);
        $pdf->Cell(0, 1, utf8_decode($responsable), 0, 1, 'C');
        $pdf->Ln(10); // Espacio adicional después de la línea de firma
        $pdf->SetTextColor(0,0,0);
    }

    addFirma($pdf, $producto['responsable']);
    $resultado = $conexion->query($consulta);

// COMIENZA LA TABLA DE LAS NOTAS 

if ($resultado->num_rows > 0) {
    $producto = $resultado->fetch_assoc();


    $pdf->Cell(0, 10, utf8_decode('Mantenimientos Registrados:' . $producto['nombre']), 1, 1, 'C', true);
    $pdf->SetTextColor(25,50,250);
    $pdf->SetFont('Arial', '', 12);

    $pdf->SetFillColor(200, 200, 200); // Color de fondo para la celda del nombre del producto
    $pdf->SetTextColor(0,0,0);

    $pdf->Ln(5);

    $query_notas = "SELECT id, nota, fecha, usuario, categoria FROM notas WHERE id_producto = $id";
    $result_notas = $conexion->query($query_notas);

    $pageWidth = 200; // Ancho en milímetros (A4)
    // Margen izquierdo y derecho
    $marginLeft = 10;
    $marginRight = 10;
    // Ancho utilizable para las columnas
    $usableWidth = $pageWidth - $marginLeft - $marginRight;
    // Ancho de cada columna
    $columnWidth = $usableWidth / 4;
    
    $numeroNota = 1; // Inicializar contador de notas

    while ($row = $result_notas->fetch_assoc()) {
        // Contenido de la tabla
        $pdf->SetAutoPageBreak(true, 10);
        // Columna para el número de nota
        $pdf->Cell(10, 10, utf8_decode($numeroNota), 1, 0, 'C', true); // Fondo azul para encabezados
        // Columnas restantes
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(54, 96, 146, 255); // Azul claro para encabezados
        $pdf->SetTextColor(255, 255, 255); // Letras blancas para encabezados
        $pdf->Cell($columnWidth, 10, utf8_decode('NOTA-ID: ' . $row['id']), 1, 0, 'C', true);
        $pdf->Cell($columnWidth, 10, utf8_decode($row['categoria']), 1, 0, 'C', true);
        $pdf->Cell($columnWidth, 10, utf8_decode($row['fecha']), 1, 0, 'C', true);
        $pdf->Cell($columnWidth, 10, utf8_decode($row['usuario']), 1, 0, 'C', true);
    
        // Separación entre columnas y siguiente fila
        $pdf->SetX($marginLeft); // Mover al inicio de la fila
        $pdf->Ln(10); // Salto de línea con separación de 10 unidades
    
        $numeroNota++; // Incrementar el número de nota
    
        // Ajustamos el ancho de la última columna para que la celda se expanda automáticamente
        $pdf->SetAutoPageBreak(true, 10);
    
        // Restauramos el color de fondo a blanco para la nota
        $pdf->SetFillColor(255, 255, 255); // Fondo blanco para notas
        $pdf->SetTextColor(0, 0, 0); // Letras negras para notas
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(0, 7, utf8_decode($row['nota']), 1, 'L', true); // Usamos MultiCell para notas largas
    
        if ($pdf->GetY() + 10 > $pdf->GetPageHeight()) {
            $pdf->AddPage();
        } else {
            $pdf->Ln(); // Salto de línea
        }
    }}




    // Salida del PDF
    $pdf->Output('Prueba.pdf', 'I'); // Nombre de descarga y método de visualización (I->visualizar - D->descargar)

    $conexion->close(); //
}
