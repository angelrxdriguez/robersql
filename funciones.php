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
//si fue enviadao
if (isset($_POST['nombre']) && isset($_POST['contrasena'])) {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    //pilla los que sean iguales
    $sql = "SELECT * FROM lista WHERE nombre = :nombre AND contrasena = :contrasena";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->execute();

    //si existe
    if ($stmt->rowCount() > 0) {
        //validos , con location ponemos donde pasara 
        header("Location: subpagina.html");
        exit;
    } else {
        //si falla
        echo "<h4 style='color: red;'>DATOS INCORRECTOS</h4>";

        echo"<a href='index.html'>VUELVE AL INICIO</a>";
    }
}
?>
