$(function(){
    llenaHijoxIdPadre();
    qryProductoDetalle();
    /*Combos*/
    $("#cbo_nMulIdPadre").bind("change", function(event){
        llenaHijoxIdPadre();
    });
    /*$("#btnCancelarDetProd").bind("click", function(event){
        console.log("hola");
        $('#modalAddCaracteristica').modal({
            show: false
        });
    });*/
    $("#btnCancelarDetProd").bind({
        click:function(evt){
            evt.preventDefault();
            console.log("cierrate");
            $("#modalAddCaracteristica").modal("hide");
        }
    })
    
    $('#frmProductoDetInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            var hdn_idProd=$("#hdn_idProd").val();
            var cbo_nMulIdHijo=$("#cbo_nMulIdHijo").val();
            msgLoadSave("#msjDetProd","#btnRegistrarDetProd");
            $.ajax({
                //url:'producto/ProductoIns',
                url:'detalleProducto/detalleProductoIns',
                type:'post',
                data:{
                    hdn_idProd:  hdn_idProd,
                    cbo_nMulIdHijo:cbo_nMulIdHijo
                },
                //data:$("#frmProductoDetInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrarDetProd");
                    //cleanForm("#frmProductoDetInsa");
                    if (data=="1") {
                        mensajeExito("Ingreso Detalle-Producto exitoso");
                        qryProductoDetalle();
                        cargaProductoListado();
                    } else if(data=="2"){
                        mensajeAdvertencia("Ya se encuentra en el listado");
                    }
                    else{
                        console.log("Error ingresando Detalle-Producto");
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
function llenaHijoxIdPadre(){
    var idPadre = $("#cbo_nMulIdPadre").val();
    console.log("hdn_idProd: "+idPadre);
    //$("#cbo_nMulIdHijo").html("cargando...");
    //$("#cbo_nMulIdHijo").empty();
    /*$.uniform.update("#cbo_nMulIdHijo");*/
    var option = $('<option></option>').attr("value", "option value").text("Cargando..");
    $("#cbo_nMulIdHijo").empty().append(option);
    $.ajax({
        type: "POST",
        //Wurl: "almacen/qryAlmacenId",
        url: "caracteristicas/llenaHijoxIdPadre",
        data:{
            idPadre:idPadre
        },
        cache: false,
        success: function(data) {
            $("#cbo_nMulIdHijo").html(data);
        /*$.uniform.update("#cbo_nMulIdHijo");*/
        },
        error: function(ts) { 
            console.log("error Llena Caracteristica");
        }              
    });
}
function qryProductoDetalle(){
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
}