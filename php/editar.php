<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "expo2025");
if (!$conexion) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}

// Verificar si llegó un ID por GET
if (!isset($_GET['id'])) {
    die("❌ ID de proyecto no especificado.");
}

$id = intval($_GET['id']);

// Si ya se envió el formulario, actualizar datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $integrantes = mysqli_real_escape_string($conexion, $_POST['integrantes']);
    $semestre = mysqli_real_escape_string($conexion, $_POST['semestre']);
    $descripcion = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $archivo = mysqli_real_escape_string($conexion, $_POST['archivo']);

    $sqlUpdate = "UPDATE proyectos 
                  SET nombre='$nombre', integrantes='$integrantes', semestre='$semestre', descripcion='$descripcion' archivo='$archivo'
                  WHERE id=$id";

    if (mysqli_query($conexion, $sqlUpdate)) {
        header("Location: admin.php"); // Redirigir al panel después de editar
        exit();
    } else {
        echo "❌ Error al actualizar: " . mysqli_error($conexion);
    }
}

// Consultar datos actuales del proyecto
$sql = "SELECT * FROM proyectos WHERE id = $id";
$resultado = mysqli_query($conexion, $sql);
$proyecto = mysqli_fetch_assoc($resultado);

if (!$proyecto) {
    die("❌ Proyecto no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto - Expo ISIC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Editar Proyecto</h1>

        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Proyecto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= htmlspecialchars($proyecto['nombre']) ?>">
            </div>
            <div class="mb-3">
                <label for="integrantes" class="form-label">Integrantes</label>
                <input type="text" class="form-control" id="integrantes" name="integrantes" required value="<?= htmlspecialchars($proyecto['integrantes']) ?>">
            </div>
            <div class="mb-3">
                <label for="semestre" class="form-label">Semestre</label>
                <input type="text" class="form-control" id="semestre" name="semestre" required value="<?= htmlspecialchars($proyecto['semestre']) ?>">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required><?= htmlspecialchars($proyecto['descripcion']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required><?= htmlspecialchars($proyecto['descripcion']) ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conexion);
?>
