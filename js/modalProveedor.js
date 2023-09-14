
// Obtener elementos del DOM
var openModalBtn = document.getElementById('openModalGuardar');
var closeModalBtn = document.getElementById('closeModalBtn');
var modal = document.getElementById('registrar');

// Mostrar el modal cuando se haga clic en el botón de abrir
openModalBtn.addEventListener('click', function() {
    modal.style.display = 'block';
});

// Ocultar el modal cuando se haga clic en el botón de cerrar o en el fondo oscuro
closeModalBtn.addEventListener('click', function() {
    modal.style.display = 'none';
});

window.addEventListener('click', function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});


$(document).ready(function () {
    $('.link-actualizar').on('click', function (event) {
        
        event.preventDefault(); // Evita que el enlace redirija
        var proveedorId = $(this).data('proveedor-id'); // Obtiene el ID del proveedor desde el enlace
        $('#proveedor_id').val(proveedorId); // Establece el valor del campo oculto con el ID del proveedor
        console.log('ID del proveedor:', proveedorId);
        // Realiza una solicitud AJAX para obtener los datos del proveedor
        $.ajax({
            url: '?pagina=proveedores/mostrar&id=' + proveedorId, // Corrige la URL aquí
            method: 'POST',
            data: { id: proveedorId },
            dataType: 'json',
            success: function (data) {
                
                $('#formulario #nombre').val(data.nombre);
                $('#formulario #rif').val(data.rif);
                $('#formulario #telefono').val(data.telefono);
                $('#formulario #direccion').val(data.direccion);
                
            },
            error: function () {
                alert('Error al obtener los datos del proveedor');
            }
        });

        // Abre el modal de actualización
        $('#modal-actualizar').modal('show');
        // $('#closeModalBtn2').on('click', function () {
        //     $('#modal-actualizar').modal('hide');
            
            
        // });
       
    });

    $('#formulario').submit(function (event) {
        event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

        // Obtener los datos del formulario
        var formData = $(this).serialize();

        // Realizar la solicitud AJAX para enviar los datos al controlador
        $.ajax({
            url: $(this).attr('action'), // Obtener la URL del formulario
            method: 'POST',
            data: formData, // Los datos del formulario serializados
            success: function (response) {
                // Manejar la respuesta del controlador (puede ser una confirmación o un mensaje de éxito)
                console.log('Respuesta del controlador:', response);
                
                // Cerrar el modal u hacer cualquier otra acción necesaria
                $('#mensaje').text('Actualización exitosa');
            },
            error: function () {
                alert('Error al enviar los datos al controlador');
            }
        });
    });

});




