<script type="text/javascript" src="<?php echo URL_JS; ?>caracteristicas/jsCaracteristicasPanel.js" charset=UTF-8"></script>
<div class="col-lg-12">
    <div class="page-header">
        <h4>Gestión de <?php echo $modulo; ?></h4>
    </div>
    <div style="margin-bottom: 20px;">
        <ul id="myTab" class="nav nav-tabs pattern">
            <li class="active"><a href="#home" data-toggle="tab">Registrar Tipo Caracteristica</a></li>
            <li><a href="#profile" data-toggle="tab" id="tabHijos">Registrar Caracteristica</a></li>
            <li><a href="#tabTipoCaracteristica" data-toggle="tab" id="tabHijos">Registrar Tipo Caracteristica</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <?php $this->load->view("caracteristicas/padre_ins_view"); ?>
            </div>
            <div class="tab-pane fade" id="profile">
                <?php //$this->load->view("caracteristicas/hijo_ins_view"); ?>
            </div>
        </div>
        <!--tab content -->
        <div data-modales="modCaracteristicas">
            <!-- Editar Padre-->
            <div class="modal fade" id="modalCambiaPadre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headUpd">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Actualizar Tipo Caracteristica</h3>
                        </div>
                        <div class="modal-body bodyUpd">
                        </div>
                        <div class="modal-footer footUpd">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Editar Padre-->
            <!-- Editar Hijo-->
            <div class="modal fade" id="modalCambiaHijo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headUpd">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Actualizar Caracteristica</h3>
                        </div>
                        <div class="modal-body bodyUpdHijo">
                        </div>
                        <div class="modal-footer footUpd">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalBorraHijo"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headDel">
                            <input type="hidden" id="hdn_idModeloDel" />
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Eliminar Caracteristica</h3>
                        </div>
                        <div class="modal-body bodyDel">    
                            ¿Desea eliminar el registro seleccionado?
                        </div>
                        <div class="modal-footer footDel">
                            <button type="button" id="btnEliminarHijo" class="btn btn-primary">SI</button>
                            <button id="btnCancelar" class="btn" data-dismiss="modal" aria-hidden="true">NO</button>
                            <div id="msgDel"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php ?>