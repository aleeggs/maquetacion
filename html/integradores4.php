<?php
$conexion = new mysqli("localhost", "root", "", "expo2025");

$proyectos = [];
if (!$conexion->connect_error) {
    $sql = "SELECT nombre, integrantes, descripcion FROM proyectos WHERE semestre = 4";
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
    <title>Expo-ISIC 2024 - Integradores 4º</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <header>
        <h1>Expo-ISIC</h1>
        <h2>Integradores 4º</h2>
    </header>

    <nav>
        <ul>
            <li><a href="../index.html">Inicio</a></li>
            <li><a href="registro.html">Registro de Proyectos</a></li>
            <li><a href="material.html">Material para el Evento</a></li>
            <li><a href="entrega.html">Entrega de Productos</a></li>
            <li><a href="integradores2.php">Integradores 4º</a></li>
            <li><a class="active" href="integradores4.html">Integradores 4º</a></li>
            <li><a href="integradores6.html">Integradores 6º</a></li>
            <li><a href="#">Integradores 6º Mixta</a></li>
            <li><a href="integradores8.html">Integradores 8º</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2>Proyectos Integradores de 4º Semestre</h2>
            <p>Esta sección muestra los proyectos registrados del cuarto semestre.</p>
        </section>

        <?php if (count($proyectos) > 0): ?>
        <section>
            <h3>Lista de Proyectos</h3>
            <ul>
                <?php foreach ($proyectos as $p): ?>
                <li>
                    <strong><?= htmlspecialchars($p['nombre']) ?></strong><br>
                    <em>Integrantes:</em> <?= htmlspecialchars($p['integrantes']) ?><br>
                    <em>Descripción:</em> <?= htmlspecialchars($p['descripcion']) ?>
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
