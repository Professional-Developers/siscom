<?php
$cont=1;
        foreach($comboAlmacen as $cboAlm){
            if($cont==1){
                echo "<option value=".$cboAlm['nAlmId'].">".$cboAlm['cAlmNombre']."</option>";
            }else{
                echo "<option value=".$cboAlm['nAlmId'].">".$cboAlm['cAlmNombre']."</option>";
            }
            $cont++;
        }
?>
