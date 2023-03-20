/**
 * 
 * Librería utilizada: Datatable
 * 
 */

// Convierte todas las <table> en datatable.
let table = new DataTable('table', {
    pageLength: 5, // Cant de registros que me muestra en tabla.
    lengthMenu: [
        [5,10,25,50],
        [5,10,25,50]
    ],
    language: {
        // Sacado de -> https://datatables.net/plug-ins/i18n/
        url: 'https:////cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json'
    }
});
