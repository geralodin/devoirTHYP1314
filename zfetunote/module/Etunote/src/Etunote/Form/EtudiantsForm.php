<?php
namespace Etunote\Form;
use Zend\Form\Form;

class EtudiantsForm extends Form{
    
    public function __construct(){
        parent::__construct('etudiants');
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden'
        ));
        
        $this->add(array(
            'name' => 'nom',
            'type' => 'text',
            'option' => array(
                'label' => 'nom',
            ),
        ));
        
                
        $this->add(array(
            'name' => 'prenom',
            'type' => 'text',
            'option' => array(
                'label' => 'prenom',
            ),
        ));
        
        $this->add(array(
             'name' => 'submit',
             'type' => 'Submit',
             'attributes' => array(
                 'value' => 'Valider',
                 'id' => 'submitbutton',
             ),
         ));
    }
}
