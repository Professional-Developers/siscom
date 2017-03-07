$(function(){    
    //soloNumeros("#txt_nIdRepisa","keypress");
    llenaAlmacenxSucursal();
    $("#tabqry").bind({
        click: function(){
            cargaHuecoListado();
        }
    });
    $("#tabqryDel").bind({
        click: function(){
            cargaHuecoListadoDel();
        }
    });
    $("#btnEliminar").bind({
        click: function(){
            var hdn_id=$("#hdn_idHuecoDel").val();
            eliminarHueco(hdn_id);
        }
    });
    $("#btnActivar").bind({
        click: function(){
            var hdn_id=$("#hdn_idHuecoDel").val();
            activarHueco(hdn_id);
        }
    });
    
    $('#modalCambiaHueco').on('hidden.bs.modal', function () {
        console.log("ho");
        $(".optEditar").show();
    })
    /*Combos*/
    $("#cboIdSucursal").bind("change", function(event){
        llenaAlmacenxSucursal();
    });
    
})
function cargaHuecoListado(){
    msgLoading("#profile","Cargando");
    $.ajax({
        type: "POST",
        url: "hueco/qryHueco",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Hueco");
        }              
    });
}
function cargaHuecoListadoDel(){
    msgLoading("#huecoEliminado","Cargando");
    $.ajax({
        type: "POST",
        url: "hueco/qryHuecoDel",
        cache: false,
        success: function(data) {
            $("#huecoEliminado").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Hueco");
        }              
    });
}

function llenaAlmacenxSucursal(){
    var suc = $("#cboIdSucursal").val();
    console.log("suc: "+suc);
    $("#cboIdAlmacen").html("cargando...");
    //$(".modSucursal div span").html("cargando...");
    $.uniform.update("#cboIdAlmacen");
    $.ajax({
        type: "POST",
        url: "almacen/qryAlmacenSucursal",
        data:{
            idsuc:suc
        },
        cache: false,
        success: function(data) {
            $("#cboIdAlmacen").html(data);
            $.uniform.update("#cboIdAlmacen");
        },
        error: function(ts) { 
            console.log("error Llena almacen por sucursal");
        }              
    });
}
function panelDelHueco(id){
    console.log("del hueco");
    $('#modalBorraHueco').modal({
        show: true
    });
    $("#hdn_idHuecoDel").val(id);
}
function panelActiveHueco(id){
    console.log("del hueco");
    $('#modalActivaHueco').modal({
        show: true
    });
    $("#hdn_idHuecoDel").val(id);
}




function eliminarHueco(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgDel","#btnEliminar");
    $.post('hueco/eliminarHueco', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnEliminar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaHuecoListado();
            $("#modalBorraHueco").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}
function activarHueco(ncodigo){
    var rdn=Math.random()*11;
    msgLoadSave("#msgAct","#btnActivar");
    $.post('hueco/eliminarHueco', {
        rdn:rdn,
        ncodigo:ncodigo
    }, function(data){
        msgLoadSaveRemove("#btnActivar");
        if (data=="1"){
            mensaje("Se actualizo correctamente",'e');
            cargaHuecoListadoDel();
            $("#modalActivaHueco").modal("hide");
        }else{
            //alert("Error");
            console.log("Error");
        }
    });
}














function panelUpdHueco(url,idHue){
    console.log("upd Hueco");
    $(".bodyUpd").html("cargando...");
    $(".optEditar").hide();
    $("#codHueco").val(idHue);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data:{
            json:  idHue
        },
        cache: false,
        success: function(data) {
            $(".optEditar").hide();
            $(".bodyUpd").html(data);
            $('#modalCambiaHueco').modal({
                show: true
            });
        },
        error: function() { 
            //alert("error");
            console.log("error");
        }              
    });
}
