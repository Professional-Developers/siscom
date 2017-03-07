<!--<script type="text/javascript" src="<php echo URL_JS; ?>envioProducto/jsDerivarProductoQry.js" charset=UTF-8"></script>-->
<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoFuncionesComunes.js" charset=UTF-8"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>misproductos/productos_x_recibir/jsProductosRecibirQry.js" charset=UTF-8"></script>
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
<div id="qry_lista_producto_x_recibir">
    <input type="hidden" id="nProductoHueco" name="nProductoHueco" />
    <?php
    $cont = 1;
    if ($informacion) {
        ?>
        <table id="qry_productos_x_recibir" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Codigo</th>
                    <th>Ubicacion</th>
                    <th>Modelo</th>
                    <th>Detalle</th>
                    <th>Por Recibir<br/>(Stand)</th>
                    <th>Almacen</th>
                    <!--<th>Promocion</th>-->
                    <th>Recibir</th>
                    <!--<th></th>-->
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
                        <!--<td id="det-<php echo $data["codigogenerado"];?>" onmouseover="panelDetallexRecibir(<php echo $data["codigogenerado"]; ?>)"><php echo substr($data['detalle'],0,30)." ..." ?></td>-->
                        <td class="opacity-image" id="det-<?php echo $data["codigogenerado"]; ?>" onclick="panelDetalleFnd(<?php echo $data["codigogenerado"]; ?>)"><?php echo substr($data['detalle'], 0, 30) . " ..." ?></td>
                        
                        <!--<td><?php // echo ($data["nProPrecioReferencial"] == '') ? "-" : $data["nProPrecioReferencial"]; ?></td>-->
                        <td><?php echo ($data["stand"] == '') ? "-" : $data["stand"]; ?></td>
                        <td><?php echo ($data["almacen"] == '') ? "-" : $data["almacen"]; ?></td>
<!--                        <td>
                            <a id="det-<php echo $data["codigogenerado"];?>" title="" class="optDet icomoon-icon-cube-2" onmouseover="panelDetalle(<?php echo $data["codigogenerado"]; ?>)" style="cursor: pointer;" >
                            </a>
                        </td>-->
                        <td>
                            <a title="Recibir" class="optRecibir icomoon-icon-file-download" onclick="updRecibirProducto('producto/optRecibirProducto', '<?php echo htmlspecialchars(json_encode(array("nProductoHueco" => $data['codigogenerado']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                    </tr>
                    <?php
                    $cont++;
                }
                ?>
            </tbody>
        </table>
        <?php } else {
        ?>
        <table id="qry_productos_x_recibir" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
        </table>
    <?php }
    ?>
</div>