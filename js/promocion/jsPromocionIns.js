$(function(){
    soloNumeros("#txt_nPromPorcentaje","keypress");
    soloNumeros("#txt_nPromCantidad","keypress");
    ValidarRangoFechas("txt_dateInicio","txt_dateFin","dd/mm/yy");
    
//    $('#frmPromocionInsa').validate({
//        submitHandler:function(){
//            // alert("DFSDF");
//            msgLoadSave("#message","#btnRegistrarProm");
//            $.ajax({
//                url:'promocion/promocionIns',
//                type:'post',
//                data:$("#frmPromocionInsa").serialize(),//me captura todos los datos del formulario
//                cache:false,
//                success:function(data){
//                    console.log(data);
//                    msgLoadSaveRemove("#btnRegistrarProm");
//                    if (data==1) {
//                        cleanForm("#frmPromocionInsa");
//                        mensajeExito("Ingreso Promocion Exitoso");
//                    } else if(data=='r'){
//                        mensajeAdvertencia("Falta Ingresar Datos");
//                    }
//                    else{
//                        console.log("Error Ingreso Almacen");
//                    }
//                },
//                error:function(error){
//                    alert(error);
//                }
//            });
//        },
//        rules:{
//            txt_cPromocion:{
//                required:true,
//                minlength   : 1
//            },
//            txt_dateInicio:{
//                required:true
//            }
//            ,
//            txt_dateFin:{
//                required:true
//            }
//        },
//        messages: {
//            txt_cPromocion: {
//                required    : "Ingrese el Nombre Promocion.",
//                minlength   : "Minimo {0} caracteres."
//            },
//            txt_dateInicio: {
//                required    : "Seleccione Fecha Inicio."
//            }
//            ,
//            txt_dateFin: {
//                required    : "Seleccione Fecha Fin"
//            }
//        }
//    // ,debug: true
//    });
    
    $('#frmPromocionInsa').submit(function(e) {
        e.preventDefault();
        msgLoadSave("#message","#btnRegistrarProm","Subiendo Archivo");
        $.ajaxFileUpload({
            //url         :'multimedia/multimediaIns',
            //url         :'empresa/empresaIns',
            url         :'promocion/promocionIns',
            secureuri      :false,
            //fileElementId  :'txt_cEmpLogoGrande',
            fileElementId  :'txt_cPromFoto',
            dataType    : 'json',
            data        : {
                //'txt_cPerNombres'               : $('#txt_cPerNombres').val(),
                'txt_cPromocion'                : $('#txt_cPromocion').val(),
                'txt_dateInicio'                : $('#txt_dateInicio').val(),
                'txt_dateFin'                   : $('#txt_dateFin').val(),
                'txt_nPromPorcentaje'           : $('#txt_nPromPorcentaje').val(),
                'txt_nPromCantidad'             : $('#txt_nPromCantidad').val()
                
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
                msgLoadSaveRemove("#btnRegistrarProm");
                location.reload(true);
            //alert(data.msg);
            }
        });      
        return false;
    });
});