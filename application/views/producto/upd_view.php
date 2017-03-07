<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmProductoUpda" name="frmProductoUpda" role="form">
        <input type="hidden" id="upd_txt_nAlmId" name="upd_txt_nAlmId" value="<?php echo $informacion[0]["nAlmId"];?>" />
        <input type="hidden" id="upd_txt_nHuecoId" name="upd_txt_nHuecoId" value="<?php echo $informacion[0]["nHuecoId"];?>" />
        <input type="hidden" id="upd_txt_nSurId" name="upd_txt_nSurId" value="<?php echo $informacion[0]["nSurId"];?>" />
        
        <input type="hidden" id="upd_hdn_nIdProducto" name="upd_hdn_nIdProducto" value="<?php echo $informacion[0]["nProId"];?>" />
        <input type="hidden" id="upd_hdn_nProductoHueco" name="upd_hdn_nProductoHueco" value="<?php echo $informacion[0]["codigogenerado"];?>" />
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Descripción</label>
            <div class="col-lg-6">
                <textarea id="upd_txt_cProDescripcion" name="upd_txt_cProDescripcion" class="form-control limit uniform" rows="3" maxlength="100" style="height: 40px" placeholder="   zapatos de verano"><?php echo $informacion[0]["cProDescripcion"];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Modelo</label>
            <div class="col-lg-5">
                <!--<input type="text" maxlength="10" id="txt_nModeloId" name="txt_nModeloId" placeholder="Ejm:5470" class="form-control uniform-input text" />-->
                <select id="upd_cboIdModelo" name="upd_cboIdModelo" class="nostyle form-control" placeholder="Modelo">
                    <option></option>
                    <?php
                    //print_r($sucursal);
                    foreach ($modelo as $mod) {
                        if($mod['nModeloId']==$informacion[0]["nModeloId"]){
                            echo "<option selected value=" . $mod['nModeloId'] . ">" . $mod['nModCodigo'] . "</option>";
                        }else{
                        echo "<option value=" . $mod['nModeloId'] . ">" . $mod['nModCodigo'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Tipo de zapato</label>
            <div class="col-lg-5">
                <!--<input type="text" maxlength="10" id="txt_nModeloId" name="txt_nModeloId" placeholder="Ejm:5470" class="form-control uniform-input text" />-->
                <?php //print_r($categoria);?>
                <select id="upd_cboIdCategoria" name="upd_cboIdCategoria" class="nostyle form-control" placeholder="Modelo">
                    <?php
                    foreach ($categoria as $mod) {
                        //nCatId
                        if($mod['nCatId']==$informacion[0]["nCatId"]){
                            echo "<option selected value=" . $mod['nCatId'] . ">" . $mod['cCatNombre'] . "</option>";
                        }else{
                        echo "<option value=" . $mod['nCatId'] . ">" . $mod['cCatNombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Precio (Soles)</label>
            <div class="col-lg-2">
                <input type="text" value='<?php echo $informacion[0]["nProPrecioReferencial"];?>' maxlength="10" id="upd_txt_nProPrecioReferencial" name="upd_txt_nProPrecioReferencial" placeholder="   60" class="form-control uniform-input text"  />
            </div>
        </div>
<!--        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Cantidad</label>
            <div class="col-lg-1">
                <input type="text" maxlength="4" id="upd_txt_nCantidad" name="upd_txt_nCantidad" class="form-control uniform-input text" />
            </div>
        </div>-->
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Stand</label>
            <div class="col-lg-7" class="modSucursal">
                <select id="upd_cboIdSucursal" name="upd_cboIdSucursal" class="form-control">
                    <?php
                    //print_r($sucursal);
                    foreach ($sucursal as $suc) {
                        if($suc['nSurId']==$informacion[0]["nSurId"]){
                            echo "<option selected value=" . $suc['nSurId'] . ">" . $suc['cSurNombre'] . "</option>";
                        }else{
                            echo "<option value=" . $suc['nSurId'] . ">" . $suc['cSurNombre'] . "</option>";
                        }
                    }
                    ?>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Almacén</label>
            <div class="col-lg-7">
                <select id="upd_cboIdAlmacen" name="upd_cboIdAlmacen" class="form-control">
                    <option selected="selected">selecciona</option>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Casillero</label>
            <div class="col-lg-7">                
                <!--<select name="cboIdHueco" id="cboIdHueco" class="nostyle form-control select2" placeholder="Casillero">-->
                <select name="upd_cboIdHueco" id="upd_cboIdHueco" class="nostyle form-control select2">
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
                <button type="submit" id="upd_btnActualizar" class="btn btn-info">Actualizar</button>
                <button type="button" id="upd_btnCancelar" class="btn btn-default">Cancelar</button>
                <div id="upd_message"></div>
            </div>
        </div>
    </form>
<!--    <div id="msjProducto"></div>
    <div id="qryProductoIns"></div>-->
</div>