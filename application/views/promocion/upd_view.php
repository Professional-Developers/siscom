<script type="text/javascript" src="<?php echo URL_JS; ?>almacen/jsAlmacenUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmAlmacenUpd" name="frmAlmacenUpd" role="form">
        <input type="hidden" name="hdnidAlmacen_upd" id="hdnidAlmacen_upd" value="<?php echo $informacion[0]['nAlmId']; ?>"/>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cAlmNombre']; ?>" id="upd_txt_cAlmNombre" name="upd_txt_cAlmNombre" placeholder="Ejm: Almacen 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Stand</label>
            <div class="col-lg-5">
                <?php //print_r($sucursal);?>
                <select id="upd_cbo_nSurId" name="upd_cbo_nSurId" class="form-control">
                    <?php foreach($sucursal as $suc){
                        if($suc['nSurId']==$informacion[0]['nSurId']){
                            echo "<option selected value=".$suc['nSurId'].">".$suc['cSurNombre']."</option>";
                        }else{
                            echo "<option value=".$suc['nSurId'].">".$suc['cSurNombre']."</option>";
                        }
                    }
?>
                </select>
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Ubigeo</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cAlmUbigeo']; ?>" id="upd_txt_cAlmUbigeo" name="upd_txt_cAlmUbigeo" placeholder="Ejm: " class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Dirección <br/>(Referencia)</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cAlmReferencia']; ?>" id="upd_txt_cAlmReferencia" name="upd_txt_cAlmReferencia" placeholder="Ejm: España" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Linea 1</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cAlmLinea1']; ?>" id="upd_txt_cAlmLinea1" name="upd_txt_cAlmLinea1" placeholder="Ejm: linea1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Linea 2</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cAlmLinea2']; ?>" id="upd_txt_cAlmLinea2" name="upd_txt_cAlmLinea2" placeholder="Ejm: linea2" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button type="submit" id="btnActualizarAlm" class="btn btn-info">Actualizar</button>
                <button type="button" id="btnCancelarAlm" class="btn btn-default">cancelar</button>
                <div id="messageUpd"></div>
            </div>
        </div>
    </form>
    <div id="msjAlmacen"></div>

</div>