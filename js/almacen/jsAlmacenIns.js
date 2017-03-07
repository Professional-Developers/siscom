$(function(){
    $('#frmAlmacenInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#message","#btnRegistrarAlm");
            $.ajax({
                url:'almacen/registrarAlmacenIns',
                type:'post',
                data:$("#frmAlmacenInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrarAlm");
                    cleanForm("#frmAlmacenInsa");
                    if (data==1) {
                        mensajeExito("Ingreso Almacen Exitosa");
                    } else{
                        console.log("Error Ingreso Almacen");
                    }
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            txt_cAlmNombre:{
                required:true,
                minlength   : 1
            }
        },
        messages: {
            txt_cAlmNombre: {
                required    : "Ingrese el Nombre del Almacen.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});