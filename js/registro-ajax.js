//guardar un registro
$(document).ready(function() {
    $('#guardar-registro').on('submit', function(e) {
        e.preventDefault();

        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    Swal.fire({
                        title: 'Correcto',
                        text: 'Registrado exitosamente!',
                        icon: 'success',
                        confirmButtonText: '<a>ok</a>',
                        confirmButtonTextColor: '#3085d6',
                        showConfirmButton: false,
                        footer: '<a href="lista_emp_admin.php">Ok, Regresar</a>'
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Revisa que los campos sean correctos!',
                    })
                }
            }
        })
    });
});

//Eliminar un registro
$('.borrar_registro').on('click', function(e) {
    e.preventDefault();

    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');

    Swal.fire({
        title: 'Estas seguro?',
        text: "Los cambios no podran ser revertidos!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'post',
                data: {
                    'id': id,
                    'registrar': 'eliminar'
                },
                url: 'ediciones_' + tipo + '.php',
                success: function(data) {
                    var resultado = JSON.parse(data);
                    jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
                }
            })
            Swal.fire(
                'Eliminado!',
                'Operacion realizada correctamente',
                'success'
            )
        }
    })


});