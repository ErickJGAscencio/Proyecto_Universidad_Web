<?php
$servername = "remotemysql.com";
$database = "FgQKdPudUJ";
$username = "FgQKdPudUJ";
$password = "ew5EoQKp3s";
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $database);
session_start();
$usuario = $_SESSION['Matricula_alumno'];
//consulta para la tabla horario
$sqlHorario = "SELECT Nombre, Creditos, Grupos_Id_Grupo, Dia, Hora FROM horario_alumno, asignaturas, grupos WHERE Asignaturas_Id_Asignatura=Id_Asignatura AND Grupos_Id_Grupo= Id_Grupo AND Alumnos_Matricula_alumno = '" . $usuario . "'";
//consulta para mostrar los datos
$sqlDatosAlumno = "SELECT Matricula_alumno, concat(alumnos.Nombre,' ', Apellido_paterno,' ',Apellido_materno), Semestre, carreras.Nombre, Avance_curricular FROM alumnos, carreras WHERE carreras.Id_Carrera= alumnos.Carreras_Id_Carrera AND alumnos.Matricula_alumno='" . $usuario . "'";

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
      <a href="calificaciones.php">Calificaciones</a>
      <a href="prereinscripcion.php">Pre-reinscripción</a>
      <a href="../index.html">Regresar</a>
    </div>
  </header>
  <center>
    <h1>Bienvenido Alumno</h1>
    </br></br>
  </center>
  <section class="alumno_contenedor">
    <div class="horario_alumno">
      <div class="container-table">
        <div class="table__title">Horario Alumno</div>
        <div class="table__header">Asignatura</div>
        <div class="table__header">Creditos</div>
        <div class="table__header">Grupo</div>
        <div class="table__header">Lunes</div>
        <div class="table__header">Martes</div>
        <div class="table__header">Miercoles</div>
        <div class="table__header">Jueves</div>
        <div class="table__header">Viernes</div>
        <?php $resultadoHorario = mysqli_query($conexion, $sqlHorario);

        while ($row = mysqli_fetch_assoc($resultadoHorario)) { ?>
          <div class="table__item"><?php echo $row["Nombre"]; ?></div>
          <div class="table__item"><?php echo $row["Creditos"]; ?></div>
          <div class="table__item"><?php echo $row["Grupos_Id_Grupo"]; ?></div>
          <?php
          $aux = $row["Dia"];
          if ($aux == 'Lunes') { ?>

            <div class="table__item"><?php echo $row["Hora"]; ?></div>
            <div class="table__item"></div>
            <div class="table__item"><?php echo $row["Hora"]; ?></div>
            <div class="table__item"></div>
            <div class="table__item"><?php echo $row["Hora"]; ?></div>
          <?php } else { ?>
            <div class="table__item"></div>
            <div class="table__item"><?php echo $row["Hora"]; ?></div>
            <div class="table__item"></div>
            <div class="table__item"><?php echo $row["Hora"]; ?></div>
            <div class="table__item"></div>
          <?php } ?>

        <?php }
        mysqli_free_result($resultadoHorario); ?>
      </div>
    </div>
    <div class="datos_alumno">
      <center>
        <h2>Datos Alumno</h2></br>
      </center>
      <?php $resultadoDatos = mysqli_query($conexion, $sqlDatosAlumno);

      while ($row = mysqli_fetch_assoc($resultadoDatos)) { ?>
        <h4 class="tabulacion">Matrícula: </h4>
        </p>
        <h4 class="tabulacion"><?php echo $row["Matricula_alumno"]; ?></h4><br>
        <h4 class="tabulacion">Nombre: </h4>
        </p>
        <h4 class="tabulacion"><?php echo $row["concat(alumnos.Nombre,' ', Apellido_paterno,' ',Apellido_materno)"]; ?></h4><br>
        <h4 class="tabulacion">Semestre: </h4>
        </p>
        <h4 class="tabulacion"><?php echo $row["Semestre"]; ?></h4><br>
        <h4 class="tabulacion">Carrera: </h4>
        </p>
        <h4 class="tabulacion"><?php echo $row["Nombre"]; ?></h4><br>
        <h4 class="tabulacion">Avance curricular: </h4>
        </p>
        <h4 class="tabulacion"><?php echo $row["Avance_curricular"]; ?></h4><br>
      <?php }
      mysqli_free_result($resultadoDatos); ?>

    </div>
    <br>
  </section>


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