document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
});

function validarFormulario(evento) {
    evento.preventDefault(); 

    const expresiones = {      
        nombre:/^[a-zA-Z\_\-]{3,30}$/     
        
    }

    var nombre = parent.document.getElementById('nombre').value;
    var responseNombre = parent.document.getElementById("responseNombre");
    var mensaje = parent.document.getElementById("mensaje");

    if (nombre.length == 0){
        responseNombre.innerText="Campo vacio"; 
        mensaje.innerText='Campo vacio'; 
        nombre = false;
         
    }else if(nombre.length < 3){ 
        responseNombre.innerText='Nombre Muy Corto';
        mensaje.innerText='Campo invalido'; 
        nombre = false;
         
    }else if(nombre.length > 10){ 
        responseNombre.innerText='Nombre Muy Largo, Tiene que tener menos de 10 digitos';
        mensaje.innerText='Campo invalido'; 
        nombre = false;
         
    }else if (/^[A-Za-z0-9\s]+$/.test(nombre)) { 
        responseNombre.innerText=""; 
        mensaje.innerText=''; 
        nombre = true;
        this.submit();
        
    }
    else if(!(/^[A-Za-z0-9\s]+$/.test(nombre))){ 
        responseNombre.innerText='Nombre no valido';
        mensaje.innerText='Campo invalido'; 
        nombre = false;
         
    }
    
    
}

