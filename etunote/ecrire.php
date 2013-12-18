<?php
include_once 'db_connexion/connexion.php';
extract($_POST);

if(isset($note)){
    if(!empty($note)){
        $id = (int)$id;
        $matiere = (int)$matiere;
        $note = (int)$note;
        
        $sql = "INSERT INTO etudiants_has_matiere (etudiants_idetudiants, matiere_idmatiere, notes) VALUES (:id,:matiere, :note)";
        $q = $db->prepare($sql);
        $q->execute(array(':id'=>$id,':matiere'=>$matiere, 'note'=>$note));
        
        echo'Enregistrement reussi!';
   }
}

?>
