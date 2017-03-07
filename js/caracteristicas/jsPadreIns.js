$(function(){
    $('#frmPadreInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#message","#padre_btnRegistrar");
            $.ajax({
                url:'caracteristicas/padreIns',
                type:'post',
                data:$("#frmPadreInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#padre_btnRegistrar");
                    cleanForm("#frmPadreInsa");
                    qryPadres();
                    if (data==1) {
                        mensajeExito("Ingreso Padre Exitosa");
                    } else{
                        console.log("Error Padre Persona");
                    }
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            padre_txt_cMulDescripcion:{
                required:true,
                minlength   : 2
            }
        },
        messages: {
            padre_txt_cMulDescripcion: {
                required    : "Ingrese el Tipo Caracteristica.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});