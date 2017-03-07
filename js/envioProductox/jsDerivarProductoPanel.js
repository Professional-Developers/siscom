$(function(){    
    //soloNumeros("#txt_nIdRepisa","keypress");
    //llenaAlmacenxSucursal();
    
    //cargaProductoMiStandListado
    //$("#cboIdHueco").select2();
    
    //cargaProductoMiStandListado();
    
    llenaAlmacenxSucursal();

    $("#cboIdSucursal").bind("change", function(event){
        llenaAlmacenxSucursal();
        
    });
    $("#cboIdAlmacen").bind("change", function(event){
        llenaHuecoxAlmacen();
    });
    
    $("#tabqry").bind({
        click: function(){
            cargaProductoMiStandListado();
            /*regresarQry();*/
        }
    });
    $("#tabqryEnviados").bind({
        click: function(){
            cargaProductosMiStanEnviadosListado();
            /*regresarQry();*/
        }
    });
    $("#btnEliminar").bind({
        click: function(){
            var hdn_id=$("#hdn_idHuecoDel").val();
            eliminarHueco(hdn_id);
        }
    });
    
    
})
function cargaProductoMiStandListado(){
    var idSucursal = $("#idSucursal").val();
    //msgLoading("#profile","Cargando");
    msgLoading("#qryDerivarProductoIns","Cargando");
    $.ajax({
        type: "POST",
        url: "producto/qryProductoMiStan",
        data:{ idSucursal:idSucursal},
        cache: false,
        success: function(data) {
            $("#qryDerivarProductoIns").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Hueco");
        }              
    });
}
function cargaProductosMiStanEnviadosListado(){
    var idSucursal = $("#idSucursal").val();
    msgLoading("#cont_productosEnvidados","Cargando");
    $.ajax({
        type: "POST",
        url: "producto/qryProductoMiStanEnviados",
        data:{ idSucursal:idSucursal},
        cache: false,
        success: function(data) {
            $("#cont_productosEnvidados").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Mis productos Enviados");
        }              
    });
}

/*function regresarQry(){
    $("#profile2").hide();
    $("#profile2").removeClass("active in");
    $("#profile").addClass("active in");
    $("#profile").show(); 
    $(".optCasillero").show();
}*/

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
            llenaHuecoxAlmacen();
        },
        error: function(ts) { 
            console.log("error Llena almacen por sucursal");
        }              
    });
}
function llenaHuecoxAlmacen(){
    var alm = $("#cboIdAlmacen").val();
    console.log("alm: "+alm);
    $("#cboIdHueco").html("cargando...");
    $("#cboIdHueco").hide();
    $.uniform.update("#cboIdHueco");
    $.ajax({
        type: "POST",
        url: "hueco/qryHuecoAlmacen",
        data:{
            idalm:alm
        },
        cache: false,
        success: function(data) {
            $("#cboIdHueco").html(data);
            $.uniform.update("#cboIdHueco");
            $("#cboIdHueco").select2();
            $("#cboIdHueco").show();
        },
        error: function(ts) { 
            console.log("error Llena hueco por almacen");
        }              
    });
}
