<script type="text/javascript" src="<?php echo URL_JS; ?>almacen/jsAlmacenIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmAlmacenInsa" name="frmAlmacenInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cAlmNombre" name="txt_cAlmNombre" placeholder="Ejm: Almacen 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Stand</label>
            <div class="col-lg-5">
                <?php //print_r($sucursal);?>
                <select id="cbo_nSurId" name="cbo_nSurId" class="form-control">
                    <?php foreach($sucursal as $suc){
                        echo "<option value=".$suc['nSurId'].">".$suc['cSurNombre']."</option>";
                    }
?>
                </select>
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Ubigeo</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cAlmUbigeo" name="txt_cAlmUbigeo" placeholder="Ejm: " class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Dirección(Referencia)</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cAlmReferencia" name="txt_cAlmReferencia" placeholder="Ejm: España" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Linea 1</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cAlmLinea1" name="txt_cAlmLinea1" placeholder="Ejm: linea1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Linea 2</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cAlmLinea2" name="txt_cAlmLinea2" placeholder="Ejm: linea2" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarAlm" class="btn btn-info">Registrar</button>
                <button type="button" id="btnCancelarAlm" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjAlmacen"></div>

</div>