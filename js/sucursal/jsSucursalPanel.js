$(function(){
    $("#tabqry").bind({
        click: function(){
            cargaSucursalListado();
        }
    });
    $("#tabqryDel").bind({
        click: function(){
            cargaSucursalListadoDel();
        }
    });
    $("#btnEliminar").bind({
        click: function(){
            var hdn_id=$("#hdn_idSucursalDel").val();
            eliminarSucursal(hdn_id);
        }
    });
    $("#btnActivar").bind({
        click: function(){
            var hdn_id=$("#hdn_idSucursalDel").val();
            activarSucursal(hdn_id);
        }
    });
    $('#modalCambiaSucursal').on('hidden.bs.modal', function () {
        console.log("ho");
        $(".optEditar").show();
    })
    
    
})
function cargaSucursalListado(){
    msgLoading("#profile","Cargando");
    $.ajax({
        type: "POST",
        url: "sucursal/qrySucursal",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Empresa");
        }              
    });
}
function cargaSucursalListadoDel(){
    msgLoading("#standEliminado","Cargando");
    $.ajax({
        type: "POST",
        url: "sucursal/qrySucursalDel",
        cache: false,
        success: function(data) {
            $("#standEliminado").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Empresa");
        }              
    });
}


function panelUpdSucursal(url,id){
    console.log("upd Sucursal");
    $(".bodyUpd").html("cargando...");
    $(".optEditar").hide();
    $("#codSucursal").val(id);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data:{
            json:  id
        },
        cache: false,
        success: function(data) {
            //$("#modalUpdPersona").html(data);
            $(".bodyUpd").html(data);
            $('#modalCambiaSucursal').modal({
                show: true
            });
        },
        error: function() { 
            console.log("error");
        }              
    });
}

function panelDelSucursal(id){
    console.log("del sucursal");
    $('#modalBorraSucursal').modal({
        show: true
    });
    $("#hdn_idSucursalDel").val(id);
}
function panelActiveSucursal(id){
    console.log("del sucursal");
    $('#modalActivaSucursal').modal({
        show: true
    });
    $("#hdn_idSucursalDel").val(id);
}

function eliminarSucursal(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgDel","#btnEliminar");
    $.post('sucursal/eliminarSucursal', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnEliminar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaSucursalListado();
            $("#modalBorraSucursal").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}
function activarSucursal(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgAct","#btnActivar");
    $.post('sucursal/eliminarSucursal', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnActivar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaSucursalListadoDel();
            $("#modalActivaSucursal").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}

