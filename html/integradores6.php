<?php
$conexion = new mysqli("localhost", "root", "", "expo2025");

$proyectos = [];
if (!$conexion->connect_error) {
    $sql = "SELECT nombre, integrantes, descripcion, archivo FROM proyectos WHERE semestre = 6";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $proyectos[] = $fila;
        }
    }

    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expo-ISIC 2024 - Integradores 6º</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        .pdf-viewer {
            width: 100%;
            height: 400px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 10px; 
        }
    </style>
</head>
<body>
    <header>
        <h1>Expo-ISIC</h1>
        <h2>Integradores 6º</h2>
    </header>

    <nav>
        <ul>
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="registro.html">Registro de Proyectos</a></li>
            <li><a href="material.html">Material para el Evento</a></li>
            <li><a href="entrega.html">Entrega de Productos</a></li>
            <li><a href="integradores2.php">Integradores 2º</a></li>
            <li><a href="integradores4.php">Integradores 4º</a></li>
            <li><a class ="active" href="integradores6.php">Integradores 6º</a></li>
            <li><a href="#">Integradores 6º Mixta</a></li>
            <li><a href="integradores8.php">Integradores 8º</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2>Proyectos Integradores de 6º Semestre</h2>
            <p>Esta sección muestra los proyectos registrados del sexto semestre.</p>
        </section>

        <?php if (count($proyectos) > 0): ?>
        <section>
            <h3>Lista de Proyectos</h3>
            <ul>
                <?php foreach ($proyectos as $p): ?>
               <li>
                <strong><?= htmlspecialchars($p['nombre']) ?></strong><br>
                <em>Integrantes:</em> <?= htmlspecialchars($p['integrantes']) ?><br>
                <em>Descripción:</em> <?= htmlspecialchars($p['descripcion']) ?><br>
                <?php if (!empty($p['archivo'])): ?>
                <em>Archivo:</em> <a href="../archivos/<?= htmlspecialchars($p['archivo']) ?>" target="_blank">Ver PDF</a><br>
                <iframe class="pdf-viewer" src="../archivos/<?= htmlspecialchars($p['archivo']) ?>" frameborder="0"></iframe>
                <?php endif; ?>
                </li><br>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php else: ?>
        <section>
            <p>No hay proyectos registrados aún para este semestre.</p>
        </section>
        <?php endif; ?>
    </main>

    <footer>
        <p>Instituto Tecnológico Superior del Occidente del Estado de Hidalgo</p>
        <p>Dirección: Paseo del Agrarismo 2000, Mixquiahuala de Juárez, Hidalgo</p>
    </footer>
</body>
</html>
