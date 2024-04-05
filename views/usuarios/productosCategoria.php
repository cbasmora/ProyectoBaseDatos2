<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header copy.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<body>
<img src="http://192.168.1.250:8080/inventario-sis/img/tittle.gif" width="100%" alt="Título de la página">
<br>
<br>
<a href="producto_agregar.php"><input  class="btn btn-success" type="button" value="✚ Agregar equipo"></a>
</div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
<thead>

<tr>
<th>ID</th>
<th>Nombre</th>
<th>IP</th>
<th>MAC</th>
<th>Ubicación</th>
<th>Responsable</th>
<th>Numero_Serial</th>
<th>Categorias</th>
<th>Imágen</th>
<th>Modificaciones</th>


</tr>

</thead>

<tbody>

<?php
$categoria = $_GET['categoria'];
$sql = "SELECT * FROM productos WHERE categorias = '$categoria'";
$productos = mysqli_query($conexion, $sql);
if ($productos->num_rows > 0) {
    $contador_equipos = 1;
    while ($row = mysqli_fetch_assoc($productos)) {
        ?>

        <tr>
            <td <?php echo 'class="' . $row['categorias'] . '"'; ?>><?php echo $contador_equipos; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['direccion_ip']; ?></td>
            <td><?php echo $row['direccion_mac']; ?></td>
            <td><?php echo $row['ubicacion']; ?></td>
            <td <?php echo 'class="' . $clase . '"'; ?>><?php echo $row['responsable']; ?></td>
            <td><?php echo $row['numero_serial']; ?></td>
            <td><?php echo $row['categorias']; ?></td>
            <td><img width="100" src="data:image;base64,<?php echo base64_encode($row['imagen']); ?>" ></td>

            <td>
                <a href="producto_editar.php?id=<?php echo $row['id'] ?>">
                    <div">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-pencil-alt"></i></button>
                    </div>
                </a>
                <a>|</a>
                <a href="producto_eliminar.php?id=<?php echo $row['id'] ?>">
                    <div">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </div>
                </a>
            </td>
        </tr>
        <?php
        // Incrementar el contador de equipos
        $contador_equipos++;
    }
} else {
    ?>
    <tr class="text-center">
        <td colspan="4">No existe registros</td>
    </tr>
    <?php
}
?>
</tbody>

</table>
</div>
</div>
</div>
</div>
        </section>


        <section>
            <div class= "container">
                <div class= "row">
                    <div class= "col-lg-9">
            </div>
        </section>
    </div>
    <?php require '../../includes/_footer.php' ?>
</html>