$(function(){
    qryHijos(-1);
    $("#btnEliminarHijo").bind({
        click: function(){
            var hdn_id=$("#hdn_idHijoDel").val();
            eliminarHijo(hdn_id);
        }
    });
    $("#hijo_btnCancelar").bind({
        click: function(){
            $("#frmHijoInsa")[0].reset();
        }
    });
    $("#hijo_btnBuscar").bind({
        click: function(){
            qryHijos();
            /*var rdn=Math.random()*11;
            msgLoadSave("","#hijo_btnBuscar");
            $.post('caracteristicas/qryHijos', {
                rdn:rdn,
                idTipoCaracteristica:$("#cboIdPadre").val(),
                txtCaracteristica:$("#hijo_txt_cMulDescripcion").val(),
                chkTodos:chkTodos
            }, function(data){
                //console.log(data);
                msgLoadSaveRemove("#hijo_btnBuscar");
                $("#hijos_gridHijos").html(data);
            });*/
        }
    });
    $('#frmHijoInsa').validate({
        submitHandler:function(){
            
            if($("#cboIdPadre").val()=="-1"){
                mensajeAdvertencia("Seleccione un Tipo de Caracteristica y una Caracteristica");
            }else{
                msgLoadSave("#hijo_message","#hijo_btnRegistrar");
                $.ajax({
                    url:'caracteristicas/hijoIns',
                    type:'post',
                    data:$("#frmHijoInsa").serialize(),//me captura todos los datos del formulario
                    cache:false,
                    success:function(data){
                        console.log(data);
                        msgLoadSaveRemove("#hijo_btnRegistrar");
                        //cleanForm("#frmHijoInsa");
                        $("#hijo_txt_cMulDescripcion").val("");
                        if (data=="1") {
                            mensajeExito("Ingreso Caracteristica Exitosa");
                            qryHijos($("#cboIdPadre").val());
                            $("#hijo_txt_cMulDescripcion").val("")
                        } else if(data=="2"){
                            mensajeAdvertencia("Ya existe");
                        }else{
                            console.log("Error Hijo");
                        }

                    },
                    error:function(error){
                        
                        console.log(error);
                    }
                });
            }
        },
        rules:{
            cboIdPadre:{
                required:true
            },
            hijo_txt_cMulDescripcion:{
                required:true,
                minlength:1
            },
            hijo_txt_nMulOrden:{
                required:true,
                minlength:1
            }
        },
        messages: {
            cboIdPadre: {
                required    : "Seleccione."
            },
            hijo_txt_cMulDescripcion: {
                required    : "Ingrese Descripcion.",
                minlength   : "Minimo {0} caracteres."
            },
            hijo_txt_nMulOrden: {
                required    : "Ingrese Orden.",
                minlength   : "Minimo {0} caracteres."
            }
            
        }
    // ,debug: true
    });
});
function qryHijos(valor){
    var chkTodos=1;
    if($("#chkTodosCaracteristicas").is(":checked")){
        chkTodos=1;
    }else{
        chkTodos=0;
    }
    if(valor==-1){
        valor=valor;
    }else{
        valor=$("#cboIdPadre").val();
    }
    msgLoading("#hijos_gridHijos","Cargando");
    $.ajax({
        type: "POST",
        url: "caracteristicas/qryHijos",
        data:{
            idTipoCaracteristica:valor,
            txtCaracteristica:$("#hijo_txt_cMulDescripcion").val(),
            chkTodos:chkTodos
        },
        cache: false,
        success: function(data) {
            $("#hijos_gridHijos").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Hijos");
        }              
    });
}
function panelDelHijo(id){
    console.log("del Hijo "+id);
    $('#modalBorraHijo').modal({
        show: true
    });
    $("#hdn_idHijoDel").val(id);
}

function eliminarHijo(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgDelHijo","#btnEliminarHijo");
    $.post('caracteristicas/eliminarHijo', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnEliminarHijo");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            qryHijos($("#cboIdPadre").val());
            $("#modalBorraHijo").modal("hide");
        }else{
            
            console.log("Error");
        }
    });
}