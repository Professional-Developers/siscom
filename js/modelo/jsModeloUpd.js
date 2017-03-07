$(function(){
    soloNumeros("#txt_upd_nModCodigo","keypress");
    $("#btnCancelarMod").bind({
        click:function(evt){
            evt.preventDefault();
            $("#modalCambiaModelo").modal("hide");
            $(".optEditar").show();
        }
    })
    $('#frmModeloUpd').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#messageUpd","#btnActualizarMod");
            $.ajax({
                url:'modelo/updModelo',
                type:'post',
                data:$("#frmModeloUpd").serialize(),
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnActualizarMod");
                    if (data=="1") {
                        mensajeExito("Actualizacion correcto",'e');
                        cargaModeloListado();
                        $('#modalCambiaModelo').modal('hide');
                    } else if(data=="2"){
                        mensajeAdvertencia("Ya es un Modelo existente");
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
            txt_upd_nModCodigo:{
                required:true,
                minlength   : 1
            }
        },
        messages: {
            txt_upd_nModCodigo: {
                required    : "Ingrese Codigo.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});