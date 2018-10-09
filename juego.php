<?php
//capturo los valores de los parametrosque me han sido pasados desde app.php
include('misFunciones.php');
$vidas = $_POST['vidas'] ;
$correctas = $_POST['correctas'] ;
$tema = $_POST['tema'] ;

$mysqli = conectaBBDD();
$resultadoQuery = $mysqli ->query("SELECT * FROM preguntas WHERE tema='$tema'");
$numPreguntas = $resultadoQuery -> num_rows;

//declaro un array en php para guardar el resultado de la query
$listaPreguntas = array ();

    for ( $i=0; $i<$numPreguntas;$i++){
        $r = $resultadoQuery -> fetch_array();//leo una fila del resultado de la query
        $listaPreguntas[$i][0] = $r['numero'];
        $listaPreguntas[$i][1] = $r['enunciado'];
        $listaPreguntas[$i][2] = $r['r1'];
        $listaPreguntas[$i][3] = $r['r2'];
        $listaPreguntas[$i][4] = $r['r3'];
        $listaPreguntas[$i][5] = $r['r4'];
        $listaPreguntas[$i][6] = $r['correcta'];
               
    }
    
$preguntaActual = rand(0, $numPreguntas);

?>

<div>
    <p></p>
    <p><a class="btn btn-block btn-dark disabled">   BIENVENIDOS A LA APLICACION TRIVIAL DE LA EVAU</a></p>    
    <p><a class="btn btn-block btn-warning" onclick="volver();">volver al menu</a></p>     
    
<p><a id="sigue1" class="btn btn-block btn-primary"><?php echo $tema;?></a></p>

<p><a id="enunciado" class="btn btn-block btn-primary"></a></p>

<p><a id="r1" class="btn btn-block btn-success"></a></p>
<p><a id="r2" class="btn btn-block btn-success"></a></p>
<p><a id="r3" class="btn btn-block btn-success"></a></p>
<p><a id="r4" class="btn btn-block btn-success"></a></p>

</div>



<script>
    function volver(){
    $('#principal').load('app.php');
    }
    
    //cargo el array php de preguntas en una variable javascript
    var listaPreguntas = <?php echo json_encode($listaPreguntas);?>;
    //calculo un numero aleatorio
    var numeroPregunta = Math.floor(Math.random() * listaPreguntas.length);
    //dibujo los textos en los botones correspondientes
    $('#enunciado').text(listaPreguntas[0][1]);
    $('#r1').text(listaPreguntas[0][2]).click(sigue());
    $('#r2').text(listaPreguntas[0][3]).click(sigue());
    $('#r3').text(listaPreguntas[0][4]).click(sigue());
    $('#r4').text(listaPreguntas[0][5]).click(sigue());
    
function sigue(){
    numeroPregunta = Math.floor(Math.random() * listaPreguntas.length);
    $('#enunciado').text(listaPreguntas[0][1]);
    $('#r1').text(listaPreguntas[0][2]).click(sigue());
    $('#r2').text(listaPreguntas[0][3]).click(sigue());
    $('#r3').text(listaPreguntas[0][4]).click(sigue());
    $('#r4').text(listaPreguntas[0][5]).click(sigue());
     }    
</script>

