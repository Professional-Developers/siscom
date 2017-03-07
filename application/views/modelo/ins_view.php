<script type="text/javascript" src="<?php echo URL_JS; ?>modelo/jsModeloIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmModeloInsa" name="frmModeloInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Código<br/>(Agrupador)</label>
            <div class="col-lg-5">
                <input type="text" id="txt_nModCodigo" name="txt_nModCodigo" placeholder="Ejm: 560" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Descripcion</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cModDescripcion" name="txt_cModDescripcion" placeholder="Ejm: 560" class="form-control uniform-input text" />
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarMod" class="btn btn-info">Registrar</button>
                <button type="button" id="btnCancelarMod" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjMod"></div>

</div>