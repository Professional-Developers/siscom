$(function(){
    $("#tabqry").bind({
        click: function(){
            cargaPersonaListado();
        }
    });
    $('#modalCambiaPersona').on('hidden.bs.modal', function () {
        $(".optEditar").show();
    })
    $("#btnEliminar").bind({
        click: function(){
            var hdn_id=$("#hdn_idPersonaDel").val();
            eliminarPersona(hdn_id);
        }
    });
})
function cargaPersonaListado(){
    msgLoading("#profile","Cargando");
    $.ajax({
        type: "POST",
        url: "persona/qryPersona",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function() { 
            alert("error");
        }              
    });
}

function eliminarPersona(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgDel","#btnEliminar");
    $.post('persona/eliminarPersona', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnEliminar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaPersonaListado();
            $("#modalBorraPersona").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}

function panelUpdPersona(url,idPersona){
    //var pk = $(this).data('pk');
    console.log("upd Persona");
    $(".optEditar").hide();
    $("#codPersona").val(idPersona);
    $.ajax({
        type: "POST",
        url: "persona/panel_updPersona",
        data:{
            json:  idPersona
        },
        cache: false,
        success: function(data) {
            //$("#modalUpdPersona").html(data);
            $(".bodyUpd").html(data);
            $('#modalCambiaPersona').modal({
                show: true
            });
        //$("#modalCambiaPersona").modal("show");
        },
        error: function() { 
            //alert("error");
            console.log("error");
        }              
    });
}
function panelDelPersona(idPersona){
    console.log("del persona");
    $('#modalBorraPersona').modal({
        show: true
    });
    $("#hdn_idPersonaDel").val(idPersona);
}