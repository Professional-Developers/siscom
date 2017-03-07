<script type="text/javascript" src="<?php echo URL_JS; ?>persona/jsPersonaPanel.js" charset=UTF-8"></script>
<!--<div class="row-fluid"  style="min-width: 300px;">-->
<div class="col-lg-12">
    <div class="page-header">
        <h4>Gestión de Personas</h4>
    </div>
    <div style="margin-bottom: 20px;">
        <!--        <div class="tabbable tabs-below">-->
        <ul id="myTab" class="nav nav-tabs pattern">
            <li class="active"><a href="#home" data-toggle="tab">Nueva Persona</a></li>
            <li><a href="#profile" data-toggle="tab" id="tabqry">Buscar Persona</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <?php $this->load->view("persona/ins_view"); ?>
                <!--                <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>-->


            </div>
            <div class="tab-pane fade" id="profile">
                <?php //$this->load->view("persona/qry_view"); ?>
            </div>
        </div>
        <div data-modales="persona">
            <div  class="modal fade" id="modalCambiaPersona"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <!--<div class="modal fade"  id="myModal"          tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headUpd">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Actualizar Persona</h3>
                        </div>
                        <div class="modal-body bodyUpd">
                        </div>
                        <div class="modal-footer footUpd">
                            <!--                <button type="submit" id="btnActualizar" class="btn btn-primary">Actualizar</button>
                                            <button id="btnCancelar" class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modalBorraPersona"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headDel">
                            <input type="hidden" id="hdn_idPersonaDel" />
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Eliminar Persona</h3>
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
        </div>



        <!--</div>-->
    </div>

</div><!-- End .span6 -->  
<!--</div>-->
<?php ?>