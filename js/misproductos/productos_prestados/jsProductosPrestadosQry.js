$(function(){
    $('#qry_productos_prestados tbody tr').each( function() {
        var sTitle;
        var nTds = $('td', this);
        var sBrowser = $(nTds[2]).text();
        //var sGrade = $(nTds[4]).text();
         
        //sTitle = sBrowser+' will provide an undefined level of CSS support.';
        sTitle = sBrowser;
         
        /*this.setAttribute( 'title', sTitle );*/
    } );
    
    var dataTable = {
        tabla   : "qry_productos_prestados",
        filas   : 50,
        JQueryUI : true
    };
    dataTable["filsXpag"] = ( dataTable["filsXpag"] != undefined) ?  dataTable["filsXpag"] : 10;
    dataTable['JQueryUI'] = ( dataTable['JQueryUI'] != undefined ) ? false : dataTable['JQueryUI'] ;
    //dataTable["JQueryUI"] = (dataTable["JQueryUI"] != undefined) ? dataTable["JQueryUI"] : true;
    dataTable["functions"] = (dataTable["functions"] != undefined) ? dataTable["functions"] : "";
    
    // funcionalidad js           
    var oTable=$("#"+dataTable["tabla"]+"").dataTable({
        "bJQueryUI"             :     dataTable["JQueryUI"],
        "sPaginationType"       :     "full_numbers",
        //"aaSorting" : [[1,"asc"]],
        "aaSorting" : [],
        "iDisplayLength"        :     dataTable["filsXpag"],
        "oLanguage"             :     {
            "sEmptyTable"       :     "Tabla sin data disponible",
            "bSort"             :     false,
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
                "sNext"         :     "Sig.",
                "sPrevious"     :     "Ant."
            },
            "oAria"             : {
                "sSortAscending"    :     ": activar para Ordenar Ascendentemente",
                "sSortDescending"   :     ": activar para Ordendar Descendentemente"
            }
        },
        "fnDrawCallback": function(oSettings) {
            eval(dataTable["functions"]); // funcion ejecutada cuando cambia pagina
        },//para ocultar
        "aoColumns": [ 
        null,               
        {
            "bVisible":    false
        },  
        {
            "bVisible":    false
        },  
        null,
        null,
        null,
        null,
        null,
        null,
        null
        ]
    });
    //var oTable = $('#qry_producto').dataTable();
    oTable.$('tr').tooltip( {
        "delay": 0,
        "track": true,
        "fade": 250
    });
    
})
function panelDetallePrestados(codProdHueco) {
    $($("#det-" + codProdHueco)).qtip({
        content: {
            text: "Cargando...",
            ajax: {
                url: 'detalleProducto/getProductoDetalleActivos',
                type: 'POST', // POST or GET[/php]
                data: {
                    codProdHueco: codProdHueco
                },
                success: function(data) {
                    this.set('content.text', data);
                    console.log(data);
                    $("#det-" + codProdHueco).attr("title", data);
                }
            }
        },
        style: {
            classes: 'ui-tooltip-light',
            width: 500
        },
        position: {
            my: 'right bottom center',
            at: 'bottom left center',
            target: $("#det-" + codProdHueco)
        },
        show: {
            event: 'click',
            ready: true,
            solo: true
        },
        hide: 'unfocus'
    });
}