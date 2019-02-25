//Funcion que valida si el campo rut  o contrasena estan vacio, si lo estan, mostrara un mensaje animado en pantalla.
$("#envialogin").click(function(e){
	if ($( "#inputRut" ).val()=='') {
        e.preventDefault();
      $("#animacion").toggleClass("d-none");
     
    }
    if ($( "#inputPassword" ).val()=='') {
        e.preventDefault();
        $("#animacion").toggleClass("d-none");
        
      }
}) 
    
$("#inputRut").click(function(e){
        e.preventDefault();
        if(!$("#animacion").hasClass("d-none")){
        
          $("#animacion").addClass("d-none");
        }
})

$("#inputPassword").click(function(e){
        e.preventDefault();
        if(!$("#animacion").hasClass("d-none")){
        
          $("#animacion").addClass("d-none");
        }
})