$(function(){
    //alert("ho");
    $("#listaPerUsers").bind({
        click: function(){
            loadGridView();
        }
    });

});
function loadGridView(){
    msgLoading("#listaPersonasUsuarios","");
    $.ajax({
        type: "POST",
        url: "usuarios/qryPersonaUsu",
        cache: false,
        data:{
            tipo:'LPU'
        },
        success: function(data){
            $("#listaPersonasUsuarios").html(data);
        },
        error: function(){
            alert("error");
        }
    });
}