<script type="text/javascript" src="<?php echo URL_JS; ?>caracteristicas/jsPadreUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmPadreUpd" name="frmPadreUpd" role="form">
        <input type="hidden" name="hdnidPadre_upd" id="hdnidPadre_upd" value="<?php echo $informacion[0]['nMulId']; ?>"/>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Tipo Caracteristica</label>
            <div class="col-lg-5">
                <input type="text" value="<?php echo $informacion[0]['cMulDescripcion']; ?>" id="upd_txt_cMulDescripcion" name="upd_txt_cMulDescripcion" placeholder="Ejm: TALLA" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <!-- disabled="disabled"-->
                <button type="submit" id="btnActualizarPadre" class="btn btn-info">Actualizar</button>
                <button type="button" id="btnCancelarPadre" class="btn btn-default">cancelar</button>
                <div id="messageUpd"></div>
            </div>
        </div>
    </form>
    <div id="msjPadre"></div>
</div>