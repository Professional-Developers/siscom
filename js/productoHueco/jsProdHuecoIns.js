$(function(){
    /*$('#modalAddCasillero').on('shown.bs.modal', function () {
        $(this).find('.modal-dialog').css({
            width:'auto',
            height:'auto', 
            'max-height':'100%'
        });
    });*/
    
    var dataTable = {
        tabla   : "qry_casillero",
        filas   : 50,
        JQueryUI : true
    };
    paginaDataTableOpcCortas(dataTable);
    
    qryProductoHueco();
    $('#frmProductoCasilleroInsa').validate({
        submitHandler:function(){
            var hdn_idProd      =$("#hdn_idProd").val();
            var txt_nCantidad   =$("#txt_nCantidad").val();
            var radHueco        =$('input:radio[name=radHueco]:checked').val();
            console.log("idprod:"+hdn_idProd+" Cantidad:"+txt_nCantidad+" radHueco:"+radHueco);
            if(radHueco=="" || radHueco==0 || radHueco===undefined){
                mensajeAdvertencia("Seleccionar Casillero");
            }else{
                msgLoadSave("#msjProdCasillero","#btnRegistrarProdCasillero");
                $.ajax({
                    //url:'detalleProducto/detalleProductoIns',
                    url:'productoHueco/productoHuecoIns',
                    type:'post',
                    data:{
                        hdn_idProd:  hdn_idProd,
                        txt_nCantidad:txt_nCantidad,
                        radHueco:radHueco
                    },
                    cache:false,
                    success:function(data){
                        console.log(data);
                        msgLoadSaveRemove("#btnRegistrarProdCasillero");
                        //cleanForm("#frmProductoCasilleroInsa");
                        if (data=="1") {
                            mensajeExito("Ingreso Producto-Casillero exitoso");
                            qryProductoHueco();
                        } else if(data=="2"){
                            mensajeAdvertencia("Ya se encuentra en el listado");
                        }
                        else{
                            console.log("Error ingresando Producto-Casillero");
                        }
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
                            
            }
        },
        rules:{
            txt_nCantidad:{
                required:true
            },
            radHueco:{
                required:true
            }
        },
        messages: {
            txt_nCantidad: {
                required    : "Ingrese Cantidad"
            },
            radHueco:{
                required:"Seleccione"
            }
        }
    // ,debug: true
    
    });
    
});
function qryProductoHueco(){
    msgLoading("#qry_Producto_Casillero","Cargando");
    $.ajax({
        type: "POST",
        //url: "producto/qryProducto",
        url: "productoHueco/qryProductoHueco",
        data:{hdn_idProd:$("#hdn_idProd").val()},
        cache: false,
        success: function(data) {
            $("#qry_Producto_Casillero").html(data);
        },
        error: function(ts) { 
            console.log("error Listado Productos Asignados Casilleros");
        }              
    });
}