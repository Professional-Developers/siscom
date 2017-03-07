$(function(){
    $("#tabqry").bind({
        click: function(){
            cargaPromocionListado();
        }
    });
    $('#modalCambiaPromocion').on('hidden.bs.modal', function () {
        $(".optEditar").show();
    })
    $('#modalAddPromDetalle').on('hidden.bs.modal', function () {
        console.log("ho");
        $(".optPromDetalle").show();
    })
    $("#btnEliminar").bind({
        click: function(){
            var hdn_id=$("#hdn_idPromocionDel").val();
            eliminarPromocion(hdn_id);
        }
    });
})
function panelAddPromDetalle(url,idPro){
    //$(".bodyUpd").html("cargando...");
    $(".bodyAddProm").html("cargando...");
    $(".optPromDetalle").hide();
    $("#codPromocion").val(idPro);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data:{
            json:  idPro
        },
        cache: false,
        success: function(data) {
            $(".optPromDetalle").hide();
            $(".bodyAddProm").html(data);
            $('#modalAddPromDetalle').modal({
                show: true
            });
        },
        error: function() { 
            //alert("error");
            console.log("error");
        }              
    });
}
function cargaPromocionListado(){
    msgLoading("#profile","Cargando");
    $.ajax({
        type: "POST",
        url: "promocion/qryPromocion",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Promocion");
        }              
    });
}


function panelUpdPromocion(url,idAlm){
    console.log("upd Promocion");
    $(".bodyUpd").html("cargando...");
    $(".optEditar").hide();
    $("#codPromocion").val(idAlm);
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
            $('#modalCambiaPromocion').modal({
                show: true
            });
        },
        error: function() { 
            //alert("error");
            console.log("error");
        }              
    });
}

function panelDelPromocion(id){
    console.log("del almacen");
    $('#modalBorraPromocion').modal({
        show: true
    });
    $("#hdn_idPromocionDel").val(id);
}

function eliminarPromocion(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgDel","#btnEliminar");
    $.post('promocion/eliminarPromocion', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnEliminar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaPromocionListado();
            $("#modalBorraPromocion").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}