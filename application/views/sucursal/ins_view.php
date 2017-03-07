<script type="text/javascript" src="<?php echo URL_JS; ?>sucursal/jsSucursalIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmSucursalInsa" name="frmSucursalInsa" role="form">
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Nombre</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cSurNombre" name="txt_cSurNombre" placeholder="Ejm:STAND 1" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Descripcion</label>
            <div class="col-lg-5">
                <textarea id="txt_cSurDescripcion" name="txt_cSurDescripcion" class="form-control limit uniform" rows="3" maxlength="100"></textarea>
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Ubigeo</label>
            <div class="col-lg-5">
                <input type="hidden" id="txt_cSurUbigeo" name="txt_cSurUbigeo" placeholder="Ejm: 14241" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Lugar Referencia</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cSurReferencia" name="txt_cSurReferencia" placeholder="Ejm: Av. España" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-lg-3" for="normalInput">Telefonos</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cSurTelefonos" name="txt_cSurTelefonos" placeholder="Ejm: Av. España" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Linea 1</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cSurLinea1" name="txt_cSurLinea1" placeholder="Ejm: Calzado" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Linea 2</label>
            <div class="col-lg-5">
                <input type="text" id="txt_cSurLinea2" name="txt_cSurLinea2" placeholder="Ejm: linea 2" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Tipo Stand</label>
            <div class="col-lg-5">
                <?php
                echo $tipo_stand;
                ?>
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Empresa</label>
            <div class="col-lg-5">
                <input type="hidden" id="txt_nEmpId" name="txt_nEmpId" VALUE="1" class="form-control uniform-input text" />
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
    <div id="msjSucursal"></div>

</div>