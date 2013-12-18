<?php
include_once 'objet/Personne.php';
include_once 'db_connexion/connexion.php';

// lecture d'un flux RSS 
$handle = fopen("https://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr", "rb");

// buffer contenant les données du flux
$flux = '';

// si la lecture du flux RSS est ok
if (isset($handle) && !empty($handle)) {
    while (!feof($handle)) {
		
    // on charge les données de notre flux RSS par paquet
    $flux .= fread($handle, 4096);
    }

    // test avec la classe SimpleXML
    // on construit notre parser RSS avec notre flux RSS
    $RSS2Parser = simplexml_load_string($flux);

    // on se positionne sur la balise (racine de notre flux RSS)
    $racine = $RSS2Parser->channel;

    $j = 0;
    // pour chaque item
    foreach($racine ->item as $element) {
        
        /*var_dump($element->description);
        die();*/
        
        //retourne la position de la chaine en paramètre dans une chaine
        $linkPosition = stripos($element->description, "src");
        
        //couper la chaine de caractère à partir de la position indiqué
        $link = substr($element->description, $linkPosition);
        
        //on les découpe selon notre ...
        $trueLink = explode('</a>', $link);
        //récupération du nom et prénom
        $nom_prenom = explode(" ", $element->title);
        
        if(count($nom_prenom)== 1){
            $prenom = "unknown".$j;
            $nom = "unknown".$j;
            $j++;
        }else{
            $prenom = $nom_prenom[0];
            $nom = $nom_prenom[1];
        }
        
        /*
        var_dump($nom_prenom);
                die();*/
        
        $personne[] = new Personne($trueLink[0], $prenom, $nom);
    } 	
    
    /*echo "<h2>Liste des étudiants participants</h2>";
    var_dump($personne);
    die();*/
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
        <link type="text/css" href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <div id="content">
            <div id="results"></div>
            <h2>Liste des étudiants THYP 2013 - 2014</h2>
            <?php 
            foreach($personne as $p){ ?>
                <div class="photo">
                    <img <?php echo $p->img;?>
                    <p> Nom : <span><?php echo $p->nom; ?></span></p>
                     <p> Prenom : <?php echo $p->prenom; ?></p>

                    <div class="note">
                        <a href="#" class="add_note" id="<?php echo $p->nom; ?>">Ajouter note</a>
                        <a href="#" class="show_note" id="<?php echo $p->nom; ?>">Afficher notes</a>
                        <a href="#" class="show_moyenne" id="<?php echo $p->nom; ?>">Afficher la moyenne</a>
                        <a href="#" class="show_graphe" id="<?php echo $p->nom; ?>">Afficher graphe</a>
                    </div>

                </div>
            <div id="form_note_<?php echo $p->nom; ?>" class="form_note">

            </div>
            <div id="zone_edit_<?php echo $p->nom; ?>" class="form_note">

            </div>
            <div id="zone_edit_moyenne_<?php echo $p->nom; ?>" class="form_note">

            </div>
            
            <div id="zoneeditgraph<?php echo $p->nom; ?>" class="diagramme">
                
            </div>
        <hr/>
         

    <?php }
    ?>
    </div>      
    <script type="text/javascript" src="js/edit_form_note.js"></script>
    <script type="text/javascript" src="js/edit_note.js"></script>
    <script type="text/javascript" src="js/afficher_moyenne.js"></script>
    <script type="text/javascript" src="js/edit_with_graph.js"></script>
    </body>
</html>
