<?php
session_start();

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "expo2025");
if (!$conexion) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}

// Eliminar proyecto si viene por GET
if (isset($_GET['eliminar'])) {
    $idEliminar = intval($_GET['eliminar']); // Seguridad extra: convertir a número
    $sqlEliminar = "DELETE FROM proyectos WHERE id = $idEliminar";
    mysqli_query($conexion, $sqlEliminar);
    // Redirigir para evitar re-eliminar si se recarga la página
    header("Location: admin.php");
    exit();
}

// Consultar proyectos registrados
$sql = "SELECT * FROM proyectos";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
    <title>Panel de Administración - Expo ISIC</title>

</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <p>Gestión de proyectos registrados</p>
        <p></p>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Proyecto</th>
                    <th>Integrantes</th>
                    <th>Semestre</th>
                    <th>Descripción</th>
                    <th>Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($resultado) > 0): ?>
                    <?php while($proyecto = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?= $proyecto['id'] ?></td>
                            <td><?= htmlspecialchars($proyecto['nombre']) ?></td>
                            <td><?= htmlspecialchars($proyecto['integrantes']) ?></td>
                            <td><?= htmlspecialchars($proyecto['semestre']) ?></td>
                            <td><?= htmlspecialchars($proyecto['descripcion']) ?></td>
                            <td>
                                <a class="eliminar" href="?eliminar=<?= $proyecto['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este proyecto?')">Eliminar</a>
                                <a class="editar" href="editar.php?id=<?= $proyecto['id'] ?>">Editar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No hay proyectos registrados aún.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

<?php
// Cerrar conexión
mysqli_close($conexion);
?>
