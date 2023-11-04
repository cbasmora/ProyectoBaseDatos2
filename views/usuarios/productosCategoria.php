<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<body>

<div id= "content">
        <section>
        <div class="container mt-5">
<div class="row">
<div class="col-sm-12 mb-3">
<center><h1>Productos</h1></center>
<a href="producto_agregar.php"><input  class="btn btn-primary" type="button" value="Agregar producto"></a>
</div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
<thead>

<tr>
<th>ID</th>
<th></th>
<th>direccion_ip</th>
<th>direccion_mac</th>
<th>ubicacion</th>
<th>responsable</th>
<th>responsable minima</th>
<th>Categoría</th>
<th>Imagen</th>
<th>Acciones</th>


</tr>

</thead>

<tbody>

<?php
$categoria = $_GET['categoria'];
extract($_POST);
$sql = "SELECT * FROM productos WHERE categorias = '$categoria'";
$productos = mysqli_query($conexion, $sql);
if($productos -> num_rows > 0){
foreach($productos as $key => $row ){
?>

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

<td>
  <a href="producto_editar.php?id=<?php echo $row['id']?>">
    <div">
      Editar
    </div>
  </a>
  <a>|</a>
  <a href="producto_eliminar.php?id=<?php echo $row['id']?>">
    <div">
    Eliminar
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