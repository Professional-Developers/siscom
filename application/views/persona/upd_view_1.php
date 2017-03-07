<script type="text/javascript" src="<?php echo URL_JS ?>persona/jsPersonaUpd.js"></script>
<div class="box">
    <div class="title">
        <h4> 
            <span>Actualizar Datos</span>
        </h4>
    </div>

    <div class="content">
        <form class="form-horizontal" action="#" id="frmPersonaUpd" name="frmPersonaUpd">
            <input type="hidden" name="hdnidPersona_upd" id="hdnidPersona_upd" value="<?php echo $informacion[0]['nPerId'];?>"/>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerNombresUpd" >Nombre </label>
                        <input class="span6 todoMayuscula" type="text" id="txtcPerNombresUpd" name="txtcPerNombresUpd" placeholder="Ejm: Juan Valera" value="<?php echo $informacion[0]['cPerNombres'];?>" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerApellidoPaternoUpd" >Apellido Paterno </label>
                        <input class="span6 todoMayuscula" type="text" id="txtcPerApellidoPaternoUpd" name="txtcPerApellidoPaternoUpd" placeholder="Ejm: Perez" value="<?php echo $informacion[0]['cPerApellidoPaterno'];?>" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerApellidoMaternoUpd" >Apellido Materno </label>
                        <input class="span6 todoMayuscula" type="text" id="txtcPerApellidoMaternoUpd" name="txtcPerApellidoMaternoUpd" placeholder="Ejm: Flores" value="<?php echo $informacion[0]['cPerApellidoMaterno'];?>" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerDniUpd" >Dni </label>
                        <input class="span6" type="text" id="txtcPerDniUpd" name="txtcPerDniUpd"  minlength="8" maxlength="8" placeholder="Ejm: 45594215" value="<?php echo $informacion[0]['cPerDni'];?>" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerDireccionUpd" >Dirección </label>
                        <input class="span6 todoMayuscula" type="text" id="txtcPerDireccionUpd" name="txtcPerDireccionUpd" placeholder="Ejm: Los sables 532 urb La Arboleda" value="<?php echo $informacion[0]['cPerDireccion'];?>" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerTelefonoUpd" >Telefono </label>
                        <input class="span3" type="text" id="txtcPerTelefonoUpd" name="txtcPerTelefonoUpd" placeholder="Ejm: 044252827" value="<?php echo $informacion[0]['cPerTelefono'];?>" />
                    </div>
                </div>
            </div>
            <div class="form-row row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <label class="form-label span2" for="txtcPerCelularUpd" >Celular </label>
                        <input class="span3" type="text" id="txtcPerCelularUpd" name="txtcPerCelularUpd" placeholder="Ejm: 948356557" value="<?php echo $informacion[0]['cPerCelular'];?>" />
                    </div>
                </div>
            </div>	
            <div class="form-actions">
                <button type="submit" id="btnRegistrar" class="btn btn-info">Editar</button>
                
                <!-- <button type="submit" id="btnRegistrar" class="btn btn-info">Registrar</button> -->
                <div id="message"></div>
            </div>
        </form>
    </div>
    <div id="msjPersona">

    </div>

</div>