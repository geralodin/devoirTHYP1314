<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author geralodin
 */
class Personne {
    public $img, $nom, $prenom;
    
    function __construct($img, $nom, $prenom) {
        $this->img = $img;
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

}

?>
