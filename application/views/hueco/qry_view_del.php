<script type="text/javascript" src="<?php echo URL_JS; ?>hueco/jsHuecoQryDel.js" charset=UTF-8"></script>
<div id="qry_lista_hueco_del">
    <input type="hidden" id="codHueco" name="codHueco" />
    <?php 
    $contador=1;
    if ($informacion) {
        //print_r($informacion);
        ?>
        <table id="qry_hueco_del" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Casillero</th>
                    <th>Stan</th>
                    <th>Almacen</th>
                    <th>Repisa</th>
                    <th>Fila</th>
                    <th>Columna</th>
                    <th>Celda</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <!--<td><php echo $cont; ?></td>-->
                        <!--<td><?php // echo ($data["nHuecoId"] == '') ? "-" : $data["nHuecoId"]; ?></td>-->
                        <td><?php echo $contador; ?></td>
                        <td><?php echo ($data["cHueNombre"] == '') ? "-" : $data["cHueNombre"]; ?></td>
                        <td><?php echo ($data["cSurNombre"] == '') ? "-" : $data["cSurNombre"]; ?></td>
                        <td><?php echo ($data["cAlmNombre"] == '') ? "-" : $data["cAlmNombre"]; ?></td>
                        <td><?php echo ($data["nIdRepisa"] == '') ? "-" : $data["nIdRepisa"]; ?></td>
                        <td><?php echo ($data["nIdFila"] == '') ? "-" : $data["nIdFila"]; ?></td>
                        <td><?php echo ($data["nIdColumna"] == '') ? "-" : $data["nIdColumna"]; ?></td>
                        <td><?php echo ($data["nIdCelda"] == '') ? "-" : $data["nIdCelda"]; ?></td>
                        <td>
                            <a title="editar" class="optEditar iconic-icon-pen-alt2" onclick="panelUpdHueco('hueco/panel_updHueco', '<?php echo htmlspecialchars(json_encode(array("nHuecoId" => $data['nHuecoId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                        <td>
                            <?php if ($data["nHueEstado"] == "1") { ?>
                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelActiveHueco(<?php echo $data['nHuecoId']; ?>)" style="cursor: pointer;">
                                </a>
                            <?php } else { ?>
                                <a class="iconic-icon-x" title='Inactivo' onClick="panelActiveHueco(<?php echo $data['nHuecoId']; ?>)" style="cursor: pointer;">
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
        echo "No se encuentran registros para casillero";
    }
    ?>
</div>