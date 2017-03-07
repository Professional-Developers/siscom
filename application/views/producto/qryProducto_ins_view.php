<script type="text/javascript" src="<?php echo URL_JS; ?>producto/jsqryProducto_ins_view.js" charset=UTF-8"></script>

    <div id="qry_lista_insproducto">
        <input type="hidden" id="codProductoInsertado" name="codProductoInsertado" />
        <h3>Último Ingreso Producto</h3>
        <?php
        $cont = 1;
        if ($informacion) {
            ?>
            <table id="qry_producto_insertado" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Codigo<br/>Generado</th>
                        <th>Descripcion</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Almacen</th>
                        <th>Stand</th>
                        <!--<th>Promocion</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($informacion as $data) { ?>
                        <tr class='todoMayuscula' >
                            <td><?php echo $cont; ?></td>
                            <td><?php echo ($data["codigogenerado"] == '') ? "-" : $data["codigogenerado"]; ?></td>
                            <!--<td class="codAgrupModelo" data-detalle="<php echo "Repisa:" . $data['nIdRepisa'] . " Fila:" . $data['nIdFila'] . " Columna:" . $data['nIdColumna'] . " Celda:" . $data['nIdCelda'] . " Almacen:" . $data['cAlmNombre'] . " Stand:" . $data['cSurNombre']; ?>"><php echo ($data["cProDescripcion"] == '') ? "-" : $data["cProDescripcion"]; ?></td>-->
                            <td class="codAgrupModelo" ><?php echo "Repisa:" . $data['nIdRepisa'] . " Fila:" . $data['nIdFila'] . " Columna:" . $data['nIdColumna'] . " Celda:" . $data['nIdCelda'] . " Almacen:" . $data['cAlmNombre'] . " Stand:" . $data['cSurNombre']; ?></td>
                            <td><?php echo ($data["nModCodigo"] == '') ? "-" : $data["nModCodigo"]; ?></td>
                            <td><?php echo ($data["nProPrecioReferencial"] == '') ? "-" : $data["nProPrecioReferencial"]; ?></td>
                            <td><?php echo ($data['cAlmNombre'] == '') ? "-" : $data['cAlmNombre']; ?></td>
                            <td><?php echo ($data['cSurNombre'] == '') ? "-" : $data['cSurNombre']; ?></td>
                            <!--<td><?php // echo ($data['cProDescripcion'] == '') ? "-" : $data['cProDescripcion'];?></td>-->
                        </tr>
                        <?php
                        $cont++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            //echo "No se encuentran registros para productos";
        }
        ?>
    </div>