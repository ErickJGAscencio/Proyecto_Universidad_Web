<?php
$servername = "remotemysql.com";
$database = "FgQKdPudUJ";
$username = "FgQKdPudUJ";
$password = "ew5EoQKp3s";
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
?>