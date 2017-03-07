<!--<script type="text/javascript" src="<php echo URL_JS; ?>producto/productoDetalle/jsProdDetIns.js"></script>-->
<script type="text/javascript" src="<?php echo URL_JS; ?>productoHueco/jsProdHuecoIns.js"></script>
<div class="panel-body">
    <a href='javascript:void(0);' onclick='regresarQry();' style='float:right;'><img src="<?php echo URL_IMG . "iconos_regresar.png" ?>" /></a>
    <form class="form-horizontal todoMayuscula" id="frmProductoCasilleroInsa" name="frmProductoCasilleroInsa" role="form">
        <input type="hidden" id="hdn_idProd" value="<?php echo $id; ?>" />
        <!--<div>-->
        <div class="page-header" style="color: #77D4EE">
            <h4>Producto: <?php echo $producto;?></h4>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-1" for="normalInput">Cantidad</label>
            <div class="col-lg-1">
                <input type="text" maxlength="10" id="txt_nCantidad" name="txt_nCantidad" placeholder="" class="form-control uniform-input text" value="1" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-11">
                <?php
                $contador = 1;
                if ($informacion) {
                    //print_r($informacion);
                    ?>
                                <!--<table id="qry_casillero" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">-->
                    <table id="qry_casillero" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Casillero</th>
                                <th>Almacen</th>
                                <th>Stan</th>
                                <th>Repisa</th>
                                <th>Fila</th>
                                <th>Columna</th>
                                <th>Celda</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($informacion as $data) { ?>
                                <tr class='todoMayuscula'>
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo ($data["cHueNombre"] == '') ? "-" : $data["cHueNombre"]; ?></td>
                                    <td><?php echo ($data["cAlmNombre"] == '') ? "-" : $data["cAlmNombre"]; ?></td>
                                    <td><?php echo ($data["cSurNombre"] == '') ? "-" : $data["cSurNombre"]; ?></td>
                                    <td><?php echo ($data["nIdRepisa"] == '') ? "-" : $data["nIdRepisa"]; ?></td>
                                    <td><?php echo ($data["nIdFila"] == '') ? "-" : $data["nIdFila"]; ?></td>
                                    <td><?php echo ($data["nIdColumna"] == '') ? "-" : $data["nIdColumna"]; ?></td>
                                    <td><?php echo ($data["nIdCelda"] == '') ? "-" : $data["nIdCelda"]; ?></td>
                                    <td><input type="radio" name="radHueco" id="hueco_<?php echo $data['nHuecoId'];?>" value="<?php echo $data['nHuecoId'];?>"></td>
                                </tr>
                                <?php
                                $contador++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "No se encuentran registros para casillero";
                }
                ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-3 col-lg-9">
                <button type="submit" id="btnRegistrarProdCasillero" class="btn btn-info">Asignar Casillero</button>
                <div id="message"></div>
            </div>
        </div>
    </form>
    <div id="msjProdCasillero"></div>
</div>
<div class="page-header">
    <h4>Productos Asignados</h4>
</div>
<div id="qry_Producto_Casillero">

</div>