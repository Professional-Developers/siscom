$(function(){
    $("#upd_hijo_txt_cMulDescripcion").focus();
    $("#btnCancelarHijo").bind({
        click:function(evt){
            evt.preventDefault();
            $("#modalCambiaHijo").modal("hide");
            $(".optEditarHijo").show();
        }
    })
    $('#frmHijoUpd').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#messageUpd","#btnActualizarHijo");
            $.ajax({
                url:'caracteristicas/updHijo',
                type:'post',
                data:$("#frmHijoUpd").serialize(),
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnActualizarHijo");
                    if (data=="1") {
                        mensajeExito("Actualizacion correcto",'e');
                        qryHijos($("#cboIdPadre").val());
                        $('#modalCambiaHijo').modal('hide');
                    }else if(data=="2"){
                        mensajeAdvertencia("Ya se encuentra registrado: "+$("#upd_hijo_txt_cMulDescripcion").val());
                    } else{
                        console.log("Error Actualizar Caracteristica");
                    }       
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            upd_hijo_txt_cMulDescripcion:{
                required:true,
                minlength   : 1
            },
            upd_cboIdPadre:{
                required:true
            }
        },
        messages: {
            upd_hijo_txt_cMulDescripcion: {
                required    : "Ingrese Descripcion.",
                minlength   : "Minimo {0} caracteres."
            },
            upd_cboIdPadre:{
                required:"seleccione"
            }
        }
    // ,debug: true
    });
});