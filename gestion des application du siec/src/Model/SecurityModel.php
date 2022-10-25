<?php
namespace App\Model;

class SecurityModel
{
    public function sel($NomUtilisateur)
    {
        global $pdo;

        $sql="SELECT sel FROM utilisateur WHERE loginUtilisateur= :loginUtilisateur";
        $db=$pdo->prepare($sql);
        $db->execute(['loginUtilisateur'=>$NomUtilisateur]);

        $data = $db->fetch(\PDO::FETCH_ASSOC);
        return $data['sel'];
    }
    public function statement($NomUtilisateur)
    {
        global $pdo;

        $sqlQuerry = "SELECT idUtilisateur, loginUtilisateur, roleUtilisateur, motDePasse FROM utilisateur WHERE loginUtilisateur= :loginUtilisateur";
        $statement = $pdo->prepare($sqlQuerry);
        $statement->execute([
            'loginUtilisateur'=>$NomUtilisateur,
        ]);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    public function mdp($NomUtilisateur){
        global $pdo;
        $sqle="SELECT motDePasse FROM utilisateur WHERE loginUtilisateur= :loginUtilisateur";
        $db=$pdo->prepare($sqle);
        $db->execute(['loginUtilisateur'=>$NomUtilisateur]);
        $data = $db->fetch(\PDO::FETCH_ASSOC);
        return $data['motDePasse'];
    }
    public function ldap($NomUtilisateur){
        global $pdo;
        $sqle="SELECT ldap FROM utilisateur WHERE loginUtilisateur= :loginUtilisateur";
        $db=$pdo->prepare($sqle);
        $db->execute(['loginUtilisateur'=>$NomUtilisateur]);
        $data = $db->fetch(\PDO::FETCH_ASSOC);
        return $data['ldap'];
    }
}