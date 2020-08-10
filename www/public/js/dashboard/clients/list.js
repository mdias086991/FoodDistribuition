$(document).ready(function() {
    $('#example').DataTable( {
        language: {
            "sSearch": "Buscar: ",
            "lengthMenu": "Mostrar _MENU_ resultados por página",
            "zeroRecords": "Nenhum resultado encontrado",
            "info": "Página _PAGE_ de _PAGES_",
            "sZeroRecords": "Não foram encontrados resultados",
            "infoEmpty": "Nenhum resultado disponível",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "oPaginate" : {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            },
            "sPaginateType": "full_number"
        },
        "scrollY":        "270px",
        "scrollCollapse": true,
       
    } );
} );