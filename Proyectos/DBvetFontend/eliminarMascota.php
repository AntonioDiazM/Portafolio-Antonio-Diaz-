<?php
$conn = new mysqli("localhost", "root", "", "dbvet");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM mascotas WHERE Id_mascota='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Mascota eliminada correctamente.');
            window.location.href='mascotasRegistradas.php';
          </script>";
} else {
    echo "Error al eliminar: " . $conn->error;
}

$conn->close();
?>