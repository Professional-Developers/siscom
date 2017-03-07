$(function(){
    $("#btnCancelarAlm").bind({
        click:function(evt){
            evt.preventDefault();
            $("#modalCambiaAlmacen").modal("hide");
            $(".optEditar").show();
        }
    })
    $('#frmAlmacenUpd').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#messageUpd","#btnActualizarAlm");
            $.ajax({
                url:'almacen/updAlmacen',
                type:'post',
                data:$("#frmAlmacenUpd").serialize(),
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnActualizarAlm");
                    if (data==1) {
                        mensajeExito("Actualizacion correcto",'e');
                        cargaAlmacenListado();
                        $('#modalCambiaAlmacen').modal('hide');
                    } else{
                        console.log("Error Actualizar Almacen");
                    }       
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            upd_txt_cAlmNombre:{
                required:true,
                minlength   : 4
            }
        },
        messages: {
            upd_txt_cAlmNombre: {
                required    : "Ingrese el Nombre de Almacen.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});