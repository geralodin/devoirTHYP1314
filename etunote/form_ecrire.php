<?php
include_once 'db_connexion/connexion.php';

if(isset($_GET['nom'])){
    $nom = trim($_GET['nom'], "\xC2\xA0\n" );
    $etudiant = $db->query("SELECT * FROM etudiants WHERE nom LIKE '%".$nom."%'");
    $matiere = $db->query("SELECT * FROM matiere");
}

?>

<form action="#" method="post" id="validate_form">
    <fieldset>
        <legend>Formulaire ajout note</legend>
    
    <table>
        <input type="hidden" value="<?php foreach ($etudiant as $e) { echo $e['idetudiants'];} ?>" id="id_etudiant" name="id_etudiant">
        <tr>
            <td>Nom etudiant</td>
            <td><input type="text" name="etudiant" value="<?php echo $nom; ?>"></td>
        </tr>
        <tr>
            <td>Matiere</td>
            <td>
                <select name="matiere">
                    <?php
                    foreach ($matiere as $m){
                    ?>
                    <option value="<?php echo $m['idmatiere'];?>" id="<?php echo $m['idmatiere'];?>">
                        <?php echo $m['intitule'];?>
                    </option>
                    <?php
                    }
                    ?>

                </select>
            </td>
        </tr>
        <tr>
            <td>note</td>
            <td><input type="text" name="note" id="note"></td>
        </tr>
    </table>
    <input type="submit" value="Valider">
</form>
</fieldset>    

<script type="text/javascript">
    $(function(){
        var opt = 1;
        //thanks to http://stackoverflow.com/questions/11179406/jquery-get-value-of-select-onchange
        $('select').on('change', function() {
            opt = this.value; // or $(this).val()
        });     
        
        $("#validate_form").submit(function(e){
            e.preventDefault();
            
            id = $('input[type=hidden]').val();
            matiere = opt;
            note = $(this).find("input[id='note']").val();
            $.post(
                    "ecrire.php",
                    {id:id, matiere:matiere, note:note},
                    function(data){

                        if(data){
                            $("#results").html(data);
                            $('.form_note').hide();
                        }
                    }

            );
        }) ;
 });
 </script>

