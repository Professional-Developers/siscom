<script type="text/javascript" src="<?php echo URL_JS; ?>almacen/jsAlmacenQryDel.js" charset=UTF-8"></script>
<div id="qry_lista_almacen_del">
    <input type="hidden" id="codAlmacen" name="codAlmacen" />
    <?php if ($informacion) {
        $contador=1;
        ?>
        <table id="qry_almacen_del" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Almacen</th>
                    <th>Ubicación (Dirección)</th>
                    <th>Stand</th>
                    <th>Telefono<br/> Stand</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $contador; ?></td>
                        <!--<td><php echo $data["nAlmId"]; ?></td>-->
                        <td><?php echo ($data["cAlmNombre"] == '') ? "-" : $data["cAlmNombre"]; ?></td>
                        <td><?php echo ($data["cAlmReferencia"] == '') ? "-" : $data["cAlmReferencia"]; ?></td>
                        <td><?php echo ($data["cSurNombre"] == '') ? "-" : $data["cSurNombre"]; ?></td>
                        <td><?php echo ($data["cSurTelefonos"] == '') ? "-" : $data["cSurTelefonos"]; ?></td>
                        <td>
                            <a title="editar" class="optEditar iconic-icon-pen-alt2" onclick="panelUpdAlmacen('almacen/panel_updAlmacen', '<?php echo htmlspecialchars(json_encode(array("nAlmId" => $data['nAlmId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                        <td>
                            <?php if ($data["cAlmEstado"] == "1") { ?>
                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelActiveAlmacen(<?php echo $data['nAlmId']; ?>)" style="cursor: pointer;">
                                </a>
                            <?php } else { ?>
                                <a class="iconic-icon-x" title='Inactivo' onClick="panelActiveAlmacen(<?php echo $data['nAlmId']; ?>)" style="cursor: pointer;">
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
        echo "No se encuentran registros para almacen";
    }
    ?>
</div>