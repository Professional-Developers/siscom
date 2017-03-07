<script type="text/javascript" src="<?php echo URL_JS; ?>producto/productoPromocion/jsProdPromocionQry.js" charset=UTF-8"></script>
<style type="text/css">
    .colorPintaAzul{background-color: #D0E4F4;}
    .colorPintaRojo{background-color: #F48989;}/*red*/
</style>
<div id="qry_lista_productoDetalle">
    <input type="hidden" id="codProductoDetalle" name="codProductoDetalle" />
    <?php
    $cont = 1;
    if ($informacion) {
        //print_r($informacion);
        ?>
        <table id="qry_productoPromocion" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Descripcion</th>
                    <th>Descuento(%)</th>
                    <th class="colorPintaAzul">Stock</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo ($data["cProDescripcion"] == '') ? "-" : $data["cProDescripcion"]; ?></td>
                        <td><?php echo ($data["nPromPorcentaje"] == '') ? "-" : $data["nPromPorcentaje"]; ?></td>
                        <?php if ($data["nPromCantidadFinal"] == 0) {
                            $color = "colorPintaRojo";
                        } else
                            $color = "colorPintaAzul";
                        ?>
                        <td class="<?php echo $color;?>"><?php echo ($data["nPromCantidadFinal"] == '') ? "-" : $data["nPromCantidadFinal"]; ?></td>
                        <td>
                            <?php if ($data["nPromDetEstado"] == "1") { ?>
                                <a class="optDelDetalle iconic-icon-trash-stroke" title='Eliminar' onClick="panelDelDetalleProducto(<?php echo $data['nPromDetalleId']; ?>)" style="cursor: pointer;">
                                </a>
                            <?php } //else { ?>
<!--                                <a class="optDelDetalle iconic-icon-x" title='Inactivo' onClick="panelDelDetalleProducto(<php echo $data['nPromDetalleId']; ?>)" style="cursor: pointer;">
                                </a>-->
                    <?php //} ?>
                        </td>
                    </tr>
                    <?php
                    $cont++;
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No se encuentran registros para Promocion-Producto";
    }
    ?>
</div>