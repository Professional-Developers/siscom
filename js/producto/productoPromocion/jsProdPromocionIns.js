$(function(){
    /*llenaHijoxIdPadre();*/
    //qryProductoDetalle();
    qryProductoPromocion();
    /*Combos*/
    /*$("#cbo_nMulIdPadre").bind("change", function(event){
        llenaHijoxIdPadre();
    });*/

    $("#btnCancelarPromocionProd").bind({
        click:function(evt){
            evt.preventDefault();
            console.log("cierrate");
            $("#modalAddPromocion").modal("hide");
        }
    })
    
    $('#frmProductoPromocionInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            var hdn_idProd=$("#hdn_idProd").val();
            var cbo_ins_nPromId=$("#cbo_ins_nPromId").val();
            msgLoadSave("#msjDetPromocion","#btnRegistrarPromocionProd");
            $.ajax({
                //url:'producto/ProductoIns',
                url:URL_MAIN+'detallePromocion/promocionProductoIns',
                type:'post',
                data:{
                    hdn_idProd      :  hdn_idProd,
                    cbo_ins_nPromId :  cbo_ins_nPromId
                },
                //data:$("#frmProductoDetInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrarPromocionProd");
                    //cleanForm("#frmProductoDetInsa");
                    if (data=="1") {
                        mensajeExito("Ingreso Promocion-Producto exitoso");
                        qryProductoPromocion();
                        cboPromocionesActivas();
                    } else if(data=="2"){
                        mensajeAdvertencia("Ya se encuentra en el listado");
                    } else if(data=="3"){
                        mensajeAdvertencia("La promocion llegó al limite");
                    }
                    else{
                        console.log("Error ingresando Promocion-Producto");
                    }
                },
                error:function(error){
                    //alert(error);
                    console.log(error);
                }
            });
        },
        rules:{
            cbo_nMulIdHijo:{
                required:true,
                minlength   : 1
            }
        },
        messages: {
            cbo_nMulIdHijo: {
                required    : "Seleccione"
            }
        }
    // ,debug: true
    });
});
function qryProductoPromocion(){
    msgLoading("#qry_Promocion_Producto","Cargando");
    var idproducto = $("#hdn_idProd").val();
    $.ajax({
        type: "POST",
        //url: "detalleProducto/qryProductoDetalle",
        url: URL_MAIN+"detallePromocion/qryProductoPromocion",
        cache: false,
        data:{
            idprod:   idproducto
        },
        success: function(data) {
            $("#qry_Promocion_Producto").html(data);
        },
        error: function(ts) { 
            console.log("error Promocion Producto Listado");
        }              
    });
}
function cboPromocionesActivas(){
    
    msgLoading("#cbo_ins_nPromId","Cargando");
    $("#cbo_ins_nPromId").html("<option>CARGANDO...</option>");
    $.ajax({
        type: "POST",
        url: URL_MAIN+"promocion/cboPromocionesActivas",
        cache: false,
        success: function(data) {
            $("#cbo_ins_nPromId").html(data);
        },
        error: function(ts) { 
            console.log("error Promocion Producto Listado");
        }              
    });
}


/*function qryProductoDetalle(){
    msgLoading("#qry_Detalle_Producto","Cargando");
    var idproducto = $("#hdn_idProd").val();
    $.ajax({
        type: "POST",
        url: "detalleProducto/qryProductoDetalle",
        cache: false,
        data:{
            idprod:   idproducto
        },
        success: function(data) {
            $("#qry_Detalle_Producto").html(data);
        },
        error: function(ts) { 
            console.log("error Detalle Listado");
        }              
    });
}*/