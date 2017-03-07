
<style>
    .tablaCarrito td,th{
        padding: 10px;
    }
</style>
<div align="center">
    <h2>CARRITO DE COMPRAS</h2>
    <!--<p>Mostramos los contenidos del carrito:</p>-->
    <p>Vendedor: <?php echo $vendedor[0]['cPerNombres']." ".$vendedor[0]['cPerApellidoPaterno']." ".$vendedor[0]['cPerApellidoMaterno'];?></p>
    <p>Stand: <?php echo $vendedor[0]['sucursal'];?></p>
    <table class="tablaCarrito">
        <tr>
            <th>#</th>
            <!--<th>Imagen</th>-->
            <th>Producto</th>
            <th>Caracteristicas</th>
            <th>Modelo</th>
            <th>Precio(soles)</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
        <?php $i = 1;
        foreach ($items as $item): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <!--<td><img src="<php echo base_url() . "images/zapatos/" . $item["imagen"]; ?>" width="30"></td>-->
                <!--<td></td>-->
                <td><?php echo $item["descripcion"]; ?></td>
                <td><?php echo $item["detalle"]; ?></td>
                <td><?php echo $item["modelo"]; ?></td>
                <td><?php echo number_format($item["precio"], 2); ?></td>
                <td>
                    <!--<input type="number" id="update_cantidad_<php echo $item["id_producto"]; ?>"-->  
                    <input onkeypress="return isNumberKey(event)" class="upd_cantidad" type="number" id="update_cantidad_<?php echo $item["nProductoHueco"]; ?>"  
                           value="<?php echo $item["cantidad"]; ?>" min="1" max="100">
                           <?php //echo anchor('#', img(base_url() . 'images/update.png'), array('class' => 'actualizar_item', 'data-idprod' => $item["id_producto"]));?>
                           <?php echo anchor('javascript:void(0);', img(base_url() . 'images/update.png'), array('class' => 'actualizar_item', 'data-idprod' => $item["nProductoHueco"]));?>
                </td>
                <td>$ <?php echo number_format(($item["precio"] * $item["cantidad"]), 2); ?></td>
                <td>
                    <?php // echo anchor('principal/delete/' . $item["id_producto"], img(base_url() . 'images/delete.png'), 'title="Quitar item"');?>
                    <a href="javascript:void(0);" class="delete_item" data-idproddel="<?php echo $item["nProductoHueco"];?>"  title="Quitar item"><?php echo img(base_url() . 'images/delete.png');?></a>
                    <?php //echo anchor('producto/delete/' . $item["nProductoHueco"], img(base_url() . 'images/delete.png'), 'title="Quitar item"');?>
                </td>
            </tr>
<?php endforeach; ?>
        <tr>
            <td colspan="7" align="right"><strong>Total: $ <?php echo number_format($total, 2); ?></strong></td>
        </tr>
    </table>
<!--    <p align="center">
        <?php //echo anchor('principal/catalogo', '<< Continuar comprando', 'title="Regresar al Catalogo"'); ?>
        <span> || </span>
        <?php //echo anchor('principal/detalle_pedido', 'Completar pedido >>', 'title="Completar el pedido"'); ?>
    </p>-->
</div>