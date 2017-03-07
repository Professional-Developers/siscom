<script type="text/javascript" src="<?php echo URL_JS; ?>modelo/jsModeloUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmModeloUpd" name="frmModeloUpd" role="form">
        <input type="hidden" name="hdnidModelo_upd" id="hdnidModelo_upd" value="<?php echo $informacion[0]['nModeloId']; ?>"/>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Código<br/>(Agrupador)</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['nModCodigo']; ?>" id="txt_upd_nModCodigo" name="txt_upd_nModCodigo" placeholder="Ejm: 560" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Descripcion</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cModDescripcion']; ?>" id="txt_upd_cModDescripcion" name="txt_upd_cModDescripcion" placeholder="Ejm: 560" class="form-control uniform-input text" />
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button type="submit" id="btnActualizarMod" class="btn btn-info">Actualizar</button>
                <button type="button" id="btnCancelarMod" class="btn btn-default">cancelar</button>
                <div id="messageUpd"></div>
            </div>
        </div>
    </form>
    <div id="msjAlmacen"></div>

</div>