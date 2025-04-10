<?php
session_start();

$proyectos = [
    ["id" => 1, "nombre" => "Proyecto A", "responsable" => "Juan Pérez"],
    ["id" => 2, "nombre" => "Proyecto B", "responsable" => "Ana López"]
];

if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $proyectos = array_filter($proyectos, fn($p) => $p['id'] != $idEliminar);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Expo ISIC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f9f9f9;
        }
        header {
            background-color: #222;
            color: #fff;
            padding: 1em;
            text-align: center;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #444;
            color: white;
        }
        a.eliminar {
            color: red;
            text-decoration: none;
        }
        a.eliminar:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Panel de Administración</h1>
        <p>Gestión de proyectos registrados</p>
    </header>

    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Proyecto</th>
                    <th>Responsable</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyectos as $proyecto): ?>
                <tr>
                    <td><?= $proyecto['id'] ?></td>
                    <td><?= $proyecto['nombre'] ?></td>
                    <td><?= $proyecto['responsable'] ?></td>
                    <td>
                        <a class="eliminar" href="?eliminar=<?= $proyecto['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este proyecto?')">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
