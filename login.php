<?php

//Continua la ssesion dl navegador en el servidor php 
session_start();

include './misFunciones.php';


function limpiaPalabra($palabra){
    //FILTRO MUY BASICO PARA EVITAR LA INYECCION SQL
    $palabra = trim($palabra, "'");
    $palabra = trim($palabra, " ");
    $palabra = trim($palabra, "-");
    $palabra = trim($palabra, "`");
    $palabra = trim($palabra, '"');
      return $palabra;
}

$mysqli= conectaBBDD();



$cajaNombre = limpiaPalabra($_POST['cajaNombre']) ;

$cajaPassword = limpiaPalabra($_POST['cajaPassword']);


  

//echo 'Has escrito el usuario: '.$cajaNombre.' y la contraseña: '.$cajaPassword;
  
$resultadoQuery = $mysqli -> query("SELECT * FROM usuarios WHERE nombreUsuario='$cajaNombre' AND userPass='$cajaPassword'");

$numUsuarios = $resultadoQuery -> num_rows;

if($numUsuarios > 0){
    $r = $resultadoQuery ->fetch_array();
    //en la variable de sesion "nombreUsuario" guardo el nombre del usuario
    $_SESSION['nombreUsuario'] = $cajaNombre;
    
    //en la variable de sesion guardo el id de Usuario leido de la bbdd 
    $_SESSION['idUsuario'] = $r['idUsuario'];
    //muestro la pantalla de la aplicacion el require llama a un archivo
    require 'app.php';
        
    }
    else{
        //muestro una pantalla de error
        require 'error.php';
    }