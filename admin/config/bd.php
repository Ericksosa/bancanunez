<?php 

$host = "localhost";
$bd = "Biblioteca";
$pass = "Erick1502*";
$user = "root";

try {
    $conexion = new PDO('mysql:host=localhost;dbname=info_pantalla', $user, $pass);
  
} catch (Exception $th) {
    echo $th->getMessage();
}

?>