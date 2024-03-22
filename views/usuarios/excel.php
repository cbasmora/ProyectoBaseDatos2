<?php
require '../../includes/_db.php';

$query = mysqli_query($conexion, "SELECT * FROM productos");
$docu = "inventario.xls";
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' . $docu);
header('Pragma: no-cache');
header('Expires: 0');

echo '<table border=1>';
echo '<tr>';
echo '<th colspan=8> Reporte de inventarios de productos </th>';
echo '</tr>';
echo '<tr><th>ID</th><th>nombre</th><th>direccion_ip</th><th>direccion_mac</th><th>ubicacion</th><th>responsable</th><th>numero_serial</th><th>categorias</th></tr>';
while ($row = mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['nombre'] . '</td>';
    echo '<td>' . $row['direccion_ip'] . '</td>';
    echo '<td>' . $row['direccion_mac'] . '</td>';
    echo '<td>' . $row['ubicacion'] . '</td>';
    echo '<td>' . $row['responsable'] . '</td>';
    echo '<td>' . $row['numero_serial'] . '</td>';
    echo '<td>' . $row['categorias'] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
