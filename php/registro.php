<?php
$conexion = new mysqli("localhost", "root", "", "expo2025");

$mensaje = "";
if ($conexion->connect_error) {
    $mensaje = "❌ Error de conexión: " . $conexion->connect_error;
} else {
    $nombre = $_POST['nombre'];
    $integrantes = $_POST['integrantes'];
    $semestre = $_POST['semestre'];
    $descripcion = $_POST['descripcion'];

    $stmt = $conexion->prepare("INSERT INTO proyectos (nombre, integrantes, semestre, descripcion) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nombre, $integrantes, $semestre, $descripcion);

    if ($stmt->execute()) {
        $mensaje = "✅ Proyecto registrado con éxito.";
    } else {
        $mensaje = "❌ Error al registrar el proyecto: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>

<!-- HTML con estilo personalizado -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Proyecto - Expo-ISIC 2024</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <h1>Expo-ISIC</h1>
        <h2>Registro de Proyectos</h2>
    </header>

    <nav>
        <ul>
            <li><a href="../index.html">Inicio</a></li>
            <li><a class="active" href="registro.html">Registro de Proyectos</a></li>
            <li><a href="material.html">Material para el Evento</a></li>
            <li><a href="entrega.html">Entrega de Productos</a></li>
            <li><a href="integradores2.php">Integradores 2º</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2>Resultado del Registro</h2>
            <p><?= $mensaje ?></p>
            <p><a href="../html/registro.html">← Volver al formulario</a></p>
        </section>
    </main>

    <footer>
        <p>Instituto Tecnológico Superior del Occidente del Estado de Hidalgo</p>
        <p>Dirección: Paseo del Agrarismo 2000, Mixquiahuala de Juárez, Hidalgo</p>
    </footer>
</body>
</html>
