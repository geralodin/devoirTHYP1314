<?php
include_once 'db_connexion/connexion.php';

if(isset($_GET['nom'])){
    $nbr_matieres = $db->query("SELECT * FROM matiere");
    $nbr = $nbr_matieres->rowCount();
    
    $etudiant_note = $db->query("SELECT * FROM etudiants_has_matiere ehm
                    INNER JOIN etudiants e
                    ON e.idetudiants = ehm.etudiants_idetudiants
                    INNER JOIN matiere m
                    ON m.idmatiere = ehm.matiere_idmatiere
                    WHERE e.nom LIKE '%".$_GET['nom']."%'");
    /*$note = 0;
    
    foreach ($etudiant_note as $en){
        $note += (int) $en['notes'];
        
    }
    
    $moyenne = $note / $nbr;
    
    var_dump($moyenne);*/
}
?>
<p>
    <table>
        <tr>
            <td>Matière</td>
            <td>Notes</td>
        </tr>
    <?php 
        $note = 0;
        foreach ($etudiant_note as $en){
            $note += (int) $en['notes'];
    ?>
        <tr>
            <td><?php echo $en['intitule'];?></td>
            <td><?php echo $en['notes'];?></td>
        </tr>
    <?php
        }
    ?>
    </table>    
</p>    
<?php 
$moyenne = $note / $nbr;
?>
<em>La moyenne est de : <?php echo $moyenne;?> / 20 </em>