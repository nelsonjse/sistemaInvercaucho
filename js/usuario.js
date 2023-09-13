document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
    
});



const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	// usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos.
    apellido: /^[a-zA-ZÀ-ÿ\s]{4,40}$/, // Letras y espacios, pueden llevar acentos.
	clave: /^.{6,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    // cedula: /^[a-zA-ZÀ-ÿ\s]{7,9}$/,
	cedula: /^\d{7,10}$/ // 7 a 14 numeros.
}

const campos = {
    nombre: true,
    apellido: true,
    clave: true,
    correo: true,
    cedula: true
}

function validarFormulario (e) {
    e.preventDefault();



    switch (e.target.name) {
        case "nombre":
            if(expresiones.nombre.test(e.target.value)){
                document.getElementById('responseNombre').innerHTML='';      
                campos['nombre'] = true;                
            }else{
                document.getElementById('responseNombre').innerHTML='El nombre debe tener mas de 4 digitos'; 
                
                campos['nombre'] = false; 
            }
        break;

        case "apellido":
            
            if(expresiones.apellido.test(e.target.value)){
                document.getElementById('responseApellido').innerHTML='';  
                campos['apellido'] = true;                     
            }else{
                document.getElementById('responseApellido').innerHTML='El apellido debe tener mas de 4 digitos'; 
                 
                campos['apellido'] = false; 
            }
        break;
        
        case "clave":
            if(expresiones.clave.test(e.target.value)){
                document.getElementById('responseClave').innerHTML=''; 
                campos['clave'] = true;                       
            }else{
                document.getElementById('responseClave').innerHTML='La clave debe tener de 6 a 12 digitos'; 
                
                campos['clave'] = false; 
            }
            
        break;
        case "correo":
            if(expresiones.correo.test(e.target.value)){
                document.getElementById('responseCorreo').innerHTML='';
                campos['correo'] = true;                        
            }else{
                document.getElementById('responseCorreo').innerHTML='Correo invalido'; 
                campos['correo'] = false; 
                
            }
            
        break;
        case "cedula":
            if(expresiones.cedula.test(e.target.value)){
                document.getElementById('responseCedula').innerHTML='';  
                campos['cedula'] = true;                      
            }else{
                document.getElementById('responseCedula').innerHTML='La cedula debe tener mas de 7 digitos';
                
                campos['cedula'] = false; 
            }
            
        break;
        
    }


   
    if(campos.nombre && campos.apellido && campos.clave && campos.correo && campos.cedula){
        this.submit();
        
        
        
    }else{        

        document.getElementById('mensaje').innerHTML='Campos incorrectos!';
        setTimeout(()=>{
            document.getElementById('mensaje').innerHTML='';
        },1000)
        return false;
        
    }


}



inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});




