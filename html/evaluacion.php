<?php
$conexion = new mysqli("localhost", "root", "", "expo2025");

$proyecto = '';
$evaluacion = '';

if (isset($_GET['proyecto'])) {
    $proyecto = htmlspecialchars($_GET['proyecto']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $evaluacion = htmlspecialchars($_POST['evaluacion']);
    
    
    // Mensaje de éxito
    echo "<script>alert('Evaluación guardada exitosamente.');</script>";
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación de Proyecto</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <h1>Evaluación de Proyecto</h1>
    </header>

    <main>
        <section>
            <h2>Evaluar Proyecto: <?= $proyecto ?></h2>
            <form action="evaluacion.php?proyecto=<?= urlencode($proyecto) ?>" method="post">
                <label for="evaluacion">Ingrese su evaluación:</label><br>
                <textarea id="evaluacion" name="evaluacion" rows="10" cols="50" required></textarea><br>
                <button type="submit">Enviar Evaluación</button>
            </form>
        </section>
    </main>

    <footer>
        <p>Instituto Tecnológico Superior del Occidente del Estado de Hidalgo</p>
        <p>Dirección: Paseo del Agrarismo 2000, Mixquiahuala de Juárez, Hidalgo</p>
    </footer>
</body>
</html>
