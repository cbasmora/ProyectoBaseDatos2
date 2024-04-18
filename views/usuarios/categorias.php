<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header copy.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<body>


        <tr>
                <div class="row">
                        <img src="http://192.168.1.250:8080/inventario-sis/img/categorias.svg" width="100%"
                                alt="Título de la página">

                                <div style="padding: 30px; width: 90%; margin: 0 auto;">


                                <div class="col-sm-4">
                                        <a class="catComputador_Mesa"
                                                href="productosCategoria.php?categoria=<?php echo 'Computador_Mesa' ?>">
                                                <img class="img_Computador_Mesa"
                                                        src="http://192.168.1.250:8080/inventario-sis/img/computador_Mesa.svg">
                                                Computador de Mesa
                                        </a>
                                        </td>
                                </div>

                                <div class="col-sm-4">
                                        <a class="catComputador_Portátil"
                                                href="productosCategoria.php?categoria=<?php echo 'Computador_Portátil' ?>">
                                                <img class="img_Computador_Mesa"
                                                        src="http://192.168.1.250:8080/inventario-sis/img/Portatil.SVG">
                                                Computador Portátil
                                        </a>
                                </div>
                                <div class="col-sm-4">
                                        <a class="catComputador_Allinone"
                                                href="productosCategoria.php?categoria=<?php echo 'Computador_Allinone' ?>">
                                                <img class="img_Computador_Mesa"
                                                        src="http://192.168.1.250:8080/inventario-sis/img/todo_uno.svg">
                                                Computador Todo en Uno
                                        </a>
                                </div>

        </tr>
        <div class="row">
                <div class="col-sm-4">
                        <a class="catComputador_Cabina"
                                href="productosCategoria.php?categoria=<?php echo 'Computador_Cabina' ?>">
                                <img class="img_Computador_Mesa"
                                        src="http://192.168.1.250:8080/inventario-sis/img/CABINA.svg">
                                Computador Cabina
                        </a>
                </div>

                <div class="col-sm-4">
                        <a class="catTeléfonos_VoIP"
                                href="productosCategoria.php?categoria=<?php echo 'Teléfonos_VoIP' ?>">
                                <img class="img_Computador_Mesa" src="http://192.168.1.250:8080/inventario-sis/img/Voip.svg">
                                Teléfonos VoIp
                        </a>
                </div>
                <div class="col-sm-4">
                        <a class="catServidores" href="productosCategoria.php?categoria=<?php echo 'Servidores' ?>">
                                <img class="img_Computador_Mesa"
                                        src="http://192.168.1.250:8080/inventario-sis/img/servidores.svg">
                                Servidores
                        </a>
                </div>
        </div>
        <div class="row">
                <div class="col-sm-4">
                        <a class="catImpresoras" href="productosCategoria.php?categoria=<?php echo 'Impresoras' ?>">
                                <img class="img_Computador_Mesa"
                                        src="http://192.168.1.250:8080/inventario-sis/img/impresoras.svg">
                                Impresoras
                        </a>
                </div>
                <div class="col-sm-4">
                        <a class="catCámaras" href="productosCategoria.php?categoria=<?php echo 'Cámaras' ?>">
                                <img class="img_Computador_Mesa"
                                        src="http://192.168.1.250:8080/inventario-sis/img/camaras.svg">
                                Cámaras
                        </a>
                </div>
                <div class="col-sm-4">
                        <a class="catAntenas_Wifi" href="productosCategoria.php?categoria=<?php echo 'Antenas_Wifi' ?>">
                                <img class="img_Computador_Mesa" src="http://192.168.1.250:8080/inventario-sis/img/wifi.svg">
                                Antenas Wifi
                        </a>
                </div>
                <div class="col-sm-4">
                        <a class="catOtros" href="productosCategoria.php?categoria=<?php echo 'Otros' ?>">
                                <img class="img_Computador_Mesa"
                                        src="http://192.168.1.250:8080/inventario-sis/img/otros.svg">
                                Otros
                        </a>
                </div>
                <div class="col-sm-4">
                        <a class="catBodega" href="productosCategoria.php?categoria=<?php echo 'Bodega' ?>">
                                <img class="img_Computador_Mesa"
                                        src="http://192.168.1.250:8080/inventario-sis/img/bodega.svg">
                                Bodega
                        </a>
                </div>
                <div class="col-sm-4">
                        <a class="catBodega_Inservible"
                                href="productosCategoria.php?categoria=<?php echo 'Bodega_Inservible' ?>">
                                <img class="img_Computador_Mesa"
                                        src="http://192.168.1.250:8080/inventario-sis/img/inservible.svg">
                                Bodega Inservible
                        </a>
                </div>
        </div>
        </div>
        </div>
</body>
<?php require '../../includes/_footer.php' ?>

</html>