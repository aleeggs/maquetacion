<?php
// Validar que se enviaron datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $integrantes = $_POST['integrantes'];
    $semestre = $_POST['semestre'];
    $descripcion = $_POST['descripcion'];

    // Aquí podrías guardar los datos en una base de datos, por ahora solo los mostramos
    echo "<h1>Registro recibido</h1>";
    echo "<p><strong>Proyecto:</strong> $nombre</p>";
    echo "<p><strong>Integrantes:</strong> $integrantes</p>";
    echo "<p><strong>Semestre:</strong> $semestre</p>";
    echo "<p><strong>Descripción:</strong> $descripcion</p>";
} else {
    echo "Acceso inválido.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asf</title>
</head>
<body>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur minima distinctio similique magni ex error rem, velit quaerat repudiandae! Hic sapiente iusto architecto quos cum reprehenderit quibusdam similique sunt corrupti?
    
</body>
</html>