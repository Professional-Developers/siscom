<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoFuncionesComunes.js" charset=UTF-8"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoQry.js" charset=UTF-8"></script>
<style>
    td.opacity-image {
        opacity: 0.7;
        filter:alpha(opacity=10); /* This is IE specific and NOT standards complaint */
        cursor: pointer;
        //background-color: red;
    }
    td.opacity-image:hover {
        background-color: #B9DFF7 !important;
        opacity: 1;
        filter:alpha(opacity=100); /* Again, 'filter:' is IE specific. */
        cursor: pointer;
    }
</style>
<style>
    td.opacity-image {
        opacity: 0.7;
        filter:alpha(opacity=10); /* This is IE specific and NOT standards complaint */
        cursor: pointer;
        //background-color: red;
    }

    td.opacity-image:hover {
        background-color: #B9DFF7 !important;
        opacity: 1;
        filter:alpha(opacity=100); /* Again, 'filter:' is IE specific. */
        cursor: pointer;
    }
</style>
<div id="qry_lista_producto">
    <input type="hidden" id="codProducto" name="codProducto" />
    <?php
    $cont = 1;
    //print_r($informacion);
    if ($informacion) {
        ?>
        <table id="qry_producto" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Codigo</th>
                    <th>Ubicacion</th>
                    <th>Modelo</th>
                    <th>Detalle</th>
                    <!--<th>Precio</th>-->
                    <th>Stand</th>
                    <th>Almacen</th>
                    <!--<th>Promocion</th>-->
                    <!--<th></th>-->
                    <th>Carac.</th>
                    <th>Prom.</th>
                    <!--<th></th>-->
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo ($data["codigogenerado"] == '') ? "-" : $data["codigogenerado"]; ?></td>
                        <!--<td class="codAgrupProductoQry" data-detalleproducto="<php echo "Repisa:" . $data['nIdRepisa'] . " Fila:" . $data['nIdFila'] . " Columna:" . $data['nIdColumna'] . " Celda:" . $data['nIdCelda'] . " Almacen:" . $data['cAlmNombre'] . " Stand:" . $data['cSurNombre']; ?>"><?php echo ($data["cProDescripcion"] == '') ? "-" : $data["cProDescripcion"]; ?></td>-->
                        <td class="codAgrupProductoQry"><?php echo "Repisa:" . $data['nIdRepisa'] . " Fila:" . $data['nIdFila'] . " Columna:" . $data['nIdColumna'] . " Celda:" . $data['nIdCelda'] . " Almacen:" . $data['cAlmNombre'] . " Stand:" . $data['cSurNombre']; ?></td>
                        <td><?php echo ($data["nModCodigo"] == '') ? "-" : $data["nModCodigo"]; ?></td>
                        <td class="opacity-image" id="det-<?php echo $data["codigogenerado"]; ?>" onclick="panelDetalleFnd(<?php echo $data["codigogenerado"]; ?>)"><?php echo substr($data['detalle'], 0, 30) . " ..." ?></td>
                        <!--<td><?php // echo ($data["nProPrecioReferencial"] == '') ? "-" : $data["nProPrecioReferencial"];  ?></td>-->
                        <td><?php echo ($data["stand"] == '') ? "-" : $data["stand"]; ?></td>
                        <td><?php echo ($data["almacen"] == '') ? "-" : $data["almacen"]; ?></td>
                        <!--<td><?php //echo ($data['promocion'] == '') ? "-" : $data['promocion']; ?></td>-->
        <!--                        <td>
                            <a id="det-<?php // echo $data["codigogenerado"]; ?>" title="" class="optDet icomoon-icon-cube-2" onmouseover="panelDetalle(<?php echo $data["codigogenerado"]; ?>)" style="cursor: pointer;" >
                            </a>
                        </td>-->
                        <td>
                            <a title="Caracteristicas" class="optCaracteristicas iconic-icon-cog " onclick="panelAddCaracteristica('producto/panel_addCaracteristica', '<?php echo htmlspecialchars(json_encode(array("nProdHueco" => $data['codigogenerado']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                        <td>
                            <a title="Promocion" class="optPromocion  icomoon-icon-gift" onclick="panelAddPromocion('producto/panel_addPromocion', '<?php echo htmlspecialchars(json_encode(array("nProdHueco" => $data['codigogenerado']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
        <!--                        <td>
                            <a title="Asignar Casillero" class="optCasillero icomoon-icon-cube  " onclick="panelAddCasillero('producto/panel_addCasillero', '<php echo htmlspecialchars(json_encode(array("nProId" => $data['nProId'],"descripcion"=>$data['cProDescripcion'],"nModeloId"=>$data['nModeloId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>-->
                        <td>
                            <a title="editar" class="optEditarProducto iconic-icon-pen-alt2" onclick="panelUpdProducto('producto/panel_updProducto', '<?php echo htmlspecialchars(json_encode(array("nProdHueco" => $data['codigogenerado']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                        <td>
                            <?php if ($data["cProHueEstado"] != "I") { ?>
                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelDelProducto(<?php echo $data['codigogenerado']; ?>)" style="cursor: pointer;">
                                </a>
                            <?php } else { ?>
                                <a class="iconic-icon-x" title='Inactivo' onClick="panelDelProducto(<?php echo $data['codigogenerado']; ?>)" style="cursor: pointer;">
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                    $cont++;
                }
                ?>
            </tbody>
        </table>
        <?php } else { //echo "No se encuentran registros para productos";
        ?>
        <table id="qry_producto" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
        </table>
    <?php }
    ?>
</div>