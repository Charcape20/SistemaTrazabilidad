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


