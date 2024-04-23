<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header copy.php' ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<img src="http://192.168.1.250:8080/inventario-sis/img/agregarregistro.gif" width="100%" alt="Título de la página">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 25px;
            padding: 30px;
            background: #EAF2F8;
            box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            font-size: 16px;
            line-height: 1.5;
            transition: border-color 0.3s ease;
        }

        .form-group select:hover,
        .form-group select:focus,
        .form-group textarea:hover,
        .form-group textarea:focus {
            border-color: #333;
        }

        .form-group textarea {
            resize: none;
            height: 100px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <br>    <br>    <br>
    <div class="container">
        <div class="form-container">
            <form method="post">
                <div class="form-group">
                    <label for="id_producto">Equipo:</label>
                    <select name="id_producto" id="id_producto" required>
                        <option value="">Seleccione un equipo</option>
                        <?php
                        $query_productos = "SELECT id, nombre FROM productos ORDER BY 
CASE 
    WHEN nombre LIKE 'AM-%' THEN 1
    ELSE 2
END,
CASE 
    WHEN nombre LIKE 'AM-%' THEN CAST(SUBSTRING(nombre, 4) AS UNSIGNED) 
    ELSE 
        CASE 
            WHEN nombre LIKE 'ID-%' THEN CAST(SUBSTRING(nombre, 4) AS UNSIGNED)
            ELSE 999999 
        END 
END, 
nombre";
                        $result_productos = $conexion->query($query_productos);

                        while ($row = $result_productos->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <select name="categoria" id="categoria" required>
                        <option value="Mantenimiento Preventivo">Mantenimiento Preventivo</option>
                        <option value="Mantenimiento Correctivo">Mantenimiento Correctivo</option>
                        <option value="Observaciones">Observaciones</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="usuario">Responsable:</label>
                    <select name="usuario" id="usuario" required>
                        <option value="Cristian Cardona">Cristian Camilo Cardona</option>
                        <option value="Sebastian Rojas">Juan Sebastian Rojas</option>
                        <option value="Sebastian Mora">Jhon Sebastian Mora</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nota">Descripción:</label>
                    <textarea name="nota" id="nota" rows="5" placeholder="Agregar una breve descripción con una capacidad máxima de 500 caracteres..." maxlength="500" required></textarea>
                </div>

                <button class="submit-btn" type="submit" name="submit">Agregar Registro</button>
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
                    // Mostrar un mensaje de éxito con SweetAlert
                    echo "<script>
                            Swal.fire({
                                title: '¡Éxito!',
                                text: 'Registro agregado correctamente.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'index.php'; // Redireccionar a otra página si se hace clic en OK
                                }
                            });
                          </script>";
                } else {
                    // Mostrar un mensaje de error con SweetAlert
                    echo "<script>
                            Swal.fire({
                                title: '¡Error!',
                                text: 'Error al agregar la nota: " . $conexion->error . "',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                          </script>";
                }}
            ?>
        </div>
    </div>
<br><br><br>
</body>

</html>