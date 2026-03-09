<?php
$conn = new mysqli("localhost", "root", "", "dbvet");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM mascotas WHERE Id_mascota='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Modificar Mascota</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-image: url(img_doc/fondo3.jpg);
        padding: 40px;
        background-repeat: no-repeat;
        background-size: cover;
    }

    h2 {
        text-align: center;
        color: rgb(56, 107, 46);
    }

    #formModificacion {
        background-color: white;
        width: 40%;
        margin: auto;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    button {
        transition: .3s;
        border-radius: 3px;
        background-color: rgb(61,171,175);
        color: white;
        cursor: pointer;
        padding: 8px 15px;
        margin-top: 10px;
    }

    button:hover {
        background-color: rgb(68,191,196);
    }
</style>
</head>
<body>

<h2>Modificar Datos de la Mascota</h2>

<section id="formModificacion">
    <form action="actualizarMascota.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $row['Id_mascota']; ?>">

        Nombre:<br>
        <input type="text" name="nombre" value="<?php echo $row['Nombre']; ?>" required><br><br>

        Especie:<br>
        <input type="text" name="especie" value="<?php echo $row['Especie']; ?>" required><br><br>

        Raza:<br>
        <input type="text" name="raza" value="<?php echo $row['Raza']; ?>" required><br><br>

        Edad:<br>
        <input type="number" name="edad" value="<?php echo $row['Edad']; ?>" required><br><br>

        Dueño:<br>
        <input type="text" name="dueno" value="<?php echo $row['Dueno']; ?>" required><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <a href="mostrarMascotas.php"><button>Cancelar</button></a>
</section>

</body>
</html>
