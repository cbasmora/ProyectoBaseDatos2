<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<div id="content">
        <section>
        <div class="container mt-5">
        <div class="row">
<div class="col-sm-12 mb-3">
<img src="http://192.168.1.150/inventario-sis/img/tittle.gif" width="100%" alt="Título de la página">
<a href="producto_agregar.php"><input  class="btn btn-success" type="button" value="✚ Agregar equipo"></a>
<a href="excel.php" class="btn btn-success-2">
    <i class="fas fa-download download-icon"></i> Descargar EXCEL
</a>

</div>
<div class="col-sm-12">
<div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                <span class="material-icons">search</span>
                                </button>
                            </div>
                        </div>
<div class="table-responsive">
<table class="table table-striped table-hover">
<thead>

<tr>
<CENTER>
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
</CENTER>


</tr>
</thead>

<tbody>

<?php

$sql = "SELECT * FROM productos";
$productos = mysqli_query($conexion, $sql);
if($productos -> num_rows > 0){
foreach($productos as $key => $row ){
?>
<!--funcion y estilos para celdas en error-->

<!-- empieza la tabla-->
<tr>
<td <?php echo  'class="'.$row['categorias'] .'"'; ?>><?php echo $row['id']; ?></td>
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
  <a href="producto_editar.php?id=<?php echo $row['id']?>">
    <div">
    <button type="submit" class="btn btn-primary">
    <i class="fas fa-pencil-alt"></i></button>
    </div>
  </a>
  <a>|</a>
  <a href="producto_eliminar.php?id=<?php echo $row['id']?>">
    <div">
    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
    </div>
  </a>
</td>
</tr>


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
