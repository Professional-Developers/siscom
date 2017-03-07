$(function(){
    $("#upd_txt_cMulDescripcion").focus();
    $("#btnCancelarPadre").bind({
        click:function(evt){
            evt.preventDefault();
            $("#modalCambiaPadre").modal("hide");
            $(".optEditarPadre").show();
        }
    })
    $('#frmPadreUpd').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#messageUpd","#btnActualizarPadre");
            $.ajax({
                url:'caracteristicas/updPadre',
                type:'post',
                data:$("#frmPadreUpd").serialize(),
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnActualizarPadre");
                    if (data==1) {
                        mensajeExito("Actualizacion correcto",'e');
                        qryPadres();
                        $('#modalCambiaPadre').modal('hide');
                    } else{
                        console.log("Error Actualizar Tipo Caracteristica");
                    }       
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            upd_txt_cMulDescripcion:{
                required:true,
                minlength   : 4
            }
        },
        messages: {
            upd_txt_cMulDescripcion: {
                required    : "Ingrese Descripcion.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});