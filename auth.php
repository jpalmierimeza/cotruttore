<?php
$servername = "localhost"; // o la dirección de tu servidor MySQL
$username = "u804902209_costruttore";        // tu usuario de MySQL
$password = "Costruttore1000156$";             // tu contraseña de MySQL (por defecto en localhost es vacía)
$dbname =  "u804902209_costruttore_bd";   // la base de datos que hemos creado


// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

header('Content-Type: application/json');

// Función para encriptar contraseñas con SHA1
function encryptSHA1($password) {
    return sha1($password);
}

// Registro de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $contrasena_hash = encryptSHA1($contrasena);

    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES ('$nombre', '$correo', '$contrasena_hash')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['mensaje' => 'Registro exitoso']);
    } else {
        echo json_encode(['error' => 'Error al registrar: ' . $conn->error]);
    }
}

// Inicio de sesión de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $contrasena_hash = encryptSHA1($contrasena);

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena_hash'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode(['mensaje' => 'Inicio de sesión exitoso']);
        
    } else {
        echo json_encode(['error' => 'Usuario o contraseña incorrectos']);
    }
}

$conn->close();
?>
