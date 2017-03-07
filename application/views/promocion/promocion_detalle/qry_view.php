<script type="text/javascript" src="<?php echo URL_JS; ?>promocion/promocionDetalle/jsPromDetQry.js" charset=UTF-8"></script>
<style type="text/css">
    .colorPintaAzul{
        background-color: #D0E4F4;
    }
    
</style>
<div id="qry_lista_promocionDetalle">
    <input type="hidden" id="codPromocionDetalle" name="codPromocionDetalle" />
    <?php 
    $cont=1;
    if ($informacion) {
        //print_r($informacion);
        ?>
        <table id="qry_promocionDetalle" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Promocion</th>
                    <th>Cantidad</th>
                    <th>Descuento Unico</th>
                    <th class="colorPintaAzul">Desc<br/>Producto</th>
                    <th class="colorPintaAzul">Codigo<br/>Modelo</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $cont; ?></td>
                        <td><?php echo ($data["promocion"] == '') ? "-" : $data["promocion"]; ?></td>
                        <td><?php echo ($data["nPromDetCantidad"] == '') ? "-" : $data["nPromDetCantidad"]; ?></td>
                        <td><?php echo ($data["nPromDetDescuentoUnidad"] == '') ? "-" : $data["nPromDetDescuentoUnidad"]; ?></td>
                        <td class="colorPintaAzul"><?php echo ($data["cProDescripcion"] == '') ? "-" : "".$data["cProDescripcion"]; ?></td>
                        <td class="colorPintaAzul"><?php echo ($data["nModCodigo"] == '') ? "-" : "".$data["nModCodigo"]; ?></td>
                        <td>
                            <?php if ($data["nPromDetEstado"] == "1") { ?>
<!--                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelDelDetalleProducto(<php echo $data['nProdDetalleId']; ?>)" style="cursor: pointer;">
                                </a>-->
                            <?php } else { ?>
<!--                               <a class="iconic-icon-x" title='Inactivo' onClick="panelDelDetalleProducto(<php echo $data['nProdDetalleId']; ?>)" style="cursor: pointer;">
                                </a>-->
                            <?php } ?>
                        </td>
                    </tr>
                <?php 
                $cont++;
                } ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No se encuentran registros para Detalle Promocion";
    }
    ?>
</div>