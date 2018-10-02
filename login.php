<?php
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

//for( $i = 0; $i< $numPreguntas; $i++){
 //   $r =$resultadoQuery -> fetch_array();
 //   echo $r['nombreUsuario'].'<br/>';
 //}

if($numUsuarios > 0){
    //muestro la pantalla de la aplicacion el require llama a un archivo
    require 'app.php';
    }
    else{
        //muestro una pantalla de error
        require 'error.php';
    }