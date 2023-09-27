
// var modal = document.getElementById('modal-actualizar');

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
        var rolId = $(this).data('rol-id'); 
        $('#rol_id').val(rolId); 
        
        $.ajax({
            url: '?pagina=roles/mostrar&id=' + rolId, 
            method: 'POST',
            data: { id: rolId }, 
            dataType: 'json',
            success: function (data) {
                
                $('#formulario #descripcion').val(data.descripcion);
                
                
            },
            error: function () {
                alert('Error al obtener los datos');
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
                $('#modal-actualizar').modal('hide');
                window.location.href = '?pagina=roles';
            },
            error: function () {
                alert('Error al enviar los datos al controlador');
            }
        });
    });    

});




