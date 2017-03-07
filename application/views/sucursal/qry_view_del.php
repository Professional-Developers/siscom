<script type="text/javascript" src="<?php echo URL_JS; ?>sucursal/jsSucursalQryDel.js" charset=UTF-8"></script>
<div id="qry_lista_empressa_del">
    <input type="hidden" id="codSucursal" name="codSucursal" />
    <?php if ($informacion) {
        $contador=1;
        ?>
        <table id="qry_sucursal_del" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Sucursal</th>
                    <th>Tipo</th>
                    <th>Descripcion<br/> Sucursal</th>
                    <th>Direccion</th>
                    <th>Telefonos</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <!--<td><php $data["nSurId"]; ?></td>-->
                        <td><?php echo $contador;?></td>
                        <td><?php echo ($data["cSurNombre"] == '') ? "-" : $data["cSurNombre"]; ?></td>
                        <td><?php echo ($data["tipoSucursal"] == '') ? "-" : $data["tipoSucursal"]; ?></td>
                        <td><?php echo ($data["cSurDescripcion"] == '') ? "-" : $data["cSurDescripcion"]; ?></td>
                        <td><?php echo ($data["cSurReferencia"] == '') ? "-" : $data["cSurReferencia"]; ?></td>
                        <td><?php echo ($data["cSurTelefonos"] == '') ? "-" : $data["cSurTelefonos"]; ?></td>
                        <td>
                            <a data-hasqtip="true" aria-describedby="qtip-15" oldtitle="Editar x" title="editar" class="optEditar iconic-icon-pen-alt2" onclick="panelUpdSucursal('sucursal/panel_updSucursal', '<?php echo htmlspecialchars(json_encode(array("nSurId" => $data['nSurId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                        <td>
                            <?php if ($data["estadoSucursal"] == "1") { ?>
                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelActiveSucursal(<?php echo htmlspecialchars($data['nSurId']);  ?>)" style="cursor: pointer;">
                                </a>
                            <?php } else { ?>
                                <a class="iconic-icon-x" title='Inactivo' onClick="panelActiveSucursal(<?php echo htmlspecialchars($data['nSurId']);  ?>)" style="cursor: pointer;">
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php 
                 $contador++;   
                } ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "No se encuentran registros para sucursal";
    }
    ?>
</div>