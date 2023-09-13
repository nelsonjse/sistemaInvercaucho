document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
    
});



const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');



    var cantidad = parent.document.getElementsByName("cantidad").value;    
    var precio_unitario = parent.document.getElementsByName("precio_unitario").value;

function validarFormulario (e) {
    e.preventDefault();
    
    const expresiones = {		
        cantidad: /^\d{1,5}$/,    
        precio_unitario: /^[0-9]+([.][0-9]+)?$/ 
    }

    switch (e.target.name) {
        case "cantidad":
            if(e.target.value.length == 0){
                document.getElementById('responseCantidad').innerHTML='Campo vacio';      
                cantidad = false;   
            }else if(expresiones.cantidad.test(e.target.value)){
                document.getElementById('responseCantidad').innerHTML='';    
                mensaje.innerText='';   
                cantidad = true;                
            }else{
                document.getElementById('responseCantidad').innerHTML='Cantidad invalida';           
                cantidad = false; 
            }
        break;

        case "precio_unitario":
            if(e.target.value.length == 0){
                document.getElementById('responsePrecio').innerHTML='Campo vacio';      
                cantidad = false;   
            }else if(expresiones.precio_unitario.test(e.target.value)){
                document.getElementById('responsePrecio').innerHTML=''; 
                mensaje.innerText=''; 
               precio_unitario = true;                     
            }else{
                document.getElementById('responsePrecio').innerHTML='Precio unitario Invalido'; 
                 
                precio_unitario = false; 
            }
        break;
        
        
        
    }

    

    if(cantidad && precio_unitario ){
        this.submit();
          
        
    }else{     
        mensaje.innerText='Completar los campos correctamente';         
        
        return false;
        
    }
    
}



inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});
