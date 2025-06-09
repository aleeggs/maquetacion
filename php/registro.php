<?php
$conexion = new mysqli("localhost", "root", "", "expo2025");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST["nombre"];
$integrantes = $_POST["integrantes"];
$semestre = $_POST["semestre"];
$descripcion = $_POST["descripcion"];

// Directorio donde se guardarán los archivos
$archivo = $_FILES['archivo'];
$nombreArchivo = basename($archivo['name']);
$rutaDestino = "../archivos/" . $nombreArchivo;

// Crear el directorio si no existe
if (!is_dir("../archivos")) {  // Cambiado a "../archivos"
    mkdir("../archivos", 0777, true);
}

$mensaje = "";

if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {  // Cambiado a $archivo['tmp_name']
    // Insertar los datos en la base de datos
    $stmt = $conexion->prepare("INSERT INTO proyectos (nombre, integrantes, semestre, descripcion, archivo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $nombre, $integrantes, $semestre, $descripcion, $nombreArchivo);

    if ($stmt->execute()) {
        $mensaje = "Proyecto registrado exitosamente.";
    } else {
        $mensaje = "Error al registrar el proyecto: " . $stmt->error;
    }

    $stmt->close();
} else {
    $mensaje = "Error al subir el archivo.";
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Proyecto</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <h1>Expo-ISIC</h1>
        <h2>Registro de Proyecto</h2>
    </header>
    <main>
        <section>
            <p><?= htmlspecialchars($mensaje) ?></p>
            <a href="../html/registro.html">Volver al formulario</a> |
            <a href="integradores2.php">Ver proyectos registrados</a>
        </section>
    </main>
</body>
</html>
