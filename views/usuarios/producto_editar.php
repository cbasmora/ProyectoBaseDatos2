<?php

$id = $_GET['id'];
require_once ("../../includes/_db.php");
$consulta = "SELECT * FROM productos WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$productos = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<body>

<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions.php" method="POST"  enctype="multipart/form-data" >

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="nombre" class="form-label">Nombre del Equipo *</label>
<input type="text"  id="nombre" name="nombre" value="<?php echo $productos ['nombre']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="direccion_ip" class="form-label">Dirección IP *</label>
<input type="text"  id="direccion_ip" name="direccion_ip" value="<?php echo $productos ['direccion_ip']; ?>" class="form-control" required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="direccion_mac" class="form-label">Dirección MAC *</label>
<input type="text"  id="direccion_mac" name="direccion_mac" value="<?php echo $productos ['direccion_mac']; ?>"  class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="ubicacion" class="form-label">ubicacion del equipo *</label>
<input type="text"  id="ubicacion" name="ubicacion"  value="<?php echo $productos ['ubicacion']; ?>" class="form-control" required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="responsable" class="form-label">Responsable *</label>
<input type="text"  id="responsable" name="responsable"  value="<?php echo $productos ['responsable']; ?>" class="form-control" required>
</div>
</div>

<div class="col-sm-6">

<div class="mb-3">
<label for="numero_serial" class="form-label">Número Serial *</label>
<input type="text"  id="numero_serial" name="numero_serial" value="<?php echo $productos ['numero_serial']; ?>" class="form-control" required>
</div>


</div>
</div>
<div class="row">
    <div class="col-sm-12">
    <div class="mb-3">
<label for="categorias" class="form-label">Categorias *</label>
<select name="categorias" id="categorias" class="form-control" required>
    <option value="Computador_Mesa">Computador_Mesa</option>
    <option value="Computador_Portátil">Computador_Portátil</option>
    <option value="Cámaras">Cámaras</option>
    <option value="Teléfonos_VoIP">Teléfonos_VoIP</option>
    <option value="Antenas_Wifi">Antenas_Wifi</option>
    <option value="Servidores">Servidores</option>
    <option value="Impresoras">Impresoras</option>
    <option value="Otros">Otros</option>
    <option value="Bodega">Bodega</option>

  </select>
    </div>   
</div>
</div>
<div class="mb-3">
<div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <input type="file" class="form-control-file"  name="foto" id="foto">
            </div>
        </div>
    </div>
</div>
<center><img width="200px" src="data:image/jpeg;base64,<?php echo base64_encode($productos['imagen']); ?>" alt="Imagen previamente cargada" /><br><p><em>(Imagen actual)</em></p></center>
<div class="mb-3">
<input type="hidden" name="accion" value="editar_producto">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<button type="submit" class="btn btn-success">Guardar</button>
</div>
</form>
</div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>