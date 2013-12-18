$(function(){
    $(".show_graphe").click(function(){
       
        var v = $(this).attr('id');
       
        var data = "nom="+v+"&divId="+"zoneeditgraph"+v;
        var id = "#zoneeditgraph"+v;
        var form = "#form_note_"+v;
        var moyenne = "#zone_edit_moyenne_"+v;
        var edit = "#zone_edit_"+v;
        
        console.log(id);
        $.ajax({
                type:"GET",
                url:"edit_graph.php",
                data:data,
                success:function(server_response){
                    console.log("success");
                    $(id).html(server_response).fadeIn(2000);
                    $(form).hide();
                    $(moyenne).hide();
                    $(edit).hide();
                }
        });
    });
});



