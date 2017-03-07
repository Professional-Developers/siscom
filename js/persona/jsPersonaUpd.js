$(function(){
    $("#txtcPerTelefonoUpd").mask("(999) 99-99-99");
    soloNumeros("#txtcPerCelularUpd","keypress");
    soloNumeros("#txtcPerDniUpd","keypress");
    
    $("#btnCancelarP").bind({
        click:function(evt){
            evt.preventDefault();
            //cleanForm("#frmPersonaUpd");
            //alert("hi");
            $("#modalCambiaPersona").modal("hide");
        }
    })
    
    $('#frmPersonaUpd').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#messageUpdPersona","#btnActualizar");
            $.ajax({
                //url:'persona/registrarIns',
                url:'persona/updPersona',
                type:'post',
                data:$("#frmPersonaUpd").serialize(),
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnActualizar");
                    if (data==1) {
                        mensajeExito("Actualizacion correcto",'e');
                        cargaPersonaListado();
                        $('#modalCambiaPersona').modal('hide');
                    } else{
                        console.log("Error Actualizar Persona");
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
            },
            txtcPerApellidoMaterno:{
                required:true,
                minlength   : 3
            },
            txtcPerApellidoPaternoUpd:{
                required:true,
                minlength   : 5
            },
            txtcPerDniUpd:{
                required:true,
                minlength   : 8,
                digits      : true
            },
            txtcPerDireccionUpd:{
                required:true
            }
        },
        messages: {
            txtcPerNombresUpd: {
                required    : "Ingrese el Nombre de la Persona.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerApellidoMaterno:{
                required    : "Ingrese Apellido Materno.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerApellidoPaternoUpd: {
                required    : "Ingrese Apellido Paterno.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerDniUpd: {
                required    : "Ingrese DNI.",
                minlength   : "Minimo {0} caracteres.",
                digits      : "Ingrese solo numeros."
            },
            txtcPerDireccionUpd: {
                required    : "Ingrese Direccion."
            }
        }
    // ,debug: true
    });
});