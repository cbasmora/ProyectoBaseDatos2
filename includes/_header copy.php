<html>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    
<?php
error_reporting(0);
session_start();
$actualsesion = $_SESSION['correo'];

if($actualsesion == null || $actualsesion == ''){

    echo 'acceso denegado';
    die();
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="../../css/boostrap.css">

    <link rel="stylesheet" href="../../css/styles3.css">

    

    <link rel="stylesheet" href="../../css/styles.css">
    <title>Inventario</title>


</head>
<body>
<div class="menu">
            <div class="area"></div><nav class="main-menu">
                <ul>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-home fa-2x"></i>
                            <span class="nav-text">
                               Inventario Total
                            </span>
                        </a>
                      
                    </li>
                    <li class="has-subnav">
                        <a href="categorias.php">
                        <i class="fa fa-solid fa-list fa-2x"></i>
                            <span class="nav-text">
                                Categorías
                            </span>
                        </a>
                        
                    </li>
                    <li class="has-subnav">
                        <a href="excel.php">
                        <i class="fa fa-solid fa-download fa-2x"></i>
                            <span class="nav-text">
                                Descargar Excel
                            </span>
                        </a>
                        
                    </li>
                </ul>

                <ul class="logout">
                    <li>
                        <a href="../../includes/_sesion/cerrarSesion.php">
                        <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                              <span class="nav-text">
                                 Salir
                              </span>
                          </a>
                       </li>
                </ul>
            </nav>
        </div>
</body>