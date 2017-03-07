$(function(){
    /*/paginaDataTableTramInt2();*/
    /*var dataTable = {
        tabla   : "qry_producto",
        filas   : 50,
        JQueryUI : true
    };
    paginaDataTable(dataTable);
    var oTable = $('#qry_producto').dataTable();
    oTable.$('tr').tooltip( {
        "delay": 0,
        "track": true,
        "fade": 250
    } );*/
    /*$("#btnDerivar").bind({
        click:function(evt){
            evt.preventDefault();
            var oTable = $('#qry_Derivar_producto').dataTable();
            var rowcollection =  oTable.$(".call-checkbox:checked", {
                "page": "all"
            });
            var checkboxValues = "";
            rowcollection.each(function(index,elem){
                //var checkbox_value = $(elem).val();
                checkboxValues += $(elem).val() + ",";
            });
            checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
            console.log(checkboxValues);
        //http://stackoverflow.com/questions/18684703/how-to-get-check-box-input-value-from-datatable-row-collection
        }
    })*/
    
    $('#frmProductoDeriva').validate({
        submitHandler:function(){
            var oTable = $('#qry_Derivar_producto').dataTable();
            var rowcollection =  oTable.$(".call-checkbox:checked", {
                "page": "all"
            });
            var checkboxValues = "";
            rowcollection.each(function(index,elem){
                //var checkbox_value = $(elem).val();
                checkboxValues += $(elem).val() + ",";
            });
            checkboxValues = checkboxValues.substring(0, checkboxValues.length-1);
            console.log(checkboxValues);
            if(checkboxValues==''){
                mensajeAdvertencia("Seleccione Producto",'e');
                $(".call-checkbox:eq(0)").focus();
            }else{
                msgLoadSave("#messageDeriv","#btnDerivar");
                $.ajax({
                    url:'envioproducto/derivarProducto',
                    type:'post',
                    //data:$("#frmProductoDeriva").serialize(),
                    //data:{$("#frmProductoDeriva").serialize()},
                    data:{
                        idsucursal:$("#cboIdSucursal").val(),
                        cboIdAlmacen:$("#cboIdAlmacen").val(),
                        cboIdHueco:$("#cboIdHueco").val(),
                        nProductoHueco:checkboxValues
                    },
                    cache:false,
                    success:function(data){
                        console.log(data);
                        msgLoadSaveRemove("#btnDerivar");
                        if(data=='r'){
                            mensajeAdvertencia("Faltan Seleccionar Datos",'e');
                        }
                        else if (data==1) {
                        
                        mensajeExito("Se derivo ",'e');
                        //cargaSucursalListado();
                        cargaProductoMiStandListado();
                        } else{
                            console.log("Error Derivar");
                        }       
                    },
                    error:function(error){
                        alert(error);
                    }
                });
            }
        },
        rules:{
            cboIdSucursal:{
                required:true
            },
            cboIdAlmacen:{
                required:true
            },
            cboIdHueco:{
                required:true
            }
        },
        messages: {
            cboIdSucursal: {
                required    : "Seleccione Stand."
            },
            cboIdAlmacen:{
                required    : "Seleccione Almacen."
            },
            cboIdHueco:{
                required    : "Seleccione Hueco."
            }
        }
    // ,debug: true
    });
    
    
    /*tabla productos*/
    $('#qry_Derivar_producto tbody tr').each( function() {
        var sTitle;
        var nTds = $('td', this);
        var sBrowser = $(nTds[2]).text();
        //var sGrade = $(nTds[4]).text();
         
        //sTitle = sBrowser+' will provide an undefined level of CSS support.';
        sTitle = sBrowser;
         
        this.setAttribute( 'title', sTitle );
    } );
    
    var dataTable = {
        tabla   : "qry_Derivar_producto",
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
        null,               
        {
            "bVisible":    false
        },  
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
