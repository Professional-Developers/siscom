<script type="text/javascript" src="<?php echo URL_JS ?>usuario/jsUsuarioIns.js" ></script>
<!--<div class="box">
    <div class="content">-->
<div class="col-lg-6">
    <div class="panel-body">
        <form class="form-horizontal todoMayuscula" id="frmUsuarioIns" name="frmPersonaIns" role="form">
            <!--<div class="form-row row-fluid">-->
            <div class="form-group">
                <!--<div class="span12">-->
                <label class="control-label col-lg-3" for="normalInput" >Buscar Persona </label>
                <div class="col-lg-4">
                    <input class="form-control uniform-input text" type="text" maxlength="8" id="txtcPerDni" name="txtcPerDni" placeholder="Dni: 46087731" />
                    <input type="hidden" id="txt_nPerId" name="txt_nPerId">
                    <button id="btn_fndPerson" class="btn-primary btn">Buscar</button>
                    <div id="infopersona"></div>
                </div>
                <!--</div>-->
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="normalInput" >Usuario </label>
                <div class="col-lg-4">
                    <input class="form-control uniform-input text" type="text" id="txtUsuario" name="txtUsuario" readonly="readonly" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="normalInput" >Clave </label>
                <div class="col-lg-4">
                    <input class="form-control uniform-input text" type="password" id="txtClave" maxlength="15" name="txtClave" placeholder="Ejm: Flores123" />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-3" for="normalInput" >Tipo Usuario </label>
                <div class="col-lg-3">
                    <select class="form-control" name="cboTipoUser" id="cboTipoUser">
                        <?php
                        foreach ($cbo as $key => $value) {
                            ?>
                            <option value="<?php echo $value['codx']; ?>"><?php echo $value['dato']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>	
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">
                    <button type="submit" id="btnRegistrarUsuario" class="btn btn-info">Registrar</button>
                    <button type="button" id="btnCancelar" class="btn btn-default">Cancelar</button>
                    <div id="message"></div>
                </div>
            </div>
            <!-- End .form-group  -->                   
            <!--            <div class="form-actions">
                            <button type="submit" id="btnRegistrarUsuario" class="btn btn-info">Registrar</button>
                            <button type="reset" id="btnCancelar" class="btn btn-default">cancelar</button>
                            <div id="message"></div>
                        </div>-->
        </form>
        <!--</div>-->
        <div id="msjPersona"></div>
        <!--</div>-->
    </div>
</div>
<div class="col-lg-2">
    <button id="btn_fndPerson" class="btn-primary btn">Buscar</button>
</div>