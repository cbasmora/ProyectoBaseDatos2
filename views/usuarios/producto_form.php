
<div class="container">
<div class="col-sm-6 offset-3 mt-5">
<form method="POST" id="Form"  enctype="multipart/form-data">

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="nombre" class="form-label">Nombre *</label>
<input type="text"  id="nombre" name="nombre" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="direccion_ip" class="form-label">direccion_ip *</label>
<input type="text"  id="direccion_ip" name="direccion_ip" class="form-control" required >
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="direccion_mac" class="form-label">direccion_mac *</label>
<input type="text"  id="direccion_mac" name="direccion_mac" class="form-control" required>
</div>
</div>

<div class="col-sm-6">
<div class="mb-3">
<label for="ubicacion" class="form-label">ubicacion *</label>
<input type="text"  id="ubicacion" name="ubicacion" class="form-control" required>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="mb-3">
<label for="responsable" class="form-label">responsable *</label>
<input type="text"  id="responsable" name="responsable" class="form-control" required>
</div>
</div>

<div class="col-sm-6">

<div class="mb-3">
<label for="responsable" class="form-label">responsable minima *</label>
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
    <option value="Computador_Allinone">Computador_Allinone</option>
    <option value="Computador_Cabina">Computador_Cabina</option>
    <option value="Bodega_Inservible">Bodega Inservible</option>


  </select>
    </div>   
</div>
</div>
<div class="mb-3">
<a href="index.php"><button type = "button" id="btnSubmit" class="btn btn-success">Guardar</button>
</div>
</form>
</div>
</div>
