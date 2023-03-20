/**
 * 
 * Librería utilizada: SweetAlert2
 * 
 */

const url = window.location.pathname; // pathname = me devuelve la ruta sin dominio.
$nombreSeccion = url.split('/'); // Split equivale a explode() de php.
// console.log($arr[4]);
Swal.fire({
    icon: 'success',
    title: 'Registro modificado con éxito',
    // text: 'Something went wrong!',
    showConfirmButton: false,
}, setTimeout(() => {
    // Nos redirije luego de borrar a la página de usuarios
    window.location.href = "http://localhost/simple-pagina-web-autoadministrable/admin/secciones/" + $nombreSeccion[4];
}, 1500));
