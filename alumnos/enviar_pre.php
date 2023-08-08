<?php
require('../conexion/conexion.php');

/**/
session_start();
$usuario = $_SESSION['Matricula_alumno'];

$dia = $_POST['idDia'];
$grupo =  $_POST['idGrupo'];


$SQL="INSERT INTO pre_horarios(Alumnos_Matricula_alumno, Grupos_Id_Grupo, dia, hora) 
VALUES ('$usuario', '$grupo', '$dia', '08:00 - 10:00')";

if ($conexion -> query($SQL)==true){
echo "<script>alert('Registro exitoso'); window.location.assign('prereinscripcion.php') </script>";
echo '</script>';  
}else{
echo "<script>alert('Campos faltantes o datos incorrectos.'); window.location.assign('prereinscripcion.php') </script>";
echo '</script>';  
echo $l1;
}
?>