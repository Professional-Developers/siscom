$(function() {
    //soloNumeros("#txt_nIdRepisa","keypress");
    //llenaAlmacenxSucursal();
    llenaAlmacenxSucursal();

    $("#cboIdSucursal").bind("change", function(event) {
        llenaAlmacenxSucursal();
    });
    $("#cboIdAlmacen").bind("change", function(event) {
        llenaHuecoxAlmacen();
    });
    $("#btnCancelar").bind("click", function(event) {
        //alert("hola");
        $('#frmProductoInsa').trigger("reset");
    });
    
    
    $("#tabqry").bind({
        click: function() {
            cargaProductoListado();
            console.log("hi");
            //regresarQry();
        }
    });
    $("#tabqryDel").bind({
        click: function() {
            cargaProductoListadoDel();
            console.log("hi");
            //regresarQry();
        }
    });
    /*Eliminar */
    $("#btnEliminar").bind({
        click: function() {
            var hdn_id = $("#hdn_idProductoDel").val();
            eliminarProducto(hdn_id);
        }
    });
    function eliminarProducto(ncodigo) {
        var rdn = Math.random() * 11;
        msgLoadSave("#msgDel", "#btnEliminar");
        $.post('producto/eliminarProducto', {
            rdn: rdn,
            ncodigo: ncodigo
        }, function(data) {
            msgLoadSaveRemove("#btnEliminar");
            if (data == "1") {
                mensaje("Se actualizo correctamente", 'e');
                cargaProductoListado();
                $("#modalBorraProducto").modal("hide");
            } else {
                //alert("Error");
                console.log("Error");
            }
        });
    }
    /*fin eliminar*/
    /*inicio activar*/
    $("#btnActivar").bind({
        click: function() {
            var hdn_id = $("#hdn_idProductoAct").val();
            activarProducto(hdn_id);
        }
    });
    function activarProducto(ncodigo) {
        var rdn = Math.random() * 11;
        msgLoadSave("#msgAct", "#btnActivar");
        $.post('producto/eliminarProducto', {
            rdn: rdn,
            ncodigo: ncodigo
        }, function(data) {
            msgLoadSaveRemove("#btnActivar");
            if (data == "1") {
                mensaje("Se actualizo correctamente", 'e');
                cargaProductoListadoDel();
                $("#modalActivaProducto").modal("hide");
            } else {
                //alert("Error");
                console.log("Error");
            }
        });
    }
    /*fin activar*/
    
    $('#modalAddCaracteristica').on('hidden.bs.modal', function() {
        console.log("ho");
        $(".optCaracteristicas").show();
    })
    $('#modalAddPromocion').on('hidden.bs.modal', function() {
        console.log("ho");
        $(".optPromocion").show();
    })
    $('#modalAddCasillero').on('hidden.bs.modal', function() {
        console.log("ho");
        $(".optCasillero").show();
    })
    $('#modalCambiaProducto').on('hidden.bs.modal', function() {
        console.log("ho");
        $(".optEditarProducto").show();
    })

})
function cargaProductoListado() {
    msgLoading("#profile", "Cargando");
    $.ajax({
        type: "POST",
        url: "producto/qryProducto",
        cache: false,
        success: function(data) {
            $("#profile").html(data);
        },
        error: function(ts) {
            console.log("error Listado Hueco");
        }
    });
}
function cargaProductoListadoDel() {
    msgLoading("#productoEliminado", "Cargando");
    $.ajax({
        type: "POST",
        url: "producto/qryProductoDel",
        cache: false,
        success: function(data) {
            $("#productoEliminado").html(data);
        },
        error: function(ts) {
            console.log("error Listado Hueco");
        }
    });
}
function panelDelProducto(id) {
    console.log("del producto");
    $('#modalBorraProducto').modal({
        show: true
    });
    $("#hdn_idProductoDel").val(id);
}
function panelActiveProducto(id) {
    console.log("active producto");
    $('#modalActivaProducto').modal({
        show: true
    });
    $("#hdn_idProductoAct").val(id);
}

function panelAddCaracteristica(url, idPro) {
    //$(".bodyUpd").html("cargando...");
    $(".bodyAddChar").html("cargando...");
    $(".optCaracteristicas").hide();
    $("#codHueco").val(idPro);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data: {
            json: idPro
        },
        cache: false,
        success: function(data) {
            $(".optCaracteristicas").hide();
            $(".bodyAddChar").html(data);
            $('#modalAddCaracteristica').modal({
                show: true
            });
        },
        error: function() {
            //alert("error");
            console.log("error");
        }
    });
}
function panelAddPromocion(url, idPro) {
    //$(".bodyUpd").html("cargando...");
    $(".bodyAddProm").html("cargando...");
    $(".optPromocion").hide();
    $("#codHueco").val(idPro);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data: {
            json: idPro
        },
        cache: false,
        success: function(data) {
            $(".optPromocion").hide();
            $(".bodyAddProm").html(data);
            $('#modalAddPromocion').modal({
                show: true
            });
        },
        error: function() {
            //alert("error");
            console.log("error");
        }
    });
}

function panelAddCasillero(url, idPro) {
    //$(".bodyAddChar").html("cargando...");
    $("#profile").hide();
    $("#profile").removeClass("active in");
    msgLoading("#div_regresar", "Cargando");
    $.ajax({
        type: "POST",
        url: url,
        data: {
            json: idPro
        },
        cache: false,
        success: function(data) {
            $(".optCasillero").hide();
            $("#div_regresar").html(data);
        },
        error: function() {
            console.log("error");
        }
    });
    //$("#div_regresar").html("<a href='javascript:void(0);' onclick='regresarQry();' style='float:right'>Regresar</p>");
    $("#profile2").addClass("active in");
    $("#profile2").show();
}
function regresarQry() {
    $("#profile2").hide();
    $("#profile2").removeClass("active in");
    $("#profile").addClass("active in");
    $("#profile").show();
    $(".optCasillero").show();
}

function llenaAlmacenxSucursal() {
    var suc = $("#cboIdSucursal").val();
    console.log("suc: " + suc);
    //$("#cboIdAlmacen").html("cargando...");
    $("#cboIdAlmacen option:selected").text("CARGANDO...");
    //$(".modSucursal div span").html("cargando...");
    $.uniform.update("#cboIdAlmacen");
    $.ajax({
        type: "POST",
        url: "almacen/qryAlmacenSucursal",
        data: {
            idsuc: suc
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
function llenaHuecoxAlmacen() {
    var alm = $("#cboIdAlmacen").val();
    console.log("alm: " + alm);
    $("#cboIdHueco option:selected").text("CARGANDO...");
    //$("#cboIdHueco").text("cargando...");
    //$("#cboIdHueco").val("cargando...");
    //$("#cboIdHueco").html("cargando...");
    $.uniform.update("#cboIdHueco");
    $.ajax({
        type: "POST",
        url: "hueco/qryHuecoAlmacen",
        data: {
            idalm: alm
        },
        cache: false,
        success: function(data) {
            $("#cboIdHueco").html(data);
            $.uniform.update("#cboIdHueco");
            $("#cboIdHueco").select2({ width: 'resolve' });      
        },
        error: function(ts) {
            console.log("error Llena hueco por almacen");
        }
    });
}

/*function panelDetalle(codProdHueco) {
    //console.log($("#det-"+codProdHueco).attr('title'));
    //$(this).qtip({              
    //alert("hi");
    $($("#det-" + codProdHueco)).qtip({
        content: {
            text: "Cargando...",
            ajax: {
                url: 'detalleProducto/getProductoDetalle',
                type: 'POST', // POST or GET[/php]
                data: {
                    codProdHueco: codProdHueco
                },
                success: function(data) {
                    this.set('content.text', data);
                    console.log(data);
                    $("#det-" + codProdHueco).attr("title", data);
                }
            }
        },
        style: {
            classes: 'ui-tooltip-light',
            width: 500
        },
        position: {
            //my: 'right bottom center',
            my: 'top rigth',
            //at: 'bottom left center',
            at: 'bottom rigth center',
            target: $("#det-" + codProdHueco)
        },
        show: {
            event: 'click',
            ready: true,
            solo: true
        },
        hide: 'unfocus'
    });
}*/
function panelUpdProducto(url, idPro) {
    //$(".bodyUpd").html("cargando...");
    $(".bodyUpdProducto").html("cargando...");
    $(".optEditarProducto").hide();
    //$("#codHueco").val(idPro);
    $.ajax({
        type: "POST",
        //url: "persona/panel_updPersona",
        url: url,
        data: {
            json: idPro
        },
        cache: false,
        success: function(data) {
            $(".optEditarProducto").hide();
            $(".bodyUpdProducto").html(data);
            $('#modalCambiaProducto').modal({
                show: true
            });
        },
        error: function() {
            //alert("error");
            console.log("error");
        }
    });
}