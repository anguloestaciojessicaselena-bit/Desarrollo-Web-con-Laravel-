import $ from 'jquery';

// Configuración global por defecto para DataTables
// Aplica responsive, paginación y traducción al español
$.extend(true, $.fn.dataTable.defaults, {
  responsive: true,
  pageLength: 10,
  columnDefs: [ { orderable: false, targets: -1 } ],
  language: {
    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
  }
});

// Puedes añadir aquí inicializaciones concretas si hace falta en el futuro
