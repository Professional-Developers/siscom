<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmProductoInsa" name="frmProductoInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Descripción</label>
            <div class="col-lg-5">
                <textarea id="txt_cProDescripcion" name="txt_cProDescripcion" class="form-control limit uniform" rows="3" maxlength="100" style="height: 40px" placeholder="   zapatos de verano"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Modelo</label>
            <div class="col-lg-4">
                <!--<input type="text" maxlength="10" id="txt_nModeloId" name="txt_nModeloId" placeholder="Ejm:5470" class="form-control uniform-input text" />-->
                <select id="cboIdModelo" name="cboIdModelo" class="nostyle form-control" placeholder="Modelo">
                    <option></option>
                    <?php
                    //print_r($sucursal);
                    foreach ($modelo as $mod) {
                        echo "<option value=" . $mod['nModeloId'] . ">" . $mod['nModCodigo'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Tipo de zapato</label>
            <div class="col-lg-4">
                <!--<input type="text" maxlength="10" id="txt_nModeloId" name="txt_nModeloId" placeholder="Ejm:5470" class="form-control uniform-input text" />-->
                <?php //print_r($categoria);?>
                <select id="cboIdCategoria" name="cboIdCategoria" class="nostyle form-control" placeholder="Modelo">
                    <?php
                    foreach ($categoria as $mod) {
                        echo "<option value=" . $mod['nCatId'] . ">" . $mod['cCatNombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Precio (Soles)</label>
            <div class="col-lg-1">
                <input type="text" maxlength="10" id="txt_nProPrecioReferencial" name="txt_nProPrecioReferencial" placeholder="   60" class="form-control uniform-input text"  />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Cantidad</label>
            <div class="col-lg-1">
                <input type="text" maxlength="4" id="txt_nCantidad" name="txt_nCantidad" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Stand Principal</label>
            <div class="col-lg-4" class="modSucursal">
                <select id="cboIdSucursal" name="cboIdSucursal" class="form-control">
                    <?php
                    //print_r($sucursal);
                    foreach ($sucursal as $suc) {
                        echo "<option value=" . $suc['nSurId'] . ">" . $suc['cSurNombre'] . "</option>";
                    }
                    ?>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Almacén</label>
            <div class="col-lg-4">
                <select id="cboIdAlmacen" name="cboIdAlmacen" class="form-control">
                    <option selected="selected">selecciona</option>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Casillero</label>
            <div class="col-lg-4">                
                <!--<select name="cboIdHueco" id="cboIdHueco" class="nostyle form-control select2" placeholder="Casillero">-->
                <select name="cboIdHueco" id="cboIdHueco" class="nostyle form-control select2">
                    <option selected="selected">selecciona</option>
                </select>
            </div>
        </div>
<!--        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Promocion</label>
            <div class="col-lg-4" class="modSucursal">
                <select id="cboIdPromocion" name="cboIdPromocion" class="form-control">
                    <php
                    foreach ($promocion as $prom) {
                        echo "<option value=" . $prom['nPromId'] . ">" . $prom['cProDescripcion'] . "</option>";
                    }
                    ?>
                </select>    
            </div>
        </div>-->

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button type="submit" id="btnRegistrar" class="btn btn-info"  >Registrar</button>
                <button type="button" id="btnCancelar" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjProducto"></div>
    <div id="qryProductoIns"></div>
</div>