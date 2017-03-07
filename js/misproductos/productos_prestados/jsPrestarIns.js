$(function(){
    $("#btnCancelarPrestar").bind("click", function(event){
         $("#modalPanelPrestar").modal("hide");
    });
    $('#frmPrestamoInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#message","#btnRegistrarPrestar");
            $.ajax({
                //url:'almacen/registrarAlmacenIns',
                url:'producto/optPrestamoProducto',
                type:'post',
                data:$("#frmPrestamoInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrarPrestar");
                    cleanForm("#frmPrestamoInsa");
                    if (data==1) {
                        mensajeExito("Prestamo exitoso");
                        cargaProductoMiStandListado();
                        $("#modalPanelPrestar").modal("hide");
                    } else{
                        console.log("Error Prestamo");
                    }
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            txt_cDestino:{
                required:true,
                minlength   : 1
            }
        },
        messages: {
            txt_cDestino: {
                required    : "Ingrese Destino.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});