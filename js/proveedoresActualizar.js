
// document.addEventListener("DOMContentLoaded", function () {
//     document.getElementById("formularioActualizar").addEventListener('submit', validarFormulario2);
// });

// const formularioActualizar = document.getElementById('formularioActualizar');
// const inputsActualizar = document.querySelectorAll('#formularioActualizar input');

//     var nombre = parent.document.getElementById('nombre').value;    
//     var rif = parent.document.getElementById("rif").value;
//     var telefono = parent.document.getElementById("telefono").value;
//     var direccion = parent.document.getElementById("direccion").value; 


//     nombre = true; 
//     rif = true;
//     telefono = true;
//     direccion = true;    
   

// function validarFormulario2(e) {
    
       
    
//     const expresiones = {  
//         nombre:/^[A-Za-z0-9\s]+$/,
//         direccion:/^[A-Za-z0-9\s]+$/,
//         rif: /^[a-zA-Z0-9\_\-]{7,10}$/, 
//         telefono: /^\d{11,18}$/        
        
//     }
    
        
//     var mensaje = parent.document.getElementById("mensaje2");
    
//     e.preventDefault(); 
//     switch (e.target.name) {
//         case "nombre":
//             if(e.target.value.length == 0){
//                 document.getElementById('responseNombre2').innerHTML='Campo vacio'; 
//                 mensaje.innerText='Completar los campos correctamente';     
//                 nombre = false;             
//             }else if(e.target.value.length < 4){
//                 document.getElementById('responseNombre2').innerHTML='Nombre Muy Corto'; 
//                 mensaje.innerText='Completar los campos correctamente';     
//                 nombre = false;             
//             }else if(e.target.value.length > 40){
//                 document.getElementById('responseNombre2').innerHTML='Nombre Muy Largo'; 
//                 mensaje.innerText='Completar los campos correctamente';     
//                 nombre = false;             
//             }else if(expresiones.nombre.test(e.target.value)){
//                 document.getElementById('responseNombre2').innerHTML='';  
//                 mensaje.innerText='';                
//                 nombre = true;
//             }else {
//                 responseNombre.innerText='Nombre Invalido';
//                 mensaje.innerText='Completar los campos correctamente';
//                 nombre = false;
//             }
//         break;
       
//         case "rif":
//             if(e.target.value.length == 0){
//                 document.getElementById('responseRif2').innerHTML='Campo vacio';      
//                 rif = false;             
//             }else if(expresiones.rif.test(e.target.value)){
//                 document.getElementById('responseRif2').innerHTML=' ';   
//                 mensaje.innerText='';                
//                 rif = true; 

//             }else {
//                 document.getElementById('responseRif2').innerHTML=' Rif invalido ';
                
//                 rif = false;  
//             }
//         break;

//         case "telefono":
//             if(e.target.value.length == 0){
//                 document.getElementById('responseTelefono2').innerHTML='Campo vacio';      
//                 telefono  = false;            
//             }else if(expresiones.telefono.test(e.target.value)){
//                 document.getElementById('responseTelefono2').innerHTML=' '; 
//                 mensaje.innerText='';                
//                 telefono  = true; 

//             }else {
//                 document.getElementById('responseTelefono2').innerHTML=' Telefono debe tener de 11 a 18 Digitos';
                
//                 telefono  = false; 
//             }
//         break;

//         case "direccion":
//             if(e.target.value.length == 0){
//                 document.getElementById('responseDireccion2').innerHTML='Campo vacio';      
//                 direccion  = false;             
//             }else if(e.target.value.length < 5){
//                 document.getElementById('responseDireccion2').innerHTML='La Direccion debe tener mas de 6 digitos';                
//                 direccion = false;
//             }else if(e.target.value.length){
//                 responseDireccion.innerText=' ';
//                 mensaje.innerText=' '; 
//                 direccion = true;
//             }
//         break;
        

//     }

    
        
    
    
//     if (nombre && rif && telefono && direccion){
//         document.getElementById("formularioActualizar").submit();
       
//     }else {
//         mensaje.innerText='Completar los campos correctamente';
//         e.preventDefault();
//         return false;
        
//     }


// }
// inputs.forEach((input) => {
//     input.addEventListener('keyup', validarFormulario2);
//     input.addEventListener('blur', validarFormulario2);
// });



const formularioActualizar = document.getElementById('formularioActualizar');
const inputsActualizar = document.querySelectorAll('#formularioActualizar input');

if (formularioActualizar) {
    formularioActualizar.addEventListener('submit', validarFormulario2);
}


function validarFormulario2(e) {
    const expresiones = {
        nombre: /^[A-Za-z0-9\s]+$/,
        direccion: /^[A-Za-z0-9\s]+$/,
        rif: /^[a-zA-Z0-9\_\-]{7,10}$/,
        telefono: /^\d{11,18}$/
    }

    var mensaje = parent.document.getElementById("mensaje2");

    e.preventDefault();

    // Accede a los campos de formulario por su id
    var nombreInput = document.getElementById('nombre2');
    var rifInput = document.getElementById('rif2');
    var telefonoInput = document.getElementById('telefono2');
    var direccionInput = document.getElementById('direccion2');

    // Inicializa las variables dentro de la función
    var nombre = false;
    var rif = false;
    var telefono = false;
    var direccion = false;

    // Actualiza el mensaje y el estado de la validación en todos los casos
    if (nombreInput.value.length == 0) {
        document.getElementById('responseNombre2').innerHTML = 'Campo vacío';
        nombre = false;
    } else if (nombreInput.value.length < 4 || nombreInput.value.length > 40 || !expresiones.nombre.test(nombreInput.value)) {
        document.getElementById('responseNombre2').innerHTML = 'Nombre Inválido';
        mensaje.innerText = '';
        nombre = false;
    } else {
        document.getElementById('responseNombre2').innerHTML = '';
        nombre = true;
    }

    if (rifInput.value.length == 0) {
        document.getElementById('responseRif2').innerHTML = 'Campo vacío';
        rif = false;
    } else if (!expresiones.rif.test(rifInput.value)) {
        document.getElementById('responseRif2').innerHTML = 'Rif Inválido';
        rif = false;
    } else {
        document.getElementById('responseRif2').innerHTML = '';
        mensaje.innerText = '';
        rif = true;
    }

    if (telefonoInput.value.length == 0) {
        document.getElementById('responseTelefono2').innerHTML = 'Campo vacío';
        telefono = false;
    } else if (!expresiones.telefono.test(telefonoInput.value)) {
        document.getElementById('responseTelefono2').innerHTML = 'Teléfono debe tener de 11 a 18 Dígitos';
        telefono = false;
    } else {
        document.getElementById('responseTelefono2').innerHTML = '';
        mensaje.innerText = '';
        telefono = true;
    }

    if (direccionInput.value.length == 0) {
        document.getElementById('responseDireccion2').innerHTML = 'Campo vacío';
        direccion = false;
    } else if (direccionInput.value.length < 5) {
        document.getElementById('responseDireccion2').innerHTML = 'La Dirección debe tener más de 6 dígitos';
        direccion = false;
    } else {
        document.getElementById('responseDireccion2').innerHTML = '';
        mensaje.innerText = '';
        direccion = true;
    }

    // Verifica si todos los campos son válidos
    if (nombre && rif && telefono && direccion) {
        this.submit();
    } else {
        mensaje.innerText = 'Completar los campos correctamente';
        
        return false;
    }
}

inputsActualizar.forEach((input) => {
    input.addEventListener('keyup', validarFormulario2);
    input.addEventListener('blur', validarFormulario2);
});
