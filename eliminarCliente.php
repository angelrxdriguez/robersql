<?php
/*modifica esto si lo necesitas */
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
    if (!empty($id)) {
        $sqlCheck = "SELECT * FROM clientes WHERE id = :id";
        $stmtCheck = $conn->prepare($sqlCheck);
        $stmtCheck->bindParam(':id', $id, PDO::PARAM_INT);
        $stmtCheck->execute();

        if ($stmtCheck->rowCount() > 0) {
            $sqlDelete = "DELETE FROM clientes WHERE id = :id";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmtDelete->execute()) {
                header("Location: subpagina.html");
            } else {
                echo "Error al eliminar el cliente.";
            }
        } else {
            echo "NO EXISTE CLIENTE CON ESA ID";
        }
    } else {
        echo "El ID es obligatorio bro";
    }
}

$conn = null; // Cerrar conexión
?>
