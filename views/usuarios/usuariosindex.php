
<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header copy.php' ?>

<body>
  
<center><h1>Información de sesion actual</h1></center>
</div>
<div class="col-sm-12">
<div class="table-responsive">


<table class="table table-striped table-hover">
<thead>

<tr>
<th id="90">Nombre</th>
<th>Celular</th>
<th>Usuario</th>
<th>Contraseña</th>
<th>Fecha de Ingreso</th>


</tr>

</thead>

<tbody>

<?php

$sql = "SELECT  nombre, password, telefono, correo,registro FROM user WHERE correo ='$actualsesion'";
$usuarios = mysqli_query($conexion, $sql);
if($usuarios -> num_rows > 0){
foreach($usuarios as $key => $row ){




?>
<tr>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['telefono']; ?></td>
<td><?php echo $row['correo']; ?></td>
<td><?php echo $row['password']; ?></td>
<td><?php echo $row['registro']; ?></td>
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
    </body>

</html>