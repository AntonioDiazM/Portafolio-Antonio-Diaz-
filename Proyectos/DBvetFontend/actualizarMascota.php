<?php
$conn = new mysqli("localhost", "root", "", "dbvet");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$raza = $_POST['raza'];
$edad = $_POST['edad'];
$dueno = $_POST['dueno'];

$sql = "UPDATE mascotas SET 
        Nombre='$nombre',
        Especie='$especie',
        Raza='$raza',
        Edad='$edad',
        Dueno='$dueno'
        WHERE Id_mascota='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Mascota actualizada correctamente.";
    echo "<br><br><a href='mascotasRegistradas.php'><button>Volver a la lista</button></a>";
} else {
    echo "Error al actualizar: " . $conn->error;
}

$conn->close();
?>