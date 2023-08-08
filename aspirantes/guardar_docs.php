<?php
require('../conexion/conexion.php');

/**/
$Name=  $_POST['Nombre'];
$A_P =  $_POST['Apellido_paterno'];
$A_M =  $_POST['Apellido_materno'];
$curp = addslashes(file_get_contents($_FILES['CurpD']['tmp_name']));
$acta =addslashes(file_get_contents($_FILES['Acta_nac']['tmp_name']));
$cita =addslashes(file_get_contents($_FILES['Cita']['tmp_name']));
$certificado = addslashes(file_get_contents($_FILES['Certificado']['tmp_name']));
$carrera = $_POST['Carrera'];
$curpString = $_POST['CurpS'];
$A_in = $_POST['yearS'];
$genero =  $_POST['genero'];

$SQL="INSERT INTO inscripciones (Nombre, Apellido_paterno, Apellido_materno, Cita, Ano_ingreso, Curp, Acta_nacimiento, Certificado_preparatoria, Carreras_Id_Carrera, CurpString, id_genero) VALUES ('$Name', '$A_P', '$A_M', '$cita', '$A_in', '$curp', '$acta', '$certificado', '$carrera', '$curpString', '$genero')";

/*$SQL = "INSERT INTO inscripciones (Nombre, Apellido_paterno, Apellido_materno, Curp, Carreras_Id_Carrera) VALUES ('$Name', '$A_P', '$A_M','$img_data', '$idC' )";*/

if ($conexion -> query($SQL)==true){
echo "<script>alert('Registro exitoso'); window.location.assign('aspirante.php') </script>";
echo '</script>';  
}else{
echo "<script>alert('Campos faltantes o datos incorrectos.'); window.location.assign('aspirante.php') </script>";
echo '</script>';  
}

?>