<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header copy.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<img src="http://192.168.1.250:8080/inventario-sis/img/tittle.gif" width="100%" alt="Título de la página">
<br>
<a href="producto_agregar.php" class="btn btn-success">
    <i class="fas fa-plus"></i> Agregar equipo
</a>


</div>
<div class="col-sm-12">
<div class="input-group">
                            <CENTER><input type="text" class="form-control bg-light border-0 small" placeholder="Buscar en el inventario..."
                                aria-label="Search" aria-describedby="basic-addon2"></CENTER>
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
<th>Número Serial</th>
<th>Categorias</th>
<th>Imágen</th>
<th>Modificaciones</th>


</tr>
</thead>

<tbody>

<?php
$contador_equipos = 1;
$sql = "SELECT * FROM productos";
$productos = mysqli_query($conexion, $sql);
if($productos -> num_rows > 0){
while($row = mysqli_fetch_assoc($productos)){
?>
<!--funcion y estilos para celdas en error-->

<!-- empieza la tabla-->
<tr>
<td <?php echo  'class="'.$row['categorias'] .'"'; ?>><?php echo $contador_equipos; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['direccion_ip']; ?></td>
<td><?php echo $row['direccion_mac']; ?></td>
<td><?php echo $row['ubicacion']; ?></td>



<td <?php echo  'class="'.$clase .'"'; ?>><?php echo $row['responsable']; ?></td>
<td><?php echo $row['numero_serial']; ?></td>


<td><?php echo $row['categorias']; ?></td>
<td><img width="100" src="data:image;base64,<?php echo base64_encode($row['imagen']);  ?>" ></td>
<script src="script.js"></script>
<td>
<a href="producto_descripcion.php?id=<?php echo $row['id']?>">
    <div">
    <button type="submit" class="btn btn-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button>
    </div>
  </a>
  <a href="producto_editar.php?id=<?php echo $row['id']?>">
    <div">
    <button type="submit" class="btn btn-primary">
    <i class="fas fa-pencil-alt"></i></button>
    </div>
  </a>
  <a href="producto_eliminar.php?id=<?php echo $row['id']?>">
    <div">
    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
    </div>
  </a>

</td>
</tr>
<?php
// Incrementar el contador de equipos
$contador_equipos++;
?>


<?php
}
}else{

    ?>
    <tr class="text-center">
    <td colspan="4">No existe registros</td>
    </tr>

    <?php
}?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector(".form-control");
    const rows = document.querySelectorAll("tbody tr");

    searchInput.addEventListener("input", function() {
      const searchTerm = searchInput.value.toLowerCase();

      rows.forEach(row => {
        const rowData = Array.from(row.children).map(cell => cell.textContent.toLowerCase());
        if (rowData.some(data => data.includes(searchTerm))) {
          row.classList.remove("hidden");
        } else {
          row.classList.add("hidden");
        }
      });
    });
  });
</script>
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
