$(function(){
    $("#cboIdModelo").select2();
    //$("#cboIdHueco").select2();
    //$('select').select2().select2('val', $('.select2 option:eq(1)').val());
    //$('#cboIdHueco').select2().select2('val','1')
    
    soloNumeros("#txt_nCantidad","keypress");
    soloNumeros("#txt_nProPrecioReferencial","keypress");
    $('#frmProductoInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            console.log($("#cboIdHueco").val());
            console.log($("#cboIdHueco").select2("val"));
            if($("#cboIdHueco").val()=='' || $("#cboIdModelo").val()=='' ){
                console.log("vacion");
                console.log("hueco"+$("#cboIdHueco").val());
                console.log("modelo"+$("#cboIdModelo").val());
                mensajeAdvertencia("Falta Seleccionar");
            }else{
                msgLoadSave("#message","#btnRegistrar");
                $.ajax({
                    url:'producto/productoIns',
                    type:'post',
                    data:$("#frmProductoInsa").serialize(),//me captura todos los datos del formulario
                    cache:false,
                    success:function(data){
                        console.log(data);
                        msgLoadSaveRemove("#btnRegistrar");
                        $('#frmProductoInsa')[0].reset();

                        if(data.trim()=="r"){
                            mensajeAdvertencia("Falta Seleccionar");
                        }else if(data.trim()=="-1"){
                            mensajeAdvertencia("advertencia,comuniquese con el administrador");
                        }else{
                            mensajeExito("Ingreso Producto exitoso");
                            qryProductoIns(data);
                            //alert("prod: "+data);
                            
                        }
                        /*msgLoadSaveRemove("#btnRegistrar");
                        cleanForm("#frmProductoInsa");
                        if (data==1) {
                            mensajeExito("Ingreso Producto exitoso");
                        } else{
                            console.log("Error ingresando Producto");
                        }*/
                    },
                    error:function(error){
                        //alert(error);
                        console.log(error);
                    }
                });
            }
        },
        rules:{
            txt_cProDescripcion:{
                required:true,
                minlength   : 1
            },
            txt_nModeloId:{
                required:true,
                minlength   : 1
            },
            txt_nProPrecioReferencial:{
                required:true,
                minlength   : 1
            },
            cboIdSucursal:{
                required:true
            },
            cboIdAlmacen:{
                required:true
            },
            cboIdHueco:{
                required:true
            },
            cboIdModelo:{
                required:true
            },
            cboIdCategoria:{
                required:true
            }
        },
        messages: {
            txt_cProDescripcion: {
                required    : "Ingrese Descripcion.",
                minlength   : "Minimo {0} caracteres."
            },
            txt_nModeloId: {
                required    : "Ingrese Modelo(grupo).",
                minlength   : "Minimo {0} caracteres."
            },
            txt_nProPrecioReferencial: {
                required    : "Ingrese Precio.",
                minlength   : "Minimo {0} caracteres."
            },
            cboIdSucursal:{
                required    : "Ingrese Precio."
            },
            cboIdAlmacen:{
                required    : "Ingrese Almacen."
            },
            cboIdHueco:{
                required    : "Seleccione Hueco"
            },
            cboIdModelo:{
                required    : "Seleccione Modelo"
            },
            cboIdCategoria:{
                required    : "Seleccione Categoria"
            }
        }
        // ,debug: true
    });
});
function qryProductoIns(idproducto){
    //$("#qryProductoIns").html("cargando...");
    msgLoading("#qryProductoIns","cargando");
    $.ajax({
        type: "POST",
        url: "producto/qryProductoIns",
        data:{
            idproducto:idproducto
        },
        cache: false,
        success: function(data) {
            $("#qryProductoIns").html(data);
        },
        error: function(ts) { 
            console.log("error producto insertado");
        }              
    });
}