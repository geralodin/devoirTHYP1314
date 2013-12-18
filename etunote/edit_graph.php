<?php
include_once 'db_connexion/connexion.php';

if(isset($_GET['nom'])){
    $nom = trim($_GET['nom'], "\xC2\xA0\n" );
    $etudiant = $db->query("SELECT notes FROM etudiants_has_matiere ehm
                    INNER JOIN etudiants e
                    ON e.idetudiants = ehm.etudiants_idetudiants
                    INNER JOIN matiere m
                    ON m.idmatiere = ehm.matiere_idmatiere
                    WHERE e.nom LIKE '%".$_GET['nom']."%'");
}


$str ="";
$divId = "#".$_GET['divId'];
foreach ($etudiant as $e){
    $str.= $e['notes'].',';
}
    $s = trim($str, ',');
?>
<script type="text/javascript">
     
    //déclaration tableau des valeurs
    var dataArray = [<?php echo $s; ?>];

    //definition de l'echelle et la gamme
    var widthScale = d3.scale.linear()
                            .domain([0,	20])
                            .range([0,290]);

    //définition du jeu des couleurs
    var color = d3.scale.linear()
                    .domain([0,20])
                    .range(["red","blue"]);

    //nombre de ticks
    var axis= d3.svg.axis()
                    .ticks(5)
                    .scale(widthScale);

    //créer l'espace de dessin
    var canvas = d3.selectAll("<?php echo $divId; ?>")
                            .append("svg")
                            .attr("width",310)
                            .attr("height",200)
                            .attr("style","padding-left:10px;");

    //dessiner les rectangles, etc.
    var bars = canvas.selectAll("rect")
                    .data(dataArray)
                    .enter()
                            .append("rect")
                            .attr("width",function(d){
                                    return widthScale(d);
                            })
                            .attr("height",15)
                            .attr("fill", function(d){
                                    return color(d);
                            })
                            .attr("y",function(d,i){
                                    return i*20;
                            });
    //espacement + axe
    canvas.append("g")
            .attr("transform","translate(0,80)")
            .call(axis);
</script> 
