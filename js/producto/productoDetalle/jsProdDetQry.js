$(function(){
    //paginaDataTableTramInt2();
    var dataTable = {
        tabla   : "qry_productoDetalle",
        filas   : 50,
        JQueryUI : true
    };
    paginaDataTable(dataTable);
    
/*$("#btnEliminar").bind({
        click: function(){
            var hdn_id=$("#hdn_idDetProductoDel").val();
            eliminarDetalleProducto(hdn_id);
        }
    });*/
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
/*function panelDelDetalleProducto(id){
    console.log("del detalle producto");
    $('#modalBorraDetProducto').modal({
        show: true
    });
    $("#hdn_idDetProductoDel").val(id);
}*/
function panelDelDetalleProducto(id){
    var rdn=Math.random()*11;
    /*msgLoadSave("#msgDel","#btnEliminar");*/
    /*$.post('almacen/eliminarAlmacen', {*/
    $(".optDelDetalle").hide();
    $.post('detalleProducto/eliminarDetProducto', {
        rdn:rdn,
        ncodigo:id
    }, function(data){
        console.log(data);
        /*msgLoadSaveRemove("#btnEliminar");*/
        $(".optDelDetalle").show();
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            qryProductoDetalle();
            cargaProductoListado();
            //fndProducto();
            
            /*$("#modalBorraAlmacen").modal("hide");*/
        }else{
            //alert("Error");
            alert("Comuniquese con el administrador");
            console.log("Error");
        }
    });
}

function eliminarDetalleProducto(ncodigo){
    
/*var rdn=Math.random()*11;
    msgLoadSave("#msgDel","#btnEliminar");
    $.post('almacen/eliminarAlmacen', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnEliminar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaAlmacenListado();
            $("#modalBorraAlmacen").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });*/
}