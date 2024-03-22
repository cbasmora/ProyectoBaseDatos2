<?php
require_once 'C:\xampp\htdocs\Inventario-sis\PHPExcel-1.8\Classes\PHPExcel';
require_once 'ruta/donde/descargaste/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php';
require_once 'ruta/donde/descargaste/PHPExcel/Classes/PHPExcel/IOFactory.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Crear un nuevo objeto Spreadsheet
$spreadsheet = new Spreadsheet();

// Seleccionar la hoja de cálculo activa
$sheet = $spreadsheet->getActiveSheet();

// Establecer los encabezados de las columnas
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'Nombre');
$sheet->setCellValue('C1', 'IP');
$sheet->setCellValue('D1', 'MAC');
$sheet->setCellValue('E1', 'Ubicación');
$sheet->setCellValue('F1', 'Responsable');
$sheet->setCellValue('G1', 'Número Serial');
$sheet->setCellValue('H1', 'Categorías');
$sheet->setCellValue('I1', 'Imagen');

// Obtener los datos de la base de datos
$sql = "SELECT * FROM productos";
$productos = mysqli_query($conexion, $sql);

// Llenar la hoja de cálculo con los datos de la base de datos
$row = 2;
if ($productos->num_rows > 0) {
    foreach ($productos as $key => $data) {
        $sheet->setCellValue('A' . $row, $data['id']);
        $sheet->setCellValue('B' . $row, $data['nombre']);
        $sheet->setCellValue('C' . $row, $data['direccion_ip']);
        $sheet->setCellValue('D' . $row, $data['direccion_mac']);
        $sheet->setCellValue('E' . $row, $data['ubicacion']);
        $sheet->setCellValue('F' . $row, $data['responsable']);
        $sheet->setCellValue('G' . $row, $data['numero_serial']);
        $sheet->setCellValue('H' . $row, $data['categorias']);
        $sheet->setCellValue('I' . $row, $data['imagen']);
        $row++;
    }
}

// Configurar el nombre del archivo Excel
$filename = 'productos.xlsx';

// Crear un objeto Writer para guardar el archivo Excel
$writer = new Xlsx($spreadsheet);
$writer->save($filename);

// Descargar el archivo Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');

$writer->save('php://output');
exit;
?>
