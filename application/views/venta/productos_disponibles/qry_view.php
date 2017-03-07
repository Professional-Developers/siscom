<!--<script type="text/javascript" src="<php echo URL_JS; ?>envioProducto/jsDerivarProductoQry.js" charset=UTF-8"></script>-->
<script type="text/javascript" src="<?php echo URL_JS; ?>misproductos/productos_disponibles/jsDerivarProductoQry.js" charset=UTF-8"></script>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default gradient">
<!--            <div class="panel-heading">
                <h4>
                    <span>Data table</span>
                </h4>
            </div>-->
            <div class="panel-body noPad clearfix" id="qry_lista_producto">
                <input type="hidden" id="codProducto" name="codProducto" />
                <?php
                $cont = 1;
                if ($informacion) {
                    ?>
                    <table id="qry_Derivar_producto" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Codigo</th>
                                <th>Ubicacion</th>
                                <th>Modelo</th>
                                <th>Detalle</th>
                                <th>Stand</th>
                                <th>Almacen</th>
<!--                                <th></th>-->
                                <th></th>
                                <th>Prestar</th>
                                <!--<th></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($informacion as $data) { ?>
                                <tr class='todoMayuscula'>
                                    <td><?php echo $cont; ?></td>
                                    <td><?php echo ($data["codigogenerado"] == '') ? "-" : $data["codigogenerado"]; ?></td>
                                    <!--<td class="codAgrupProductoQry" data-detalleproducto="<php echo "Repisa:" . $data['nIdRepisa'] . " Fila:" . $data['nIdFila'] . " Columna:" . $data['nIdColumna'] . " Celda:" . $data['nIdCelda'] . " Almacen:" . $data['cAlmNombre'] . " Stand:" . $data['cSurNombre']; ?>"><?php // echo ($data["cProDescripcion"] == '') ? "-" : $data["cProDescripcion"]; ?></td>-->
                                    <td class="codAgrupProductoQry"><?php echo "Repisa:" . $data['nIdRepisa'] . " Fila:" . $data['nIdFila'] . " Columna:" . $data['nIdColumna'] . " Celda:" . $data['nIdCelda'] . " Almacen:" . $data['cAlmNombre'] . " Stand:" . $data['cSurNombre']; ?></td>
                                    <td><?php echo ($data["nModCodigo"] == '') ? "-" : $data["nModCodigo"]; ?></td>
                                    <td id="det-<?php echo $data["codigogenerado"];?>" onmouseover="panelDetalleMisProd(<?php echo $data["codigogenerado"]; ?>)"><?php echo substr($data['detalle'],0,30)." ..." ?></td>
                                    <!--<td><?php // echo ($data["nProPrecioReferencial"] == '') ? "-" : $data["nProPrecioReferencial"]; ?></td>-->
                                    <td><?php echo ($data["stand"] == '') ? "-" : $data["stand"]; ?></td>
                                    <td><?php echo ($data["almacen"] == '') ? "-" : $data["almacen"]; ?></td>
                                    <!--<td><?php // echo ($data["promocion"] == '') ? "-" : $data["promocion"]; ?></td>-->
<!--                                    <td>
                                        <a id="det-<?php // echo $data["codigogenerado"]; ?>" title="" class="optDet icomoon-icon-cube-2" onmouseover="panelDetalle(<?php echo $data["codigogenerado"]; ?>)" style="cursor: pointer;" >
                                        </a>
                                    </td>-->
                                    <td>
                                        <input class="call-checkbox" type="checkbox" id="prod_<?php echo $data["nProductoHueco"]; ?>" name="orderBox[]" value="<?php echo $data["nProductoHueco"]; ?>" />  
                                    </td>
                                    <td>
                                        <a title="Prestar" class="optPrestar  icomoon-icon-bubble-right" onclick="panelupdPrestarProducto('producto/paneloptPrestamoProducto', '<?php echo htmlspecialchars(json_encode(array("nProductoHueco" => $data['codigogenerado']))); ?>', '')" style="cursor: pointer;" >
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
                    <table id="qry_Derivar_producto" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                    </table>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>