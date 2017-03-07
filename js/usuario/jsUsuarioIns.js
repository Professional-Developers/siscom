$(function(){
    soloNumeros("#txtcPerDni","keypress");
    $("#btn_fndPerson").bind({
        click:function(evt){
            evt.preventDefault();
            var dni = $("#txtcPerDni").val();
            if( dni !='' && dni.length==8 ){
                loadBuscarPersonas();
            }else{
                //alert("ingresa un dni valido");
                mensajeAdvertencia("Ingresa un dni valido");
            }
        }
    });
    $("#btnCancelar").bind({
        click:function(evt){
            evt.preventDefault();
            //LimpiarFormulario();
            cleanForm("#frmUsuarioIns");
        }
    })
    /*$("#btnRegistrarUsuario").bind({
        click:function(evt){
            evt.preventDefault();
            registrarUsuario();
        }
    })*/
    $('#frmUsuarioIns').validate({
        submitHandler:function(){
            msgLoadSave("#message","#btnRegistrarUsuario");
            $.ajax({
                url:'usuarios/insUsuario',
                type:'post',
                data:{
                    txt_nPerId : $("#txt_nPerId").val(),
                    txtUsuario : $("#txtUsuario").val(),
                    txtClave : $("#txtClave").val(),
                    cboTipoUser : $("#cboTipoUser option:selected").val()
                },
                cache:false,
                success:function(data){
                    console.log(data);
                    cleanForm("#frmUsuarioIns");
                    msgLoadSaveRemove("#btnRegistrarUsuario");
                    if (data=="1") {
                        mensajeExito("Ingreso Usuario Exitoso");
                    } else{
                        console.log("Error Registro Usuario");
                    }
                },
                error:function(error){
                //alert(error);
                }
            });
        },
        rules:{
            txtcPerDni:{
                required:true,
                digits:true
            },
            txtUsuario:{
                required:true
            },
            txtClave:{
                required:true,
                minlength:4
                //maxlength:11,
                //lettersonly: true
            },
            cboTipoUser:{
                required:true
            }
        },
        messages: {
            txtcPerDni:{
                required    : "Ingrese DNI.",
                digits:"solo numeros"
            },
            txtUsuario:{
                required    : "Ingrese Usuario."
            },
            txtClave:{
                required    : "Ingrese Clave.",
                minlength    : "Minimo 4 caracteres."
            },
            cboTipoUser:{
                required    : "Seleccione Tipo Usuario."
            }
        }
    // ,debug: true
    });
});


function registrarUsuario(){
    $.ajax({
        url:'usuarios/insUsuario',
        cache:false,
        type:'post',
        data:{
            txt_nPerId : $("#txt_nPerId").val(),
            txtUsuario : $("#txtUsuario").val(),
            txtClave : $("#txtClave").val(),
            cboTipoUser : $("#cboTipoUser option:selected").val()
        },
        success:function(data){
            cleanForm("#frmUsuarioIns");
            if (data=="1") {
                //mensaje("En hora buena registro correcto",'e');
                mensajeExito("Ingreso Usuario Exitoso");
            } else{
                console.log("Error Registro Usuario");
            }
        },
        error:function(er){
            console.log(er);
        }
    })
}
function loadBuscarPersonas(){
    msgLoading("#infopersona","Cargando");
    $.ajax({
        url:'persona/buscarxDni',
        type:'post',
        cache:false,
        data:{
            dni:$("#txtcPerDni").val()
        },
        success:function(data){
            $("#infopersona").html(data);
        },
        error:function(er){
            console.log(er);
        }
    });
}