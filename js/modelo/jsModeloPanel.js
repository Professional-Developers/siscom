$(function(){
    $("#tabqry").bind({
        click: function(){
            cargaModeloListado();
        }
    });
    $('#modalCambiaModelo').on('hidden.bs.modal', function () {
        $(".optEditar").show();
    })
    $("#btnEliminar").bind({
        click: function(){
            var hdn_id=$("#hdn_idModeloDel").val();
            eliminarModelo(hdn_id);
        }
    });
})
function cargaModeloListado(){
    msgLoading("#profile","Cargando");
    $.ajax({
        type: "POST",
        url: "modelo/qryModelo",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Modelo");
        }              
    });
}


function panelUpdModelo(url,idAlm){
    console.log("upd Modelo");
    $(".bodyUpd").html("cargando...");
    $(".optEditar").hide();
    $("#codModelo").val(idAlm);
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
            $('#modalCambiaModelo').modal({
                show: true
            });
        },
        error: function() { 
            //alert("error");
            console.log("error");
        }              
    });
}

function panelDelModelo(id){
    console.log("del modelo");
    $('#modalBorraModelo').modal({
        show: true
    });
    $("#hdn_idModeloDel").val(id);
}

function eliminarModelo(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgDel","#btnEliminar");
    $.post('modelo/eliminarModelo', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnEliminar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaModeloListado();
            $("#modalBorraModelo").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}