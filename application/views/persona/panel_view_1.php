<script type="text/javascript" src="<?php echo URL_JS; ?>persona/jsPersonaPanel.js" charset=UTF-8"></script>
<div class="row-fluid"  style="min-width: 300px;">
    <div class="span12">
        <div class="page-header">
            <h4>Gestión de Personas</h4>
        </div>
        <div style="margin-bottom: 20px;" class="containerModulo">
            <ul id="myTab" class="nav nav-tabs pattern">
                <li class="active"><a href="#home" data-toggle="tab">Nueva Persona</a></li>
                <li><a href="#profile" data-toggle="tab" id="tabqry">Buscar Persona</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <?php $this->load->view("persona/ins_view"); ?>
                </div>
                <div class="tab-pane fade" id="profile">
                    <?php //$this->load->view("persona/qry_view"); ?>
                </div>
            </div>
        </div>

    </div><!-- End .span6 -->  
</div>
<?php  ?>