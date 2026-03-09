<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbvet";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Mascotas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(img_doc/fondo3.jpg);
            padding: 40px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background: white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        h2 {
            text-align: center;
            color: rgb(56, 107, 46);
        }
        button {
            transition: .3s;
            border-radius: 3px;
            background-color: rgb(61,171,175);
            color: white;
            cursor: pointer;
            padding: 6px 12px;
        }
        button:hover {
            background-color: rgb(68,191,196);
        }
        .btnEliminar {
            background-color: red;
        }
        .btnEliminar:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<a href="pag1.html"><button>Volver a Inicio</button></a>
<a href="consultarHistorial.html"><button>Consultar Historial</button></a>

<?php
$sql = "SELECT * FROM mascotas";
$result = $conn->query($sql);

echo "<h2>Lista de Mascotas Registradas</h2>";

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Edad</th>
                <th>Dueño</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['Id_mascota']}</td>
                <td>{$row['Nombre']}</td>
                <td>{$row['Especie']}</td>
                <td>{$row['Raza']}</td>
                <td>{$row['Edad']}</td>
                <td>{$row['Dueno']}</td>
                <td><a href='editarMascota.php?id={$row['Id_mascota']}'><button>Modificar</button></a></td>
                <td><a href='eliminarMascota.php?id={$row['Id_mascota']}' onclick='return confirm(\"¿Seguro que deseas eliminar esta mascota?\")'>
                        <button class='btnEliminar'>Eliminar</button>
                    </a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<h3>No hay mascotas registradas.</h3>";
}

$conn->close();
?>
</body>
</html>