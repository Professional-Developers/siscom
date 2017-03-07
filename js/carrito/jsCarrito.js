/*$(document).ready(function(){
 
 $("#txt_idCliente").keypress(function(e) {
 e.preventDefault();
 //$("#loescrito").html(e.which + ": " + String.fromCharCode(e.which))
 console.log("hola");
 console.log(String.fromCharCode(e.which));
 $("#lbl_idCliente").html(String.fromCharCode(e.which))
 });
 })*/
$(function() {
    soloNumeros(".upd_cantidad", "keypress");
    cargaCarrito();
    //alert("hola");
    soloNumeros("#txt_idCliente", "keypress");
    $("body").on("click", ".actualizar_item", function(e) {
        e.preventDefault();
        var id_producto = $(this).data("idprod");
        //var cantidad = $("#update_cantidad_" + id_producto).val();
        var cantidad= $("#update_cantidad_"+ id_producto).text();
        var precio = $("#update_precio_" + id_producto).val();
        var dscto = $("#update_porcentaje_"+ id_producto).text();
        //window.location.href = url_base + "principal/update/" + id_producto + "/" + cantidad;
        msgLoading("#qry_nuevo","...Cargando");
        $.ajax({
            type: "POST",
            ////url: URL_MAIN + "producto/updItemPrecioCarrito/" + id_producto + "/" + cantidad,
            //url: URL_MAIN + "producto/updItemPrecioCarrito/" + id_producto + "/" + precio,
            url: URL_MAIN + "producto/updItemPrecioCarrito/" + id_producto + "/" + precio+"/"+cantidad+"/"+dscto,
            data: {
            },
            cache: false,
            success: function(data) {
                cargaCarrito();
            },
            error: function() {
                console.log("error");
            }
        });
        //window.location.href = URL_MAIN + "producto/update/" + id_producto + "/" + cantidad;
    });
    $("body").on("click", ".delete_item", function(e) {
        e.preventDefault();
        var id_producto = $(this).data("idproddel");
        console.log("error");
        msgLoading("#qry_nuevo","...Cargando");
        //var cantidad = $("#update_cantidad_" + id_producto).val();
        //window.location.href = url_base + "principal/update/" + id_producto + "/" + cantidad;
        $.ajax({
            type: "POST",
            url: URL_MAIN + "producto/deleteItemCarrito/" + id_producto,
            data: {
            },
            cache: false,
            success: function(data) {
                cargaCarrito();
            },
            error: function() {
                console.log("error");
            }
        });
        //window.location.href = URL_MAIN + "producto/update/" + id_producto + "/" + cantidad;
    });
    $("body").on("click", "#btn_vender", function(e) {
        e.preventDefault();
        //var id_producto = $(this).data("idproddel");
        console.log("vendeer");
        var Cliente=$("#txt_idCliente").val();
        evtScrollTop();
        $("#qLoverlay").show();
        $("#qLbar").show();
        msgLoadSave("#msg_vender","#btn_vender");
        $.ajax({
            type: "POST",
            url: URL_MAIN + "producto/completar_pedido",
            data: {
                Cliente:Cliente
            },
            cache: false,
            success: function(data) {
                cargaCarrito();
                msgLoadSaveRemove("#btn_vender");
                cargaProductoMiStandListado();
                $("#qLoverlay").fadeOut(250);
                $("#qLbar").fadeOut(250);
                mensajeExito("Venta Realizada con Exito");
            },
            error: function() {
                console.log("error");
            }
        });
        //window.location.href = URL_MAIN + "producto/update/" + id_producto + "/" + cantidad;
    });
    
})

/*2906*/
function panelupdVenderProducto(url, jsonProducto) {
    console.log("opc vender");
    //var idsuc=$("#idSucursal").val();
    //$(".bodyPrestar").html("cargando...");

    $(".optVender").hide();
    msgLoading("#qry_nuevo","...Cargando");
    evtScrollTop();
    $("#qLoverlay").show();
    $("#qLbar").show();
    
    ///$("#idProdHueco_prestar").val(idProductoHueco);
    $.ajax({
        type: "POST",
        //url: url,
        url: URL_MAIN + url,
        data: {
            json: jsonProducto
                    //,idsuc:idsuc
        },
        cache: false,
        success: function(data) {
            $(".optVender").show();
            $("#qry_nuevo").html(data);
            $("#qLoverlay").fadeOut(250);
            $("#qLbar").fadeOut(250);
            evtScrollBot();
            //$(".bodyPrestar").html(data);
            /*$('#modalPanelPrestar').modal({
             show: true
             });*/
        },
        error: function() {
            //alert("error");
            console.log("error");
        }
    });
}
function cargaCarrito() {
    //$("#qry_nuevo").html("cargando");
    //document.getElementById('ubicate_fin_pagina').scrollIntoView(true);
    //evtScrollTop();
    $("#qLoverlay").show();
    $("#qLbar").show();
    msgLoading("#qry_nuevo","...Cargando");
    $.ajax({
        type: "POST",
        url: URL_MAIN + "producto/carrito",
        data: {
            //json:  jsonProducto
            //,idsuc:idsuc
        },
        cache: false,
        success: function(data) {
            //evtScrollBot();
            $("#qry_nuevo").html(data);
            $("#qLoverlay").fadeOut(250);
            $("#qLbar").fadeOut(250);
            //document.getElementById('ubicate_fin_pagina').scrollIntoView(true);
        },
        error: function() {
            console.log("error");
        }
    });
}


function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function copyText(theField) {
    var selectedText = document.selection;
    if (selectedText.type == 'Text') {
        var newRange = selectedText.createRange();
        theField.focus();
        theField.value = newRange.text;
    } else {
        alert('Selecciona el texto y luego presiona este botón');
    }
}
//Función que permite solo Números

function IsNumber(evt) {
// Backspace = 8, Enter = 13, ’0′ = 48, ’9′ = 57, ‘.’ = 46
    var nav4 = window.Event ? true : false;
    var key = nav4 ? evt.which : evt.keyCode;
    return (key <= 13 || (key >= 48 && key <= 57) || key == 46);
}
/*function ValidaSoloNumeros() {
 if ((event.keyCode < 48) || (event.keyCode > 57)) 
 event.returnValue = false;
 }*/

