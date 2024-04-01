<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Titulo de tu página</title>
<style>
    /* Estilos para las columnas */
    .container {
        display: flex !important;
        justify-content: space-between !important;
    }

    /* Estilo para cada columna */
    .col-md-4 {
        width: 30% !important; /* Se resta un poco para dejar espacio entre las columnas */
        flex-grow: 1; /* Permite a las columnas crecer para llenar el espacio disponible */
        margin-right: 5px; /* Espacio entre columnas */
    }

    /* Estilo para el contenido de las columnas */
    .col-md-4 h5, .col-md-4 p, .col-md-4 ul {
        margin-bottom: 1rem !important;
    }
</style>
</head>
<body>

<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container">
        <div class="col-md-4">
            <h5 class="text-uppercase fw-bold">Consejo</h5>
            <p class="text-muted">En entornos regulados, como el sector de la salud, un inventario actualizado puede ayudarte a cumplir con las normativas de auditoría y seguridad de datos.</p>
        </div>
        <div class="col-md-4">
            <h5 class="text-uppercase fw-bold">Contacto</h5>
            <p class="text-muted">Av. Santander # 39-28, Manizales, Caldas</p>
            <p class="text-muted">soportesistemasmanizales@gmail.com</p>
            <p class="text-muted"><i class="fas fa-phone me-3"></i>+57 300 90777599</p>
        </div>
        <div class="col-md-4">
            <h5 class="text-uppercase fw-bold">Redes Sociales</h5>
            <ul class="list-unstyled">
                <li><a href="#" class="text-muted">Facebook</a></li>
                <li><a href="#" class="text-muted">Twitter</a></li>
                <li><a href="#" class="text-muted">Instagram</a></li>
            </ul>
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2023-2024 Todos los Derechos Reservados Meintegral S.A.S | Desarrollador Jhon Sebastian Mora Agudelo
    </div>
</footer>

</body>
</html>
