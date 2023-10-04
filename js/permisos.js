function registrarPermisos(e){
    e.preventDefault();
    const url = "?pagina=usuarios/registrarPermisos";
    const frm = document.getElementById("formulario");
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText);
            if(res != ''){
                Swal.fire({    
                    icon: 'info',
                    title: 'Permisos Asignados',
                    showConfirmButton: false,            
                    timer: 1500  
                  });  
            }else{
                alert("Error no identificado", 'error');
            }
            
        }
    }
    

}

// function registrarPermisos(e) {
//     e.preventDefault();
//     const url = "?pagina=usuarios/registrarPermisos";
//     const frm = document.getElementById("formulario");
//     const http = new XMLHttpRequest();
//     http.open("POST", url, true);
//     http.send(new FormData(frm));
//     http.onreadystatechange = function () {
//         if (this.readyState == 4) {
//             if (this.status == 200) {
//                 try {
//                     const res = JSON.parse(this.responseText);
//                     if (res != '') {
//                         Swal.fire({
//                             icon: 'info',
//                             title: 'Permisos Asignados',
//                             showConfirmButton: false,
//                             timer: 1500
//                         });
//                     } else {
//                         // Mostrar un mensaje de error si la respuesta está vacía
//                         Swal.fire({
//                             icon: 'error',
//                             title: 'Error',
//                             text: 'Error no identificado en la respuesta del servidor'
//                         });
//                     }
//                 } catch (error) {
//                     // Mostrar un mensaje de error si la respuesta no es JSON válido
//                     Swal.fire({
//                         icon: 'info',
//                         title: 'Permisos Eliminados',
//                         showConfirmButton: false,
//                         timer: 1500
//                     });
//                 }
//             } else {
//                 // Mostrar un mensaje de error si la solicitud al servidor no fue exitosa
//                 Swal.fire({
//                     icon: 'error',
//                     title: 'Error',
//                     text: 'Error en la solicitud al servidor (status code ' + this.status + ')'
//                 });
//             }
//         }
//     }
// }


