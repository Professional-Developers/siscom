<!--<script type="text/javascript" src="<php echo URL_JS; ?>envioProducto/jsDerivarProductoQry.js" charset=UTF-8"></script>-->
<!--<script type="text/javascript" src="<?php echo URL_JS; ?>misproductos/productos_disponibles/jsDerivarProductoQry.js" charset=UTF-8"></script>-->
    <input type="hidden" id="codProducto" name="codProducto" />
    <div class="panel-body noPad clearfix">
        <table id="tb_hi" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th>Rendering engine1</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="odd gradeX">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td class="center"> 4</td>
                        <td class="center">X</td>
                    </tr>
                    <tr class="even gradeC">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0</td>
                        <td>Win 95+</td>
                        <td class="center">5</td>
                        <td class="center">C</td>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <?php
    $cont = 1;
    if ($informacion) {
        ?>
        
    <?php } else {
        ?>
        <table id="qry_Derivar_producto" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
        </table>
    <?php }
    ?>