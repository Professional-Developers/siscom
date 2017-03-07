<script type="text/javascript" src="<?php echo URL_JS; ?>hueco/jsHuecoUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmHuecoUpd" name="frmHuecoUpd" role="form">
        <input type="hidden" name="hdnidHueco_upd" id="hdnidHueco_upd" value="<?php echo $informacion[0]['nHuecoId']; ?>"/>
        <input type="hidden" name="hdnidAlmacen_upd" id="hdnidAlmacen_upd" value="<?php echo $informacion[0]['nAlmId']; ?>"/>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cHueNombre']; ?>" id="upd_txt_cHueNombre" name="upd_txt_cHueNombre" placeholder="Ejm: Casillero 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Stand</label>
            <div class="col-lg-5">
                <select id="upd_cboIdSucursal" name="upd_cboIdSucursal" class="form-control">
                    <?php
                    //print_r($sucursal);
                    foreach ($sucursal as $suc) {
                        if ($suc['nSurId'] == $idSucursalActiva) {
                            echo "<option selected value=" . $suc['nSurId'] . ">" . $suc['cSurNombre'] . "</option>";
                        } else {
                            echo "<option value=" . $suc['nSurId'] . ">" . $suc['cSurNombre'] . "</option>";
                        }
                    }
                    ?>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Almacen</label>
            <div class="col-lg-5">
                <select id="upd_cboIdAlmacen" name="upd_cboIdAlmacen" class="form-control">
                    <option>selecciona</option>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Repisa </label>
            <div class="col-lg-2">
                <input type="text" value="<?php echo $informacion[0]['nIdRepisa']; ?>" maxlength="10" id="upd_txt_nIdRepisa" name="upd_txt_nIdRepisa" placeholder="Ejm:Fila 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Fila </label>
            <div class="col-lg-2">
                <input type="text" value="<?php echo $informacion[0]['nIdFila']; ?>" maxlength="10" id="upd_txt_nIdFila" name="upd_txt_nIdFila" placeholder="Ejm:Fila 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Columna </label>
            <div class="col-lg-2">
                <input type="text" value="<?php echo $informacion[0]['nIdColumna']; ?>" maxlength="10" id="upd_txt_nIdColumna" name="upd_txt_nIdColumna" placeholder="Ejm:Columna 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Celda <br/>(Casillero) </label>
            <div class="col-lg-2">
                <input type="text" value="<?php echo $informacion[0]['nIdCelda']; ?>" maxlength="10" id="upd_txt_nIdCelda" name="upd_txt_nIdCelda" placeholder="Ejm:Celda 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button type="submit" id="btnActualizarHue" class="btn btn-info">Actualizar</button>
                <button type="button" id="btnCancelarHue" class="btn btn-default">cancelar</button>
                <div id="messageUpd"></div>
            </div>
        </div>
    </form>
    <div id="msjHuecoUpd"></div>

</div>