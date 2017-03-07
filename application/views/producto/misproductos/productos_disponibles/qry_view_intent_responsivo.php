<script type="text/javascript" src="<?php  echo URL_JS; ?>misproductos/productos_disponibles/jsDerivarProductoQry.js" charset=UTF-8"></script>

<link rel="stylesheet" href="<?php echo URL_JS; ?>dataResponsivo/example/lib/bootstrap3/css/bootstrap.min.css"/>
<link rel="stylesheet" href="<?php echo URL_JS; ?>dataResponsivo/example/lib/bootstrap3/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="<?php echo URL_JS; ?>dataResponsivo/example/lib/jquery.dataTables.bootstrap3/css/dataTables.bootstrap.css"/>
<link rel="stylesheet" href="<?php echo URL_JS; ?>dataResponsivo/files/css/datatables.responsive.css"/>
<div id="qry_lista_producto">
    <table id="example" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
        <!--thead section is required-->
        <thead>
            <tr>
                <th class="centered-cell"><input type="checkbox" id="masterCheck" class="checkbox" disabled/></th>
                <th data-class="expand">Rendering engine</th>
                <th>Browser</th>
                <th data-hide="phone">Platform(s)</th>
                <th data-hide="phone,tablet">Engine version</th>
                <th data-hide="phone,tablet">CSS grade</th>
            </tr>
        </thead>
        <!--tbody section is required-->
        <tbody></tbody>
        <!--tfoot section is optional-->
        <tfoot>
            <tr>
                <th></th>
                <th>Engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
            </tr>
        </tfoot>
    </table>

</div>
<script type="text/javascript" src="<?php echo URL_JS; ?>dataResponsivo/example/lib/lodash/lodash.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>dataResponsivo/example/lib/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>dataResponsivo/example/lib/jquery.dataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>dataResponsivo/example/lib/jquery.dataTables.bootstrap3/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>dataResponsivo/files/js/datatables.responsive.js"></script>
<script type="text/javascript" src="<?php echo URL_JS; ?>dataResponsivo/example/js/ajax-bootstrap3.js"></script>