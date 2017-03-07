<?php
/*
print_r($padres);
echo "id es:".$id."";
foreach($padres as $padre){
    
}*/
?>

<script type="text/javascript" src="<?php echo URL_JS; ?>promocion/promocionDetalle/jsPromDetIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmPromocionDetInsa" name="frmPromocionDetInsa" role="form">
        <input type="hidden" id="hdn_idProm" value="<?php echo $id;?>" />
        <div class="form-group">
            <label class="control-label col-lg-3">Producto</label>
            <div class="col-lg-5">
                <select id="cbo_nProdId" name="cbo_nProdId" class="form-control">
                    <?php foreach($producto as $prod){
                        echo "<option value=".$prod['nProId'].">".$prod['descripcion']."</option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Cantidad</label>
            <div class="col-lg-5">
                <input type="text" id="txt_nPromDetCantidad" name="txt_nPromDetCantidad" placeholder="Ejm: 5" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="normalInput">Descuento por unidad($)</label>
            <div class="col-lg-5">
                <input type="text" id="txt_nPromDetDescuentoUnidad" name="txt_nPromDetDescuentoUnidad" placeholder="Ejm: 3 soles" class="form-control uniform-input text" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarDetProm" class="btn btn-info">Registrar Detalle</button>
                <button type="button" id="btnCancelarDetProm" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjDetProm"></div>
</div>
<div id="qry_Detalle_Promocion">
    
</div>
