
<?php
//aqui no hace falta iniciar la sesion porque este codigo se carga con require
?>
<div id ="menu" style="color:white;">
    <p</p>
    <p><a  class="btn btn-block btn-dark" onclick="muestraModalPrueba()">BIENVENIDOS A LA APLICACION TRIVIAL DE LA EVAU</a></p>         
    <p><a class="btn btn-block btn-dark disabled"><?php echo $_SESSION['nombreUsuario'] ?></a></p>
    <p><a id="sigue1" class="btn btn-block btn-primary" onclick="sigue('1')">HISTORIA</a></p>
    <p><a id="sigue2" class="btn btn-block btn-primary" onclick="sigue('2')">ECONOMIA</a></p>
    <p><a id="sigue3" class="btn btn-block btn-primary" onclick="sigue('3')">FILOSOFIA</a></p>
    <p><a id="sigue4" class="btn btn-block btn-primary" onclick="sigue('4')">LENGUA Y LITERATURA</a></p>
    <p><a id="sigue5" class="btn btn-block btn-primary" onclick="sigue('5')">INGLES</a></p>
</div>

<script>    
    var _vidas = 3;
    function sigue(_tema) {
        switch (_tema) {
            //cargo el archivo de preguntas
            case '1':
                $("#menu").load("juego.php", {vidas: 3, correctas: 0, tema: "Historia"});
                break;
            case '2':
                $("#menu").load("juego.php", {vidas: 3, correctas: 0, tema: "Economia"});
                break;
            case '3':
                $("#menu").load("juego.php", {vidas: 3, correctas: 0, tema: "Filosofia"});
                break;
            case '4':
                $("#menu").load("juego.php", {vidas: 3, correctas: 0, tema: "Lengua"});
                break;
            case '5':
                $("#menu").load("juego.php", {vidas: 3, correctas: 0, tema: "Ingles"});
                break;


        }
    }

    function muestraModalPrueba() {
        $('#modalPrueba').modal('show');
    }

</script>   

<div id="modalPrueba" class="modal" tabindex="-1" role="dialog" style="color:darkgray">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal de prueba</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Texto random</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

