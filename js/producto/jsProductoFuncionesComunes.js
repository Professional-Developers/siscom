function panelDetalleFnd(codProdHueco) {
    $($("#det-" + codProdHueco)).qtip({
        content: {
            text: "Cargando...",
            ajax: {
                url: URL_MAIN+'detalleProducto/getProductoDetalleActivos',
                type: 'POST', // POST or GET[/php]
                data: {
                    codProdHueco: codProdHueco
                },
                success: function(data) {
                    this.set('content.text', data);
                    console.log(data);
                    console.log("hi11");
                    $("#det-" + codProdHueco).attr("title", data);
                }
            }
        },
        style: {
            classes: 'ui-tooltip-light',
            width: 500
        },
        position: {
            // my: 'right bottom center',
            // at: 'bottom left center',
            my: 'right top center',
            at: 'top right center',
            target: $("#det-" + codProdHueco)
        },
        show: {
            event: 'click',
            ready: true,
            solo: true
        },
        hide: 'unfocus'
    });
}