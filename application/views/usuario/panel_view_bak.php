<script type="text/javascript" src="<?php echo URL_JS; ?>usuario/jsUsuario.js"></script>
<!--<div class="row-fluid">
    <div class="span12">-->
<div class="col-lg-12">
        <div class="page-header">
            <h4>Registro y Asignación de Usuarios</h4>
        </div>
        <div style="margin-bottom: 20px;">
            <ul id="ListasUsers" class="nav nav-tabs pattern">
                <li class="active"><a href="#home" data-toggle="tab">Nueva Usuario</a></li>
                <li><a href="#listaPersonasUsuarios" data-toggle="tab" id="listaPerUsers" >Listar Usuarios</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <?php $this->load->view("usuario/ins_view"); ?>
                </div>
                <div class="tab-pane fade" id="listaPersonasUsuarios">
                </div>
            </div>
        </div>
</div>
<!--    </div> End .span6   
</div>-->
<div  class="modal fade" id="modalCambiaPass"  tabindex="-1" role="dialog" aria-labelledby="lbldetalle" aria-hidden="true">
<!--<div class="modal fade"  id="myModal"          tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="lbldetalle">Cambiar Clave...</h3>
            </div>
            <div class="modal-body" id="modalCambiaPass_body">
                <form action="usuario/updateClave" type="post">
                    <div class="content">
                        <div class="form-row row-fluid">
                            <div class="span12">
                                <div class="row-fluid">
                                    <label class="form-label span3" for="txtClave" >Clave(Nueva) </label>
                                    <input type="hidden" value="" id="codUsuario" name="codUsuario">
                                    <input type="text" class="span5" id="txtClaveUpd" name="txtClaveUpd" >
                                </div>
                            </div>
                            <div id="infopersona"></div>
                        </div>    
                    </div>    
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnchange" class="btn btn-primary">Cambiar Clave</button>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            </div>
        </div>
    </div>
</div>




<!--<div id="modalCambiaPass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="lbldetalle" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="lbldetalle">Cambiar Clave...</h3>
    </div>
    <div id="modalCambiaPass_body" class="modal-body">
        <form action="usuario/updateClave" type="post">
            <div class="content">
                <div class="form-row row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <label class="form-label span3" for="txtClave" >Clave(Nueva) </label>
                            <input type="hidden" value="" id="codUsuario" name="codUsuario">
                            <input type="text" class="span5" id="txtClaveUpd" name="txtClaveUpd" >
                        </div>
                    </div>
                    <div id="infopersona"></div>
                </div>    
            </div>    
        </form>


        <p></p>
    </div>
    <div class="modal-footer">
        <button id="btnchange" class="btn btn-primary">Cambiar Clave</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
    </div>
</div>-->