<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmProductoUpd" name="frmProductoUpd" role="form">
        <input type="hidden" id="upd_nProductoHueco" name="upd_nProductoHueco" value="<?php echo $nProductoHueco;?>" />
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Actualizar<br/>Descripcion</label>
            <div class="col-lg-7">
                <textarea id="upd_txt_cProDescripcion" name="upd_txt_cProDescripcion" class="form-control limit uniform" rows="3" maxlength="100"><?php echo $informacion[0]["cProDescripcion"];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Actualizar Modelo (Grupo)</label>
            <div class="col-lg-7">
                <!--<input type="text" maxlength="10" id="txt_nModeloId" name="txt_nModeloId" placeholder="Ejm:5470" class="form-control uniform-input text" />-->
                <select id="upd_cboIdModelo" name="upd_cboIdModelo" class="nostyle form-control" placeholder="Modelo">
                    <!--<option></option>-->
                    <?php
                    //print_r($sucursal);
                    foreach ($modelo as $mod) {
                            if($informacion[0]["nModeloId"]==$mod['nModeloId']){
                                echo "<option value=" . $mod['nModeloId'] . "selected >" . $mod['nModCodigo'] . "</option>";
                            }else{
                                echo "<option value=" . $mod['nModeloId'] . ">" . $mod['nModCodigo'] . "</option>";
                            }
                    }
                    ?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Actualizar Precio<br />(Soles)</label>
            <div class="col-lg-7">
                <input value="<?php echo $informacion[0]["nProPrecioReferencial"];?>" type="text" maxlength="10" id="upd_txt_nProPrecioReferencial" name="upd_txt_nProPrecioReferencial" placeholder="Ejm: 15 soles" class="form-control uniform-input text" value="10"  />
            </div>
        </div>
        <!--<div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Cantidad</label>
            <div class="col-lg-2">
                <input type="text" maxlength="4" id="txt_nCantidad" name="txt_nCantidad" class="form-control uniform-input text" />
            </div>
        </div>-->
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Actualizar Stand</label>
            <div class="col-lg-7">
                <select id="upd_cboIdSucursal" name="upd_cboIdSucursal" class="form-control">
                    <?php
                    //print_r($sucursal);
                    foreach ($sucursal as $suc) {
                        if($suc['nSurId']==$informacion[0]["nSurId"]){
                            echo "<option value=" . $suc['nSurId'] . " selected>" . $suc['cSurNombre'] . "</option>";
                        }else{
                            echo "<option value=" . $suc['nSurId'] . ">" . $suc['cSurNombre'] . "</option>";
                        }
                    }
                    ?>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Actualizar Almacen</label>
            <div class="col-lg-7">
                <select id="upd_cboIdAlmacen" name="upd_cboIdAlmacen" class="form-control">
                    <option>selecciona</option>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Actualizar Casillero</label>
            <div class="col-lg-7">                
                <select name="upd_cboIdHueco" id="upd_cboIdHueco" class="nostyle form-control" placeholder="Casillero">
                    <option></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Actualizar Promocion</label>
            <div class="col-lg-7">
                <select id="upd_cboIdPromocion" name="upd_cboIdPromocion" class="form-control">
                    <?php
                    foreach ($promocion as $prom) {
                        if($prom['nPromId']==$informacion[0]["nPromId"]){
                            echo "<option value=" . $prom['nPromId'] . " selected>" . $prom['cProDescripcion'] . "</option>";   
                        }else{
                            echo "<option value=" . $prom['nPromId'] . ">" . $prom['cProDescripcion'] . "</option>";   
                        }
                    }
                    ?>
                </select>    
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button type="submit" id="btnActualizar" class="btn btn-info">Actualizar</button>
                <button type="button" id="btnCancelarUpd" class="btn btn-default">Cancelar</button>
                <div id="messageUpd"></div>
            </div>
        </div>
    </form>
    <div id="msjProductoUpd"></div>
    <div id="qryProductoUpd"></div>
</div>