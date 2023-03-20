/**
 * 
 * Librería utilizada: SweetAlert2
 * 
 */

Swal.fire({
    title: "Registro agregado con éxito",
    text: "¿Desea agregar otro registro?",
    icon: "success",
    // showCancelButton: true,
    showDenyButton: true,
    confirmButtonColor: "#0d6efd",
    denyButtonColor: "#6c757d",
    confirmButtonText: "Si",
    denyButtonText: `No`,
    closeOnConfirm: false,
    allowOutsideClick: false // Al hacer click fuera del modal, éste no se cierra.
}).then((result) => {
    if (result.isDenied) {
        setTimeout(() => {
        const url = window.location.pathname; // pathname = me devuelve la ruta sin dominio.
        $nombreSeccion = url.split('/'); // Split equivale a explode() de php.
        window.location.href = "http://localhost/simple-pagina-web-autoadministrable/admin/secciones/" + $nombreSeccion[4];
        }, 200);
    }
});