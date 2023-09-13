document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
    
});



const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {	
	
	cantidad: /^\d{1,5}$/,
    
	precio_unitario: /^[0-9]+([.][0-9]+)?$/ 
}

const campos = {
    cantidad: true,
    precio_unitario: true,
    
}

function validarFormulario (e) {
    e.preventDefault();
    
    switch (e.target.name) {
        case "cantidad":
            if(expresiones.cantidad.test(e.target.value)){
                document.getElementById('responseCantidad').innerHTML='';      
                campos['cantidad'] = true;                
            }else{
                document.getElementById('responseCantidad').innerHTML='Cantidad invalida'; 
                
                campos['cantidad'] = false; 
            }
        break;

        case "precio_unitario":
            if(expresiones.precio_unitario.test(e.target.value)){
                document.getElementById('responsePrecio').innerHTML='';  
                campos['precio_unitario'] = true;                     
            }else if(!(expresiones.precio_unitario.test(e.target.value))){
                document.getElementById('responsePrecio').innerHTML='Precio unitario Invalido'; 
                 
                campos['precio_unitario'] = false; 
            }
        break;
        
        
        
    }

    

    if(campos.cantidad && campos.precio_unitario ){
        this.submit();
          
        
    }else{              
        
        return false;
        
    }
    
}



inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});
