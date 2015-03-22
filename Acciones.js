

//ACA IRAN TODOS LOS PROCESOS Y ALGORITMOS EN EL CUAL LOGRARA EJECUTAR EL EDITAR 
function Edit(id)
{
    
    //NOTA : ESTO ES EL EJEMPLO DE AJAX , NO QUIERA DECIR QUE ES TODO EL CODIGO QUE USARA
    
    var params = {
          "id" : id
    };

    $.ajax({
      type: "POST",
      url: "Envio.php",
      data: params,
      success: function(value){
             
     }});
}

//ACA IRA TODO LOS PROCESOS PARA LOGRAR EJECUTAR EL ELIMINAR
function Delete(id){
    //PUEDE USAR EL MISMO AJAX PARA ENVIAR LA PETICION
}

