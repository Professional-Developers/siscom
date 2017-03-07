<script type="text/javascript" src="<?php echo URL_JS; ?>productoHueco/jsProductoHuecoQry.js" charset=UTF-8"></script>
<div id="div_qry_producto_casillero">
    <input type="hidden" id="codProducto" name="codProducto" />
    <?php 
    $cont=1;
    if ($informacion) {
        //print_r($informacion);exit;
        ?>
        <table id="qry_producto_casillero" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Producto</th>
                    <th>Casillero</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo ($data["cProDescripcion"] == '') ? "-" : $data["cProDescripcion"]; ?></td>
                        <td><?php echo ($data["cHueNombre"] == '') ? "-" : $data["cHueNombre"]; ?></td>
                        <td><?php echo ($data["nCantidad"] == '') ? "-" : $data["nCantidad"]; ?></td>
                    </tr>
                <?php 
                $cont++;
                } ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No se encuentran asignaciones";
    }
    ?>
</div>