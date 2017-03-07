$(function(){
    $('#frmSucursalInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#message","#btnRegistrar");
            $.ajax({
                url:'sucursal/registrarSucursalIns',
                type:'post',
                data:$("#frmSucursalInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrar");
                    cleanForm("#frmSucursalInsa");
                    
                    if (data==1) {
                        mensajeExito("Ingreso Sucursal Exitosa");
                    } else{
                        console.log("Error Sucursal Persona");
                    }
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            txtcPerNombres:{
                required:true,
                minlength   : 1
            },
            txtcPerApellidoMaterno:{
                required:true,
                minlength   : 1
            },
            txtcPerApellidoPaterno:{
                required:true,
                minlength   : 1
            },
            txtcPerDni:{
                required:true,
                minlength   : 8,
                digits      : true
            },
            txtcPerDireccion:{
                required:true
            },
            txtcPerCelular:{
                digits:true
            }
        },
        messages: {
            txtcPerNombres: {
                required    : "Ingrese el Nombre de la Persona.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerApellidoMaterno: {
                required    : "Ingrese Apellido Materno.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerApellidoPaterno: {
                required    : "Ingrese Apellido Paterno.",
                minlength   : "Minimo {0} caracteres."
            },
            txtcPerDni: {
                required    : "Ingrese DNI.",
                minlength   : "Minimo {0} caracteres.",
                digits      : "Ingrese solo numeros."
            },
            txtcPerDireccion: {
                required    : "Ingrese Direccion."
            },
            txtcPerCelular:{
                digits: "Ingrese solo numeros"
            }
        }
    // ,debug: true
    });
});