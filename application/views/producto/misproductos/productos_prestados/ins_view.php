<!--<script type="text/javascript" src="<php echo URL_JS; ?>almacen/jsAlmacenIns.js"></script>-->
<script type="text/javascript" src="<?php echo URL_JS; ?>misproductos/productos_prestados/jsPrestarIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmPrestamoInsa" name="frmPrestamoInsa" role="form">
        <input type="hidden" id="idCodProdPrestamo" name="idCodProdPrestamo" value="<?php echo $codigoProductoHueco;?>" />
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Destino</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cDestino" name="txt_cDestino" placeholder="Ejm: Tienda APIAT" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarPrestar" class="btn btn-info">Prestar</button>
                <button type="button" id="btnCancelarPrestar" class="btn btn-default">Cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjAlmacen"></div>
</div>