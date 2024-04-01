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
<?php require '../../includes/_header copy.php' ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<body>


    <div class="row">
        <img src="http://192.168.1.150/inventario-sis/img/HDV.png" width="100%" alt="Título de la página">
    </div>
    <br>
    <center>
        <p>
        <h1><em><b>
                    <div id="nombre">
                        <?php echo $productos['nombre']; ?>
                    </div>
                </b></em></h1>
        </p>
        <br><img width="30%" src="data:image/jpeg;base64,<?php echo base64_encode($productos['imagen']); ?>"
            style="border: 1px solid #ccc; padding: 10px; background:#EAF2F8; border-radius: 25px;box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);"
            alt="Imagen previamente cargada" />
    </center>

    <div class="container-fluid" style="width: 80%;">


        <form action="../../includes/_functionscopy.php" method="POST" enctype="multipart/form-data">


            <br>
            <center>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <center><label for="responsable" class="form-label">Responsable del equipo:</span></label>
                            <center>
                                <input type="text" id="responsable" name="responsable"
                                    value="<?php echo $productos['responsable']; ?>" class="form-control" readonly>

                    </div>
                </div>
                <center>


                    <div style="border: 1px solid #ccc; background:#EAF2F8; border-radius: 25px;box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);">
                        <h5
                            style="background:#3498db; color: white; border-radius: 25px 25px 0px 0px; height:50px; display: flex; align-items: center; padding-left: 10px; margin: 0;">
                            <b>1. Identificación y categorización</b></h5>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <center><label for="fecha_fabricacion" class="form-label">Fecha de
                                            fabricación:</label>
                                        <center>
                                            <input type="date" id="fecha_fabricacion" name="fecha_fabricacion"
                                                value="<?php echo $productos['fecha_fabricacion']; ?>"
                                                class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <center><label for="nombre" class="form-label">Nombre del equipo:</label>
                                        <center>
                                            <input type="text" id="nombre" name="nombre"
                                                value="<?php echo $productos['nombre']; ?>" class="form-control"
                                                readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <center><label for="Marca" class="form-label">Marca:</label>
                                        <center>
                                            <input type="text" id="Marca" name="Marca"
                                                value="<?php echo $productos['Marca']; ?>" class="form-control"
                                                readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="Modelo" class="form-label">Modelo:</label>
                                    <input type="text" id="Modelo" name="Modelo"
                                        value="<?php echo $productos['Modelo']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="numero_serial" class="form-label">Número serial:</label>
                                    <input type="text" id="numero_serial" name="numero_serial"
                                        value="<?php echo $productos['numero_serial']; ?>" class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="categorias" class="form-label">Categoría:</label>
                                    <input type="text" id="categorias" name="categorias"
                                        value="<?php echo $productos['categorias']; ?>" class="form-control" readonly>


                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div style="border: 1px solid #ccc; background:#F5EEF8; border-radius: 25px;box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);">

                        <h5
                            style="background:#5c3b99; color: white; border-radius: 25px 25px 0px 0px; height:50px; display: flex; align-items: center; padding-left: 10px; margin: 0;">
                            <b>2. Especificaciones técnicas</b></h5>
                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="memoria_ram" class="form-label">Memoria RAM:</label>
                                    <input type="text" id="memoria_ram" name="memoria_ram"
                                        value="<?php echo $productos['memoria_ram']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="disco_duro" class="form-label">Disco duro:</label>
                                    <input type="text" id="disco_duro" name="disco_duro"
                                        value="<?php echo $productos['disco_duro']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="disco_duro" class="form-label">Procesador:</label>
                                    <input type="text" id="procesador" name="procesador"
                                        value="<?php echo $productos['procesador']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="sistema_operativo" class="form-label">Sistema Operativo:</label>
                                    <input type="text" id="sistema_operativo" name="sistema_operativo"
                                        value="<?php echo $productos['sistema_operativo']; ?>" class="form-control"
                                        readonly>


                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div style="border: 1px solid #ccc; background:#FEF97; border-radius: 25px;box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);">
                        <h5
                            style="background:#F39C12; color: white; border-radius: 25px 25px 0px 0px; height:50px; display: flex; align-items: center; padding-left: 10px; margin: 0;">
                            <b>3. Detalles de la red</b></h5>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="direccion_ip" class="form-label">Dirección Ip:</span></label>
                                    <input type="text" id="direccion_ip" name="direccion_ip"
                                        value="<?php echo $productos['direccion_ip']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="direccion_mac" class="form-label">Dirección MAC:</label>
                                    <input type="text" id="direccion_mac" name="direccion_mac"
                                        value="<?php echo $productos['direccion_mac']; ?>" class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="ubicacion" class="form-label">Ubicación:<span
                                            style="color: red;"></label>
                                    <input type="text" id="ubicacion" name="ubicacion"
                                        value="<?php echo $productos['ubicacion']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div style="border: 1px solid #ccc; background:#E8F8F5; border-radius: 25px;box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);">
                        <h5
                            style="background:#2ECC71; color: white; border-radius: 25px 25px 0px 0px; height:50px; display: flex; align-items: center; padding-left: 10px; margin: 0;">
                            <b>4. Dispositivos periféricos</b></h5>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="monitor_serial" class="form-label">Datos del monitor:</label>
                                    <input type="text" id="monitor_serial" name="monitor_serial"
                                        value="<?php echo $productos['monitor_serial']; ?>" class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="teclado_serial" class="form-label">Datos del teclado:</label>
                                    <input type="text" id="teclado_serial" name="teclado_serial"
                                        value="<?php echo $productos['teclado_serial']; ?>" class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="mouse_serial" class="form-label">Datos del mouse:</label>
                                    <input type="text" id="mouse_serial" name="mouse_serial"
                                        value="<?php echo $productos['mouse_serial']; ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="otro_periferico" class="form-label">Otro:</label>
                                    <input type="text" id="otro_periferico" name="otro_periferico"
                                        value="<?php echo $productos['otro_periferico']; ?>" class="form-control"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
<br>
                    <div style="border: 1px solid #ccc; background:#FDEDEC; border-radius: 25px;box-shadow: 0 8px 8px rgba(0, 0, 0, 0.1);">
                        <h5
                            style="background:#E74C3C; color: white; border-radius: 25px 25px 0px 0px; height:50px; display: flex; align-items: center; padding-left: 10px; margin: 0;">
                            <b>5. Observaciones generales</b></h5>
                        <textarea id="observaciones" name="observaciones" class="form-control"
                            readonly><?php echo $productos['observaciones']; ?></textarea>
                    </div>
    </div>

    <br>
    <br>
    <br>
    <style>
        #boton {
            position: fixed;
            bottom: 10px;
            right: 10px;
        }
    </style>
    </head>

    <body>

        <style>
            #boton {
                position: fixed;
                bottom: 10px;
                right: 10px;
                background-color: #007bff;
                /* Color de fondo del botón */
                padding: 10px 20px;
                /* Espaciado interno del botón */
                border-radius: 5px;
                /* Borde redondeado del botón */
            }

            #boton i {
                font-size: 24px;
                /* Tamaño del icono */
                color: white;
                /* Color del icono */
            }
        </style>
        <div>
            <center>
                <a id="boton" href="../../fpdf/hdv-equipo.php" target="_blank"><i class="bi bi-printer"></i></a>
            </center>
        </div>

        <script>
            // Obtener el ID de la URL actual
            var urlParams = new URLSearchParams(window.location.search);
            var id = urlParams.get('id');

            // Obtener el botón y agregar el ID como parámetro
            var boton = document.getElementById('boton');
            boton.href += "?id=" + id;
        </script>
        </div>
        </form>
        </div>
        </div>
    </body>
    <?php require '../../includes/_footer.php' ?>

</html>