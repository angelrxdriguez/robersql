<?php
$servername = '192.168.0.90';
$dbname = 'clientes';
$user = "example_user";
$password = "password";
$database = "clientes";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT nombre, apellido, coche, foto FROM clientes";
    $stmt = $conn->query($sql);
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTADO</title>
    <link rel="stylesheet" href="css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton+SC&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <img src="fotos/gerente.png" alt="" class="fotoh">
        <a href="index.html" class="linktit"><h1 class="tit">GESTOR DE CLIENTES</h1></a>
        <img src="fotos/gerente.png" alt="" class="fotoh">
    </header>

    <div class="contenedor">
        <?php foreach ($clientes as $cliente): ?>
            <div class="carta">
                <div class="izquierda">
                    <img src="<?= htmlspecialchars($cliente['foto']) ?>" alt="Foto de <?= htmlspecialchars($cliente['nombre']) ?>" class="fotoperfil">
                </div>
                <div class="derecha">
                    <h2 class="nombre"><?= htmlspecialchars($cliente['nombre']) ?></h2>
                    <h4 class="apellido"><?= htmlspecialchars($cliente['apellido']) ?></h4>
                    <h4 class="coche"><?= htmlspecialchars($cliente['coche']) ?></h4>
                    <div class="botones">
                        <button class="contactar"><img src="fotos/whatsapp.png" alt="" class="contactarfoto"></button>
                        <button class="contactar"><img src="fotos/telegrama.png" alt="" class="contactarfoto"></button>
                        <button class="contactar"><img src="fotos/llamada-telefonica.png" alt="" class="contactarfoto"></button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
