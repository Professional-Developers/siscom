$(function(){
    $('#modalCambiaPass').on('hidden.bs.modal', function () {
        $(".optEditar").show();
    })
    
    $('#permisosModal').on('hidden.bs.modal', function () {
        $(".optAsignar").show();
    })
    
    
    var dataTable = {
        tabla   : "qry_lista_personas_usuarios",
        filas   : 50,
        JQueryUI : true
    };
    paginaDataTable(dataTable);
    //Ocultamos el Modal
    $('#permisosModal').modal({
        show: false
    });
    /*$('#modalCambiaPass_body').on('hidden.bs.modal', function () {
        $(".optEditar").show();
    })*/
    //Evento Asignar Permisos
    $(".optAsignar").unbind();
    $(".optAsignar").bind({
        click:function(data){
            $(".optAsignar").hide();
            var id = $(this).data("pid");
            console.log(id);
            getAsignarPermisos(id);
        }
    });
    $("#btnAsignar").bind({
        click:function(evt){
            evt.preventDefault();
            guardarPermisos();
        }
    });

    $(".optEditar").bind({
        click:function(){
            $(".optEditar").hide();
            var pk = $(this).data('pk');
            $("#codUsuario").val(pk);
            $("#txtClaveUpd").val('');
            $("#modalCambiaPass").modal("show");

        }
    });
    $("#btnchange").bind({
        click:function(){
            loadchangepass();
        }
    });
});
function loadchangepass(){
    msgLoadSave("#msgUpdClave","#btnchange","Subiendo Archivo");
    $.ajax({
        url:'usuarios/updatePass',
        type:'post',
        cache:false,
        data:{
            idUsu : $("#codUsuario").val(),
            clave : $("#txtClaveUpd").val()
        },
        success:function(data){
            if (data=="1") {
                mensaje("En hora buena registro correcto",'e');
                $("#codUsuario").val('');
                $("#txtClaveUpd").val('');
                msgLoadSaveRemove("#btnchange");
                $("#modalCambiaPass").modal("hide");
            } else{
                mensaje("Houston, Tenemos Problemas!!!!!",'r');
            }
        },
        error:function(er){
            console.log(er);
            mensaje("Houston, Tenemos Problemas!!!!!",'r');
        }
    });
}
function guardarPermisos(){
    var rootNode = $("#listPermisos").dynatree("getRoot");
    console.log(rootNode.data.key);
    var selNodes = rootNode.tree.getSelectedNodes();
    var selKeys = $.map(selNodes, function(node1){
        if(node1.parent.data.key != '_1'){
            return node1.data.key;
        // console.log("[" + node1.data.key + "]: '" + node1.data.title + "'");
        }
    });
    //console.log(selKeys);
    //Probando cuenta personal bitbucket
    $.ajax({
        url:'usuarios/setPermisosIns',
        type:'POST',
        cache:false,
        data:{
            ids:selKeys,
            pid:$("#txtpid").val()
        },
        success:function(data){
            if (data=="1") {
                $('#permisosModal').modal('hide');
                mensaje("Se han aplicado las condiciones de configuracion con exito.",'e');
            } else{
                mensaje("Houston, tenemos un problema... por favor intentalo nuevamente",'r');
            }
        },
        error:function(er){
            console.log("error".er);
        }
    });
}

function getAsignarPermisos(pid){
    //console.log(pid);
    $.ajax({
        url:'usuarios/getPermisos',
        cache:false,
        type:'POST',
        data:{
            pid:pid
        },
        success:function(data){
            //$(".modal-body").html(data);
            $("#bodyPermisoUpd").html(data);
            $('#permisosModal').modal({
                show: true
            });
        // $("#listaPermisos").html(data);
        },
        error:function(er){
            console.log("error".er);
        }
    })
}