function mostrar_ocultar(id){
    if(document.getElementById){
        var el=document.getElementById(id);
        el.style.display=(el.style.display=='none') ? 
        'block':'none';

        el.style.display=(el.style.display=='none') ? 
        document.getElementById('agregar').className='fa fa-chevron-down':document.getElementById('agregar').className='fa fa-chevron-up';
        // document.getElementById('admin').style.display='block';
        // document.getElementById('agregar').className='fa fa-chevron-up';
    }
}

function mostrar_ocultar_menu_reportes(id1){
    if(document.getElementById){
        var el1=document.getElementById(id1);
        el1.style.display=(el1.style.display=='none') ? 
        'block':'none';

        el1.style.display=(el1.style.display=='none') ? 
        document.getElementById('bajar').className='fa fa-chevron-down':document.getElementById('bajar').className='fa fa-chevron-up';
    }
}
/*=============================================
    RELOJ DINÁMICO        
=============================================*/

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
