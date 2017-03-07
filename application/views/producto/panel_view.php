<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoPanel.js" charset=UTF-8"></script>
<div class="col-lg-12">
    <div class="page-header">
        <h4>Inserción de Producto (Stand Principal)</h4>
    </div>
    <div style="margin-bottom: 20px;">
        <ul id="myTab" class="nav nav-tabs pattern">
            <li class="active"><a href="#home" data-toggle="tab">Nuevos <?php echo $modulo; ?></a></li>
            <li><a href="#profile" data-toggle="tab" id="tabqry">Todos los <?php echo $modulo; ?></a></li>
            <li><a href="#productoEliminado" data-toggle="tab" id="tabqryDel">Productos Eliminados</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <?php $this->load->view("producto/ins_view"); ?>
            </div>
            <div class="tab-pane fade" id="profile">
            </div>
            <div class="tab-pane fade" id="productoEliminado">
            </div>
            <div class="tab-pane fade" id="profile2">
                <div id="div_regresar">                    
                </div>
            </div>
        </div>

        <!-- popup 1 addcaracteristica-->
        <div  class="modal fade" id="modalAddCaracteristica"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header headAddChar">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="lbldetalle">Agregar Caracteristica</h3>
                    </div>
                    <div class="modal-body bodyAddChar">
                    </div>
                    <div class="modal-footer footAddChar">
                    </div>
                </div>
            </div>
        </div>
        <!-- popup 2 Promocion-->
        <div  class="modal fade" id="modalAddPromocion"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header headAddProm">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="lbldetalle">Agregar Promocion</h3>
                    </div>
                    <div class="modal-body bodyAddProm">
                    </div>
                    <div class="modal-footer footAddProm">
                    </div>
                </div>
            </div>
        </div>
        <!-- popup 2 addCasillero -->
        <div  class="modal fade" id="modalAddCasillero"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <!--<div class="modal-dialog" style="width: 800px !important">-->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header headAddCasillero">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="lbldetalle">Agregar Casillero</h3>
                    </div>
                    <div class="modal-body bodyAddCasillero">
                    </div>
                    <div class="modal-footer footAddCasillero">
                    </div>
                </div>
            </div>
        </div>
        <!-- popup 3 upd -->
        <div data-modales="<?php echo $modulo; ?>">
            <div  class="modal fade" id="modalCambiaProducto"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headUpd">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Actualizar Producto</h3>
                        </div>
                        <div class="modal-body bodyUpdProducto">
                        </div>
                        <div class="modal-footer footUpd">
                        </div>
                    </div>
                </div>
            </div>
            <!-- popup 4 del-->
            <div class="modal fade" id="modalBorraProducto"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headDel">
                            <input type="hidden" id="hdn_idProductoDel" />
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Eliminar <?php echo $modulo; ?></h3>
                        </div>
                        <div class="modal-body bodyDel">    
                            ¿Desea eliminar el registro seleccionado?
                        </div>
                        <div class="modal-footer footDel">
                            <button type="button" id="btnEliminar" class="btn btn-primary">SI</button>
                            <button id="btnCancelar" class="btn" data-dismiss="modal" aria-hidden="true">NO</button>
                            <div id="msgDel"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- popup 5 act-->
            <div class="modal fade" id="modalActivaProducto"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headDel">
                            <input type="hidden" id="hdn_idProductoAct" />
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Activar <?php echo $modulo; ?></h3>
                        </div>
                        <div class="modal-body bodyDel">    
                            ¿Desea activar el registro seleccionado?
                        </div>
                        <div class="modal-footer footDel">
                            <button type="button" id="btnActivar" class="btn btn-primary">SI</button>
                            <button id="btnCancelar" class="btn" data-dismiss="modal" aria-hidden="true">NO</button>
                            <div id="msgAct"></div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>

<?php ?>