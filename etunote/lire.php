<?php
include_once 'db_connexion/connexion.php';

if(isset($_GET['nom'])){
    $nom = trim($_GET['nom'], "\xC2\xA0\n" );
    $etudiant = $db->query("SELECT * FROM etudiants_has_matiere ehm
                    INNER JOIN etudiants e
                    ON e.idetudiants = ehm.etudiants_idetudiants
                    INNER JOIN matiere m
                    ON m.idmatiere = ehm.matiere_idmatiere
                    WHERE e.nom LIKE '%".$_GET['nom']."%'");
}
?>
<p>
    <table>
        <tr>
            <td>Matière</td>
            <td>Notes</td>
        </tr>
    <?php 
        foreach ($etudiant as $e){
    ?>
        <tr>
            <td><?php echo $e['intitule'];?></td>
            <td><?php echo $e['notes'];?></td>
        </tr>
    <?php
        }
    ?>
    </table>    
</p>    
