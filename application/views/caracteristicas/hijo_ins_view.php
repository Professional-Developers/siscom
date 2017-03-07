<script type="text/javascript" src="<?php echo URL_JS; ?>caracteristicas/jsHijoIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmHijoInsa" name="frmHijoInsa" role="form" onkeypress="if(event.keyCode==13) event.returnValue=false;">
        
        <input type="hidden" id="hdn_idHijoDel" name="hdn_idHijoDel" value=""/>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Tipo de Caracteristica</label>
            <div class="col-lg-7 form-inline">
                <select class="form-control" id="cboIdPadre" name="cboIdPadre" style="width: 350px">
                    <?php
                    echo "<option value=-1>TODOS</option>";
                    foreach ($Padres as $padre) {
                        echo "<option value='" . $padre['nMulIdPadre'] . "'" . ">" . $padre['cMulDescripcion'] . "</option>";
                    }
                    ?>
                </select>            
            </div>
        </div>
        <div class="form-group form-inline">
            <label class="control-label col-lg-3" for="normalInput">Caracteristica</label>
            <div class="col-lg-5">
                <input style="width: 350px" type="text" id="hijo_txt_cMulDescripcion" name="hijo_txt_cMulDescripcion" placeholder="-- Ingrese Caracteristica --" class="form-control uniform-input text" maxlength="35" />
            </div>
<!--            <div class="col-lg-2">
                <button type="button" id="hijo_btnBuscar" class="btn btn-primary">Buscar</button>
            </div>-->
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="normalInput">Particularidad</label>
            <div class="col-lg-5">
                <?php echo $Particularidad; ?>
            </div>
        </div>
        <div class="form-group hidden">
            <label class="control-label col-lg-3" for="hijo_txt_nMulOrden">Orden</label>
            <div class="col-lg-5">
                <input type="text" id="hijo_txt_nMulOrden" name="hijo_txt_nMulOrden" placeholder="Ejm:Orden 3" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group form-inline">
            <label class="control-label col-lg-3" for="textchkTodosCaracteristicasareas"></label>
            <div class="col-lg-2">
            </div>
            <div class="col-lg-3">
                <input type="checkbox" id="chkTodosCaracteristicas" name="chkTodosCaracteristicas"  /> Mostrar Eliminados
            </div>
            <div class="col-lg-2">
                <button type="button" id="hijo_btnBuscar" class="btn btn-primary">Buscar</button>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">              
                <button type="submit" id="hijo_btnRegistrar" class="btn btn-info">Registrar</button>
                <button type="button" id="hijo_btnCancelar" class="btn btn-default">Cancelar</button>
                <div id="hijo_message"></div>
            </div>
        </div>
    </form>
    <div id="hijo_msjCaracteristica"></div>
</div>

<div class="panel-body" id="hijos_gridHijos">
</div>