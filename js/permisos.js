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