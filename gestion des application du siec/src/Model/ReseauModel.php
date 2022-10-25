<?php
namespace App\Model;

class ReseauModel
{
    public function findAll($column, $status)
    {
        global $pdo;

        switch ($column) {
            case 'idReseau':
            case 'nomReseau':
            
                break;
            default:
                $column = null;
        }

        $sqlQuery = "SELECT * FROM reseau";
                    
        if (!empty($column)) {
            $sqlQuery .= " ORDER BY " . $column . " " . ($status === 'SORT_DESC' ? 'DESC' : '');
        }
         
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function find($idReseau){
        global $pdo;
        $sqlQuery = "SELECT nomReseau
                FROM reseau 
                WHERE idReseau=:idReseau";
            $db = $pdo->prepare($sqlQuery);
            $db->execute([
                'idReseau' => $idReseau
            ]);
        return $db->fetch(\PDO::FETCH_ASSOC);
    }
    public function add($nomReseau){
        global $pdo;
        $sqlQuerry= "insert into reseau (nomReseau) values (:nomReseau)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('nomReseau'=>$nomReseau,));
    }
    public function update ($nomReseau, $idReseau){
        global $pdo;
        $sqlQuerry= "update  reseau  set nomReseau=:nomReseau where idReseau= :idReseau";
            $db=$pdo->prepare($sqlQuerry);
            $autentif=$db->execute(array('nomReseau'=>$nomReseau, 'idReseau'=>$idReseau));
    }
    public function delete($idReseau){
        global $pdo;
        $sqlQuerry= "delete from reseau where idReseau=:idReseau";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(['idReseau'=>$idReseau]);
    }
}