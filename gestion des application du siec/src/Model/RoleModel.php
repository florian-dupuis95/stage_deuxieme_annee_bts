<?php
namespace App\Model;

class RoleModel
{
    public function findAll($column, $status)
    {
        global $pdo;

        switch ($column) {
            case 'idRole':
            case 'nomRole':
            
                break;
            default:
                $column = null;
        }

        $sqlQuery = "SELECT * FROM roleutilisateur";
                    
        if (!empty($column)) {
            $sqlQuery .= " ORDER BY " . $column . " " . ($status === 'SORT_DESC' ? 'DESC' : '');
        }
         
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function find($idRole){
        global $pdo;
        $sqlQuery = "SELECT nomRole
                FROM roleutilisateur 
                WHERE idRole=:idRole";
            $db = $pdo->prepare($sqlQuery);
            $db->execute([
                'idRole' => $idRole
            ]);
        return $db->fetch(\PDO::FETCH_ASSOC);
    }
    public function add($nomRole){
        global $pdo;
        $sqlQuerry= "insert into roleutilisateur (nomRole) values (:nomRole)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('nomRole'=>$nomRole));
    }
    public function update ($nomRole, $idRole){
        global $pdo;
        $sqlQuerry= "update  roleutilisateur  set nomRole=:nomRole where idRole= :idRole";
            $db=$pdo->prepare($sqlQuerry);
            $autentif=$db->execute(array('nomRole'=>$nomRole, 'idRole'=>$idRole));
    }
    public function delete($idRole){
        global $pdo;
        $sqlQuerry= "delete from roleutilisateur where idRole=:idRole";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(['idRole'=>$idRole]);
    }
}