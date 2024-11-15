<?php
$servername = '192.168.0.90';
$dbname = 'clientes';
$user = "example_user";
$password = "password";
$database = "clientes";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $coche = $_POST['coche'] ?? '';
    $foto = $_POST['foto'] ?? '';

    if (!empty($id) && !empty($nombre) && !empty($apellido) && !empty($coche) && !empty($foto)) {
        $sql = "UPDATE clientes SET nombre = :nombre, apellido = :apellido, coche = :coche, foto = :foto WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':coche', $coche);
        $stmt->bindParam(':foto', $foto);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            header("Location: subpagina.html");
        } else {
            echo "Error al actualizar el cliente.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

$conn = null; // Cerrar conexión
?>
