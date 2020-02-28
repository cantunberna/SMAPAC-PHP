$(document).ready(function() {
    $('#example2').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
                text: 'Generar Excel',
                title: '',
                filename: 'MIR - Actividades',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24 ]
                },
                sheetName: 'MIR',
                autoFilter: 'true',
                // messageTop: 'Carmen, Campeche',
                customize: function( xlsx ) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c[r*="1"]', sheet).attr( 's', '17' );
                    // $('c[r=A2] t', sheet).text( 'Custom text' ).attr('s', '17');
                }
        }],
    	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
	            "first":    "Primero",
	            "last":    "Último",
	            "next":    "Siguiente",
	            "previous": "Anterior"
	        },
        }
    });
} );