$(function(){
    qryPadres();
    $("#tabCaracteristica").bind({
        click: function(){
            panelHijosIns();
        }
    });
    $("#tabSubCaracteristica").bind({
        click: function(){
            //panelHijosIns();
            panelSubCaracteristicaIns();
        }
    });
    
    $("#padre_btnCancelar").bind({
        click: function(){
            $("#padre_txt_cMulDescripcion").val("");
        }
    });
    $('#modalCambiaPadre').on('hidden.bs.modal', function () {
        console.log("ho");
        $(".optEditarPadre").show();
    })
    $('#modalCambiaHijo').on('hidden.bs.modal', function () {
        console.log("ho");
        $(".optEditarHijo").show();
    })
        
})
function qryPadres(){
    msgLoading("#padre_gridPadres","Cargando");
    $.ajax({
        type: "POST",
        url: "caracteristicas/qryPadres",
        cache: false,
        success: function(data) {
            $("#padre_gridPadres").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Padres");
        }              
    });
}

function panelHijosIns(){
    msgLoading("#tabCaracteristicaPanel","Cargando");
    $.ajax({
        type: "POST",
        url: "caracteristicas/panelHijosIns",
        cache: false,
        success: function(data) {
            $("#tabCaracteristicaPanel").html(data);
        },
        error: function(ts) { 
            console.log("error Hijos Ins");
        }              
    });
}
function panelSubCaracteristicaIns(){
    msgLoading("#tabSubCaracteristicaPanel","Cargando");
    $.ajax({
        type: "POST",
        //url: "caracteristicas/panelHijosIns",
        url: "caracteristicas/panelSubCaracteristicaIns",
        cache: false,
        success: function(data) {
            $("#tabSubCaracteristicaPanel").html(data);
        },
        error: function(ts) { 
            console.log("error Hijos Ins");
        }              
    });
}


function panelUpdPadre(url,idpadre){
    console.log("upd Padre");
    $(".bodyUpd").html("cargando...");
    $(".optEditarPadre").hide();
    /*$("#codAlmacen").val(idAlm);*/
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data:{
            json:  idpadre
        },
        cache: false,
        success: function(data) {
            $(".optEditarPadre").hide();
            $(".bodyUpd").html(data);
            $('#modalCambiaPadre').modal({
                show: true
            });
        },
        error: function() { 
            console.log("error");
        }              
    });
}
//panelUpdHijo
function panelUpdHijo(url,idhijo){
    console.log("upd Hijo");
    $(".bodyUpdHijo").html("cargando...");
    $(".optEditarHijo").hide();
    /*$("#codAlmacen").val(idAlm);*/
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data:{
            json:  idhijo
        },
        cache: false,
        success: function(data) {
            console.log(data);
            $(".optEditarHijo").hide();
            $(".bodyUpdHijo").html(data);
            $('#modalCambiaHijo').modal({
                show: true
            });
        },
        error: function() { 
            console.log("error");
        }              
    });
}