<!DOCTYPE html>
<html lang="es-MX">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<body>
<img src="http://192.168.1.150/ProyectoBaseDatos/img/tittle.gif" width="100%" alt="Título de la página">
<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form action="../../includes/_functions.php" method="POST"  enctype="multipart/form-data">

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="nombre" class="form-label">Nombre del Equipo *</label>
<input type="text"  id="nombre" name="nombre" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="direccion_ip" class="form-label">Dirección IP *</label>
<input type="text"  id="direccion_ip" name="direccion_ip" class="form-control" required >
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="direccion_mac" class="form-label">Dirección MAC *</label>
<input type="text"  id="direccion_mac" name="direccion_mac" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="ubicacion" class="form-label">Ubicacion del Equipo *</label>
<input type="text"  id="ubicacion" name="ubicacion" class="form-control" required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="responsable" class="form-label">Responsable *</label>
<input type="text"  id="responsable" name="responsable" class="form-control" required>
</div>
</div>

<div class="col-sm-6">

<div class="mb-3">
<label for="responsable" class="form-label">Número Serial *</label>
<input type="text"  id="numero_serial" name="numero_serial" class="form-control" required> 
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
                <input type="file" class="form-control-file" name="foto" id="foto" required>
            </div>
        </div>
    </div>
</div>

<div class="mb-3">
<input type="hidden" name="accion" value="insertar_productos">
<button type="submit" class="btn btn-success">Guardar</button>
</div>
</form>
</div>
</div>
</body>
<?php require '../../../includes/_footer.php' ?>
</html>