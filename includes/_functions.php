<?php

require_once ("_db.php");


if(isset($_POST['accion'])){ 
    switch($_POST['accion']){
        case 'eliminar_producto':
            eliminar_producto();

        break;        
        case 'editar_producto':
        editar_producto();

        break;

        case 'insertar_productos':
        insertar_productos();

        break;    
    }

}

function insertar_productos(){

    global $conexion;
    extract($_POST);


        //variables donde se almacenan los valores de nuestra imagen
                $tamanoArchvio=$_FILES['foto']['size'];
    
        //se realiza la lectura de la imagen
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //se realiza la consulta correspondiente para guardar los datos
        
        $imagen =mysqli_escape_string($conexion,$binariosImagen);
                


    $consulta="INSERT INTO productos (nombre, direccion_ip, direccion_mac, ubicacion, responsable, numero_serial, categorias, imagen)
    VALUES ('$nombre', '$direccion_ip', '$direccion_mac', '$ubicacion', '$responsable' ,'$numero_serial', '$categorias', '$imagen');" ;

    mysqli_query($conexion, $consulta);
    
    header("Location: ../views/usuarios/");

}
function editar_producto(){
    global $conexion;
    extract($_POST);

    // Verifica si se ha subido una nueva imagen
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Se ha subido una nueva imagen
        $tamanoArchivo = $_FILES['foto']['size'];
        $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
        $imagen = mysqli_escape_string($conexion, $binariosImagen);

        $consulta = "UPDATE productos SET nombre = '$nombre', direccion_ip = '$direccion_ip', direccion_mac = '$direccion_mac', ubicacion = '$ubicacion', responsable = '$responsable', numero_serial = '$numero_serial', categorias = '$categorias', imagen = '$imagen' WHERE id = $id";
    } else {
        // No se ha subido una nueva imagen, no actualices la imagen en la base de datos
        $consulta = "UPDATE productos SET nombre = '$nombre', direccion_ip = '$direccion_ip', direccion_mac = '$direccion_mac', ubicacion = '$ubicacion', responsable = '$responsable', numero_serial = '$numero_serial', categorias = '$categorias' WHERE id = $id";
    }

    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}
function eliminar_producto(){

    global $conexion;
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM productos WHERE id = $id";
    mysqli_query($conexion, $consulta);
    header("Location: ../views/usuarios/");
}
?>