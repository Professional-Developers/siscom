$(function(){
    soloNumeros("#upd_txt_cEmpTelefono","keypress");
    soloNumeros("#upd_txt_cEmpCelular","keypress");
    soloNumeros("#upd_txt_cEmpRuc","keypress");
    $("#btnCancelarEmp").bind({
        click:function(evt){
            evt.preventDefault();
            $("#modalCambiaEmpresa").modal("hide");
        }
    })
    $('#frmEmpresaUpd').submit(function(e) {
        e.preventDefault();
        msgLoadSave("#messageUpd","#btnActualizarEmp","Subiendo Archivo");
        $.ajaxFileUpload({
            //url         :'multimedia/multimediaIns',
            url         :'empresa/empresaUpd',
            secureuri      :false,
            fileElementId  :'upd_txt_cEmpLogoGrande',
            dataType    : 'json',
            data        : {
                'hdnidEmpresa_upd'                  :$("#hdnidEmpresa_upd").val(),
                'upd_txt_cPerNombres'               : $('#upd_txt_cPerNombres').val(),
                'upd_txt_cEmpDescripcion'           : $('#upd_txt_cEmpDescripcion').val(),
                'upd_txt_cEmpDireccionFiscal'       : $('#upd_txt_cEmpDireccionFiscal').val(),
                'upd_txt_cEmpTelefono'              : $('#upd_txt_cEmpTelefono').val(),
                'upd_txt_cEmpCelular'               : $('#upd_txt_cEmpCelular').val(),
                'upd_txt_cEmpEmail'                 : $('#upd_txt_cEmpEmail').val(),
                'upd_txt_cEmpRuc'                   : $('#upd_txt_cEmpRuc').val(),
                'upd_nTipoRubro'                    : $('#upd_nTipoRubroUpd').val(),
                'upd_nTipoEmpresa'                  : $('#upd_nTipoEmpresaUpd').val(),
                'img_upd_logo'                      :$('#img_upd_logo').val()
                
            },
            beforeSend: function() 
            {
                $("#upd_percent").html("0%");   
            },
            uploadProgress: function(event, position, total, percentComplete) 
            {
                $("#upd_percent").css('width',+percentComplete+'%');
                $('#upd_percent').css('width',percentComplete+'%').html(percentComplete+'%');
            },
            success  : function (data)
            {
                $("#upd_percent").css('width','100%');
                $("#upd_percent").html('100%');
                console.log(data);
                if(data.status == 'error')
                {
                    mensajeAdvertencia("Comuniquese con el administrador");
                }else{
                    cargaEmpresaListado();
                    mensajeExito("Actualizacion exitosa");
                    $('#modalCambiaEmpresa').modal('hide');
                }
                msgLoadSaveRemove("#btnActualizarEmp");
                //location.reload(true);
            }
        });      
        return false;
    });
});