<?php
$servername = '192.168.0.90';
$dbname = 'clientes';
$user = "example_user";
$password = "password";
$database = "clientes";

try {
    $conn = new PDO("mysql:host=$host", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->exec("USE $dbname");

    $tableQuery = "
        CREATE TABLE IF NOT EXISTS lista (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            contrasena VARCHAR(50) NOT NULL
        );
    ";
    $conn->exec($tableQuery);

    $usuarios = [
        ['nombre' => 'pepe', 'contrasena' => 'abc123'],
        ['nombre' => 'rober', 'contrasena' => 'roberprofe'],
        ['nombre' => 'prueba', 'contrasena' => 'prueba']
    ];

    $insertQuery = "INSERT INTO lista (nombre, contrasena) VALUES (:nombre, :contrasena)";
    $stmt = $conn->prepare($insertQuery);

    foreach ($usuarios as $usuario) {
        $checkQuery = "SELECT COUNT(*) FROM lista WHERE nombre = :nombre AND contrasena = :contrasena";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->execute([':nombre' => $usuario['nombre'], ':contrasena' => $usuario['contrasena']]);

        if ($checkStmt->fetchColumn() == 0) {
            $stmt->execute($usuario);
        }
    }

    //crea tabla clientes
    $clientesTableQuery = "
        CREATE TABLE IF NOT EXISTS clientes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            apellido VARCHAR(50) NOT NULL,
            coche VARCHAR(50) NOT NULL,
            foto VARCHAR(100) NOT NULL
        );
    ";
    $conn->exec($clientesTableQuery);
//mete clienrtes
    $clientes = [
        ['nombre' => 'ÁNGEL', 'apellido' => 'CANALLA ALFONSO', 'coche' => 'Ford Fiesta 2019 116cv', 'foto' => 'fotos/angel.jpg'],
        ['nombre' => 'PEPE', 'apellido' => 'RODRIGUEZ TUMBA', 'coche' => 'Mazda 3 2018 120cv', 'foto' => 'fotos/pepe.png'],
        ['nombre' => 'JUAN', 'apellido' => 'ZUMBADO RICK', 'coche' => 'Audi A3 2009 106cv', 'foto' => 'fotos/juan.png']
    ];
//aqiui
    $insertClienteQuery = "INSERT INTO clientes (nombre, apellido, coche, foto) VALUES (:nombre, :apellido, :coche, :foto)";
    $stmtCliente = $conn->prepare($insertClienteQuery);

    //solo sino estan metidos ya
    foreach ($clientes as $cliente) {
        $checkClienteQuery = "SELECT COUNT(*) FROM clientes WHERE nombre = :nombre AND apellido = :apellido";
        $checkClienteStmt = $conn->prepare($checkClienteQuery);
        $checkClienteStmt->execute([':nombre' => $cliente['nombre'], ':apellido' => $cliente['apellido']]);

        if ($checkClienteStmt->fetchColumn() == 0) {
            $stmtCliente->execute($cliente);
        }
    }

    echo "TODO LISTO";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
