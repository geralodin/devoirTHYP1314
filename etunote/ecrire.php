<?php
if(isset($_POST['note'])){
    var_dump($_POST);
    
    if(!empty($_POST['matiere'])&& !empty($_POST['note'])){
        $id_students = $_POST['idetudiants'];
        $id_matiere = $_POST['matiere'];
        $note = $_POST['note'];
        $db->exec("INSERT INTO etudiants_has_matiere($id_students,$id_matiere,$note)");
        
    }
}
?>
