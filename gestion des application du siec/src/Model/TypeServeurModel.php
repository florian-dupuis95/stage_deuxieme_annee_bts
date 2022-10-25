<?php
namespace App\Model;

class TypeServeurModel
{
    public function findAll($column, $status)
    {
        global $pdo;

        switch ($column) {
            case 'idType':
            case 'nomType':
            
                break;
            default:
                $column = null;
        }

        $sqlQuery = "SELECT * FROM typeserveur";
                    
        if (!empty($column)) {
            $sqlQuery .= " ORDER BY " . $column . " " . ($status === 'SORT_DESC' ? 'DESC' : '');
        }
         
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function find($idType){
        global $pdo;
        $sqlQuery = "SELECT nomType
                FROM typeserveur 
                WHERE idType=:idType";
            $db = $pdo->prepare($sqlQuery);
            $db->execute([
                'idType' => $idType
            ]);
        return $db->fetch(\PDO::FETCH_ASSOC);
    }
    public function add($nomType){
        global $pdo;
        $sqlQuerry= "insert into typeserveur (nomType) values (:nomType)";
            $db=$pdo->prepare($sqlQuerry);
            $autentif=$db->execute(array('nomType'=>$nomType,));
    }
    public function update ($nomType, $idType){
        global $pdo;
        $sqlQuerry= "update  typeserveur  set nomType=:nomType where idType= :idType";
            $db=$pdo->prepare($sqlQuerry);
            $autentif=$db->execute(array('nomType'=>$nomType, 'idType'=>$idType));
    }
    public function delete($idType){
        global $pdo;
        $sqlQuerry= "delete from typeserveur where idType=:idType";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(['idType'=>$idType]);
    }
}