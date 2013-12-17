<?php
include_once 'db_connexion/connexion.php';
if(isset($_GET['nom'])){
    $nom = trim($_GET['nom'], "\xC2\xA0\n" );
    var_dump($_GET);
    
    $etudiant = $db->query("SELECT * FROM etudiants WHERE nom LIKE '%".$nom."%'");
    $matiere = $db->query("SELECT * FROM matiere");
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <form action="ecrire.php" method="post" enctype="multipart/form-data">
            <table>
                <input type="hidden" value="<?php foreach ($etudiant as $e) { echo $e['idetudiants'];}?>">
                <tr>
                    <td>Nom etudiant</td>
                    <td><input type="text" name="etudiant" value="<?php echo $nom; ?>"></td>
                </tr>
                <tr>
                    <td>Matiere</td>
                    <td>
                        <select>
                            <?php
                            foreach ($matiere as $m){
                            ?>
                            <option value="<?php echo $m['idmatiere'];?>">
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
                    <td><input type="text" name="note"></td>
                </tr>
            </table>
            <input type="submit"  value="Valider" name="bouton">
        </form>
    </body>
</html>


