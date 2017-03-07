$(function(){    
    $("#cboIdModelo").select2();
    //cargaProductoListado();
    /*$("#tabqry").bind({
        click: function(){
            cargaProductoListado();
        }
    });*/
    $("#btnFndProducto").bind({
        click: function(){
            fndProducto();
        }
    });
})
function fndProducto(){
    //msgLoading("#profile","Cargando");
    $("#profile").html("cargando...");
    $.ajax({
        type: "POST",
        url: "fndProducto",
        data:{
            modelo : $("#cboIdModelo").val()
        },
        cache: false,
        success: function(data) {
            $("#profile").html("");
            if(data=="2"){
                mensajeAdvertencia("Falta Ingresar Datos");
            }else{
                $("#profile").html(data);
            }
        },
        error: function(ts) { 
            console.log("error Busqueda Producto");
        }              
    });
}
/*function cargaProductoListado(){
    msgLoading("#profile","Cargando");
    $.ajax({
        type: "POST",
        url: "qryProducto",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Hueco");
        }              
    });
}*/
