<script type="text/javascript" src="<?php echo URL_JS; ?>carrito/jsCarritoIns.js" charset=UTF-8"></script>
<?php if (!empty($items)) { //print_r($items);?>

    <style type="text/css">
        .tablaCabeceraCarrito td{
            padding: 4px;
        }
        .tablaCarrito td,th{
            padding: 5px;
        }
        .tablaCarrito2 td,th{
            padding: 5px;
        }
        .negrito{
            font-weight: bold;
        }
        .centrado{text-align:center}
        .cl_contenedorVenta{border: dashed;}
    </style>
    <!--<h2>CARRITO DE COMPRAS</h2>-->
    <div style="float:left">
        <a href="javascript:imprSelec('contenedorVenta')" title="Imprimir"><img src="<?php echo base_url(); ?>images/impresora.png" width="100" height="100" /></a>
    </div>
    <div id="contenedorVenta" align="center" style="float:left;width: 600px;">
        <div  class="cl_contenedorVenta">
            <!--    <h2 class="centrado">Ticket de Venta</h2>-->
            <table class="tablaCabeceraCarrito">
                <tr>
                    <td colspan="2" class="negrito centrado">Ticket de Venta</td>
                </tr>
                <tr>
                    <td colspan="2" class="negrito centrado">D'Luanas </td>
                </tr>
                <tr>
                    <td class="negrito">Vendedor</td>
                    <td><?php echo $vendedor[0]['cPerNombres'] . " " . $vendedor[0]['cPerApellidoPaterno'] . " " . $vendedor[0]['cPerApellidoMaterno']; ?></td>
                </tr>
                <tr>
                    <td class="negrito">Stand</td>
                    <td><?php echo $vendedor[0]['sucursal']; ?></td>
                </tr>
                <tr>
                    <td class="negrito">Fecha</td>
                    <td><?php //$fecha2=time()-3600;echo date("H:i:s",$fecha2);           ?>
                        <?php echo date("d/m/Y H:i:s"); ?>
                    </td>
                </tr>
                <tr>
                    <td class="negrito">Cliente</td>
                    <td>
                        <input type="text" value="" id="txt_idCliente" />
                        <label id="lbl_idCliente"></label>
                    </td>
                </tr>
            </table>
            <table class="tablaCarrito2" style="text-align: left;">
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Promoción</th>
                    <th>Descuento</th>
                    <th colspan="5"></th>
                </tr>

                <?php
                $cuenta = 1;
                if (is_array($promociones)) {
                    foreach ($promociones as $prom) {
                        if (is_array($prom)) {
                            foreach ($prom as $pr) {
                                echo "<tr>";
                                echo "<td>" . $cuenta . "</td>";
                                echo "<td>" . strtolower($pr['cProDescripcion']) . "</td>";
                                echo "<td>";
                                //echo "<span>" . $prom['promocion'] . " dscto:" . ($prom['porcentaje']=='') ? 0 : $prom['porcentaje']. "</span><br/>";
                                echo "<span>" . strtolower($pr['promocion']) . "</span><br/>";
                                echo "</td>";
                                echo "<td>";
                                $promo = ($pr['porcentaje'] == '') ? 0 : $pr['porcentaje'];
                                echo "<span>" . "" . $promo . "%</span><br/>";
                                echo "</td>";
                                echo "<td colspan='5'></td>";
                                echo "</tr>";
                                $cuenta++;
                            }
                        }
                    }
                } else {
                    echo "Sin Promocion";
                }
                ?>
            </table>
            <table class="tablaCarrito">
                <tr>
                    <th width="5%">#</th>
                    <!--<th>Imagen</th>-->
                    <th width="15%">Producto</th>
                    <th width="15%">Caracteris.</th>
                    <th width="5%">Modelo</th>
                    <th width="8%">Precio</th>
                    <th width="7%"></th>
                    <th width="5%">Cant.</th>
                    <th width="10%">Sub<br/>Total1.</th>
                    <th width="10%">Dscto</th>
                    <th width="10%">Sub<br/>Total2.</th>
                    <th width="10%"></th>
                </tr>
                <?php
                $i = 1;
                $toddescuento = 0;
                foreach ($items as $item) :
                    /* if (is_array($item['promocion'])) {
                      foreach ($item['promocion'] as $pr) {
                      $toddescuento = $toddescuento + $pr['porcentaje'];
                      }
                      } */
                    ?>
                    <tr>
                        <td width="5%"><?php echo $i++; ?></td>
                        <!--<td><img src="<php echo base_url() . "images/zapatos/" . $item["imagen"]; ?>" width="30"></td>-->
                        <!--<td></td>-->
                        <td width="15%"><?php echo strtolower($item["descripcion"]); ?></td>
                        <td width="15%"><?php echo strtolower($item["detalle"]); ?></td>
                        <td width="5%"><?php echo $item["modelo"]; ?></td>
                        <td width="8%">
                            <input style="width: 50px;" class="update_precio" id="update_precio_<?php echo $item["nProductoHueco"]; ?>" type="number" value='<?php echo number_format($item["precio"], 2); ?>'  onkeypress="return IsNumber(event);"  />
                            <label class="lbl_idprecio"><?php echo number_format($item["precio"], 2); ?></label>
                            <?php
                            $image_properties = array(
                                'src' => base_url() . 'images/update.png',
                                'alt' => 'Actualizar',
                                'width' => '25',
                                'height' => '25',
                                'title' => 'Actualizar',
                            );
                            //echo anchor('javascript:void(0);', img(base_url() . 'images/update.png'), array('class' => 'actualizar_item', 'data-idprod' => $item["nProductoHueco"]));
                            ?>
                        </td>
                        <td width="7%"><?php echo anchor('javascript:void(0);', img($image_properties), array('class' => 'actualizar_item', 'data-idprod' => $item["nProductoHueco"])); ?></td>
                        <td width="5%">
                            <!--<input type="number" id="update_cantidad_<php echo $item["id_producto"]; ?>"-->  
                            <span id="update_cantidad_<?php echo $item["nProductoHueco"]; ?>">1</span>
                            <?php //echo anchor('javascript:void(0);', img(base_url() . 'images/update.png'), array('class' => 'actualizar_item', 'data-idprod' => $item["nProductoHueco"]));      ?>
                            <?php //echo anchor('#', img(base_url() . 'images/update.png'), array('class' => 'actualizar_item', 'data-idprod' => $item["id_producto"]));     ?>
                        </td>
                        <!--<td>
                        <?php
                        /* if (is_array($item['promocion'])) {
                          foreach ($item['promocion'] as $prom) {
                          //echo "<span>" . $prom['promocion'] . " dscto:" . ($prom['porcentaje']=='') ? 0 : $prom['porcentaje']. "</span><br/>";
                          $promo = ($prom['porcentaje'] == '') ? 0 : $prom['porcentaje'];
                          echo "<span>" . $prom['promocion'] . " dscto:" . $promo . "%</span><br/>";
                          }
                          } else {
                          echo "Sin Promocion";
                          } */
                        ?>
                        </td>-->
                        <td width="10%">$ <?php echo number_format(($item["precio"] * $item["cantidad"]), 2); ?></td>
                        <!--<td><span id="update_porcentaje_<php echo $item["nProductoHueco"]; ?>"><php echo $toddescuento; ?></span>%</td>-->
                        <td width="10%"><span id="update_porcentaje_<?php echo $item["nProductoHueco"]; ?>"><?php echo $item["descuento"]; ?></span>%</td>
                        <!--<td>$ <php echo number_format((($item["precio"] * $item["cantidad"]) * (100 - $toddescuento) / 100),2); ?></td>-->
                        <td width="10%"> $ <?php echo number_format((($item["precio"] * $item["cantidad"]) * (100 - $item["descuento"]) / 100), 2); ?></td>
                        <td width="10%">
                            <?php // echo anchor('principal/delete/' . $item["id_producto"], img(base_url() . 'images/delete.png'), 'title="Quitar item"');     
                            $image_properties = array(
                                'src' => base_url() . 'images/delete.png',
                                'alt' => 'Eliminar',
                                'width' => '20',
                                'height' => '20',
                                'title' => 'Eliminar',
                            );?>
                            <!--<a href="javascript:void(0);" class="delete_item" data-idproddel="<php echo $item["nProductoHueco"]; ?>"  title="Quitar item"><php echo img(base_url() . 'images/delete.png'); ?></a>-->
                            <a href="javascript:void(0);" class="delete_item" data-idproddel="<?php echo $item["nProductoHueco"]; ?>"  title="Quitar item"><?php echo img($image_properties); ?></a>
                            <?php //echo anchor('producto/delete/' . $item["nProductoHueco"], img(base_url() . 'images/delete.png'), 'title="Quitar item"');      ?>
                        </td>
                    </tr>

                    <?php
                    $toddescuento = 0;
                endforeach;
                ?>
                <tr>
                    <td colspan="11" align="right"><strong>Total: $ <?php echo number_format($total, 2); ?></strong></td>
                </tr>
            </table>
            <table class="anchotabla">
                <tr>
                    <td class="centrado"><span class="negrito">Gracias por su Compra !!</span></td>
                </tr>
            </table>
        <!--    <p align="center">
            <?php //echo anchor('principal/catalogo', '<< Continuar comprando', 'title="Regresar al Catalogo"');        ?>
            <span> || </span>
            <?php //echo anchor('principal/detalle_pedido', 'Completar pedido >>', 'title="Completar el pedido"');        ?>
        </p>-->
        </div>
    </div>
    <div style="float: left">
        <?php
        $image_properties = array(
            'src' => base_url() . 'images/comprar.jpg',
            'alt' => 'Completar Venta',
            'width' => '80',
            'height' => '80',
            'title' => 'Completar Venta',
        );
        //echo anchor('javascript:void(0);', img($image_properties), array('class' => 'actualizar_item', 'data-idprod' => $item["nProductoHueco"]));
        //echo anchor('producto/completar_pedido', img($image_properties), array('title'=>'Completar Venta' ));
        echo anchor('javascript:void(0);', img($image_properties), array('title'=>'Completar Venta','id'=>'btn_vender' ));
        echo "<span id='msg_vender'></span>";
        //echo anchor('principal/detalle_pedido', 'Completar pedidoa >>', 'title="Completar el pedido"');
        ?>
    </div>
    <div style="clear: both"></div>


    <?php
}else { ?>
    <div id='msg_aviso' class='alert alert-info'><span class='ui-icon ui-icon-lightbulb' style='float: left; margin-right: .3em;'></span> <strong>¡Hey! ... </strong> Carrito de venta vacio</div>
<?php }
?>
    <div id="ubicate_fin_pagina"></div>
<script type="text/javascript">
    /*function imprSelec(muestra)
     {
     var ficha = document.getElementById(muestra);
     var ventimp = window.open(' ', 'popimpr');
     ventimp.document.write(ficha.innerHTML);
     ventimp.document.close();
     ventimp.print();
     ventimp.close();
     }*/
</script>