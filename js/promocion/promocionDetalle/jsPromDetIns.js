$(function(){
    qryPromDetalle();
    soloNumeros("#txt_nPromDetCantidad","keypress");
    $("#btnCancelarDetProm").bind({
        click:function(evt){
            evt.preventDefault();
            console.log("cierrate");
            $("#modalAddPromDetalle").modal("hide");
        }
    })
    
    $('#frmPromocionDetInsa').validate({
        submitHandler:function(){
            var hdn_idProm=$("#hdn_idProm").val();
            var cbo_nProdId=$("#cbo_nProdId").val();
            var txt_nPromDetCantidad=$("#txt_nPromDetCantidad").val();
            var txt_nPromDetDescuentoUnidad=$("#txt_nPromDetDescuentoUnidad").val();
            msgLoadSave("#msjDetProm","#btnRegistrarDetProm");
            $.ajax({
                //url:'detalleProducto/detalleProductoIns',
                url:'detallePromocion/detallePromocionIns',
                type:'post',
                data:{
                    hdn_idProm:  hdn_idProm,
                    cbo_nProdId:cbo_nProdId,
                    txt_nPromDetCantidad:txt_nPromDetCantidad,
                    txt_nPromDetDescuentoUnidad:txt_nPromDetDescuentoUnidad
                },
                //data:$("#frmProductoDetInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrarDetProm");
                    cleanForm("#frmPromocionDetInsa");
                    if (data=="1") {
                        mensajeExito("Ingreso Detalle-Promocion exitoso");
                        //qryProductoDetalle();
                    } else if(data=="2"){
                        mensajeAdvertencia("Ya se encuentra en el listado");
                    }
                    else{
                        console.log("Error ingresando Detalle-Promocion");
                    }
                },
                error:function(error){
                    //alert(error);
                    console.log(error);
                }
            });
        },
        rules:{
            cbo_nProdId:{
                required:true
            },
            txt_nPromDetCantidad:{
                required:true,
                minlength   : 1
            },
            txt_nPromDetDescuentoUnidad:{
                required:true,
                minlength   : 1
            }
        },
        messages: {
            cbo_nProdId: {
                required    : "Seleccione"
            },
            txt_nPromDetCantidad:{
                required:true,
                minlength   : 1
            },
            txt_nPromDetDescuentoUnidad:{
                required:true,
                minlength   : 1
            }
        }
    // ,debug: true
    });
});
function qryPromDetalle(){
    msgLoading("#qry_Detalle_Promocion","Cargando");
    var idpromocion = $("#hdn_idProm").val();
    $.ajax({
        type: "POST",
        url: "detallePromocion/qryPromDetalle",
        cache: false,
        data:{
            idprom:   idpromocion
        },
        success: function(data) {
            $("#qry_Detalle_Promocion").html(data);
        },
        error: function(ts) { 
            console.log("error Detalle Listado");
        }              
    });
}