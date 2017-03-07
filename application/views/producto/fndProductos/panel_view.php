<script type="text/javascript" src="<?php echo URL_JS; ?>producto/fndProductos/jsProductoPanel.js" charset=UTF-8"></script>
<div class="col-lg-12">
    <div class="page-header">
        <h4>Buscar</h4>
    </div>
    <div style="margin-bottom: 20px;">
        <ul id="myTab" class="nav nav-tabs pattern">
            <li class="active"><a href="#profile" data-toggle="tab" id="tabqry">Busquedas</a></li>
        </ul>
        <div class="tab-content">
            <div class="row">
                <form class="form-horizontal todoMayuscula" id="frmProductoInsa" name="frmProductoInsa" role="form">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label class="control-label col-lg-5" for="textareas">Modelo</label>
                            <div class="col-lg-7">
                                <select id="cboIdModelo" name="cboIdModelo" class="nostyle form-control" placeholder="Modelo">
                                    <option></option>
                                    <?php
                                    //print_r($sucursal);
                                    foreach ($modelo as $mod) {
                                        echo "<option value=" . $mod['nModeloId'] . ">" . $mod['nModCodigo'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="control-label col-lg-3" for="textareas">Descripcion</label>
                            <div class="col-lg-3">
                                <input type="text" maxlength="4" id="txt_nCantidad" name="txt_nCantidad" class="form-control uniform-input text" />
                            </div>
                        </div>
                    </div>-->
                    <div class="col-lg-3">
                        <div class="form-group">
                            <button type="button" id="btnFndProducto" class="btn btn-info"  >Buscar</button>
                        </div>
                        <div id="msgFnd"></div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade in active" id="profile">
            </div>
        </div>
    </div>
</div>