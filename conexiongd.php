<?php
  $host="localhost"; //TERMINAL
  $usuariodb="root"; //NOMBRE DEL USUARIO
  $clavedb="";//PASSWORD
  $basededatos="conexiongd";//NOMBRE DE LA BASE DE DATOS
  $tabla_db="conexiongd";//NOMBRE DE LA TABLA
  
  //error_reporting(0); //NO MUESTRA ERRORES
  $conexion=new mysqli($host,$usuariodb,$clavedb,$basededatos);

  if ($conexion->connect_errno){
    echo "parece que a habido un error :,v";
    exit();
  }
?>