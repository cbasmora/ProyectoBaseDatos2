<?php
require '../../includes/_db.php';

$query = mysqli_query($conexion, "SELECT * FROM productos");
$docu = "inventario-sis.xls";
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' . $docu);
header('Pragma: no-cache');
header('Expires: 0');

echo "\xEF\xBB\xBF";
echo '<table border=1>';
echo '<tr>';
echo '<th>ID</th><th>CATEGORÍAS</th><th>NOMBRE</th><th>DIRECCIÓN IP</th><th>DIRECCIÓN MAC</th><th>UBICACIÓN</th><th>NÚMERO SERIAL</th><th>FECHA FABRICACIÓN</th><th>MARCA</th><th>MODELO</th><th>PROCESADOR</th><th>MEMORIA RAM</th><th>DISCO DURO</th><th>SISTEMA OPERATIVO</th><th>MONITOR SERIAL</th><th>TECLADO SERIAL</th><th>MOUSE SERIAL</th><th>OTRO PERIFÉRICO</th><th>REMOTO</th><th>RESPONSABLE</th><th>OBSERVACIONES</th>';
echo '</tr>';
while ($row = mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['categorias'] . '</td>';
    echo '<td>' . $row['nombre'] . '</td>';
    echo '<td>' . $row['direccion_ip'] . '</td>';
    echo '<td>' . $row['direccion_mac'] . '</td>';
    echo '<td>' . $row['ubicacion'] . '</td>';
    echo '<td>' . $row['numero_serial'] . '</td>';
    echo '<td>' . $row['fecha_fabricacion'] . '</td>';
    echo '<td>' . $row['Marca'] . '</td>';
    echo '<td>' . $row['Modelo'] . '</td>';
    echo '<td>' . $row['procesador'] . '</td>';
    echo '<td>' . $row['memoria_ram'] . '</td>';
    echo '<td>' . $row['disco_duro'] . '</td>';
    echo '<td>' . $row['sistema_operativo'] . '</td>';
    echo '<td>' . $row['monitor_serial'] . '</td>';
    echo '<td>' . $row['teclado_serial'] . '</td>';
    echo '<td>' . $row['mouse_serial'] . '</td>';
    echo '<td>' . $row['otro_periferico'] . '</td>';
    echo '<td>' . $row['remoto'] . '</td>';
    echo '<td>' . $row['responsable'] . '</td>';
    echo '<td>' . $row['observaciones'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
