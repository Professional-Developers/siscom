<script type="text/javascript" src="<?php echo URL_JS; ?>persona/jsPersonaIns.js"></script>
<!--<script type="text/javascript" src="http://localhost/vasoleche/js/persona/jsPersonaIns.js"></script>-->
<div class="box">
    <div class="title">
        <h4> 
            <span>Ingresar Datos</span>
            <span style='float:right;'><a href='../beneficiario'>!Para registrar un Beneficiario haga clic aqui!</a></span>
        </h4>
    </div>

    <div class="content">
        <form class="form-horizontal" action="#" id="frmPersonaInsa" name="frmPersonaInsa">
            
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerNombres" >Nombre </label>
                        <input class="span6 todoMayuscula" type="text" id="txtcPerNombres" name="txtcPerNombres" placeholder="Ejm: Juan Valera" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerApellidoPaterno" >Apellido Paterno </label>
                        <input class="span6 todoMayuscula" type="text" id="txtcPerApellidoPaterno" name="txtcPerApellidoPaterno" placeholder="Ejm: Perez" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerApellidoMaterno" >Apellido Materno </label>
                        <input class="span6 todoMayuscula" type="text" id="txtcPerApellidoMaterno" name="txtcPerApellidoMaterno" placeholder="Ejm: Flores" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerDni" >Dni </label>
                        <input class="span6" type="text" id="txtcPerDni" name="txtcPerDni"  minlength="8" maxlength="8" placeholder="Ejm: 45594215" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerDireccion" >Direccion </label>
                        <input class="span6 todoMayuscula" type="text" id="txtcPerDireccion" name="txtcPerDireccion" placeholder="Ejm: Los sables 532 urb La Arboleda" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerTelefono" >Telefono </label>
                        <input class="span3" type="text" id="txtcPerTelefono" name="txtcPerTelefono" placeholder="Ejm: 044252827" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerCelular" >Celular </label>
                        <input class="span3" type="text" id="txtcPerCelular" name="txtcPerCelular" placeholder="Ejm: 948356557" />
                    </div>
                </div>
            </div>	
            <div class="form-actions">
                <button type="submit" id="btnRegistrar" class="btn btn-info">Registrar</button>
                <button type="reset" id="btnCancelar" class="btn btn-default">cancelar</button>
                <!-- <button type="submit" id="btnRegistrar" class="btn btn-info">Registrar</button> -->
                <div id="message"></div>
            </div>
        </form>
    </div>
    <div id="msjPersona">

    </div>

</div>
