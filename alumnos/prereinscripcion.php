<?php
$servername = "remotemysql.com";
$database = "FgQKdPudUJ";
$username = "FgQKdPudUJ";
$password = "ew5EoQKp3s";
// Create connection
$conexion = mysqli_connect($servername, $username, $password, $database);
session_start();
$usuario = $_SESSION['Matricula_alumno'];
//consulta para la tabla pre-horario
//$sqlAsignaturas = "SELECT Id_Asignatura, Nombre FROM asignaturas";
$sqlAsignaturas = "SELECT ID_Grupo, asignaturas.Nombre FROM grupos, asignaturas WHERE Asignaturas_Id_Asignatura = asignaturas.Id_Asignatura";
//$sqlGrupos = "SELECT ID_Grupo, asignaturas.Nombre FROM grupos, asignaturas WHERE Asignaturas_Id_Asignatura = asignaturas.Id_Asignatura";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Pre-reinscripcion</title>
  <link rel="stylesheet" href="../css/estilo.css">
  <link rel="shortcut icon" href="../img/Logo.png" type="image/x-icon">
</head>

<body>
  <header>
    <div class="header">
      <div class="logo">
        <img alt="logo" src="../img/Logo.png" width="150px" height="150px"></img>
      </div>
      <center>
        <div id="universidad"><a>Universidad del Monte</a></div>
      </center>
    </div>
    <div class="banner"></div>
    <div class="menu">
      <a href="../alumnos/calificaciones.php">Calificaciones</a>
      <a href="../alumnos/alumno.php">Alumnos</a>
      <a href="../index.html">Regresar</a>
    </div>
  </header>

  <link rel="stylesheet" href="../css/estilo_tabla.css">
  <div class="alumno">
    <h1>Pre Reinscripcion</h1>
    <center>
      <div class="horario_prereinscripcion">
        <br><br>
        <p>Las materias escogidas para el lunes, miercoles y viernes serán puestas en los demas campos respectivos. De igual forma para los dias restantes entre ellos.</p>
        <br><br>
        <div class="tabla-contendor">
          <div class="titulo-tabla">Pre-Horario</div>

          <div class="cabezera-tabla">HORARIO</div>
          <div class="cabezera-tabla">Lunes</div>
          <div class="cabezera-tabla">Martes</div>
          <div class="cabezera-tabla">Miercoles</div>
          <div class="cabezera-tabla">Jueves</div>
          <div class="cabezera-tabla">Viernes</div>

          <div class="objeto-tabla">08:00 - 10:00</div>
          <?php $resultadoAsignaturas = mysqli_query($conexion, $sqlAsignaturas);
          while ($row = mysqli_fetch_assoc($resultadoAsignaturas)) { ?>
            <th>
              <select id="Lu1" name="Lu0810" onchange="MostrarSeleccionado(id);"> //Lunes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ma1" name="Ma0810" onchange="MostrarSeleccionado(id);"> //Martes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Mi1" name="Mi0810" onchange="MostrarSeleccionado(id);"> //Miercoles
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ju1" name="Ju0810" onchange="MostrarSeleccionado(id);"> //Jueves
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Vi1" name="Vi0810" onchange="MostrarSeleccionado(id);"> //Viernes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>
            </th>
          <?php }
          mysqli_free_result($resultadoAsignaturas); ?>


          <div class="objeto-tabla">10:00 - 12:00</div>
          <?php $resultadoAsignaturas = mysqli_query($conexion, $sqlAsignaturas);
          while ($row = mysqli_fetch_assoc($resultadoAsignaturas)) { ?>
            <th>
              <select id="Lu2" name="Lu0810" onchange="MostrarSeleccionado(id);"> //Lunes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ma2" name="Ma0810" onchange="MostrarSeleccionado(id);"> //Martes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Mi2" name="Mi0810" onchange="MostrarSeleccionado(id);"> //Miercoles
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ju2" name="Ju0810" onchange="MostrarSeleccionado(id);"> //Jueves
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Vi2" name="Vi0810" onchange="MostrarSeleccionado(id);"> //Viernes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>
            </th>
          <?php }
          mysqli_free_result($resultadoAsignaturas); ?>


          <div class="objeto-tabla">12:00 - 14:00</div>
          <?php $resultadoAsignaturas = mysqli_query($conexion, $sqlAsignaturas);
          while ($row = mysqli_fetch_assoc($resultadoAsignaturas)) { ?>
            <th>
              <select id="Lu3" name="Lu0810" onchange="MostrarSeleccionado(id);"> //Lunes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ma3" name="Ma0810" onchange="MostrarSeleccionado(id);"> //Martes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Mi3" name="Mi0810" onchange="MostrarSeleccionado(id);"> //Miercoles
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ju3" name="Ju0810" onchange="MostrarSeleccionado(id);"> //Jueves
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Vi3" name="Vi0810" onchange="MostrarSeleccionado(id);"> //Viernes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>
            </th>
          <?php }
          mysqli_free_result($resultadoAsignaturas); ?>


          <div class="objeto-tabla">14:00 - 16:00</div>
          <?php $resultadoAsignaturas = mysqli_query($conexion, $sqlAsignaturas);
          while ($row = mysqli_fetch_assoc($resultadoAsignaturas)) { ?>
            <th>
              <select id="Lu4" name="Lu0810" onchange="MostrarSeleccionado(id);"> //Lunes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ma4" name="Ma0810" onchange="MostrarSeleccionado(id);"> //Martes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Mi4" name="Mi0810" onchange="MostrarSeleccionado(id);"> //Miercoles
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ju4" name="Ju0810" onchange="MostrarSeleccionado(id);"> //Jueves
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Vi4" name="Vi0810" onchange="MostrarSeleccionado(id);"> //Viernes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>
            </th>
          <?php }
          mysqli_free_result($resultadoAsignaturas); ?>


          <div class="objeto-tabla">16:00 - 18:00</div>
          <?php $resultadoAsignaturas = mysqli_query($conexion, $sqlAsignaturas);
          while ($row = mysqli_fetch_assoc($resultadoAsignaturas)) { ?>
            <th>
              <select id="Lu5" name="Lu0810" onchange="MostrarSeleccionado(id);"> //Lunes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ma5" name="Ma0810" onchange="MostrarSeleccionado(id);"> //Martes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Mi5" name="Mi0810" onchange="MostrarSeleccionado(id);"> //Miercoles
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Ju5" name="Ju0810" onchange="MostrarSeleccionado(id);"> //Jueves
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>

              <select id="Vi5" name="Vi0810" onchange="MostrarSeleccionado(id);"> //Viernes
                <option selected>Elige opción</option>
                <?php foreach ($resultadoAsignaturas as $dato) : ?>
                  <option value=<?php echo $dato['ID_Grupo'] ?>><?php echo $dato['Nombre'] ?> / <?php echo $dato['ID_Grupo'] ?></option>
                <?php endforeach ?>
              </select>
            </th>
          <?php }
          mysqli_free_result($resultadoAsignaturas); ?>
        </div>

        <form action="enviar_pre.php" method="POST" enctype="multipart/form-data">
          <table width='600'>
          <tr style="height:50px">
              <th align=left>Dia:</th>
              <th align=left><input type="text" name="idDia" id="idDia"></th>
            </tr>
            <tr style="height:50px">
              <th align=left>Grupo:</th>
              <th align=left><input type="text" name="idGrupo" id="idGrupo"></th>
            </tr>
          </table></br>
          <button type="submit" class="botonesG">Enviar datos </button><br><br>
        <br>
        <br>
      </div>
    </center>
    <br>

    <script type="text/javascript">
      function MostrarSeleccionado(idO) {
        for (var i = 1; i < 6; i++) {
          var idLu = "Lu";
          var idMi = "Mi";
          var idVi = "Vi";

          idLu += i;
          idMi += i;
          idVi += i;

          if (idO == idLu || idO == idMi || idO == idVi) {
            var combo = document.getElementById(idO);
            var index = combo.options[combo.selectedIndex].index;
            var idAsig = document.getElementById(idO).value;

            document.getElementById(idLu).selectedIndex = index;
            document.getElementById(idMi).selectedIndex = index;
            document.getElementById(idVi).selectedIndex = index;


            if (RevisarFilas(idO, index) == false && RevisarColumnas(idO, index) == false) {
              MostrarAviso();
            }else{
              document.getElementById("idDia").value = "Lunes";
              document.getElementById("idGrupo").value = combo.options[combo.selectedIndex].value;
            }
            
            return;
          }

          var idMa = "Ma";
          var idJu = "Ju";

          idMa += i;
          idJu += i;

          if (idO == idMa || idO == idJu) {
            var combo = document.getElementById(idO);
            var index = combo.options[combo.selectedIndex].index;
            var idAsig = document.getElementById(idO).value;

            //alert(index);
            document.getElementById(idMa).selectedIndex = index;
            document.getElementById(idJu).selectedIndex = index;


            if (RevisarFilas(idO, index) == false && RevisarColumnas(idO, index) == false) {
              MostrarAviso();
            }else{
              document.getElementById("idDia").value = "Martes";
              document.getElementById("idGrupo").value = combo.options[combo.selectedIndex].value;
            }
            return;
          }
        }
      }

      function RevisarFilas(idO, index) {
        if (index != 0) {
          for (var i = 1; i < 6; i++) {
            var idLu = "Lu"; //Columna
            idLu += i; //Fila
            var idMa = "Ma"; //Columna
            idMa += i; //Fila
            var idMi = "Mi"; //Columna
            idMi += i; //Fila
            var idJu = "Ju"; //Columna
            idJu += i; //Fila
            var idVi = "Vi"; //Columna
            idVi += i; //Fila

            if (idO == idLu || idO == idMi || idO == idVi) { //Revisa la fila
              if (index == document.getElementById(idMa).selectedIndex || index == document.getElementById(idJu).selectedIndex) {
                document.getElementById(idLu).selectedIndex = 0;
                document.getElementById(idMi).selectedIndex = 0;
                document.getElementById(idVi).selectedIndex = 0;
                alert("Favor de seleccionar una materia no registrada antes en su pre horario.");
                return true;
              }
            } else {
              if (idO == idMa || idO == idJu) { //Revisa la fila
                if (index == document.getElementById(idLu).selectedIndex || index == document.getElementById(idMi).selectedIndex || index == document.getElementById(idVi).selectedIndex) {
                  document.getElementById(idMa).selectedIndex = 0;
                  document.getElementById(idJu).selectedIndex = 0;
                  alert("Favor de seleccionar una materia no registrada antes en su pre horario.");
                  return true;
                }
              }
            }
          }
          RevisarColumnas(idO, index);
        }
      }

      function RevisarColumnas(idO, index) {
        if (index != 0) {
          for (var i = 1; i < 6; i++) {
            var idLu = "Lu"; //Columna
            idLu += i; //Fila
            var idMa = "Ma"; //Columna
            idMa += i; //Fila
            var idMi = "Mi"; //Columna
            idMi += i; //Fila
            var idJu = "Ju"; //Columna
            idJu += i; //Fila
            var idVi = "Vi"; //Columna
            idVi += i; //Fila

            if (idO == idLu || idO == idMi || idO == idVi) { //OBTENEMOS LA LINEA
              var idLuO = "Lu"; //Columna
              idLuO += i; //Fila
              var idMiO = "Mi"; //Columna
              idMiO += i; //Fila
              var idViO = "Vi"; //Columna
              idViO += i; //Fila
              for (var j = 1; j < 6; j++) {
                var idLuC = "Lu"; //Columna
                idLuC += j; //Fila

                if (idO != idLuC) { //REVISA TODAS LAS LINEAS MENOS LA MIA
                  if (index == document.getElementById(idLuC).selectedIndex) {
                    document.getElementById(idLuO).selectedIndex = 0;
                    document.getElementById(idMiO).selectedIndex = 0;
                    document.getElementById(idViO).selectedIndex = 0;

                    alert("Favor de seleccionar una materia no registrada antes en su pre horario.");
                    break;
                  }
                }
              }
            }
            if (idO == idMa || idO == idJu) {
              var idMaO = "Ma"; //Columna
              idMaO += i; //Fila
              var idJuO = "Ju"; //Columna
              idJuO += i; //Fila

              if (idO == idJu) {
                for (var j = 1; j < 6; j++) {
                  var idJuC = "Ju"; //Columna
                  idJuC += j; //Fila

                  if (idO != idJuC) { //REVISA TODAS LAS LINEAS MENOS LA MIA
                    if (index == document.getElementById(idJuC).selectedIndex) {
                      document.getElementById(idMaO).selectedIndex = 0;
                      document.getElementById(idJuO).selectedIndex = 0;

                      alert("Favor de seleccionar una materia no registrada antes en su pre horario.");
                      break;
                    }
                  }
                }
              } else {
                if (idO == idMa) {
                  for (var j = 1; j < 6; j++) {
                    var idMaC = "Ma"; //Columna
                    idMaC += j; //Fila

                    if (idO != idMaC) { //REVISA TODAS LAS LINEAS MENOS LA MIA
                      if (index == document.getElementById(idMaC).selectedIndex) {
                        document.getElementById(idMaO).selectedIndex = 0;
                        document.getElementById(idJuO).selectedIndex = 0;

                        alert("Favor de seleccionar una materia no registrada antes en su pre horario.");
                        break;
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }

      function EnviarDatos() {
        var res = window.confirm("¿Está seguro de enviar este pre-horario?");
        if (res == true) {
          for (var i = 1; i < 6; i++) {
            var idLu = "Lu";
            idLu += i;
            var idMa = "Ma";
            idMa += i;

            $dato1 = document.getElementById(idLu).selectedIndex = index;
            $dato2 = document.getElementById(idMa).selectedIndex = index;
          }
        }
      }
    </script>

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