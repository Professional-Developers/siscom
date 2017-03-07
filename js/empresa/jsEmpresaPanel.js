$(function(){
    cargaEmpresaListado();
    $("#tabqry").bind({
        click: function(){
            cargaEmpresaListado();
        }
    });
    $('#modalCambiaEmpresa').on('hidden.bs.modal', function () {
        $(".optEditar").show();
    })
})
function cargaEmpresaListado(){
    msgLoading("#profile","Cargando");
    $.ajax({
        type: "POST",
        url: "empresa/qryEmpresa",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function(ts) { 
            //alert("error");
            //console.log(ts);
            //alert(ts.responseText)
            console.log("error Listado Empresa");
        }              
    });
}


function panelUpdEmpresa(url,idPersona){
    //var pk = $(this).data('pk');
    console.log("upd Empresa");
    $(".bodyUpd").html("cargando...");
    $(".optEditar").hide();
    $("#codEmpresa").val(idPersona);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: "empresa/panel_updEmpresa",
        data:{
            json:  idPersona
        },
        cache: false,
        success: function(data) {
            //$("#modalUpdPersona").html(data);
            //$(".optEditar").attr("disabled", "false");
            $(".optEditar").hide();
            $(".bodyUpd").html(data);
            $('#modalCambiaEmpresa').modal({
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