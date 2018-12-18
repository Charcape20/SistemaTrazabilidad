<div class="part-top">
        <div class="mensajes  col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <ul>
                <li style="background: #333">
                    <a href="solicitudes" style="color: #fff">
                        <i class=" mt-5 fa fa-envelope"></i>
                    </a>;
                </li>
            </ul> 
        </div>
        <div class="text-center time">
            <br>
            <p>
            <?php
                // Formato date('w') devuelve la posicion del dia de la semana: domingo = 0 y sabado = 6
                // y el formado 'd' devuelve el numero del dia actual
                $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                // Formato date('n') devuelve la posicion del numero de mes, desde el 1 hasta el 12
                //y el formato 'Y' devuelve el año actual en 4 digitos
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");  
                echo $dias[date('w')].", ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
                ?>
            </p>
            <p id="reloj" onload="Comenzar('reloj');">
                    <?php 
                        $hora = new DateTime("now", new DateTimeZone('America/Lima'));
                        echo $hora->format('H:i:s');
                    ?>
            </p>
      
        </div>
        <div class="img-user">
            <img src="views/images/photo.jpg" alt="">
            <p id="member"><?php echo $_SESSION["usuario"]?><span id="agregar" class="fa fa-chevron-down" onclick="mostrar_ocultar('admin')"></span>
                <br>
                <ol id="admin" style="display:none" >
                    <li><a href=""><i class="fa fa-user"></i> Editar Perfil</a></li>
                    <!-- <li><a href=""><i class="fas fa-file-alt"></i> Términos y Condiciones</a></li> -->
                    <li><a href="salir"><i class="fa fa-times"></i> Salir</a></li>
                </ol>
            </p>
        </div>
    </div>
<script>
    function Comenzar(relo){
        var reloj=new Date();
        var horas=reloj.getHours();
        var minutos=reloj.getMinutes();
        var segundos=reloj.getSeconds();
        // Agrega un cero si .. minutos o segundos <10
        minutos=revisarTiempo(minutos);
        segundos=revisarTiempo(segundos);
        document.getElementById(relo).innerHTML=horas+":"+minutos+":"+segundos;
        tiempo=setTimeout(function(){Comenzar()},1000); 
        /*en tiempo creamos una funcion generica que cada 
        500 milisegundos ejecuta la funcion Comenzar()*/
    }

    function revisarTiempo(i){
        if (i<10)
        {
            i="0" + i;
        }
        return i;
        /*Esta funcion le agrega un 0 
        a una variable i que sea menor a 10*/
    }
</script>