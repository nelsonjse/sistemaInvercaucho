document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("formulario").addEventListener('submit', validarFormulario);
});

const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

    
    var responseNombre = parent.document.getElementById("responseNombre");
    var descripcion = parent.document.getElementById('descripcion').value;
    var responseDescripcion = parent.document.getElementById("responseDescripcion"); 

function validarFormulario(e) { 
    e.preventDefault();

    const expresiones = {      
        descripcion:/^[a-zA-Z\_\-]{3,30}$/     
        
    }
    
    var mensaje = parent.document.getElementById("mensaje");
    
    switch (e.target.name) {
        
       
        case "descripcion":
            if(e.target.value.length == 0){
                document.getElementById('responseDescripcion').innerHTML='Campo vacio';      
                mensaje.innerText='Completar los campos correctamente';
                descripcion = false;             
            }else if(e.target.value.length < 4){
                document.getElementById('responseDescripcion').innerHTML='La Descripcion debe tener mas de 4 digitos';                 
                mensaje.innerText='Completar los campos correctamente';
                descripcion = false;
            }else if(e.target.value.length > 40){
                document.getElementById('responseDescripcion').innerHTML='La Descripcion debe tener menos de 30 digitos';                 
                mensaje.innerText='Completar los campos correctamente';
                descripcion = false;
            } else if(e.target.value.length){
                responseDescripcion.innerText=' ';
                mensaje.innerText=' '; 
                descripcion = true;
            }
        break;

        
        

    }

    
        
    
    
    if (descripcion ){
    
    this.submit();
    }else {
        
        return false;
        
    }


}
inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});