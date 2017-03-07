<script type="text/javascript" src="<?php echo URL_JS; ?>caracteristicas/jsHijoUpd.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmHijoUpd" name="frmHijoUpd" role="form">
        <input type="hidden" name="hdnidHijo_upd" id="hdnidHijo_upd" value="<?php echo $informacion[0]['nMulId']; ?>"/>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Tipo Caracteristica</label>
            <div class="col-lg-6">
                <select class="form-control" id="upd_cboIdPadre" name="upd_cboIdPadre">
                    <?php
                    //print_r($Padres);
                    foreach ($Padres as $padre) {
                        if($padre['nMulIdPadre']==$informacion[0]['nMulIdPadre']){
                            echo "<option value='" . $padre['nMulIdPadre'] . "'" . " selected>" . $padre['cMulDescripcion'] . "</option>";                           
                        }else{
                            echo "<option value='" . $padre['nMulIdPadre'] . "'" . ">" . $padre['cMulDescripcion'] . "</option>";                           
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Caracteristica</label>
            <div class="col-lg-5">
                <input value="<?php echo $informacion[0]['cMulDescripcion']; ?>" type="text" id="upd_hijo_txt_cMulDescripcion" name="upd_hijo_txt_cMulDescripcion" placeholder="-- Ingrese Caracteristica --" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Particularidad</label>
            <div class="col-lg-5">
                <?php echo $Particularidad;?>
            </div>
        </div>
<!--        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="textareas">Orden</label>
            <div class="col-lg-5">
                <input type="text" id="hijo_txt_nMulOrden" name="hijo_txt_nMulOrden" placeholder="Ejm:Orden 3" class="form-control uniform-input text" />
            </div>
        </div>-->
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnActualizarHijo" class="btn btn-info">Actualizar</button>
                <button type="button" id="btnCancelarHijo" class="btn btn-default">cancelar</button>
                <div id="messageUpd"></div>
            </div>
        </div>
    </form>
    <div id="msjHijoUpd"></div>
</div>