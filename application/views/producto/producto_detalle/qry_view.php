<script type="text/javascript" src="<?php echo URL_JS; ?>producto/productoDetalle/jsProdDetQry.js" charset=UTF-8"></script>

<style type="text/css">
    .colorPintaAzul{
        background-color: #D0E4F4;
    }

</style>
<div id="qry_lista_productoDetalle">
    <input type="hidden" id="codProductoDetalle" name="codProductoDetalle" />
    <?php
    $cont = 1;
    if ($informacion) {
        //print_r($informacion);
        ?>
        <table id="qry_productoDetalle" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <!--<th>Descripcion</th>
                    <th>Codigo Modelo</th>
                    <th>Precio Referencial</th>-->
                    <th class="colorPintaAzul">Tipo Detalle</th>
                    <th class="colorPintaAzul">Detalle</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $cont; ?></td>
        <!--                        <td><?php // echo ($data["cProDescripcion"] == '') ? "-" : $data["cProDescripcion"];  ?></td>
                        <td><?php // echo ($data["nModCodigo"] == '') ? "-" : $data["nModCodigo"];  ?></td>
                        <td><?php // echo ($data["nProPrecioReferencial"] == '') ? "-" : $data["nProPrecioReferencial"];  ?></td>-->
                        <td class="colorPintaAzul"><?php echo ($data["tipoDetalle"] == '') ? "-" : $data["tipoDetalle"]; ?></td>
                        <td class="colorPintaAzul"><?php echo ($data["detalle"] == '') ? "-" : $data["detalle"]; ?></td>
                        <td>
                            <?php if ($data["nProdDetalleEstado"] == "1") { ?>
                                <a class="optDelDetalle iconic-icon-check-alt" title='Activo' onClick="panelDelDetalleProducto(<?php echo $data['nProdDetalleId']; ?>)" style="cursor: pointer;">
                                </a>
                            <?php } else { ?>
                                <a class="optDelDetalle iconic-icon-x" title='Inactivo' onClick="panelDelDetalleProducto(<?php echo $data['nProdDetalleId']; ?>)" style="cursor: pointer;">
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
        <?php
    } else {
        echo "No se encuentran registros para Detalle Producto";
    }
    ?>
</div>