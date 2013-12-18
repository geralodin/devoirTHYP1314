$(function(){
    $(".show_note").click(function(){
       
        var v = $(this).attr('id');
       
        var data = "nom="+v;
        var id = "#zone_edit_"+v;
        var form = "#form_note_"+v;
        var moyenne = "#zone_edit_moyenne_"+v;
        var graph = "#zoneeditgraph"+v;
        console.log(id);
        $.ajax({
                type:"GET",
                url:"lire.php",
                data:data,
                success:function(server_response){
                    console.log("success");
                    $(id).html(server_response).fadeIn(2000);
                    $(form).hide();
                    $(moyenne).hide();
                    $(graph).hide();
                }
        });
    });
});


