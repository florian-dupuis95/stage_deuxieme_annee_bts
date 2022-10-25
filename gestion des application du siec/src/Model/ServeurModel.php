<?php
namespace App\Model;

class ServeurModel
{
    public function findDix($limite, $debut)
    {
        global $pdo;

        $sqlQuerry = "SELECT s.*, r.nomReseau, ts.nomType
                    FROM serveur AS s
                    LEFT JOIN reseau AS r
                    ON s.reseau = r.idReseau
                    LEFT JOIN typeserveur AS ts
                    ON s.typeServeur = ts.idType
                    ORDER BY s.idServeur
                    LIMIT :debut, :limite";
        $db = $pdo->prepare($sqlQuerry);
        $db->bindValue('limite', $limite, \PDO::PARAM_INT);
        $db->bindValue('debut', $debut, \PDO::PARAM_INT);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function findid()
    {
        global $pdo;

        $sqlQuerry = "SELECT s.idServeur
                    FROM serveur AS s
                    ORDER BY s.idServeur";
        $db = $pdo->prepare($sqlQuerry);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function findAll($column, $status, $limite, $debut)
    {
        global $pdo;

        switch ($column) {
            case 'idServeur':
            case 'nom':
            case 'ipServeur':
            case 'reseau':
            case 'os':
            case 'typeServeur':
            case 'commentaire':
                break;
            default:
                $column = null;
        }

        $sqlQuery = "SELECT s.*, r.nomReseau, ts.nomType
                    FROM serveur AS s
                    LEFT JOIN reseau AS r
                    ON s.reseau = r.idReseau
                    LEFT JOIN typeserveur AS ts
                    ON s.typeServeur = ts.idType";
                    
        if (!empty($column)) {
            $sqlQuery .= " ORDER BY " . $column . " " . ($status === 'SORT_DESC' ? 'DESC' : '');
        }
        $sqlQuery .= " LIMIT " . $debut . "," . $limite;
         
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function find($idServeur){
        global $pdo;
        $sqlQuery = "SELECT s.*, r.nomReseau, ts.nomType
                        FROM serveur AS s
                        LEFT JOIN reseau AS r
                        ON s.reseau = r.idReseau
                        LEFT JOIN typeserveur AS ts
                        ON s.typeServeur = ts.idType
                        WHERE idServeur=:idServeur";
            $db = $pdo->prepare($sqlQuery);
            $db->execute([
                'idServeur' => $idServeur
            ]);
        return $db->fetch(\PDO::FETCH_ASSOC);
    }
    public function add($nom, $ipServeur, $reseau, $os, $typeServeur, $commentaire){
        global $pdo;
        $sqlQuerry= "insert into serveur (nom, ipServeur, reseau, os, typeServeur, commentaire) values (:nom, :ipServeur, :reseau, :os, :typeServeur, :commentaire)";
            $db=$pdo->prepare($sqlQuerry);
            $autentif=$db->execute(array('nom'=>$nom,
            'ipServeur'=>$ipServeur,
            'reseau'=>$reseau,
            'os'=>$os,
            'typeServeur'=>$typeServeur,
            'commentaire'=>$commentaire));
    }
    public function update ($nom, $ipServeur, $reseau, $os, $typeServeur, $commentaire, $idServeur){
        global $pdo;
        $sqlQuerry= "update  serveur  set nom=:nom, ipServeur=:ipServeur, reseau=:reseau, os=:os, typeServeur=:typeServeur, commentaire=:commentaire where idServeur= :idServeur";
            $db=$pdo->prepare($sqlQuerry);
            $autentif=$db->execute(array('nom'=>$nom,
            'ipServeur'=>$ipServeur,
            'reseau'=>$reseau,
            'os'=>$os,
            'typeServeur'=>$typeServeur,
            'commentaire'=>$commentaire,
            'idServeur'=>$idServeur));

    }
    public function delete($idServeur){
        global $pdo;
        $sqlQuerry= "delete from serveur where idServeur=:idServeur";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(['idServeur'=>$idServeur]);
    }
    public function reseau(){
        global $pdo;
        $sqlQuery = "SELECT r.*
                        FROM reseau AS r";
            $db = $pdo->prepare($sqlQuery);
            $db->execute();
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function type(){
        global $pdo;
        $sqlQuery = "SELECT ts.*
                        FROM typeserveur AS ts";
            $db = $pdo->prepare($sqlQuery);
            $db->execute();
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
}