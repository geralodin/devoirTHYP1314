<?php

namespace Etunote\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Etunote\Model\Etudiants;          // <-- Add this import
use Etunote\Form\EtudiantsForm;       // <-- Add this import
 

 class EtunoteController extends AbstractActionController
 {
     protected $EtudiantsTable;
     
     public function indexAction()
     {
         return new ViewModel(
                 array(
                     'etudiants'=>$this->getEtudiantsTable()->fetchAll(),
                 )
         );
     }
     
     public function editnoteAction(){
         return new ViewModel(array(
            'notes_etudiants' => $this->getEtudiantsTable()->recupNoteEtudiants(1),
        ));
     }
     

     public function addAction()
     {
         $form = new EtudiantsForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $etudiants = new Etudiants();
            $form->setInputFilter($etudiants->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $etudiants->exchangeArray($form->getData());
                $this->getAlbumTable()->saveAlbum($etudiants);

                // Redirect to list of albums
                return $this->redirect()->toRoute('etunote');
            }
        }
        return array('form' => $form);
     }
     
     public function getEtudiantsTable(){
         if(!$this->EtudiantsTable){
             $sm = $this->getServiceLocator();
             $this->EtudiantsTable = $sm->get('Etunote\Model\EtudiantsTable');
         }
         return $this->EtudiantsTable;
     }
 }