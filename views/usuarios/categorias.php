<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header.php' ?>
<img src="http://localhost/ProyectoBaseDatos/img/tittle.gif" width="100%" alt="Título de la página">
<body>

    <div class="row">
        <div class="col-sm-4">
<a class="catComputador_Mesa" href="productosCategoria.php?categoria=<?php echo 'Computador_Mesa'?>">
Computador de Mesa
</a>
        </div>
<div class="col-sm-4">
<a class="catComputador_Portátil" href="productosCategoria.php?categoria=<?php echo 'Computador_Portátil'?>">
Computador Portatil
</a>
</div>  
<div class="col-sm-4">
<a class="catCámaras" href="productosCategoria.php?categoria=<?php echo 'Cámaras'?>">
Cámaras
</a>
</div>  
</div>
<div class="row">
<div class="col-sm-4">
<a class="catAntenas_Wifi" href="productosCategoria.php?categoria=<?php echo 'Antenas_Wifi'?>">
Antenas Wifi
</a>
</div>

<div class="col-sm-4">
<a class="catTeléfonos_VoIP" href="productosCategoria.php?categoria=<?php echo 'Teléfonos_VoIP'?>">
Teléfonos VoIp
</a>
</div>
<div class="col-sm-4">
<a class="catServidores" href="productosCategoria.php?categoria=<?php echo 'Servidores'?>">
Servidores
</a>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<a class="catImpresoras" href="productosCategoria.php?categoria=<?php echo 'Impresoras'?>">
Impresoras
</a>
</div>
<div class="col-sm-4">
<a class="catOtros" href="productosCategoria.php?categoria=<?php echo 'Otros'?>">
Otros
</a>
</div>
<div class="col-sm-4">
<a class="catBodega" href="productosCategoria.php?categoria=<?php echo 'Bodega'?>">
Bodega
</a>
</div>
</div>
<div class="row">
    <div class="col-sm-12">
        <input class="soon" type="button" value="">
    </div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>