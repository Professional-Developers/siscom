$(function(){
    $("#upd_cboIdModelo").select2();
    //$("#upd_cboIdHueco").select2();
    soloNumeros("#upd_txt_nProPrecioReferencial","keypress");
    llenaAlmacenxSucursal_upd();

    $("#upd_cboIdSucursal").bind("change", function(event){
        llenaAlmacenxSucursal_upd();        
    });
    $("#upd_cboIdAlmacen").bind("change", function(event){
        llenaHuecoxAlmacen_upd();
    });
    $("#upd_btnCancelar").bind("click", function(event){
        $("#modalCambiaProducto").modal("hide");
        $(".optEditarProducto").show();
    });
    
    
    $('#frmProductoUpda').validate({
        submitHandler:function(){
            // alert("DFSDF");
            //console.log($("#cboIdHueco").val());
            //console.log($("#cboIdHueco").select2("val"));
            if($("#upd_cboIdHueco").val()=='' || $("#upd_cboIdModelo").val()==''){
                console.log("vacion");
                //console.log("hueco"+$("#cboIdHueco").val());
                //console.log("modelo"+$("#cboIdModelo").val());
                mensajeAdvertencia("Falta Seleccionar");
            }else{
                msgLoadSave("#upd_message","#upd_btnActualizar");
                $.ajax({
                    //url:'producto/productoIns',
                    url:'producto/productoUpd',
                    type:'post',
                    data:$("#frmProductoUpda").serialize(),//me captura todos los datos del formulario
                    cache:false,
                    success:function(data){
                        console.log(data);
                        msgLoadSaveRemove("#upd_btnActualizar");
                        if(data.trim()=="r"){
                            mensajeAdvertencia("Falta Seleccionar");
                        }else if(data.trim()=="-1"){
                            mensajeAdvertencia("advertencia,comuniquese con el administrador");
                        }else if(data.trim()=='1'){
                            mensajeExito("Actualizacion del Producto exitoso");
                            cargaProductoListado();
                            $('#modalCambiaProducto').modal('hide');
                            /*qryProductoIns(data);*/
                        }else{
                            mensajeAdvertencia("advertencia,comuniquese con el administrador");
                        }
                    },
                    error:function(error){
                        //alert(error);
                        console.log(error);
                    }
                });
            }
        },
        rules:{
            upd_txt_cProDescripcion:{
                required:true,
                minlength   : 1
            },
            upd_cboIdModelo:{
                required:true,
                minlength   : 1
            },
            upd_cboIdCategoria:{
                required:true
            },
            upd_txt_nProPrecioReferencial:{
                required:true,
                minlength   : 1
            },
            upd_cboIdSucursal:{
                required:true
            },
            upd_cboIdAlmacen:{
                required:true
            },
            upd_cboIdHueco:{
                required:true
            }
        },
        messages: {
            upd_txt_cProDescripcion: {
                required    : "Ingrese Descripcion.",
                minlength   : "Minimo {0} caracteres."
            },
            upd_cboIdModelo: {
                required    : "Ingrese Modelo."
            },
            upd_cboIdCategoria: {
                required    : "Ingrese Categoria."
            },
            upd_txt_nProPrecioReferencial: {
                required    : "Ingrese Precio.",
                minlength   : "Minimo {0} caracteres."
            },
            upd_cboIdSucursal:{
                required    : "Ingrese Precio."
            },
            upd_cboIdAlmacen:{
                required    : "Ingrese Almacen."
            },
            upd_cboIdHueco:{
                required    : "Seleccione Hueco"
            }
        }
        // ,debug: true
    });
});

function llenaAlmacenxSucursal_upd(){
    var suc = $("#upd_cboIdSucursal").val();
    console.log("suc: "+suc);
    //$("#upd_cboIdAlmacen").html("cargando...");
    
    var option = $('<option></option>').attr("value", "option value").text("Cargando..");
    $("#upd_cboIdAlmacen").empty().append(option);
    
    var idseleccion = $("#upd_txt_nAlmId").val();
    $.uniform.update("#upd_cboIdAlmacen");
    $.ajax({
        type: "POST",
        url: "almacen/qryAlmacenSucursalUpd",
        data:{
            idsuc:suc,
            idseleccion:idseleccion
        },
        cache: false,
        success: function(data) {
            $("#upd_cboIdAlmacen").html(data);
            $.uniform.update("#upd_cboIdAlmacen");
            llenaHuecoxAlmacen_upd();
        },
        error: function(ts) { 
            console.log("error Llena almacen por sucursal");
        }              
    });
}
function llenaHuecoxAlmacen_upd(){
    var alm = $("#upd_cboIdAlmacen").val();
    console.log("alm: "+alm);
    //$("#upd_cboIdHueco").html("cargando...");
    /*var option = $('<option></option>').attr("value", "option value").text("Cargando..");
    $("#upd_cboIdHueco").empty().append(option);*/
    //$("#upd_cboIdHueco option:selected").text("CARGANDO...");
    $("#upd_cboIdHueco").html("<option>CARGANDO...</option>");
    $.uniform.update("#upd_cboIdHueco");
    
    var idseleccion = $("#upd_txt_nAlmId").val();
    $.ajax({
        type: "POST",
        url: "hueco/qryHuecoAlmacenUpd",
        data:{
            idalm:alm,
            idseleccion:idseleccion
        },
        cache: false,
        success: function(data) {
            $("#upd_cboIdHueco").html(data);
            $.uniform.update("#upd_cboIdHueco");
            $("#upd_cboIdHueco").select2({ width: 'resolve' });  
        },
        error: function(ts) { 
            console.log("error Llena hueco por almacen");
        }              
    });
}