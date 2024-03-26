<!DOCTYPE html>
<html lang="es-MX">
<?php require '../../includes/_db.php' ?>
<?php require '../../includes/_header copy.php' ?>

<body>
    <img src="http://192.168.1.150/inventario-sis/img/agregarequipo.png" width="100%" alt="Título de la página">


    <div class="container-fluid" style="width: 80%;">


        <form action="../../includes/_functionscopy.php" method="POST" enctype="multipart/form-data">
            
        
        <br>
            <h5>Identificación y categorización: </h5>
            <br>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="responsable" class="form-label">Responsable *</label>
                    <input type="text" id="responsable" name="responsable" class="form-control" required>
                </div>
            </div>


            <div style="border: 1px solid #ccc; padding: 30px; background:#EAF2F8; border-radius: 25px;">


                <br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="fecha_fabricacion" class="form-label">Fecha de fabricación<span
                                    style="color: red;"> *</span></label>
                            <input type="date" id="fecha_fabricacion" name="fecha_fabricacion" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del equipo<span style="color: red;">
                                    *</span></label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="Marca" class="form-label">Marca<span style="color: red;"> *</span></label>
                            <select name="Marca" id="Marca" class="form-control" required>
                                <option value="" selected disabled>- Seleccione una opción -</option>
                                <option value="Acer">Acer</option>
                                <option value="Apple">Apple</option>
                                <option value="Asus">Asus</option>
                                <option value="Dell">Dell</option>
                                <option value="HP (Hewlett-Packard)">HP (Hewlett-Packard)</option>
                                <option value="IBM">IBM</option>
                                <option value="Lenovo">Lenovo</option>
                                <option value="MSI">MSI</option>
                                <option value="Samsung">Samsung</option>
                                <option value="Sony">Sony</option>
                                <option value="Toshiba">Toshiba</option>
                                <option value="VAIO">VAIO</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="Modelo" class="form-label">Modelo<span style="color: red;"> *</span></label>
                            <input type="text" id="Modelo" name="Modelo" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="numero_serial" class="form-label">Serial<span style="color: red;"> *</span></label>
                            <input type="text" id="numero_serial" name="numero_serial" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="categorias" class="form-label">Categoría<span style="color: red;">
                                    *</span></label>
                            <select name="categorias" id="categorias" class="form-control" required>
                                <option value="" selected disabled>- Seleccione una opción -</option>
                                <option value="Computador_Mesa">Computador de Mesa</option>
                                <option value="Computador_Portatil">Computador Portátil</option>
                                <option value="Computador_Allinone">Computador All-in-One</option>
                                <option value="Computador_Cabina">Computador de Cabina</option>
                                <option value="Camaras">Cámaras</option>
                                <option value="Telefonos_VoIP">Teléfonos VoIP</option>
                                <option value="Antenas_Wifi">Antenas WiFi</option>
                                <option value="Servidores">Servidores</option>
                                <option value="Impresoras">Impresoras</option>
                                <option value="Otros">Otros</option>
                                <option value="Bodega">Bodega</option>
                                <option value="Bodega_Inservible">Bodega Inservible</option>
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
                            <input type="text" id="memoria_ram" name="memoria_ram" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="disco_duro" class="form-label">Disco Duro</label>
                            <input type="text" id="disco_duro" name="disco_duro" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="disco_duro" class="form-label">Procesador</label>
                            <input type="text" id="procesador" name="procesador" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="sistema_operativo" class="form-label">Sistema Operativo</label>
                            <select name="sistema_operativo" id="sistema_operativo" class="form-control">
                                <option value="" selected disabled>- Seleccione una opción -</option>
                                <option value="Windows 11">Windows 11</option>
                                <option value="Windows 10">Windows 10</option>
                                <option value="Windows 8">Windows 8</option>
                                <option value="Windows 7">Windows 7</option>
                                <option value="Linux">Linux</option>
                                <option value="MacOs">MacOs</option>
                                <option value="Otro">Otro</option>
                                <option value="No Aplica">No Aplica</option>
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
                            <input type="text" id="direccion_ip" name="direccion_ip" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="direccion_mac" class="form-label">Dirección MAC<span style="color: red;">
                                    *</span></label>
                            <input type="text" id="direccion_mac" name="direccion_mac" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación<span style="color: red;">
                                    *</span></label>
                            <select name="ubicacion" id="ubicacion" class="form-control">
                                <option value="" selected disabled>- Seleccione una opción -</option>
                                <option value="Auditoria">Auditoria</option>
                                <option value="Auditorio Ebenezer">Auditorio Ebenezer</option>
                                <option value="Auxiliar Administrativa">Auxiliar Administrativa</option>
                                <option value="Biomédica">Biomédica</option>
                                <option value="Caja de Facturación">Caja de Facturación QX</option>
                                <option value="Call Center">Call Center</option>
                                <option value="Central de Esterilización">Central de Esterilización</option>
                                <option value="Coordinación Médica">Coordinación Médica</option>
                                <option value="Consulta Externa">Consulta Externa</option>
                                <option value="Especialidades">Especialidades</option>
                                <option value="Farmacia">Farmacia</option>
                                <option value="Front">Front</option>
                                <option value="Gerencia">Gerencia</option>
                                <option value="Hospitalización P3">Hospitalización P3</option>
                                <option value="Hospitalización P4">Hospitalización P4</option>
                                <option value="Hospitalización P5">Hospitalización P5</option>
                                <option value="Hospitalización P6">Hospitalización P6</option>
                                <option value="Laboratorio">Laboratorio</option>
                                <option value="Manifold">Manifold</option>
                                <option value="Nutrición">Nutrición</option>
                                <option value="Publicidad">Publicidad</option>
                                <option value="Quirófanos">Quirófanos</option>
                                <option value="Rayos X">Rayos X</option>
                                <option value="Referencia">Referencia</option>
                                <option value="Sistemas">Sistemas</option>
                                <option value="Talento Humano">Talento Humano</option>
                                <option value="UCI Neonatal">UCI Neonatal</option>
                                <option value="UCI Pediátrica">UCI Pediátrica</option>
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
                            <input type="text" id="monitor_serial" name="monitor_serial" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                        <label for="teclado_serial" class="form-label">Datos del Teclado:</label>
                       <input type="text" id="teclado_serial" name="teclado_serial" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="mouse_serial" class="form-label">Datos del Mouse:</label>
                            <input type="text" id="mouse_serial" name="mouse_serial" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label for="otro_periferico" class="form-label">Otro:</label>
                            <input type="text" id="otro_periferico" name="otro_periferico" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <h5>Observaciones Adicionales:</h5>
            <textarea id="observaciones" name="observaciones" class="form-control"></textarea>
            <br>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="foto" class="form-label">
                        <h5>Foto del equipo:</h5>
                    </label>
                    <input type="file" id="foto" name="foto" accept=".png" class="form-control-file" required>
                </div>
            </div>
    </div>
    <br>
    <br>

    <center><input type="hidden" name="accion" value="insertar_productos">
        <button type="submit" class="btn btn-success">Guardar</button>
    </center>

    </form>

</body>
<?php require '../../includes/_footer.php' ?>

</html>