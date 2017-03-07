<!-- ssfjnsdfksndfkj -->
<script type="text/javascript" src="<?php echo URL_JS; ?>usuario/jsUsuarioQry.js"></script>
<div id="listaPermisos"></div>
<table id="qry_lista_personas_usuarios" cellpadding="0" cellspacing="0" border="0" class="responsive dynamicTable display table table-bordered" width="100%">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $fila) { ?>
        <tr class='todoMayuscula'>           
            <td><?php echo $fila["nUsuCodigo"]; ?></td>
            <td><?php echo $fila["cPerNombres"]; ?></td>
            <td><?php echo $fila["cPerApellidoPaterno"].' '.$fila["cPerApellidoMaterno"]; ?></td>
            <td><?php echo $fila["cPerDni"]; ?></td>
            <td>
                <a data-pk="<?php echo $fila["nUsuCodigo"]; ?>" class="optEditar" style="cursor: pointer;" data-pid="<?php echo $fila['nUsuCodigo'] ?>" title="Cambiar Clave">
                    <img title="Cambiar Clave" alt="x" src="<?php echo URL_IMG; ?>iconedit.png" width="20" height="20" />
                </a>
                &nbsp;
                <a id="btnoptAsignar" style="cursor: pointer;"  title="Asignar Permisos" class="optAsignar icomoon  icomoon-icon-tools " data-pid="<?php echo $fila['nUsuCodigo'] ?>" class="Cambiar Clave">
                </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Dni</th>
            <th>Acciones</th>
        </tr>
    </tfoot>
</table>
<!-- Boostrap modal dialog -->
<div id="permisosModal" class="modal hide fade" style="display: none; ">
    <div class="modal-header">
        <h3>Permisos Usuario</h3>
    </div>
    <div class="modal-body">
    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Cerrar</a>
        <button id="btnAsignar" class="btn btn-primary">Asignar Permisos</button>
        <!-- <a href="#" class="btn btn-primary"></a> -->
    </div>
</div>
