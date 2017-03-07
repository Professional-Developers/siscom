$(function(){
    $("#tabqry").bind({
        click: function(){
            cargaAlmacenListado();
        }
    });
    $("#tabqryDel").bind({
        click: function(){
            cargaAlmacenListadoDel();
        }
    });
    $('#modalCambiaAlmacen').on('hidden.bs.modal', function () {
        $(".optEditar").show();
    })
    $("#btnEliminar").bind({
        click: function(){
            var hdn_id=$("#hdn_idAlmacenDel").val();
            eliminarAlmacen(hdn_id);
        }
    });
    $("#btnActivar").bind({
        click: function(){
            var hdn_id=$("#hdn_idAlmacenDel").val();
            activarAlmacen(hdn_id);
        }
    });
})
function cargaAlmacenListado(){
    msgLoading("#profile","Cargando");
    $.ajax({
        type: "POST",
        url: "almacen/qryAlmacen",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Almacen");
        }              
    });
}
function cargaAlmacenListadoDel(){
    msgLoading("#almacenEliminado","Cargando");
    $.ajax({
        type: "POST",
        url: "almacen/qryAlmacenDel",
        cache: false,
        success: function(data) {
            $("#almacenEliminado").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Almacen");
        }              
    });
}


function panelUpdAlmacen(url,idAlm){
    console.log("upd Almacen");
    $(".bodyUpd").html("cargando...");
    $(".optEditar").hide();
    $("#codAlmacen").val(idAlm);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data:{
            json:  idAlm
        },
        cache: false,
        success: function(data) {
            $(".optEditar").hide();
            $(".bodyUpd").html(data);
            $('#modalCambiaAlmacen').modal({
                show: true
            });
        },
        error: function() { 
            //alert("error");
            console.log("error");
        }              
    });
}

function panelDelAlmacen(id){
    console.log("del almacen");
    $('#modalBorraAlmacen').modal({
        show: true
    });
    $("#hdn_idAlmacenDel").val(id);
}
function panelActiveAlmacen(id){
    console.log("active almacen");
    $('#modalActivaAlmacen').modal({
        show: true
    });
    $("#hdn_idAlmacenDel").val(id);
}

function eliminarAlmacen(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgDel","#btnEliminar");
    $.post('almacen/eliminarAlmacen', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnEliminar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaAlmacenListado();
            $("#modalBorraAlmacen").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}
function activarAlmacen(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgAct","#btnActivar");
    $.post('almacen/eliminarAlmacen', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnActivar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaAlmacenListadoDel();
            $("#modalActivaAlmacen").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}