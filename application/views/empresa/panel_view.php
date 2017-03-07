<script type="text/javascript" src="<?php echo URL_JS; ?>empresa/jsEmpresaPanel.js" charset=UTF-8"></script>
<div class="col-lg-12">
    <div class="page-header">
        <h4>Gestión de <?php echo $modulo;?></h4>
    </div>
    <div style="margin-bottom: 20px;">
        <ul id="myTab" class="nav nav-tabs pattern">
<!--            <li class="hide"><a href="#home" data-toggle="tab">Nueva <?php echo $modulo;?></a></li>-->
            <li class="active"><a href="#profile" data-toggle="tab" id="tabqry"><?php echo $modulo;?></a></li>
        </ul>
        <div class="tab-content">
<!--            <div class="hide" class="tab-pane fade in active" id="home">
                <?php //$this->load->view("empresa/ins_view"); ?>
            </div>-->
            <div class="tab-pane fade in active" id="profile">
            </div>
        </div>
        <div data-modales="<?php echo $modulo;?>">
            <div  class="modal fade" id="modalCambia<?php echo $modulo;?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header headUpd">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="lbldetalle">Actualizar <?php echo $modulo;?></h3>
                        </div>
                        <div class="modal-body bodyUpd">
                        </div>
                        <div class="modal-footer footUpd">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php ?>