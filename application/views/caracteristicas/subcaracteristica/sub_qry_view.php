<script type="text/javascript" src="<?php echo URL_JS; ?>caracteristicas/jsHijoQry.js" charset=UTF-8"></script>
<!--<input type="hidden" id="codPadre" name="codPadre" />-->
<style>
    div.dataTables_wrapper{
        /*width: 800px;*/
        margin: 0 auto;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading"><h4>Caracteristicas</h4></div>
    <div class="panel-body">
        <?php
        if ($informacion) {
            //print_r($informacion);exit;
            $contador = 1;
            ?>
            <table id="qry_hijos" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered nowrap" width="100%">
                <!--<table id="qry_hijos" cellpadding="0" cellspacing="0" border="0" class="display nowrap">-->
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Tipo Caracteristica</th>
                        <th>Caracteristica</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($informacion as $data) { ?>
                        <tr class='todoMayuscula'>
                            <td><?php echo $contador; ?></td>
                            <!--<td><php echo $data["nMulIdPadre"]; ?></td>-->
                            <td><?php echo ($data["padre"] == '') ? "-" : $data["padre"]; ?></td>
                            <td><?php echo ($data["hijo"] == '') ? "-" : $data["hijo"]; ?></td>
                            <td>
                                <a title="Editar" class="optEditarHijo iconic-icon-pen-alt2" onclick="panelUpdHijo('caracteristicas/panel_updHijo', '<?php echo htmlspecialchars(json_encode(array("nMulId" => $data['nMulId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                        <td id="<?php echo $data['nMulId']; ?>">
                            <?php if ($data["bEstado"] == 1) { ?>
                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelDelHijo(<?php echo htmlspecialchars($data['nMulId']); ?>)" style="cursor: pointer;">
                                </a>
                            <?php } else { ?>
                                <a class="iconic-icon-x" title='Inactivo' onClick="panelDelHijo(<?php echo htmlspecialchars($data['nMulId']); ?>)" style="cursor: pointer;">
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                    $contador++;
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No se encuentran registros";
    }
    ?>
</div>
</div>
