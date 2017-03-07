$(function(){
    soloNumeros("#txt_nModCodigo","keypress");
    $('#frmModeloInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#message","#btnRegistrarMod");
            $.ajax({
                url:'modelo/registrarModeloIns',
                type:'post',
                data:$("#frmModeloInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrarMod");
                    //cleanForm("#frmModeloInsa");
                    if (data=="1") {
                        mensajeExito("Ingreso correcto");
                        cleanForm("#frmModeloInsa");
                    } else if(data=="2"){
                        mensajeAdvertencia("Ya es un modelo existente");
                    }else{
                        console.log("Error Modelo");
                    }
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            txt_nModCodigo:{
                required:true,
                minlength   : 1
            }
        },
        messages: {
            txt_nModCodigo: {
                required    : "Ingrese Codigo Agrupador.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});