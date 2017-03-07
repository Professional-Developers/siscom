$(function(){    
    //soloNumeros("#txt_nIdRepisa","keypress");
    //llenaAlmacenxSucursal();
    
    //cargaProductoMiStandListado
    //$("#cboIdHueco").select2();
    /*inicio 2906*/
    
    /*fin 2906*/
    $('#modalPanelPrestar').on('hidden.bs.modal', function () {
        $(".optPrestar").show();
    })
    
    cargaProductoMiStandListado();
    llenaAlmacenxSucursal();

    $("#cboIdSucursal").bind("change", function(event){
        llenaAlmacenxSucursal();
        
    });
    $("#cboIdAlmacen").bind("change", function(event){
        llenaHuecoxAlmacen();
    });
    
    $("#tabqryProductos").bind({
        click: function(){
            cargaProductoMiStandListado();
            /*regresarQry();*/
        }
    });
    $("#tabqryxRecibir").bind({
        click: function(){
            cargaProductoMiStandxRecibirListado();
            /*regresarQry();*/
        }
    });
    $("#tabqryEnviados").bind({
        click: function(){
            cargaProductosMiStanEnviadosListado();
            /*regresarQry();*/
        }
    });
    $("#tabqryPrestados").bind({
        click: function(){
            cargaProductosMiStanPrestadosListado();
            /*regresarQry();*/
        }
    });
    $("#tabqryVendidos").bind({
        click: function(){
            cargaProductosMiStanVendidosListado();
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
    //evtSubirScrollTop();
    $("#qLoverlay").show();
    $("#qLbar").show();
    msgLoading("#qryDerivarProductoIns","Cargando");
    $.ajax({
        type: "POST",
        url: "producto/qryProductoMiStan",
        data:{ idSucursal:idSucursal},
        cache: false,
        success: function(data) {
            //$("#profile").html(data);
            $("#qryDerivarProductoIns").html(data);
            $("#qLoverlay").fadeOut(250);
            $("#qLbar").fadeOut(250);
            //$("#qryDerivarProductoIns").niceScroll();
        },
        error: function(ts) { 
            console.log("error Listado Hueco");
        }              
    });
}
function cargaProductoMiStandxRecibirListado(){
    var idSucursal = $("#idSucursal").val();
    //msgLoading("#profile","Cargando");
    msgLoading("#cont_productosxRecibir","Cargando");
    $.ajax({
        type: "POST",
        url: "producto/qryProductoMiStanxRecibir",
        //url: "producto/qryProductoMiStanEnviados",
        data:{ idSucursal:idSucursal},
        cache: false,
        success: function(data) {
            //$("#profile").html(data);
            $("#cont_productosxRecibir").html(data);
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

function cargaProductosMiStanPrestadosListado(){
    var idSucursal = $("#idSucursal").val();
    msgLoading("#cont_productosPrestados","Cargando");
    $.ajax({
        type: "POST",
        url: "producto/qryProductoMiStanPrestados",
        data:{ idSucursal:idSucursal},
        cache: false,
        success: function(data) {
            $("#cont_productosPrestados").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Mis productos Prestados");
        }              
    });
}
function cargaProductosMiStanVendidosListado(){
    var idSucursal = $("#idSucursal").val();
    console.log("mi sucursal es: "+idSucursal);
    msgLoading("#cont_productosVendidos","Cargando");
    $.ajax({
        type: "POST",
        //url: "producto/qryProductoMiStanPrestados",
        url: "producto/qryProductoMiStanVendidos",
        data:{ idSucursal:idSucursal},
        cache: false,
        success: function(data) {
            $("#cont_productosVendidos").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Mis productos Vendidos");
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


function updRecibirProducto(url,nProductoHueco){
    $("#nProductoHueco").val(nProductoHueco);
    $(".optRecibir").hide();
    var idsuc=$("#idSucursal").val();
    $.ajax({
        type: "POST",
        url: url,
        data:{
            json:  nProductoHueco,
            idsuc:idsuc
        },
        cache: false,
        success: function(data) {
            $(".optRecibir").show();
          if(data!='-1'){
              mensajeExito("Recepcion Exitosa");
              cargaProductoMiStandxRecibirListado();
              console.log("exito");
          }else{
              console.log("error");
          }  
        },
        error: function() { 
            console.log("error");
        }              
    });
}
function panelupdPrestarProducto(url,idProductoHueco){
    console.log("upd prestar");
    var idsuc=$("#idSucursal").val();
    $(".bodyPrestar").html("cargando...");
    $(".optPrestar").hide();
    $("#idProdHueco_prestar").val(idProductoHueco);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data:{
            json:  idProductoHueco,
            idsuc:idsuc
        },
        cache: false,
        success: function(data) {
            $(".optPrestar").hide();
            $(".bodyPrestar").html(data);
            $('#modalPanelPrestar').modal({
                show: true
            });
        },
        error: function() { 
            //alert("error");
            console.log("error");
        }              
    });
}

function updPrestarProducto(url,nProductoHueco){
    $("#nProductoHueco").val(nProductoHueco);
    $(".optPrestar").hide();
    //var idsuc=$("#idSucursal").val();
    $.ajax({
        type: "POST",
        url: url,
        data:{
            json:  nProductoHueco
        },
        cache: false,
        success: function(data) {
            $(".optPrestar").show();
          if(data!='-1'){
              mensajeExito("Prestamo Exitoso");
              cargaProductosMiStanPrestadosListado();
              console.log("exito");
          }else{
              console.log("error");
          }  
        },
        error: function() { 
            console.log("error");
        }              
    });
}
function updRetornarProducto(url,nProdHueDevolver){
    $("#cProdHuecoRet").val(nProdHueDevolver);
    $(".optRetornar").hide();
    /*var idsuc=$("#idSucursal").val();*/
    $.ajax({
        type: "POST",
        url: url,
        data:{
            json:  nProdHueDevolver
            /*,idsuc:idsuc*/
        },
        cache: false,
        success: function(data) {
            console.log(data);
            $(".optRetornar").show();
          if(data!='-1'){
              mensajeExito("Retorno Exitoso");
              cargaProductosMiStanPrestadosListado();
              console.log("exito");
          }else{
              console.log("error ");
          }  
        },
        error: function() { 
            console.log("error");
        }              
    });
}

function panelDetalle(codProdHueco){
    //console.log($("#det-"+codProdHueco).attr('title'));
    //$(this).qtip({              
    $($("#det-"+codProdHueco)).qtip({              
        content: {   
            text : "Cargando...",  
            ajax: {
                url: 'detalleProducto/getProductoDetalle',
                type: 'POST', // POST or GET[/php]
                data: {
                    codProdHueco : codProdHueco
                },
                success: function(data) {
                    this.set('content.text', data);
                    console.log(data);
                    $("#det-"+codProdHueco).attr("title", data);
                }
            }
        },
        style: {
            classes: 'ui-tooltip-light',
            width: 500 
        },
        position: {
            my: 'right bottom center',
            at: 'bottom left center',
            target: $("#det-"+codProdHueco)   
        } ,	
        show: {
            event: 'click',
            ready: true, 
            solo: true 
        },
        hide: 'unfocus'               
    });
}

