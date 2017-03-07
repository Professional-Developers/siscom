$(function(){
    qrySubHijos(-1,-1);
    llenaCaracteristicasxTipoCaracteristica();
    $("#cboIdPadre_sub").bind("change", function(event) {
        llenaCaracteristicasxTipoCaracteristica();
    });
    //cargarCboCaracteristicas();
    /*$("#btnEliminarHijo").bind({
        click: function(){
            var hdn_id=$("#hdn_idHijoDel").val();
            eliminarHijo(hdn_id);
        }
    });
    $("#hijo_btnCancelar").bind({
        click: function(){
            $("#frmHijoInsa")[0].reset();
        }
    });*/
    $("#subCaracteristica_btnBuscar").bind({
        click: function(){
            qrySubHijos();
        }
    });
    /*
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
    });*/

});
function llenaCaracteristicasxTipoCaracteristica() {
    var suc = $("#cboIdPadre_sub").val();
    console.log("suc: " + suc);
    $("#cboIdCaracteristica_sub option:selected").text("CARGANDO...");
    $.uniform.update("#cboIdCaracteristica_sub");
    $.ajax({
        type: "POST",
        //url: "almacen/qryAlmacenSucursal",
        url: "caracteristicas/qryCaracteristicasxTipoCaracteristica",
        data: {
            //idsuc: suc
           idpadre: suc
        },
        cache: false,
        success: function(data) {
            //console.log(data)
            $("#cboIdCaracteristica_sub").html(data);
            $.uniform.update("#cboIdCaracteristica_sub");
            //llenaHuecoxAlmacen();
        },
        error: function(ts) {
            console.log("error Llenar Caracteristicax tipo caracteristica");
        }
    });
}

function qrySubHijos(valTipoCaracteristica,valCaracteristica){
    var chkTodos=1;
    if($("#chkTodosSubCaracteristicas").is(":checked")){
        chkTodos=1;
    }else{
        chkTodos=0;
    }
    if(valTipoCaracteristica==-1){
        valTipoCaracteristica=valTipoCaracteristica;
    }else{
        valTipoCaracteristica=$("#cboIdPadre_sub").val();
    }
    if(valCaracteristica==-1){
        valCaracteristica=valCaracteristica;
    }else{
        valCaracteristica=$("#cboIdCaracteristica_sub").val();
    }
    msgLoading("#sub_gridCaracteristica","Cargando");
    $.ajax({
        type: "POST",
        url: "caracteristicas/qrySubCaracteristicas",        //url: "caracteristicas/qryHijos",
        data:{
            idTipoCaracteristica:valTipoCaracteristica,
            idCaracteristica:valCaracteristica,
            txtCaracteristica:$("#subHijo_txt_cMulDescripcion").val(),
            chkTodos:chkTodos
        },
        cache: false,
        success: function(data) {
            $("#sub_gridCaracteristica").html(data);
        },
        error: function(ts) { 
            console.log("error Listado SubCaracteristicas");
        }              
    });
}/*
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
}*/