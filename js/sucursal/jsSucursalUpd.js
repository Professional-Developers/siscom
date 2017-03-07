$(function(){
    $("#btnCancelarSuc").bind({
        click:function(evt){
            evt.preventDefault();
            $("#modalCambiaSucursal").modal("hide");
            $(".optEditar").show();
        }
    })
    $('#frmSucursalUpd').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#messageUpd","#btnActualizarSuc");
            $.ajax({
                url:'sucursal/updSucursal',
                type:'post',
                data:$("#frmSucursalUpd").serialize(),
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnActualizarSuc");
                    if (data==1) {
                        mensajeExito("Actualizacion correcto",'e');
                        cargaSucursalListado();
                        cargaSucursalListadoDel();
                        $('#modalCambiaSucursal').modal('hide');
                    } else{
                        console.log("Error Actualizar Sucursal");
                    }       
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            txtcPerNombresUpd:{
                required:true,
                minlength   : 4
            }
        },
        messages: {
            txtcPerNombresUpd: {
                required    : "Ingrese el Nombre de la Persona.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});