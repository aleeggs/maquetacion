<?php
$conexion = mysqli_connect("localhost", "root", "", "expo2025");

$mensaje = "";
if (!$conexion) {
    $mensaje = "❌ Error de conexión: " . mysqli_connect_error();
} else {
    $nombre = $_POST['nombre'];
    $integrantes = $_POST['integrantes'];
    $semestre = $_POST['semestre'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO proyectos (nombre, integrantes, semestre, descripcion) 
            VALUES ('$nombre', '$integrantes', '$semestre', '$descripcion')";

    if (mysqli_query($conexion, $sql)) {
        $mensaje = "✅ Proyecto registrado con éxito.";
    } else {
        $mensaje = "❌ Error al registrar el proyecto: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Proyecto - Expo-ISIC 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style2.css">
</head>
<body class="bg-light">
    <header class="bg-primary text-white text-center py-4">
        <h1 class="fw-bold">Expo-ISIC</h1>
        <h2 class="fw-light">Registro de Proyectos</h2>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.html">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link active" href="registro.html">Registro de Proyectos</a></li>
                    <li class="nav-item"><a class="nav-link" href="material.html">Material para el Evento</a></li>
                    <li class="nav-item"><a class="nav-link" href="entrega.html">Entrega de Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Integradores 1º</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5 p-4 bg-white shadow rounded">
        <h2 class="text-primary mb-4">Resultado del Registro</h2>
        <div class="alert <?= strpos($mensaje, '✅') !== false ? 'alert-success' : 'alert-danger' ?>" role="alert">
            <?= $mensaje ?>
        </div>
        <a class="btn btn-secondary mt-3" href="../html/registro.html">← Volver al formulario</a>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <p class="mb-0">Instituto Tecnológico Superior del Occidente del Estado de Hidalgo</p>
        <p class="mb-0">Dirección: Paseo del Agrarismo 2000, Mixquiahuala de Juárez, Hidalgo</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
