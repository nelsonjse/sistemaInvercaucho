document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
    
});



const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {	
	
	usuario: /^[a-zA-Z0-9\_\-]{1,16}$/,    
	password: /^.{1,12}$/
}

const campos = {
    usuario: parent.document.getElementById('usuario').value,
    password: parent.document.getElementById('password').value,
    
}

function validarFormulario (e) {
    e.preventDefault();
    
    switch (e.target.name) {
        case "usuario":
            if(e.target.value.length == 0){
                
                mensaje.innerText='Completar los campos';     
                campos['usuario'] = false; 
            }
            else if(expresiones.usuario.test(e.target.value)){
                
                mensaje.innerText='';     
                campos['usuario'] = true;                
            }
        break;

        case "password":
            if(e.target.value.length == 0){
                
                mensaje.innerText='Completar los campos';    
                campos['password'] = false; 
            }else if(expresiones.password.test(e.target.value)){
                
                mensaje.innerText='';
                campos['password'] = true;                     
            }
        break;        
        
    }

    

    if(campos.usuario && campos.password ){
        this.submit();
          
        
    }else{
        
        return false;

        
    }
    
    
}





inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});
