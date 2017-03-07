<!--<script type="text/javascript" src="<php echo URL_JS; ?>envioProducto/jsDerivarProductoQry.js" charset=UTF-8"></script>-->
<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoFuncionesComunes.js" charset=UTF-8"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>misproductos/productos_disponibles/jsDerivarProductoQry.js" charset=UTF-8"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>carrito/jsCarrito.js" charset=UTF-8"></script>
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
<div class="row">
    <?php //print_r($informacion);?>
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
                                <th>Vender</th>
                                <th>Prestar</th>
                                <!--<th></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($informacion as $data) { ?>
                                <tr class='todoMayuscula'>
                                    <td><?php echo $cont; ?></td>
                                    <td><?php echo ($data["codigogenerado"] == '') ? "-" : $data["codigogenerado"]; ?></td>
                                    <td class="codAgrupProductoQry"><?php echo "Repisa:" . $data['nIdRepisa'] . " Fila:" . $data['nIdFila'] . " Columna:" . $data['nIdColumna'] . " Celda:" . $data['nIdCelda'] . " Almacen:" . $data['cAlmNombre'] . " Stand:" . $data['cSurNombre']; ?></td>
                                    <td><?php echo ($data["nModCodigo"] == '') ? "-" : $data["nModCodigo"]; ?></td>
                                    <td class="opacity-image" id="det-<?php echo $data["codigogenerado"]; ?>" onclick="panelDetalleFnd(<?php echo $data["codigogenerado"]; ?>)"><?php echo substr($data['detalle'], 0, 30) . " ..." ?></td>

                                            <!--<td><?php // echo ($data["nProPrecioReferencial"] == '') ? "-" : $data["nProPrecioReferencial"];  ?></td>-->
                                    <td><?php echo ($data["stand"] == '') ? "-" : $data["stand"]; ?></td>
                                    <td><?php echo ($data["almacen"] == '') ? "-" : $data["almacen"]; ?></td>
                                    <td>
                                        <a title="Agregar al Carrito" class="optVender icomoon-icon-cart-5" onclick="panelupdVenderProducto('producto/add_item', '<?php echo htmlspecialchars(json_encode(array("nProductoHueco" => $data['codigogenerado'], 'precio' => $data['nProPrecioReferencial'], 'modelo' => $data['nModCodigo'], 'descripcion' => $data['cProDescripcion'],'detalle'=>$data['detalle']))); ?>', '')" style="cursor: pointer;" >
                                        </a>
                                    </td>
                                    <td>
                                        <input class="call-checkbox" type="checkbox" id="prod_<?php echo $data["nProductoHueco"]; ?>" name="orderBox[]" value="<?php echo $data["nProductoHueco"]; ?>" />  
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



<div id="qry_nuevo">

</div>