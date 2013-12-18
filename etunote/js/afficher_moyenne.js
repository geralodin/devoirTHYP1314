$(function(){
    $(".show_moyenne").click(function(){
        var v = $(this).attr('id');
       
        var data = "nom="+v;
        var id = "#zone_edit_moyenne_"+v;
        var edit = "#zone_edit_"+v;
        var form = "#form_note_"+v;
        console.log(id);
        $.ajax({
                type:"GET",
                url:"moyenne.php",
                data:data,
                success:function(server_response){
                    console.log("success");
                    $(id).html(server_response).fadeIn(2000);
                    $(form).hide();
                    $(edit).hide();
                }
        });
    });
});





