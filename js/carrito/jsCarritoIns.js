$(document).ready(function() {

    $(".lbl_idprecio").hide();
    $("#txt_idCliente").keyup(function(e) {
        //e.preventDefault();
        //$("#lbl_idCliente").html(e.which + ": " + String.fromCharCode(e.which))
        //$("#lbl_idCliente").html(String.fromCharCode(e.which))
        $("#lbl_idCliente").html("")
        $("#lbl_idCliente").html($("#txt_idCliente").val())
        $("#lbl_idCliente").hide();
    });
})
function imprSelec()
{
    $(".delete_item").hide();
    $(".actualizar_item").hide();
    $("#txt_idCliente").hide();
    $("#lbl_idCliente").show();

    //$("#lbl_idprecio").show();
    $(".update_precio").hide();
    $(".lbl_idprecio").show();
    //var sOption = "toolbar=yes,location=no,directories=yes,menubar=yes,scrollbars=yes,width=900,height=300,left=100,top=25";
    var sWinHTML = document.getElementById('contenedorVenta').innerHTML;
    //var winprint = window.open("", "", sOption);
    var winprint = window.open("", "");
    winprint.document.open();
    winprint.document.write('<html><head><style type="text/css">');
    winprint.document.write('body,td,th{font-family:Arial, Helvetica, sans-serif;font-size:10px;color:#000000}');
    winprint.document.write('.negrito {font-weight:bold; }');
    //winprint.document.write('.style2 {font-size:11px; font-weight:bold; color:#FFFFFF; }');
    winprint.document.write('.derecha {text-align:right}');
    winprint.document.write('.centrado{text-align:center}');
    //winprint.document.write('.anchotabla{width: 500px}');
    winprint.document.write('.anchotabla{width: 450px}');
    winprint.document.write('#contenedorVenta{border: solid}');
    winprint.document.write('.cl_contenedorVenta{border: dashed;width:450px}');
    winprint.document.write('</style></head><body onload="window.print();">');
    winprint.document.write(sWinHTML);
    winprint.document.write('</body></html>');
    //winprint.document.close(); //descomento a1
    winprint.print();
    winprint.close();//comento si quiero que no se cierre...a1
    winprint.focus();
    $("#txt_idCliente").show();
    $("#lbl_idCliente").hide();
    //
    $(".update_precio").show();
    $(".lbl_idprecio").hide();
    //
    $(".actualizar_item").show();
    $(".delete_item").show();
}