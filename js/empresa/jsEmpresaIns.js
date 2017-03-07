$(function(){
    soloNumeros("#txt_cEmpTelefono","keypress");
    soloNumeros("#txt_cEmpCelular","keypress");
    soloNumeros("#txt_cEmpRuc","keypress");
    $('#frmEmpresaInsa').submit(function(e) {
        e.preventDefault();
        msgLoadSave("#message","#btnRegistrar","Subiendo Archivo");
        $.ajaxFileUpload({
            //url         :'multimedia/multimediaIns',
            url         :'empresa/empresaIns',
            secureuri      :false,
            fileElementId  :'txt_cEmpLogoGrande',
            dataType    : 'json',
            data        : {
                'txt_cPerNombres'               : $('#txt_cPerNombres').val(),
                'txt_cEmpDescripcion'           : $('#txt_cEmpDescripcion').val(),
                'txt_cEmpDireccionFiscal'       : $('#txt_cEmpDireccionFiscal').val(),
                'txt_cEmpTelefono'              : $('#txt_cEmpTelefono').val(),
                'txt_cEmpCelular'               : $('#txt_cEmpCelular').val(),
                'txt_cEmpEmail'                 : $('#txt_cEmpEmail').val(),
                'txt_cEmpRuc'                   : $('#txt_cEmpRuc').val(),
                'nTipoRubro'                    : $('#nTipoRubro').val(),
                'nTipoEmpresa'                  : $('#nTipoEmpresa').val()
                
            },
            beforeSend: function() 
            {
                $("#percent").html("0%");   
            },
            uploadProgress: function(event, position, total, percentComplete) 
            {
                $("#percent").css('width',+percentComplete+'%');
                //$("#percent").html(percentComplete+'%');
                $('#percent').css('width',percentComplete+'%').html(percentComplete+'%');
            },
            success  : function (data)         
            {   
                $("#percent").css('width','100%');
                //$("#bar").width('100%');
                $("#percent").html('100%');
                /*console.log(data);
                var datas = $.parseJSON(data);
                console.log(datas);
                console.log(data.id);
                console.log(data.pat);*/
                console.log(data);
                console.log( "entra22");
                if(data.status == 'error')
                {
                    //msgLoadSaveRemove("#btn_ins_Multimedia");
                    mensajeAdvertencia("Comuniquese con el administrador");
                }else{
                    //msgLoadSaveRemove("#btn_ins_Multimedia");                                                        
                    //limpiarForm("#frm_ins_documento");   
                    //$("#txt_ins_obr_cMultLink").val("");   
                    mensajeExito("Operacion realizada con exito.");   
                    console.log( "entra");
                    
                }
                msgLoadSaveRemove("#btnRegistrar");
                location.reload(true);
            //alert(data.msg);
            }
        });      
        return false;
    });
});