$(function(){
    $('#frmHuecoInsa').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#message","#btnRegistrar");
            $.ajax({
                url:'hueco/HuecoIns',
                type:'post',
                data:$("#frmHuecoInsa").serialize(),//me captura todos los datos del formulario
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnRegistrar");
                    cleanForm("#frmHuecoInsa");
                    if (data==1) {
                        mensajeExito("Ingreso Hueco exitoso");
                    } else{
                        console.log("Error ingresando Hueco");
                    }
                },
                error:function(error){
                    alert(error);
                }
            });
        },
        rules:{
            cboIdSucursal:{
                required:true,
                minlength   : 1
            },
            cboIdAlmacen:{
                required:true,
                minlength   : 1
            },
            txt_nIdRepisa:{
                required:true,
                minlength   : 1
            },
            txt_nIdFila:{
                required:true,
                minlength   : 1
            },
            txt_nIdColumna:{
                required:true,
                minlength   : 1
            },
            txt_nIdCelda:{
                required:true,
                minlength   : 1
            }
        },
        messages: {
            cboIdSucursal: {
                required    : "Seleccione Stand.",
                minlength   : "Minimo {0} caracteres."
            },
            cboIdAlmacen: {
                required    : "Seleccione Almacen.",
                minlength   : "Minimo {0} caracteres."
            },
            txt_nIdRepisa: {
                required    : "Ingrese Repisa.",
                minlength   : "Minimo {0} caracteres."
            },
            txt_nIdFila: {
                required    : "Ingrese Fila.",
                minlength   : "Minimo {0} caracteres."
            },
            txt_nIdColumna: {
                required    : "Ingrese Columna.",
                minlength   : "Minimo {0} caracteres."
            },
            txt_nIdCelda: {
                required    : "Ingrese Casillero.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});