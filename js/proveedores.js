



const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

if (formulario) {
    formulario.addEventListener('submit', validarFormulario);
}

    var nombre = parent.document.getElementById('nombre').value;    
    var rif = parent.document.getElementById("rif").value;
    var telefono = parent.document.getElementById("telefono").value;
    var direccion = parent.document.getElementById("direccion").value; 
    

function validarFormulario(e) {
          
    
    const expresiones = {      
        nombre:/^[A-Za-z0-9\s]+$/,
        direccion:/^[A-Za-z0-9\s]+$/,
        rif: /^[a-zA-Z0-9\_\-]{7,10}$/, 
        telefono: /^\d{11,18}$/      
        
    }
    
        
    var mensaje = parent.document.getElementById("mensaje");
    
    e.preventDefault(); 
    switch (e.target.name) {
        case "nombre":
            if(e.target.value.length == 0){
                document.getElementById('responseNombre').innerHTML='Campo vacio'; 
                mensaje.innerText='Campo Vacio';     
                nombre = false;             
            }else if(e.target.value.length < 4){
                document.getElementById('responseNombre').innerHTML='Nombre Muy Corto'; 
                mensaje.innerText='Completar los campos correctamente';     
                nombre = false;             
            }else if(e.target.value.length > 40){
                document.getElementById('responseNombre').innerHTML='Nombre Muy Largo'; 
                mensaje.innerText='Completar los campos correctamente';     
                nombre = false;             
            }else if(expresiones.nombre.test(e.target.value)){
                document.getElementById('responseNombre').innerHTML='';  
                mensaje.innerText='';                
                nombre = true;
            }else {
                responseNombre.innerText='Nombre Invalido';
                mensaje.innerText='Completar los campos correctamente';
                nombre = false;
            }
        break;
       
        case "rif":
            if(e.target.value.length == 0){
                document.getElementById('responseRif').innerHTML='Campo vacio'; 
                mensaje.innerText='Completar los campos correctamente';     
                rif = false;             
            }
            else if(expresiones.rif.test(e.target.value)){
                document.getElementById('responseRif').innerHTML=' ';   
                mensaje.innerText='';                
                rif = true; 

            }else {
                document.getElementById('responseRif').innerHTML=' Rif invalido ';
                mensaje.innerText='Completar los campos correctamente';
                rif = false;  
            }
        break;

        case "telefono":
            if(e.target.value.length == 0){
                document.getElementById('responseTelefono').innerHTML='Campo vacio'; 
                mensaje.innerText='Completar los campos correctamente';     
                telefono  = false;            
            }else if(expresiones.telefono.test(e.target.value)){
                document.getElementById('responseTelefono').innerHTML=' '; 
                mensaje.innerText='';                
                telefono = true; 

            }else {
                document.getElementById('responseTelefono').innerHTML=' Telefono debe tener de 11 a 18 Digitos';
                mensaje.innerText='Completar los campos correctamente';
                telefono = false; 
            }
        break;

        case "direccion":
            if(e.target.value.length == 0){
                document.getElementById('responseDireccion').innerHTML='Campo vacio';    
                mensaje.innerText='Completar los campos correctamente';  
                direccion = false;             
            }else if(e.target.value.length < 5){
                document.getElementById('responseDireccion').innerHTML='La Direccion debe tener mas de 6 digitos';                
                mensaje.innerText='Completar los campos correctamente';
                direccion = false;
            }else if(expresiones.direccion.test(e.target.value)){
                document.getElementById('responseDireccion').innerHTML='';  
                mensaje.innerText='';                
                direccion = true;
            }else {
                responseDireccion.innerText='Direccion Invalida!';
                mensaje.innerText='Completar los campos correctamente';
                direccion = false;
            }
        break;
        

    }

    
        
    
    
    if (nombre && rif && telefono && direccion){
    
    this.submit();
    }else {
        
        return false;
        
    }


}
inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});


