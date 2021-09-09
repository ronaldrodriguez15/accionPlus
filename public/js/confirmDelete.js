$(function(){

    $('#formDelete').submit(function(e){
        
        // evita que el form se envie
        e.preventDefault();

        // mensaje de confirmación
        Swal.fire({
            title: 'Eliminar favorito',
            text: "¿Estas seguro de eliminar este registro de tus favoritos?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
                // si el valor es true envia los datos al controlador
                this.submit();
            }
            });
    });
});