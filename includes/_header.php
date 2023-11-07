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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Inventario</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../../css/styles.css">
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3"><img src="http://192.168.1.150/ProyectoBaseDatos/img/logo.png" width="100%" alt="Título de la página"></div>
</a>
<hr class="sidebar-divider my-0">
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="material-icons-outlined"></i>
        <span>INICIO</span></a>
</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
    ADMINISTRADOR
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
    <span class="material-icons">pattern</span>
        <span>Inventario</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="categorias.php">
        <span class="material-icons">category</span>
        <span>Categorias</span>
    </a>
</li>
<hr class="sidebar-divider">
<div class="sidebar-heading">
    PERFIL
</div>
<li class="nav-item">
    <a class="nav-link collapsed" href="usuariosindex.php">
        <span class="material-icons">people</span>
        <span>Información usuario</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="../../includes/_sesion/cerrarSesion.php">
    <span class="material-icons">logout</span>
        <span>Salir</span></a>
        
</li>

<hr class="sidebar-divider d-none d-md-block">

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0"></button>
</div>
</ul>
<!-- EMPIEZA EL NAVBAR -->
       <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">


