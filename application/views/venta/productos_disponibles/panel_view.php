<!--<script type="text/javascript" src="<?php echo URL_JS; ?>envioProducto/jsDerivarProductoPanel.js" charset=UTF-8"></script>-->
<script type="text/javascript" src="<?php echo URL_JS; ?>misproductos/jsMisProductosPanel.js" charset=UTF-8"></script>
<div class="col-lg-12">
    <div class="page-header">
        <input type="hidden" id="idSucursal" name="idSucursal" value="<?php echo $IdSucursal; ?>" />
        <input type="hidden" id="idProdHueco_prestar" name="idProdHueco_prestar" />
        <h4>Productos de mi Stand</h4>
    </div>
    <div style="margin-bottom: 20px;">
        <ul id="myTab" class="nav nav-tabs pattern">
            <li class="active"><a href="#cont_productosdisponibles" data-toggle="tab" id="tabqryProductos">Productos Disponibles</a></li>
            <li><a href="#cont_productosxRecibir" data-toggle="tab" id="tabqryxRecibir">Productos por Recibir</a></li>
            <li><a href="#cont_productosEnvidados" data-toggle="tab" id="tabqryEnviados">Productos Enviados</a></li>
            <li><a href="#cont_productosPrestados" data-toggle="tab" id="tabqryPrestados">Productos Prestados</a></li>
        </ul>
        <div class="tab-content">
            <!--<div class="panel-body">-->
            <!--<div class="tab-pane fade in active" id="profile">-->
            <div class="tab-pane fade in active" id="cont_productosdisponibles">
                <form class="form-horizontal todoMayuscula" id="frmProductoDeriva" name="frmProductoDeriva" role="form">
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="select">Stand</label>
                        <div class="col-lg-4" class="modSucursal">
                            <select id="cboIdSucursal" name="cboIdSucursal" class="form-control">
                                <?php
                                //print_r($sucursal);
                                foreach ($sucursal as $suc) {
                                    echo "<option value=" . $suc['nSurId'] . ">" . $suc['cSurNombre'] . "</option>";
                                }
                                ?>
                            </select>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="select">Almacen</label>
                        <div class="col-lg-4">
                            <select id="cboIdAlmacen" name="cboIdAlmacen" class="form-control">
                                <option>selecciona</option>
                            </select>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3" for="select">Casillero</label>
                        <div class="col-lg-4">                
                            <select name="cboIdHueco" id="cboIdHueco" class="nostyle form-control" placeholder="Casillero">
                                <option></option>
                                <?php
                                /* foreach ($sucursal as $suc) {
                                  echo "<option value='" . $suc['nSurId'] . "'>" . $suc['cSurNombre'] . "</option>";
                                  } */
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-3 col-lg-9">
                            <!-- disabled="disabled"-->
                            <button type="submit" id="btnDerivar" class="btn btn-info">Derivar</button>
                            <!--<button type="button" id="btnCancelar" class="btn btn-default">cancelar</button>-->
                            <div id="messageDeriv"></div>
                        </div>
                    </div>
                </form>
                <div id="msjDerivarProducto"></div>
                <div id="qryDerivarProductoIns"></div>
            </div>
            <!--            <div class="tab-pane fade in active" id="profile">
                        </div>-->
            <div class="tab-pane fade" id="cont_productosxRecibir">
                hola amigos
            </div>
            <div class="tab-pane fade" id="cont_productosEnvidados">
                hola amigos
            </div>
            <div class="tab-pane fade" id="cont_productosPrestados">
                hola amigos
            </div>
        </div>
        <div  class="modal fade" id="modalPanelPrestar"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header headPrestar">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="lbldetalle">Prestar</h3>
                    </div>
                    <div class="modal-body bodyPrestar">
                    </div>
                    <div class="modal-footer footPrestar">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php ?>