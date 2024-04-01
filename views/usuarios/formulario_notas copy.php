<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header copy.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="agregarnota.css" rel="stylesheet">

<img src="http://192.168.1.150/inventario-sis/img/agregarregistro.gif" width="100%" alt="Título de la página">
<?php
$conexion = new mysqli("localhost", "root", "", "inventario");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$query_productos = "SELECT id, nombre FROM productos";
$result_productos = $conexion->query($query_productos);
?>

<head>
    <title>Formulario de Registro</title>
    <link href="../css/agregarnota.css" rel="stylesheet">
</head>

<body>
    <br>
    <br>
    <br>
    <form method="post">
    <label for="id_producto">Equipo:</label>
    <select name="id_producto" id="id_producto" required>
        <option value="">Seleccione un equipo</option> <!-- Opción vacía por defecto -->
        <?php
        while ($row = $result_productos->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }
        ?>
    </select><br><br>
    <label for="tipo_mantenimiento">Tipo de Mantenimiento:</label>
    <select name="tipo_mantenimiento" id="tipo_mantenimiento" required>
        <option value="">Seleccione el tipo de mantenimiento</option> <!-- Opción vacía por defecto -->
        <option value="preventivo">Preventivo</option>
        <option value="correctivo">Correctivo</option>
        <option value="otro">Otro</option>
    </select><br><br>
    <label for="nota">Registro:</label><br>
    <textarea name="nota" id="nota" cols="30" rows="10" style="width: 80%;" required></textarea><br><br>
    <input class="btn btn-success" type="submit" name="submit" value="Agregar Registro">
</form>
    <?php
    if (isset($_POST['submit'])) {
        $id_producto = $_POST['id_producto'];
        $nota = $_POST['nota'];
        $usuario = get_current_user();

        $query = "INSERT INTO notas (id_producto, nota, usuario) VALUES ('$id_producto', '$nota', '$usuario')";
        if ($conexion->query($query) === TRUE) {
            echo "<div style='text-align: center; margin-top: 20px;'>✅ Registro agregado correctamente.</div>";
        } else {
            echo "<div style='text-align: center; margin-top: 20px;'>Error al agregar la nota: " . $conexion->error . "</div>";
        }
    }
    ?>
</body>

</html>