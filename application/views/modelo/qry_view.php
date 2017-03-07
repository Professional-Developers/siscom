<script type="text/javascript" src="<?php echo URL_JS; ?>modelo/jsModeloQry.js" charset=UTF-8"></script>
<script type="text/javascript">    
$('.codAgrupModelo').qtip({
   content: 'Codigo',
   show: 'mouseover',
   hide: 'mouseout'
})
$('.DescModelo').qtip({
   content: 'Descripcion',
   show: 'mouseover',
   hide: 'mouseout'
})
</script>
<div id="qry_lista_modelo">
    <input type="hidden" id="codModelo" name="codModelo" />
    <?php if ($informacion) {
        $contador=1;
        ?>
        <table id="qry_modelo" cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
            <thead>
                <tr>
                    <th></th>
                    <th class="codAgrupModelo">Codigo<br/>Agrupador</th>
                    <th class="DescModelo">Descripcion</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacion as $data) { ?>
                    <tr class='todoMayuscula'>
                        <td><?php echo $contador; ?></td>
                        <!--<td><php echo $data["nAlmId"]; ?></td>-->
                        <td><?php echo ($data["nModCodigo"] == '') ? "-" : $data["nModCodigo"]; ?></td>
                        <td><?php echo ($data["cModDescripcion"] == '') ? "-" : $data["cModDescripcion"]; ?></td>
                        <td>
                            <a title="editar" class="optEditar iconic-icon-pen-alt2" onclick="panelUpdModelo('modelo/panel_updModelo', '<?php echo htmlspecialchars(json_encode(array("nModeloId" => $data['nModeloId']))); ?>', '')" style="cursor: pointer;" >
                            </a>
                        </td>
                        <td>
                            <?php if ($data["nModEstado"] == "1") { ?>
                                <a class="iconic-icon-check-alt" title='Activo' onClick="panelDelModelo(<?php echo $data['nModeloId']; ?>)" style="cursor: pointer;">
                                </a>
                            <?php } else { ?>
                                <a class="iconic-icon-x" title='Inactivo' onClick="panelDelModelo(<?php echo $data['nModeloId']; ?>)" style="cursor: pointer;">
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php 
                $contador++;
                } ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No se encuentran registros para modelo";
    }
    ?>
</div>