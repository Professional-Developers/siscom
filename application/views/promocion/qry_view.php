<script type="text/javascript" src="<?php echo URL_JS; ?>promocion/jsPromocionQry.js" charset=UTF-8"></script>
<div id="qry_lista_promocion">
    <input type="hidden" id="codPromocion" name="codPromocion" />
    <?php
    if ($informacion) {
        $contador = 1;
        ?>
        <table id="qry_almacen" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Descripcion</th>
                    <th>Descuento(%)</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Stock Inicial</th>
                    <th>Stock Final</th>
                    <th>Publicidad</th>
<!--                    <th></th>
                    <th></th>
                    <th></th>-->
                </tr>
            </thead>
            <tbody>
    <?php foreach ($informacion as $data) { 
        $logo=($data["cPromFoto"] == '') ? "sinEmpresa.jpg" : $data["cPromFoto"];
        $ruta = URL_MAIN."uploads/promociones/";
        ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $contador; ?></td>
                        <!--<td><php echo $data["nAlmId"]; ?></td>-->
                        <td><?php echo ($data["cProDescripcion"] == '') ? "-" : $data["cProDescripcion"]; ?></td>
                        <td><?php echo ($data["nPromPorcentaje"] == '') ? "-" : $data["nPromPorcentaje"]; ?></td>
                        <td><?php echo ($data["fechainicio"] == '') ? "-" : $data["fechainicio"]; ?></td>
                        <td><?php echo ($data["fechafin"] == '') ? "-" : $data["fechafin"]; ?></td>
                        <td><?php echo ($data["nPromCantidadInicial"] == '') ? "-" : $data["nPromCantidadInicial"]; ?></td>
                        <td><?php echo ($data["nPromCantidadFinal"] == '') ? "-" : $data["nPromCantidadFinal"]; ?></td>
                        <td><a target="_blank" href="<?php echo $ruta;?><?php echo $logo;?>"><img class="imagenParaTabla" src="<?php echo $ruta;?><?php echo $logo;?>" /></a></td>
                        <!--<td><a title="Detalle" class="optPromDetalle iconic-icon-cog " onclick="panelAddCaracteristica('producto/panel_addCaracteristica', '<php echo htmlspecialchars(json_encode(array("nProId" => $data['nProId']))); ?>', '')" style="cursor: pointer;" >-->
<!--                        <td>
                            <a title="Detalle" class="optPromDetalle iconic-icon-cog " onclick="panelAddPromDetalle('promocion/panel_addPromDetalle', '<php echo htmlspecialchars(json_encode(array("nPromId" => $data['nPromId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>-->
                        <!--<td>-->
        <!--                            <a title="editar" class="optEditar iconic-icon-pen-alt2" onclick="panelUpdAlmacen('almacen/panel_updAlmacen', '<php echo htmlspecialchars(json_encode(array("nPromId" => $data['nPromId']))); ?>', '')" style="cursor: pointer;" >
                            </a>-->
                        <!--</td>-->
                        <!--<td>-->
        <?php if ($data["nPromEstado"] == "1") { ?>
            <!--                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelDelAlmacen(<php echo $data['nAlmId']; ?>)" style="cursor: pointer;">
                                    </a>-->
        <?php } else { ?>
            <!--                                <a class="iconic-icon-x" title='Inactivo' onClick="panelDelAlmacen(<php echo $data['nAlmId']; ?>)" style="cursor: pointer;">
                                    </a>-->
        <?php } ?>
                        <!--</td>-->
                    <!--</tr>-->
                    <?php
                    $contador++;
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No se encuentran registros de promociones";
    }
    ?>
</div>