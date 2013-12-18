$(function(){
    $(".note .add_note").click(function(){
        
        var v = $(this).attr('id');
       
        var data = "nom="+v;
        
        var id = "#form_note_"+v;
        var edit = "#zone_edit_"+v;
        var moyenne = "#zone_edit_moyenne_"+v;
        
        console.log(id);
        $.ajax({
                type:"GET",
                url:"form_ecrire.php",
                data:data,
                success:function(server_response){
                    console.log("success");
                    $(id).html(server_response).fadeIn(2000);
                    
                    $(moyenne).hide();
                    $(edit).hide();
                }
        });
    });
});


