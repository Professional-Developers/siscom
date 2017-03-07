<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsProductoFuncionesComunes.js" charset=UTF-8"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>producto/fndProductos/jsProductoFnd.js" charset=UTF-8"></script>
<!--<script type="text/javascript" src="<?php // echo URL_JS; ?>producto/jsProductoPanel.js" charset=UTF-8"></script>-->
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
    $cont=1;
    //print_r($informacion);exit;
    if ($informacion) {
        ?>
        <table id="qry_producto" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Cod</th>
                    <th>Ubicacion</th>
                    <th>Modelo</th>
                    <th>Detalle</th>
                    <th>Stand</th>
                    <th>Almacen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo $data['codigogenerado'] ?></td>
                        <td class="codAgrupProductoQry"><?php echo "Repisa:" . $data['nIdRepisa'] . " Fila:" . $data['nIdFila'] . " Columna:" . $data['nIdColumna'] . " Celda:" . $data['nIdCelda'] . " Almacen:" . $data['cAlmNombre'] . " Stand:" . $data['cSurNombre']; ?></td>
                        <td><?php echo $data['nModCodigo'] ?></td>
                        <!--<td id="det-<php echo $data["codigogenerado"];?>" onmouseover="panelDetalleFnd(<php echo $data["codigogenerado"]; ?>)"><php echo substr($data['detalle'],0,30)." ..." ?></td>-->
                        <td class="opacity-image" id="det-<?php echo $data["codigogenerado"]; ?>" onclick="panelDetalleFnd(<?php echo $data["codigogenerado"]; ?>)"><?php echo substr($data['detalle'], 0, 30) . " ..." ?></td>
                        
                        
                        <td><?php echo $data['stand'] ?></td>
                        <td><?php echo $data['almacen'] ?></td>
                    </tr>
                <?php 
                $cont++;
                } ?>
            </tbody>
        </table>
        <?php
    } else { //echo "No se encuentran registros para productos";?>
        <table id="qry_producto" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
        </table>
    <?php }
    ?>
</div>