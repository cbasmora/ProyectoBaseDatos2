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

<body>
    <img src="http://192.168.1.150/inventario-sis/img/editarequipo.png" width="100%" alt="Título de la página">
    <div class="container">
        <div class="col-sm-6 offset-3 mt-5">
            <form action="../../includes/_functions.php" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Equipo *</label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo $productos['nombre']; ?>"
                                class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="direccion_ip" class="form-label">Dirección IP *</label>
                            <input type="text" id="direccion_ip" name="direccion_ip"
                                value="<?php echo $productos['direccion_ip']; ?>" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="direccion_mac" class="form-label">Dirección MAC *</label>
                            <input type="text" id="direccion_mac" name="direccion_mac"
                                value="<?php echo $productos['direccion_mac']; ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">ubicacion del equipo *</label>
                            <input type="text" id="ubicacion" name="ubicacion"
                                value="<?php echo $productos['ubicacion']; ?>" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="responsable" class="form-label">Responsable *</label>
                            <input type="text" id="responsable" name="responsable"
                                value="<?php echo $productos['responsable']; ?>" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-sm-6">

                        <div class="mb-3">
                            <label for="numero_serial" class="form-label">Número Serial *</label>
                            <input type="text" id="numero_serial" name="numero_serial"
                                value="<?php echo $productos['numero_serial']; ?>" class="form-control" required>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="categorias" class="form-label">Categorias *</label>
                            <select name="categorias" id="categorias" class="form-control" required>
                                <?php
                                $categorias = ["Computador_Mesa", "Computador_Portátil", "Computador_Allinone", "Computador_Cabina", "Cámaras", "Teléfonos_VoIP", "Antenas_Wifi", "Servidores", "Impresoras", "Otros", "Bodega", "Bodega_Inservible"];

                                foreach ($categorias as $categoria) {
                                    $selected = ($categoria === $productos['categorias']) ? 'selected' : '';
                                    echo "<option value='$categoria' $selected>$categoria</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="file" class="form-control-file" accept=".png" name="foto" id="foto">
                                <small class="form-text text-muted">Nota: Solo se admiten archivos PNG.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <center><img width="400px"
                        src="data:image/jpeg;base64,<?php echo base64_encode($productos['imagen']); ?>"
                        alt="Imagen previamente cargada" /><br>
                    <p><em>(Imagen actual)</em></p>
                </center>
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