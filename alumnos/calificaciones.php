<?php
require('../conexion/conexion.php');
session_start();
$usuario = $_SESSION['Matricula_alumno'];

//consulta para la tabla calificaciones
$sqlTablaCalificaciones ="SELECT asignaturas.Nombre, Creditos, Parcial_1, Parcial_2, Parcial_3, Ordinario, Extraordinario, Matricula_profesor FROM calificaciones, alumnos, asignaturas, profesores WHERE asignaturas.Id_Asignatura= calificaciones.Asignaturas_Id_Asignatura AND profesores.Matricula_profesor=calificaciones.Profesores_Matricula_Profesor AND alumnos.Matricula_alumno=calificaciones.Alumnos_Matricula_alumno AND calificaciones.Alumnos_Matricula_alumno='" . $usuario . "'";
//consulta para mostrar los datos
$sqlDatosAlumno = "SELECT Matricula_alumno, concat(alumnos.Nombre,' ', Apellido_paterno,' ',Apellido_materno), Semestre, carreras.Nombre, Avance_curricular FROM alumnos, carreras WHERE carreras.Id_Carrera= alumnos.Carreras_Id_Carrera AND alumnos.Matricula_alumno='" . $usuario . "'";

$dataTablaCalificaciones = mysqli_query($conexion, $sqlTablaCalificaciones);
$dataAlumnos = mysqli_query($conexion, $sqlDatosAlumno);

?>
<html>

<head>
  <title>Alumno</title>
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="stylesheet" href="../css/estilo_tabla.css">
  <link rel="shortcut icon" href="../img/Logo.png" type="image/x-icon">
</head>

<body>
  <header>
    <div class="header">
      <div class="logo"><img src="../img/Logo.png" width="150px" height="150px"></img></div>
      <center>
        <div id="universidad"><a>Universidad del Monte</a></div>
      </center>
    </div>
    <div class="banner"></div>
    <div class="menu">
      <a href="../alumnos/alumno.php">Inicio</a>
      <a href="../alumnos/prereinscripcion.php">Pre-reinscripción</a>
      <a href="../index.html">Regresar</a>

    </div>
  </header>

 <div class="centrado">
    <div class="alumno">
    <h1>Calificaciones</h1>
    </br></br>
    <center>
      <div class="horario_alumno">
        <div class="container-table">
          <div class="table__title">Calificaciones</div>
          <div class="table__header">Asignatura</div>
          <div class="table__header">Creditos</div>
          <div class="table__header">Parcial 1</div>
          <div class="table__header">Parcial 2</div>
          <div class="table__header">Parcial 3</div>
          <div class="table__header">Ordinario</div>
          <div class="table__header">Extraordinario</div>
          <div class="table__header">Profesor</div>
          <?php $resultadoCalificacion= mysqli_query($conexion, $sqlTablaCalificaciones);

          while ($row = mysqli_fetch_assoc($resultadoCalificacion)) { ?>
            <div class="table__item"><?php echo $row["Nombre"]; ?></div>
            <div class="table__item"><?php echo $row["Creditos"]; ?></div>
            <div class="table__item"><?php echo $row["Parcial_1"]; ?></div>
            <div class="table__item"><?php echo $row["Parcial_2"]; ?></div>
            <div class="table__item"><?php echo $row["Parcial_3"]; ?></div>
            <div class="table__item"><?php echo $row["Ordinario"]; ?></div>
            <div class="table__item"><?php echo $row["Extraordinario"]; ?></div>
            <div class="table__item"><?php echo $row["Matricula_profesor"]; ?></div>
          <?php }
          mysqli_free_result($resultadoCalificacion); ?>
        </div>
      </div>
    </center>
  </div>
 </div>

  <style>
    table,
    th,
    td {
      border: 1px solid black;
    }
  </style>
  <footer class="contenedor-footer">
    <div class="content-foo">
      <h4>Telefono</h4>
      <p>+01 9966332211</p>
    </div>
    <div class="content-foo">
      <h4>Correo</h4>
      <p>UnoInventado@gmail.com</p>
    </div>
    <div class="content-foo">
      <h4>Ubicación</h4>
      <p>DACyTI-UJAT Unidad Chontalpa</p>
    </div>
    <h2 class="titulo-final">&copy; Equipo No. 2 | Admn. Base de Datos</h2>
  </footer>
</body>

</html>