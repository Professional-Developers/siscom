<script type="text/javascript" src="<?php echo URL_JS; ?>hueco/jsHuecoPanel.js" charset=UTF-8"></script>
<div class="col-lg-12">
    <div class="page-header">
        <h4>Gestión de Casillero</h4>
    </div>
    <div style="margin-bottom: 20px;">
        <ul id="myTab" class="nav nav-tabs pattern">
            <li class="active"><a href="#home" data-toggle="tab">Nuevo Casillero</a></li>
            <li><a href="#profile" data-toggle="tab" id="tabqry">Casilleros</a></li>
            <li><a href="#huecoEliminado" data-toggle="tab" id="tabqryDel">Casilleros Eliminados</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <?php $this->load->view("hueco/ins_view"); ?>
            </div>
            <div class="tab-pane fade" id="profile">
            </div>
            <div class="tab-pane fade" id="huecoEliminado">
            </div>
        </div>
        <div data-modales="<?php echo $modulo;?>">
            <div  class="modal fade" id="modalCambia<?php echo $modulo;?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headUpd">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Actualizar Casillero</h3>
                        </div>
                        <div class="modal-body bodyUpd">
                        </div>
                        <div class="modal-footer footUpd">
                        </div>
                    </div>
                </div>
            </div>
            <!-- popup 2-->
            <div class="modal fade" id="modalBorra<?php echo $modulo;?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headDel">
                            <input type="hidden" id="hdn_idHuecoDel" />
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Eliminar Casillero</h3>
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
            
           <!-- popup 3-->
            <div class="modal fade" id="modalActiva<?php echo $modulo;?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headDel">
                            <input type="hidden" id="hdn_idHuecoDel" />
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Activar Casillero</h3>
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