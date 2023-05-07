<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="formularioesti.css" rel="stylesheet" type="text/css">
  <link href="formulariogd.php">
  <title></title>
</head>
<header>
  <nav>
    <ul>
      <li>
        <a href="paginagd.html">Inicio</a>
      </li>
      <li>
        <a href="">Contenido</a>
        <ul>
          <li>
            <a href="contenidogd.html">Gameplay</a>
          </li>
          <a href="objetosgd.html">Objetos</a>
          </li>
          <li>
            <a href="actualizaciones.html">Actualizaciones</a>
          </li>
          <li>
            <a href="creaniv.html">Creacion de niveles</a>
          </li>
        </ul>
      </li>
      <li>
        <li>
        <a href="#">Mas juegos</a>
        <ul>
          <li>
            <a href="paginamelt.html">Geometry Dash Meltdown</a>
          </li>
          <li>
            <a href="paginawor.html">Geometry Dash World</a>
          </li>
          <li>
            <a href="paginasub.html">Geometry Dash SubZero</a>
          </li>
        </ul>
      </li>
      <a href="#">Comentarios</a>
      </li>
      <li>
        <a href="quiz.html">Quiz</a>
      </li>
    </ul>
  </nav>
</header>
<br><br>
<body id="fondo">
  <h1 align="center" id="comen"><span style="font-size: 30px;" >Envianos un mensaje </h1>
  <div class="elmargen">
<form  id="texto" method="POST" action="formulariogd.php">
  <div id="gatob">
  <marquee behavior="alternate" direction="down" width="900" height="410">
  <marquee behavior="alternate"><img src="imagenesgd/quizgif.gif" width="400" height="400"></marquee></marquee></div>
  <div class="form">
  <p>Nombre: <input type="text" name="nombre"></p>
    <p>Edad: <input type="date" value="2023-03-20" name="fecha"></p>
<div id="radio">
<label for="sexo">Sexo:</label><br>
<input type="radio" id="masculino" name="sexo" value="masculino" class="sex">
<label for="masculino">Masculino</label><br>
<input type="radio" id="femenino" name="sexo" value="femenino" class="sex">
<label for="femenino">Femenino</label><br>
</div>
  <p>Tipo de mensaje:</p>
      <select id="asunto" name="asunto">  
    <option value="">Selecciona una opción</option>
    <option value="pregunta">Consulta</option>
    <option value="sugerencia">Sugerencia</option>
    <option value="reclamo">Reclamo</option>
  </select>
  <p>Mensaje: </p>
  <textarea name="mensaje" rows="10" cols="40"></textarea>
  </div>
<input type="submit" value="REGISTRAR" name="btn_registrar" class="boton1">
<input type="submit" value="ELIMINAR" name="btn_eliminar" class="boton2">
</form>
</div>

<?php
include("conexiongd.php");
$tabla_db = "conexiongd";
$nombre = "";
$fecha = "";
$sexo = "";
$asunto = "";
$mensaje = "";
if (isset($_POST['btn_registrar'])) {
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $sexo = $_POST['sexo'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];
    if ($nombre == "" || $fecha == "" || $sexo == "" || $asunto == "" || $mensaje == "") {
        echo "Los campos son obligatorios";
    } else {
        mysqli_query($conexion, "INSERT INTO $tabla_db (nombre, fecha, sexo, asunto, mensaje) VALUES('$nombre', '$fecha', '$sexo', '$asunto', '$mensaje')");
    }
}
//BOTON ELIMINAR
if (isset($_POST['btn_eliminar'])) {
    $nombre = $_POST['nombre'];
    $existe = 0;
    if ($nombre == "") {
        echo "El documento es un campo obligatorio";
    } else {
        $resultados = mysqli_query($conexiongd, "SELECT * FROM $conexiongd WHERE nombre='$nombre';");
        while ($consulta = mysqli_fetch_array($resultados)) {
            $existe++;
        }
        if ($existe == 0) {
            echo "El documento no existe";
        } else {
            $_DELETE_SQL = "DELETE FROM $conexiongd WHERE nombre='$nombre';";
            mysqli_query($conexiongd, $_DELETE_SQL);
        }
    }
}
?>



</body>
</html>