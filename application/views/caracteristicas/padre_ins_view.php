<script type="text/javascript" src="<?php echo URL_JS; ?>caracteristicas/jsPadreIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmPadreInsa" name="frmPadreInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Descripcion</label>
            <div class="col-lg-5">
                <input type="text" maxlength="20" id="padre_txt_cMulDescripcion" name="padre_txt_cMulDescripcion" placeholder="Ejm:Tipo Tacones" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button type="submit" id="padre_btnRegistrar" class="btn btn-info">Registrar</button>
                <button type="button" id="padre_btnCancelar" class="btn btn-default">cancelar</button>
                <div id="padremessage"></div>
            </div>
        </div>
    </form>
    <div id="msjPadre"></div>
</div>
<div class="panel-body" id="padre_gridPadres">
</div>