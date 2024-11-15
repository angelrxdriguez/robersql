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
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $coche = $_POST['coche'] ?? '';
    $foto = $_POST['foto'] ?? '';
//datos estent todos 
    if (!empty($nombre) && !empty($apellido) && !empty($coche) && !empty($foto)) {
        $sql = "INSERT INTO clientes (nombre, apellido, coche, foto) VALUES (:nombre, :apellido, :coche, :foto)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':coche', $coche);
        $stmt->bindParam(':foto', $foto);

        if ($stmt->execute()) {
            header("Location: subpagina.html");
            exit();
        } else {
            echo "Error al guardar el cliente.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

$conn = null; 
?>
