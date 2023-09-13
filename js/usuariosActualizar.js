document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
});

const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');


      
    var nombre = parent.document.getElementsByName("nombre").value;    
    var apellido = parent.document.getElementsByName("apellido").value;
    var correo = parent.document.getElementsByName("correo").value;
    var cedula = parent.document.getElementsByName("cedula").value;
    var clave = parent.document.getElementsByName("clave").value;

    nombre = true;
    apellido = true;
    correo = true;
    cedula = true;
    clave = true;


function validarFormulario(e) {   
   
    
    
    const expresiones = {
        nombre:/^[a-zA-Z\_\-]{3,30}$/,
        apellido:/^[a-zA-Z\_\-]{3,30}$/,
        clave: /^.{6,12}$/, 
        correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,        
        cedula: /^\d{7,10}$/ 
    }
    
   
    

    
    
    var mensaje = parent.document.getElementById("mensaje");
    e.preventDefault(); 
    switch (e.target.name) {
        case "nombre":
            
            if(e.target.value.length == 0){
                document.getElementById('responseNombre').innerHTML='Campo vacio';
                mensaje.innerText='Campo vacio';     
                nombre = false;             
            }else if(expresiones.nombre.test(e.target.value)){
                document.getElementById('responseNombre').innerHTML=''; 
                mensaje.innerText=''; 
                 
                nombre = true; 
            }else {
                document.getElementById('responseNombre').innerHTML='Nombre Invalido'; 
                mensaje.innerText='Campo invalido'; 
                 
                nombre = false; 
            } 
        break;

        case "apellido":
            if(e.target.value.length == 0){
                document.getElementById('responseApellido').innerHTML='Campo vacio';
                mensaje.innerText='Campo vacio';     
                apellido = false;             
            }else if(expresiones.apellido.test(e.target.value)){
                document.getElementById('responseApellido').innerHTML=''; 
                mensaje.innerText=''; 
                 
                apellido = true; 
            }else {
                document.getElementById('responseApellido').innerHTML='Apellido Invalido'; 
                mensaje.innerText='Campo invalido'; 
                 
                apellido = false; 
            } 
        break;

        case "correo":
            if(e.target.value.length == 0){
                document.getElementById('responseCorreo').innerHTML='Campo vacio';      
                correo = false;             
            }else if(expresiones.correo.test(e.target.value)){
                document.getElementById('responseCorreo').innerHTML=' ';   
                mensaje.innerText='';                
                correo = true; 

            }else {
                document.getElementById('responseCorreo').innerHTML=' Correo invalido ';
                mensaje.innerText='Campo invalido'; 
                correo = false;  
            }
        break;

        case "cedula":
            if(e.target.value.length == 0){
                document.getElementById('responseCedula').innerHTML='Campo vacio';      
                cedula = false;             
            }else if(expresiones.cedula.test(e.target.value)){
                document.getElementById('responseCedula').innerHTML=' '; 
                mensaje.innerText='';                  
                cedula = true;  

            }else {
                document.getElementById('responseCedula').innerHTML=' Cedula debe tener de 7 a 10 Numeros';
                mensaje.innerText='Campo invalido '; 
                cedula = false;   
            }
        break;

        case "clave":
            if(e.target.value.length == 0){
                document.getElementById('responseClave').innerHTML='Campo vacio';      
                clave  = false;            
            }else if(expresiones.clave.test(e.target.value)){
                document.getElementById('responseClave').innerHTML=' '; 
                mensaje.innerText='';                
                clave = true; 

            }else {
                document.getElementById('responseClave').innerHTML=' Clave debe tener de 6 a 12 Digitos';
                mensaje.innerText='Campo invalido '; 
                clave = false; 
            }
        break;

    }

    
        
    if(nombre && apellido && correo && clave && cedula){       
        
        this.submit();

    }else{        
            
            return false;
            
        }
    }


inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});