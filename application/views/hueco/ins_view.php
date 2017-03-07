<script type="text/javascript" src="<?php echo URL_JS; ?>hueco/jsHuecoIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmHuecoInsa" name="frmHuecoInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" maxlength="20" id="txt_cHueNombre" name="txt_cHueNombre" placeholder="Ejm:Repisa 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Stand</label>
            <div class="col-lg-5" class="modSucursal">
                <select id="cboIdSucursal" name="cboIdSucursal" class="form-control">
                    <?php
                    //print_r($sucursal);
                    foreach($sucursal as $suc){
                        echo "<option value=".$suc['nSurId'].">".$suc['cSurNombre']."</option>";
                    }
                    ?>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Almacen</label>
            <div class="col-lg-5">
                <select id="cboIdAlmacen" name="cboIdAlmacen" class="form-control">
                    <option>selecciona</option>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Repisa </label>
            <div class="col-lg-2">
                <input type="text" maxlength="10" id="txt_nIdRepisa" name="txt_nIdRepisa" placeholder="Ejm:Fila 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Fila </label>
            <div class="col-lg-2">
                <input type="text" maxlength="10" id="txt_nIdFila" name="txt_nIdFila" placeholder="Ejm:Fila 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Columna </label>
            <div class="col-lg-2">
                <input type="text" maxlength="10" id="txt_nIdColumna" name="txt_nIdColumna" placeholder="Ejm:Columna 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Celda <br/>(Casillero) </label>
            <div class="col-lg-2">
                <input type="text" maxlength="10" id="txt_nIdCelda" name="txt_nIdCelda" placeholder="Ejm:Celda 1" class="form-control uniform-input text" />
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button type="submit" id="btnRegistrar" class="btn btn-info">Registrar</button>
                <button type="button" id="btnCancelar" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjHueco"></div>

</div>