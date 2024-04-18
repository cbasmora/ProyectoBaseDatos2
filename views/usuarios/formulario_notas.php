<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header copy.php' ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


<img src="http://192.168.1.250:8080/inventario-sis/img/agregarregistro.gif" width="100%" alt="Título de la página">
<?php
$conexion = new mysqli("localhost", "root", "", "inventario");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$query_productos = "SELECT id, nombre FROM productos";
$result_productos = $conexion->query($query_productos);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario de Registro</title>
</head>
<center>
<body>
    <br><br><br>
    <div style="border: 1px solid #ccc; padding: 30px; background:#EAF2F8; border-radius: 25px;box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);width: 80%;">
        <form method="post">
            <div style="display: flex; justify-content: center; flex-wrap: wrap;">
                <div style="margin: 10px;">
                    <label for="id_producto" style="margin-bottom: 5px;">Equipo:</label>
                    <select name="id_producto" id="id_producto" class="select-styled" required>
                        <option value="">Seleccione un equipo</option>
                        <?php
                        while ($row = $result_productos->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div style="margin: 10px;">
                    <label for="categoria" class="form-label" style="margin-bottom: 5px;">Categoria:</label>
                    <select name="categoria" id="categoria" class="select-styled" required>
                        <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                        <option value="Mantenimiento Correctivo">Mantenimiento Correctivo</option>
                        <option value="Reparación">Observaciones</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>

                <div style="margin: 10px;">
                    <label for="usuario" class="form-label" style="margin-bottom: 5px;">Responsable:</label>
                    <select name="usuario" id="usuario" class="select-styled" required>
                        <option value="Cristian Cardona">Cristian Camilo Cardona</option>
                        <option value="Sebastian Rojas">Juan Sebastian Rojas</option>
                        <option value="Sebastian Mora">Jhon Sebastian Mora</option>
                    </select>
                </div>
            </div>
            <center>
                <textarea name="nota" id="nota" cols="20" rows="10" style="width: 80%;box-shadow: 0 16px 16px rgba(0, 0, 0, 0.1)" required placeholder="Agregar la Descripción..."></textarea><br><br>
                <input class="btn btn-success" type="submit" name="submit" value="Agregar Registro">
            </center>
        </form>
        <?php
        if (isset($_POST['submit'])) {
            $id_producto = $_POST['id_producto'];
            $categoria = $_POST['categoria'];
            $nota = $_POST['nota'];
            $usuario = $_POST['usuario'];

            // Asegúrate de que $conexion esté definido y sea la conexión correcta a la base de datos

            $query = "INSERT INTO notas (id_producto, categoria, nota, usuario) VALUES ('$id_producto', '$categoria', '$nota', '$usuario')";
            if ($conexion->query($query) === TRUE) {
                echo "<div style='text-align: center; margin-top: 20px;'>✅ Registro agregado correctamente.</div>";
            } else {
                echo "<div style='text-align: center; margin-top: 20px;'>Error al agregar la nota: " . $conexion->error . "</div>";
            }
        }
        ?>
    </div>
</body>

<style>
.select-styled {
    display: inline-block;
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    font-size: 16px;
    line-height: 1.5;
    transition: border-color 0.3s ease;
    cursor: pointer;
    width: 100%; /* Ajusta el ancho al 100% */
}

.select-styled:hover,
.select-styled:focus {
    border-color: #333;
}
</style>



</html>