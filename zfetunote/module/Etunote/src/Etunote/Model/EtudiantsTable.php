<?php

namespace Etunote\Model;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Select;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Db\Adapter\Adapter as DbAdapter;

 class EtudiantsTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll($paginated=false)
     {  
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getEtudiants($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveEtudiants(Etudiants $etudiant)
     {
         $data = array(
             'nom' => $etudiant->nom,
             'prenom'  => $etudiant->prenom,
         );

         $id = (int) $etudiant->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getEtudiants($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Etudiants id does not exist');
             }
         }
     }

     public function deleteEtudiants($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
     
     public function recupNoteEtudiants($i){
      $db = new DbAdapter(
          array(
              'driver'        => 'Pdo',
              'dsn'            => 'mysql:dbname=etunote;host=localhost',
              'username'       => 'root',
              'password'       => '',
              )
          );
        
        $sql = "SELECT * FROM etudiants_has_matiere ehm
                    INNER JOIN etudiants e
                    ON e.idetudiants = ehm.etudiants_idetudiants
                    INNER JOIN matiere m
                    ON m.idmatiere = ehm.matiere_idmatiere
                    WHERE e.idetudiants = ".$i;

        return $db->query($sql)->execute(array(125000, 125200));
  }
 }
