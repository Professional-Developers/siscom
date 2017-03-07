<script type="text/javascript" src="<?php echo URL_JS; ?>producto/productoPromocion/jsProdPromocionIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmProductoPromocionInsa" name="frmProductoPromocionInsa" role="form">
        <input type="hidden" id="hdn_idProd" value="<?php echo $id;?>" />
        <div class="form-group">
            <h5>Modelo: <?php echo $producto[0]["nModCodigo"]?></h5>
            <h5>Detalle: <span style="color:blue;"><?php echo $producto[0]["detalle"]?></span></h5>
            <h5>Stand: <?php echo $producto[0]["stand"]?></h5>
            <h5>Almacen: <?php echo $producto[0]["almacen"]?></h5>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Promocion</label>
            <div class="col-lg-9">
                <select id="cbo_ins_nPromId" name="cbo_ins_nPromId" class="form-control">
                    <?php foreach($promocion as $pro){ 
                        echo "<option value=".$pro['nPromId'].">".$pro['cProDescripcion']." - dscto ".$pro['nPromPorcentaje']."(%) - quedan: ".$pro['nPromCantidadFinal']."</option>";
                    }
?>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarPromocionProd" class="btn btn-info">Registrar Promocion</button>
                <button type="button" id="btnCancelarPromocionProd" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjDetPromocion"></div>
</div>
<div id="qry_Promocion_Producto">
    
</div>
