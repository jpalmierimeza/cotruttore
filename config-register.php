<?php 

$servername = "localhost"; 
$username = "u804902209_costruttore"; 
$password = "Costruttore1000156$"; 
$bd = "u804902209_costruttore_bd"; 
// Crear conexión 
$conn = new mysqli($servername, $username, $password, $bd); 
// Verificar conexión 
if ($conn->connect_error) { die("Conexión fallida: " . $conn->connect_error); 
}
else {
     echo "Conexión exitosa"; 
    }
 
 
 ?> 



