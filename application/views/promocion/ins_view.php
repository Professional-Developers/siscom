<script type="text/javascript" src="<?php echo URL_JS; ?>promocion/jsPromocionIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmPromocionInsa" name="frmPromocionInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" maxlength="30" id="txt_cPromocion" name="txt_cPromocion" placeholder="Ejm: Campaña Escolar" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="picker">Fecha Inicio</label>
            <div class="col-lg-3">
                <input type="text" id="txt_dateInicio" name="txt_dateInicio" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="picker">Fecha Fin</label>
            <div class="col-lg-3">
                <input type="text" id="txt_dateFin" name="txt_dateFin" class="form-control" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Porcentaje</label>
            <div class="col-lg-5">
                <input type="text" maxlength="3" id="txt_nPromPorcentaje" name="txt_nPromPorcentaje" placeholder="Ejm: 10%" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Cantidad<br>en Promoción</label>
            <div class="col-lg-5">
                <input type="text" maxlength="5" id="txt_nPromCantidad" name="txt_nPromCantidad" placeholder="Ejm: 20" class="form-control uniform-input text" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Imagen</label>
            <div class="col-lg-6">
                <div id="uniform-file" class="uploader">
                    <input id="txt_cPromFoto" name="txt_cPromFoto" class="form-control" type="file">
                    <span class="filename" style="-moz-user-select: none;">No Seleccionar Archivo</span>
                    <span class="action" style="-moz-user-select: none;">Seleccionar Archivo</span>
                    <!--<div id="progress">--> 
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput"></label>
            <div class="col-lg-2">
                <div id="bar" class="progress progress-striped active tip" oldtitle="0%" title="" data-hasqtip="true" aria-describedby="qtip-10">
                    <div id="percent" class="progress-bar" style="width: 0%;">0%</div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarProm" class="btn btn-info">Registrar</button>
                <button type="button" id="btnCancelarProm" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjPromocion"></div>

</div>
<script type="text/javascript" src='<?php echo URL_PLU; ?>ajaxFileUploader/ajaxfileupload.js'></script>