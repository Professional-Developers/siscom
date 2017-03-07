<?php
/*
print_r($padres);
echo "id es:".$id."";
foreach($padres as $padre){
    
}*/
?>

<script type="text/javascript" src="<?php echo URL_JS; ?>producto/productoDetalle/jsProdDetIns.js"></script>
<div class="panel-body">
    <form class="form-horizontal todoMayuscula" id="frmProductoDetInsa" name="frmProductoDetInsa" role="form">
        <input type="hidden" id="hdn_idProd" value="<?php echo $id;?>" />
        <div class="form-group">
            <label class="control-label col-lg-3" for="textareas">Caracteristica Padre</label>
            <div class="col-lg-5">
                <?php //print_r($sucursal);?>
                <select id="cbo_nMulIdPadre" name="cbo_nMulIdPadre" class="form-control">
                    <?php foreach($hijosCalzado as $padre){ 
                        echo "<option value=".$padre['nMulId'].">".$padre['cMulDescripcion']."</option>";
                        /*if($padre['nMulId']=='4' || $padre['nMulId']=='51' || $padre['nMulId']=='8' || $padre['nMulId']=='40' || $padre['nMulId']=='48' || $padre['nMulId']=='44'){
                        }else{
                          echo "<option value=".$padre['nMulId'].">".$padre['cMulDescripcion']."</option>";
                        }*/
                    }
?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-3" for="select">Caracteristica Hijo</label>
            <div class="col-lg-5">
                <select id="cbo_nMulIdHijo" name="cbo_nMulIdHijo" class="form-control">
                    <option>selecciona</option>
                </select>    
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarDetProd" class="btn btn-info">Registrar Detalle</button>
                <button type="button" id="btnCancelarDetProd" class="btn btn-default">cancelar</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjDetProd"></div>
</div>
<div id="qry_Detalle_Producto">
    
</div>
