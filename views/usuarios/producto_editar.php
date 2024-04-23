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
    <img src="http://192.168.1.250:8080/inventario-sis/img/editarequipo.png" width="100%" alt="Título de la página">

    <div class="container-fluid" style="width: 80%;">


        <form action="../../includes/_functionscopy.php" method="POST" enctype="multipart/form-data">
            
        
        <br>
            <h5>Identificación y categorización: </h5>
            <br>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable del equipo<span style="color: red;"> *</span></label>
                    <input type="text" id="responsable" name="responsable" value="<?php echo $productos ['responsable']; ?>" class="form-control" required>
                </div>
            </div>


            <div style="border: 1px solid #ccc; padding: 30px; background:#EAF2F8; border-radius: 25px;">


                <br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="fecha_fabricacion" class="form-label">Fecha de fabricación<span
                                    style="color: red;"> *</span></label>
                            <input type="date" id="fecha_fabricacion" name="fecha_fabricacion" value="<?php echo $productos ['fecha_fabricacion']; ?>" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del equipo<span style="color: red;">
                                    *</span></label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo $productos ['nombre']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="Marca" class="form-label">Marca<span style="color: red;"> *</span></label>

<select name="Marca" id="Marca" value="<?php echo $productos ['Marca']; ?>" class="form-control" required>
    <option value="" disabled <?php echo empty($productos['Marca']) ? 'selected' : ''; ?>>- Seleccione una opción -</option>
    <option value="Acer" <?php echo ($productos['Marca'] === 'Acer') ? 'selected' : ''; ?>>Acer</option>
    <option value="Apple" <?php echo ($productos['Marca'] === 'Apple') ? 'selected' : ''; ?>>Apple</option>
    <option value="Asus" <?php echo ($productos['Marca'] === 'Asus') ? 'selected' : ''; ?>>Asus</option>
    <option value="Dell" <?php echo ($productos['Marca'] === 'Dell') ? 'selected' : ''; ?>>Dell</option>
    <option value="HP (Hewlett-Packard)" <?php echo ($productos['Marca'] === 'HP (Hewlett-Packard)') ? 'selected' : ''; ?>>HP (Hewlett-Packard)</option>
    <option value="IBM" <?php echo ($productos['Marca'] === 'IBM') ? 'selected' : ''; ?>>IBM</option>
    <option value="Lenovo" <?php echo ($productos['Marca'] === 'Lenovo') ? 'selected' : ''; ?>>Lenovo</option>
    <option value="MSI" <?php echo ($productos['Marca'] === 'MSI') ? 'selected' : ''; ?>>MSI</option>
    <option value="Samsung" <?php echo ($productos['Marca'] === 'Samsung') ? 'selected' : ''; ?>>Samsung</option>
    <option value="Sony" <?php echo ($productos['Marca'] === 'Sony') ? 'selected' : ''; ?>>Sony</option>
    <option value="Toshiba" <?php echo ($productos['Marca'] === 'Toshiba') ? 'selected' : ''; ?>>Toshiba</option>
    <option value="VAIO" <?php echo ($productos['Marca'] === 'VAIO') ? 'selected' : ''; ?>>VAIO</option>
    <option value="Otro" <?php echo ($productos['Marca'] === 'Otro') ? 'selected' : ''; ?>>Otro</option>
</select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="Modelo" class="form-label">Modelo<span style="color: red;"> *</span></label>
                            <input type="text" id="Modelo" name="Modelo" value="<?php echo $productos ['Modelo']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="numero_serial" class="form-label">Serial<span style="color: red;"> *</span></label>
                            <input type="text" id="numero_serial" name="numero_serial" value="<?php echo $productos ['numero_serial']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="categorias" class="form-label">Categoría<span style="color: red;">
                                    *</span></label>
                                    <select name="categorias" id="categorias" value="<?php echo $productos ['categorias']; ?>" class="form-control" required>
    <option value="" disabled <?php echo empty($productos['categorias']) ? 'selected' : ''; ?>>- Seleccione una opción -</option>
    <option value="Computador_Mesa" <?php echo ($productos['categorias'] === 'Computador_Mesa') ? 'selected' : ''; ?>>Computador de Mesa</option>
    <option value="Computador_Portátil" <?php echo ($productos['categorias'] === 'Computador_Portátil') ? 'selected' : ''; ?>>Computador Portátil</option>
    <option value="Computador_Allinone" <?php echo ($productos['categorias'] === 'Computador_Allinone') ? 'selected' : ''; ?>>Computador All-in-One</option>
    <option value="Computador_Cabina" <?php echo ($productos['categorias'] === 'Computador_Cabina') ? 'selected' : ''; ?>>Computador de Cabina</option>
    <option value="Cámaras" <?php echo ($productos['categorias'] === 'Camaras') ? 'selected' : ''; ?>>Cámaras</option>
    <option value="Telefonos_VoIP" <?php echo ($productos['categorias'] === 'Telefonos_VoIP') ? 'selected' : ''; ?>>Teléfonos VoIP</option>
    <option value="Antenas_Wifi" <?php echo ($productos['categorias'] === 'Antenas_Wifi') ? 'selected' : ''; ?>>Antenas WiFi</option>
    <option value="Servidores" <?php echo ($productos['categorias'] === 'Servidores') ? 'selected' : ''; ?>>Servidores</option>
    <option value="Impresoras" <?php echo ($productos['categorias'] === 'Impresoras') ? 'selected' : ''; ?>>Impresoras</option>
    <option value="Otros" <?php echo ($productos['categorias'] === 'Otros') ? 'selected' : ''; ?>>Otros</option>
    <option value="Bodega" <?php echo ($productos['categorias'] === 'Bodega') ? 'selected' : ''; ?>>Bodega</option>
    <option value="Bodega_Inservible" <?php echo ($productos['categorias'] === 'Bodega_Inservible') ? 'selected' : ''; ?>>Bodega Inservible</option>
</select>
</div>

                    </div>
                </div>
            </div>
            <br>
            <h5>Especificaciones técnicas:</h5>
            <div style="border: 1px solid #ccc; padding: 30px; background:#F5EEF8; border-radius: 25px;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="memoria_ram" class="form-label">Memoria RAM</label>
                            <input type="text" id="memoria_ram" name="memoria_ram" value="<?php echo $productos ['memoria_ram']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="disco_duro" class="form-label">Disco Duro</label>
                            <input type="text" id="disco_duro" name="disco_duro" value="<?php echo $productos ['disco_duro']; ?>" class="form-control" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="disco_duro" class="form-label">Procesador</label>
                            <input type="text" id="procesador" name="procesador" value="<?php echo $productos ['procesador']; ?>" class="form-control" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="sistema_operativo" class="form-label">Sistema Operativo</label>
                            <select name="sistema_operativo" id="sistema_operativo" value="<?php echo $productos ['sistema_operativo']; ?>" class="form-control">
    <option value="" disabled <?php echo empty($productos['sistema_operativo']) ? 'selected' : ''; ?>>- Seleccione una opción -</option>
    <option value="Windows 11" <?php echo ($productos['sistema_operativo'] === 'Windows 11') ? 'selected' : ''; ?>>Windows 11</option>
    <option value="Windows 10" <?php echo ($productos['sistema_operativo'] === 'Windows 10') ? 'selected' : ''; ?>>Windows 10</option>
    <option value="Windows 8" <?php echo ($productos['sistema_operativo'] === 'Windows 8') ? 'selected' : ''; ?>>Windows 8</option>
    <option value="Windows 7" <?php echo ($productos['sistema_operativo'] === 'Windows 7') ? 'selected' : ''; ?>>Windows 7</option>
    <option value="Linux" <?php echo ($productos['sistema_operativo'] === 'Linux') ? 'selected' : ''; ?>>Linux</option>
    <option value="MacOs" <?php echo ($productos['sistema_operativo'] === 'MacOs') ? 'selected' : ''; ?>>MacOs</option>
    <option value="Otro" <?php echo ($productos['sistema_operativo'] === 'Otro') ? 'selected' : ''; ?>>Otro</option>
    <option value="No Aplica" <?php echo ($productos['sistema_operativo'] === 'No Aplica') ? 'selected' : ''; ?>>No Aplica</option>
</select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h5>Detalles de la Red:</h5>
            <div style="border: 1px solid #ccc; padding: 30px; background:#FEF9E7; border-radius: 25px;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="direccion_ip" class="form-label">Dirección Ip<span style="color: red;">
                                    *</span></label>
                            <input type="text" id="direccion_ip" name="direccion_ip" value="<?php echo $productos ['direccion_ip']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="direccion_mac" class="form-label">Dirección MAC<span style="color: red;">
                                    *</span></label>
                            <input type="text" id="direccion_mac" name="direccion_mac" value="<?php echo $productos ['direccion_mac']; ?>" class="form-control"required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación<span style="color: red;">
                                    *</span></label>
                                    <select name="ubicacion" id="ubicacion" value="<?php echo $productos ['ubicacion']; ?>" class="form-control"required>
    <option value="" disabled <?php echo empty($productos['ubicacion']) ? 'selected' : ''; ?>>- Seleccione una opción -</option>
    <option value="Auditoria" <?php echo ($productos['ubicacion'] === 'Auditoria') ? 'selected' : ''; ?>>Auditoria</option>
    <option value="Auditorio Ebenezer" <?php echo ($productos['ubicacion'] === 'Auditorio Ebenezer') ? 'selected' : ''; ?>>Auditorio Ebenezer</option>
    <option value="Auxiliar Administrativa" <?php echo ($productos['ubicacion'] === 'Auxiliar Administrativa') ? 'selected' : ''; ?>>Auxiliar Administrativa</option>
    <option value="Biomédica" <?php echo ($productos['ubicacion'] === 'Biomédica') ? 'selected' : ''; ?>>Biomédica</option>
    <option value="Caja de Facturación" <?php echo ($productos['ubicacion'] === 'Caja de Facturación') ? 'selected' : ''; ?>>Caja de Facturación QX</option>
    <option value="Call Center" <?php echo ($productos['ubicacion'] === 'Call Center') ? 'selected' : ''; ?>>Call Center</option>
    <option value="Central de Esterilización" <?php echo ($productos['ubicacion'] === 'Central de Esterilización') ? 'selected' : ''; ?>>Central de Esterilización</option>
    <option value="Coordinación Médica" <?php echo ($productos['ubicacion'] === 'Coordinación Médica') ? 'selected' : ''; ?>>Coordinación Médica</option>
    <option value="Consulta Externa" <?php echo ($productos['ubicacion'] === 'Consulta Externa') ? 'selected' : ''; ?>>Consulta Externa</option>
    <option value="Especialidades" <?php echo ($productos['ubicacion'] === 'Especialidades') ? 'selected' : ''; ?>>Especialidades</option>
    <option value="Farmacia" <?php echo ($productos['ubicacion'] === 'Farmacia') ? 'selected' : ''; ?>>Farmacia</option>
    <option value="Front" <?php echo ($productos['ubicacion'] === 'Front') ? 'selected' : ''; ?>>Front</option>
    <option value="Gerencia" <?php echo ($productos['ubicacion'] === 'Gerencia') ? 'selected' : ''; ?>>Gerencia</option>
    <option value="Hospitalización P3" <?php echo ($productos['ubicacion'] === 'Hospitalización P3') ? 'selected' : ''; ?>>Hospitalización P3</option>
    <option value="Hospitalización P4" <?php echo ($productos['ubicacion'] === 'Hospitalización P4') ? 'selected' : ''; ?>>Hospitalización P4</option>
    <option value="Hospitalización P5" <?php echo ($productos['ubicacion'] === 'Hospitalización P5') ? 'selected' : ''; ?>>Hospitalización P5</option>
    <option value="Hospitalización P6" <?php echo ($productos['ubicacion'] === 'Hospitalización P6') ? 'selected' : ''; ?>>Hospitalización P6</option>
    <option value="Laboratorio" <?php echo ($productos['ubicacion'] === 'Laboratorio') ? 'selected' : ''; ?>>Laboratorio</option>
    <option value="Manifold" <?php echo ($productos['ubicacion'] === 'Manifold') ? 'selected' : ''; ?>>Manifold</option>
    <option value="Nutrición" <?php echo ($productos['ubicacion'] === 'Nutrición') ? 'selected' : ''; ?>>Nutrición</option>
    <option value="Publicidad" <?php echo ($productos['ubicacion'] === 'Publicidad') ? 'selected' : ''; ?>>Publicidad</option>
    <option value="Psicología" <?php echo ($productos['ubicacion'] === 'Psicología') ? 'selected' : ''; ?>>Psicología</option>
    <option value="Quirófanos" <?php echo ($productos['ubicacion'] === 'Quirófanos') ? 'selected' : ''; ?>>Quirófanos</option>
    <option value="Rayos X" <?php echo ($productos['ubicacion'] === 'Rayos X') ? 'selected' : ''; ?>>Rayos X</option>
    <option value="Referencia" <?php echo ($productos['ubicacion'] === 'Referencia') ? 'selected' : ''; ?>>Referencia</option>
    <option value="Sistemas" <?php echo ($productos['ubicacion'] === 'Sistemas') ? 'selected' : ''; ?>>Sistemas</option>
    <option value="Talento Humano" <?php echo ($productos['ubicacion'] === 'Talento Humano') ? 'selected' : ''; ?>>Talento Humano</option>
    <option value="Talento Humano" <?php echo ($productos['ubicacion'] === 'Terapia Respiratoria') ? 'selected' : ''; ?>>Terapia Respiratoria</option>
    <option value="UCI Neonatal" <?php echo ($productos['ubicacion'] === 'UCI Neonatal') ? 'selected' : ''; ?>>UCI Neonatal</option>
    <option value="UCI Pediátrica" <?php echo ($productos['ubicacion'] === 'UCI Pediátrica') ? 'selected' : ''; ?>>UCI Pediátrica</option>
</select>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <h5>Dispositivos periféricos:</h5>
            <div style="border: 1px solid #ccc; padding: 30px; background:#E8F8F5; border-radius: 25px;">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="monitor_serial" class="form-label">Datos del Monitor:</label>
                            <input type="text" id="monitor_serial" name="monitor_serial" value="<?php echo $productos ['monitor_serial']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                        <label for="teclado_serial" class="form-label">Datos del Teclado:</label>
                       <input type="text" id="teclado_serial" name="teclado_serial" value="<?php echo $productos ['teclado_serial']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="mouse_serial" class="form-label">Datos del Mouse:</label>
                            <input type="text" id="mouse_serial" name="mouse_serial" value="<?php echo $productos ['mouse_serial']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="otro_periferico" class="form-label">Otro:</label>
                            <input type="text" id="otro_periferico" name="otro_periferico" value="<?php echo $productos ['otro_periferico']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="remoto" class="form-label">Remoto:</label>
                            <input type="text" id="remoto" name="remoto" value="<?php echo $productos ['remoto']; ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <h5>Observaciones Adicionales:</h5>
            <textarea id="observaciones" name="observaciones" class="form-control"><?php echo $productos['observaciones']; ?></textarea>
            <br>
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
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</body>
<?php require '../../includes/_footer.php' ?>

</html>