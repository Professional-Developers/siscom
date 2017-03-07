$(function(){
    //paginaDataTableTramInt2();
    var dataTable = {
        tabla   : "qry_persona",
        filas   : 50,
        JQueryUI : true
    };
    paginaDataTable(dataTable);
})
/*function paginaDataTableTramInt2(){
    //$("#"+dataTable).dataTable();
    $('#BandejaPersona').dataTable( {
        "aLengthMenu": [[15,30, 50], [15,30, 50]],
        "sPaginationType": "full_numbers",
        "oLanguage"             :     {
            "sEmptyTable"       :     "Tabla sin data disponible",
            "sInfo"             :     "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
            "sInfoEmpty"        :     "Mostrando desde 0 hasta 0 de 0 registros",
            "sInfoFiltered"     :     "(filtrado de _MAX_ registros en total)",
            "sInfoPostFix"      :     "",
            "sInfoThousands"    :     ",",
            "sLengthMenu"       :     "Mostrar _MENU_ registros",
            "sLoadingRecords"   :     "Cargando...",
            "sProcessing"       :     "Procesando...",
            "sSearch"           :     "Buscar:",
            "sZeroRecords"      :     "No se encontraron resultados",
            "oPaginate"         :     {
                "sFirst"        :     "Primero",
                "sLast"         :     "Último",
                "sNext"         :     "Siguiente",
                "sPrevious"     :     "Anterior"
            }
        }
            
    } );
}*/