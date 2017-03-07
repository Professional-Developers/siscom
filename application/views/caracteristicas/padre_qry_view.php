<script type="text/javascript" src="<?php echo URL_JS; ?>caracteristicas/jsPadreQry.js" charset=UTF-8"></script>
<input type="hidden" id="codPadre" name="codPadre" />
<div class="panel panel-default">
    <div class="panel-heading"><h4>Tipo Caracteristicas</h4></div>
    <div class="panel-body">
        <?php
        if ($informacion) {
            $contador = 1;
            ?>
            <table id="qry_padres" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Tipo Caracteristica</th>
                        <th>Editar</th>
                        <!--<th></th>-->
                    </tr>
                </thead>
                <tbody>
    <?php foreach ($informacion as $data) { ?>
                        <tr class='todoMayuscula'>
                            <td><?php echo $contador; ?></td>
                            <!--<td><php echo $data["nMulIdPadre"]; ?></td>-->
                            <td><?php echo ($data["cMulDescripcion"] == '') ? "-" : $data["cMulDescripcion"]; ?></td>
                            <td>
                                <a title="Editar" class="optEditarPadre iconic-icon-pen-alt2" onclick="panelUpdPadre('caracteristicas/panel_updPadre', '<?php echo htmlspecialchars(json_encode(array("nMulIdPadre" => $data['nMulIdPadre']))); ?>', '')" style="cursor: pointer;" >
                                </a>
                            </td>
<!--                            <td>
                                <a title="Hijos" class="optHijos iconic-icon-pen-alt2" onclick="panelHijos('caracteristicas/hijo_ins_view', '<php echo htmlspecialchars(json_encode(array("nMulIdPadre" => $data['nMulIdPadre']))); ?>', '')" style="cursor: pointer;" >
                                </a>
                            </td>-->
                        </tr>
                        <?php $contador++;
                    } ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "No se encuentran registros para padres";
        }
        ?>
    </div>
</div>
