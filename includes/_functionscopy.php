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
    var_dump($_POST);
    global $conexion;
    extract($_POST);

// Verificar si el nombre ya existe
    if (nombreExiste($nombre)) {
        $response = array(
            'type' => 'error',
            'title' => 'Error',
            'text' => 'EL NOMBRE YA EXISTE EN LA BASE DE DATOS.'
        );
        echo json_encode($response);
        exit();
    }
    $extension = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));

// Verificar si la extensión es PNG
if ($extension != "png") {
    // Si no es PNG, mostrar un error o tomar alguna otra acción
    $response = array(
        'type' => 'error',
        'title' => 'Error',
        'text' => 'El archivo debe ser de tipo PNG.'
    );
    echo json_encode($response);
    exit();
}
        //variables donde se almacenan los valores de nuestra imagen
                $tamanoArchvio=$_FILES['foto']['size'];
    
        //se realiza la lectura de la imagen
                $imagenSubida=fopen($_FILES['foto']['tmp_name'], 'r');
                $binariosImagen=fread($imagenSubida,$tamanoArchvio);   
        //se realiza la consulta correspondiente para guardar los datos
        
        $imagen =mysqli_escape_string($conexion,$binariosImagen);
                

//Código para agregar a la base de datos//
        $consulta="INSERT INTO productos (nombre, direccion_ip, direccion_mac, ubicacion, responsable, numero_serial, categorias, imagen, fecha_fabricacion, Marca, Modelo, memoria_ram, disco_duro, sistema_operativo, observaciones, monitor_serial, teclado_serial, mouse_serial, otro_periferico, procesador)
        VALUES ('$nombre', '$direccion_ip', '$direccion_mac', '$ubicacion', '$responsable', '$numero_serial', '$categorias', '$imagen', '$fecha_fabricacion', '$Marca', '$Modelo', '$memoria_ram', '$disco_duro', '$sistema_operativo', '$observaciones', '$monitor_serial', '$teclado_serial', '$mouse_serial', '$otro_periferico', '$procesador');" ;

    mysqli_query($conexion, $consulta);
    
    header("Location: ../views/usuarios/");

}
function editar_producto(){
    global $conexion;
    extract($_POST);

    // Verificar si el nombre ya existe
    if (nombreExiste($nombre, $id)) {
        $response = array(
            'type' => 'error',
            'title' => 'Error',
            'text' => 'EL NOMBRE YA EXISTE EN LA BASE DE DATOS.'
        );
        echo json_encode($response);
        exit();
    }

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
// Función para verificar si el nombre ya existe
function nombreExiste($nombre, $id = null)
{
    global $conexion;

    // Realizar la consulta en la base de datos
    $query = "SELECT COUNT(*) as count FROM productos WHERE nombre = '$nombre'";

    // Si se está editando un producto, excluye el producto actual de la verificación
    if ($id !== null) {
        $query .= " AND id != $id";
    }

    $result = mysqli_query($conexion, $query);
    $row = mysqli_fetch_assoc($result);

    return $row['count'] > 0;
}
?>