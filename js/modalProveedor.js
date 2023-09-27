
// Obtener elementos del DOM
// var openModalBtn = document.getElementById('openModalGuardar');
// var closeModalBtn = document.getElementById('closeModalBtn');
// var modal = document.getElementById('registrar');

// // Mostrar el modal cuando se haga clic en el botón de abrir
// openModalBtn.addEventListener('click', function() {
//     modal.style.display = 'block';
// });

// // Ocultar el modal cuando se haga clic en el botón de cerrar o en el fondo oscuro
// closeModalBtn.addEventListener('click', function() {
//     modal.style.display = 'none';
// });

// window.addEventListener('click', function(event) {
//     if (event.target == modal) {
//         modal.style.display = 'none';
//     }
// });


$(document).ready(function () {

 $('.link-guardar').on('click', function (event) {
    $('#modalGuardar').modal('show');

 });

 $('.CerrarModal').on('click', function (event) {
    $('#modalGuardar').modal('hide');

 });
 

    $('.link-actualizar').on('click', function (event) {
        
        event.preventDefault(); 
        var proveedorId = $(this).data('proveedor-id'); 
        $('#proveedor_id').val(proveedorId); 
        $.ajax({
            url: '?pagina=proveedores/mostrar&id=' + proveedorId, 
            method: 'POST',
            data: { id: proveedorId },
            dataType: 'json',
            success: function (data) {
                
                $('#formularioActualizar #nombre2').val(data.nombre);
                $('#formularioActualizar #rif2').val(data.rif);
                $('#formularioActualizar #telefono2').val(data.telefono);
                $('#formularioActualizar #direccion2').val(data.direccion);
                
            },
            error: function () {
                alert('Error al obtener los datos del proveedor');
            }
        });

        
        $('#modal-actualizar').modal('show');
       
       
    });


    

    $('.CerrarModal2').on('click', function (event) {
        $('#modal-actualizar').modal('hide');
    
     });

    $('#formulario').submit(function (event) {
        event.preventDefault();         
        var formData = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'), 
            method: 'POST',
            data: formData, 
            success: function (response) {
               console.log('Respuesta del controlador:', response);
               window.location.href = '?pagina=proveedores';
               
            
            
            },
            error: function () {
                alert('Error al enviar los datos al controlador');
            }
        });
    });    

});




