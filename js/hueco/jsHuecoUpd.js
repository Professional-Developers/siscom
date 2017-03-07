$(function(){
    //llenaAlmacenxSucursalUpd();
    llenaAlmacenxId();
    $("#btnCancelarAlm").bind({
        click:function(evt){
            evt.preventDefault();
            $("#modalCambiaAlmacen").modal("hide");
            $(".optEditar").show();
        }
    })
    /*Combos*/
    $("#upd_cboIdSucursal").bind("change", function(event){
        llenaAlmacenxSucursalUpd();
    });
    $('#frmHuecoUpd').validate({
        submitHandler:function(){
            // alert("DFSDF");
            msgLoadSave("#messageUpd","#btnActualizarHue");
            $.ajax({
                url:'hueco/updHueco',
                type:'post',
                data:$("#frmHuecoUpd").serialize(),
                cache:false,
                success:function(data){
                    console.log(data);
                    msgLoadSaveRemove("#btnActualizarHue");
                    if (data==1) {
                        mensajeExito("Actualizacion correcto",'e');
                        cargaHuecoListado();
                        cargaHuecoListadoDel();
                        $('#modalCambiaHueco').modal('hide');
                    } else{
                        console.log("Error Actualizar Hueco");
                    }       
                },
                error:function(error){
                    //alert(error);
                    console.log("error actualizar hueco");
                }
            });
        },
        rules:{
            upd_txt_cAlmNombre:{
                required:true,
                minlength   : 4
            }
        },
        messages: {
            upd_txt_cAlmNombre: {
                required    : "Ingrese el Nombre de Almacen.",
                minlength   : "Minimo {0} caracteres."
            }
        }
    // ,debug: true
    });
});
function llenaAlmacenxSucursalUpd(){
    var suc = $("#upd_cboIdSucursal").val();
    console.log("suc: "+suc);
    $("#upd_cboIdAlmacen").html("cargando...");
    //$(".modSucursal div span").html("cargando...");
    $.uniform.update("#upd_cboIdAlmacen");
    $.ajax({
        type: "POST",
        url: "almacen/qryAlmacenSucursal",
        data:{
            idsuc:suc
        },
        cache: false,
        success: function(data) {
            $("#upd_cboIdAlmacen").html(data);
            $.uniform.update("#upd_cboIdAlmacen");
        },
        error: function(ts) { 
            console.log("error Llena almacen por sucursal");
        }              
    });
}
function llenaAlmacenxId(){
    var idAlm = $("#hdnidAlmacen_upd").val();
    console.log("idAlm: "+idAlm);
    $("#upd_cboIdAlmacen").html("cargando...");
    //$(".modSucursal div span").html("cargando...");
    $.uniform.update("#upd_cboIdAlmacen");
    $.ajax({
        type: "POST",
        url: "almacen/qryAlmacenId",
        data:{
            idAlm:idAlm
        },
        cache: false,
        success: function(data) {
            $("#upd_cboIdAlmacen").html(data);
            $.uniform.update("#upd_cboIdAlmacen");
        },
        error: function(ts) { 
            console.log("error Llena almacen por id");
        }              
    });
}