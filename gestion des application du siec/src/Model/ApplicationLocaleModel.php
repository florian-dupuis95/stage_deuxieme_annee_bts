<?php
namespace App\Model;

class ApplicationLocaleModel
{
    public function findDix($limite, $debut)
    {
        global $pdo;

        $sqlQuerry = "SELECT a.*, u.prenomUtilisateur,sbt.nom as nomsbt,sbp.nom as nomsbp,sfp.nom as nomsfp,sft.nom as nomsft
                    FROM applications AS a
                    LEFT JOIN utilisateur AS u
                    ON a.utilisateur_idutilisateur = u.idUtilisateur
                    LEFT JOIN serveur AS sbt
                    ON a.serveur_idServeurBackendTest=sbt.idServeur
                    LEFT JOIN serveur AS sbp
                    ON a.serveur_idServeurBackendProd=sbp.idServeur
                    LEFT JOIN serveur AS sfp
                    ON a.serveur_idServeurFrontendProd=sfp.idServeur
                    LEFT JOIN serveur AS sft
                    ON a.serveur_idServeurFrontendTest=sft.idServeur
                    ORDER BY a.idApplications
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

        $sqlQuerry = "SELECT a.idApplications
                    FROM applications AS a
                    ORDER BY a.idApplications";
        $db = $pdo->prepare($sqlQuerry);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function findAll($column, $status, $limite, $debut)
    {
        global $pdo;

        switch ($column) {
            case 'idApplications':
            case 'nomOfficiel':
            case 'nomDsi1':
            case 'descriptionapplications':
            case 'technologis':
            case 'annee':
            case 'sauvegardes':
            case 'rgpd':
            case 'enquete':
            case 'utilisateur_idutilisateur':
            case 'accesBackendProd':
            case 'autoDeploiementBackendProd':
            case 'depotGitBackend':
            case 'serveur_idServeurBackendProd':
            case 'accesBackendTest':
            case 'autoDeploiementBackendTest':
            case 'serveur_idServeurBackendTest':
            case 'accesFrontendProd':
            case 'autoDeploiementFrontendProd':
            case 'depotGitFrontend':
            case 'serveur_idServeurFrontendProd':
            case 'accesFrontendTest':
            case 'autoDeploiementFrontendTest':
            case 'serveur_idServeurFrontendTest':
            case 'enqueteAPrevoir':
                break;
            default:
                $column = null;
        }

        $sqlQuery = "SELECT a.*,u.prenomUtilisateur,sbt.nom as nomsbt,sbp.nom as nomsbp,sfp.nom as nomsfp,sft.nom as nomsft
                    FROM applications AS a
                    LEFT JOIN utilisateur AS u
                    ON a.utilisateur_idutilisateur = u.idUtilisateur
                    LEFT JOIN serveur AS sbt
                    ON a.serveur_idServeurBackendTest=sbt.idServeur
                    LEFT JOIN serveur AS sbp
                    ON a.serveur_idServeurBackendProd=sbp.idServeur
                    LEFT JOIN serveur AS sfp
                    ON a.serveur_idServeurFrontendProd=sfp.idServeur
                    LEFT JOIN serveur AS sft
                    ON a.serveur_idServeurFrontendTest=sft.idServeur";
                    
        if (!empty($column)) {
            $sqlQuery .= " ORDER BY " . $column . " " . ($status === 'SORT_DESC' ? 'DESC' : '');
        }
        $sqlQuery .= " LIMIT " . $debut . "," . $limite;
         
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function find($idApplications){
        global $pdo;
        $sqlQuery = "SELECT a.*, u.prenomUtilisateur,sbt.nom as nomsbt,sbp.nom as nomsbp,sfp.nom as nomsfp,sft.nom as nomsft
                    FROM applications AS a
                    LEFT JOIN utilisateur AS u
                    ON a.utilisateur_idutilisateur = u.idUtilisateur
                    LEFT JOIN serveur AS sbt
                    ON a.serveur_idServeurBackendTest=sbt.idServeur
                    LEFT JOIN serveur AS sbp
                    ON a.serveur_idServeurBackendProd=sbp.idServeur
                    LEFT JOIN serveur AS sfp
                    ON a.serveur_idServeurFrontendProd=sfp.idServeur
                    LEFT JOIN serveur AS sft
                    ON a.serveur_idServeurFrontendTest=sft.idServeur
                    WHERE idApplications=:idApplications";
        $db = $pdo->prepare($sqlQuery);
        $db->execute([
            'idApplications' => $idApplications
        ]);
        return $db->fetch(\PDO::FETCH_ASSOC);
    }
    public function add($nomOfficiel, $nomDsi1, $descriptionapplications, $technologis, $utilisateur_idutilisateur, $annee, $accesBackendProd,$serveur_idServeurBackendProd,
    $accesBackendTest, $serveur_idServeurBackendTest, $sauvegardes, $rgpd, $depotGitBackend, $autoDeploiementBackendProd, $autoDeploiementBackendTest, $enquete, $enqueteAPrevoir,
    $accesFrontendProd, $serveur_idServeurFrontendProd, $accesFrontendTest, $serveur_idServeurFrontendTest, $depotGitFrontend, $autoDeploiementFrontendProd, $autoDeploiementFrontendTest){
        global $pdo;
        $sqlQuery= "insert into Applications (nomOfficiel, nomDsi1, descriptionapplications, technologis, annee, sauvegardes, rgpd, enquete, utilisateur_idutilisateur, accesBackendProd, autoDeploiementBackendProd, depotGitBackend, serveur_idServeurBackendProd, accesBackendTest, autoDeploiementBackendTest, serveur_idServeurBackendTest, accesFrontendProd, autoDeploiementFrontendProd, depotGitFrontend, serveur_idServeurFrontendProd, accesFrontendTest, autoDeploiementFrontendTest, serveur_idServeurFrontendTest, enqueteAPrevoir) values(:nomOfficiel, :nomDsi1, :descriptionapplications, :technologis, :annee, :sauvegardes, :rgpd, :enquete, :utilisateur_idutilisateur, :accesBackendProd, :autoDeploiementBackendProd, :depotGitBackend, :serveur_idServeurBackendProd, :accesBackendTest, :autoDeploiementBackendTest, :serveur_idServeurBackendTest, :accesFrontendProd, :autoDeploiementFrontendProd, :depotGitFrontend, :serveur_idServeurFrontendProd, :accesFrontendTest, :autoDeploiementFrontendTest, :serveur_idServeurFrontendTest, :enqueteAPrevoir) "; 
        $db=$pdo->prepare($sqlQuery);
        $autentif=$db->execute([
            'nomOfficiel'=>$nomOfficiel,
            'nomDsi1'=>$nomDsi1,
            'descriptionapplications'=>$descriptionapplications,
            'technologis'=>$technologis,
            'annee'=>$annee,
            'sauvegardes'=>$sauvegardes,
            'rgpd'=>$rgpd,
            'enquete'=>$enquete,
            'utilisateur_idutilisateur'=>$utilisateur_idutilisateur,
            'accesBackendProd'=>$accesBackendProd,
            'autoDeploiementBackendProd'=>$autoDeploiementBackendProd,
            'depotGitBackend'=>$depotGitBackend,
            'serveur_idServeurBackendProd'=>$serveur_idServeurBackendProd,
            'accesBackendTest'=>$accesBackendTest,
            'autoDeploiementBackendTest'=>$autoDeploiementBackendTest,
            'serveur_idServeurBackendTest'=>$serveur_idServeurBackendTest,
            'accesFrontendProd'=>$accesFrontendProd,
            'autoDeploiementFrontendProd'=>$autoDeploiementFrontendProd,
            'depotGitFrontend'=>$depotGitFrontend,
            'serveur_idServeurFrontendProd'=>$serveur_idServeurFrontendProd,
            'accesFrontendTest'=>$accesFrontendTest,
            'autoDeploiementFrontendTest'=>$autoDeploiementFrontendTest,
            'serveur_idServeurFrontendTest'=>$serveur_idServeurFrontendTest,
            'enqueteAPrevoir'=>$enqueteAPrevoir]);
    }
    public function update ($nomOfficiel, $nomDsi1, $descriptionapplications, $technologis, $utilisateur_idutilisateur, $annee, $accesBackendProd,$serveur_idServeurBackendProd,
            $accesBackendTest, $serveur_idServeurBackendTest, $sauvegardes, $rgpd, $depotGitBackend, $autoDeploiementBackendProd, $autoDeploiementBackendTest, $enquete, $enqueteAPrevoir,
            $accesFrontendProd, $serveur_idServeurFrontendProd, $accesFrontendTest, $serveur_idServeurFrontendTest, $depotGitFrontend, $autoDeploiementFrontendProd, $autoDeploiementFrontendTest, $idApplications){
        global $pdo;
        $sqlQuery= "UPDATE  applications  set nomOfficiel=:nomOfficiel, nomDsi1=:nomDsi1, descriptionapplications=:descriptionapplications, technologis=:technologis, 
            annee=:annee, sauvegardes=:sauvegardes, rgpd=:rgpd, enquete=:enquete, utilisateur_idutilisateur=:utilisateur_idutilisateur, accesBackendProd=:accesBackendProd, 
            autoDeploiementBackendProd=:autoDeploiementBackendProd, depotGitBackend=:depotGitBackend, serveur_idServeurBackendProd=:serveur_idServeurBackendProd, 
            accesBackendTest=:accesBackendTest, autoDeploiementBackendTest=:autoDeploiementBackendTest, serveur_idServeurBackendTest=:serveur_idServeurBackendTest, 
            accesFrontendProd=:accesFrontendProd, autoDeploiementFrontendProd=:autoDeploiementFrontendProd, depotGitFrontend=:depotGitFrontend, 
            serveur_idServeurFrontendProd=:serveur_idServeurFrontendProd, accesFrontendTest=:accesFrontendTest, autoDeploiementFrontendTest=:autoDeploiementFrontendTest, 
            serveur_idServeurFrontendTest=:serveur_idServeurFrontendTest, enqueteAPrevoir=:enqueteAPrevoir where idApplications= :idApplications";
        $db=$pdo->prepare($sqlQuery);
        $autentif=$db->execute([
            'nomOfficiel'=>$nomOfficiel,
            'nomDsi1'=>$nomDsi1,
            'descriptionapplications'=>$descriptionapplications,
            'technologis'=>$technologis,
            'annee'=>$annee,
            'sauvegardes'=>$sauvegardes,
            'rgpd'=>$rgpd,
            'enquete'=>$enquete,
            'utilisateur_idutilisateur'=>$utilisateur_idutilisateur,
            'accesBackendProd'=>$accesBackendProd,
            'autoDeploiementBackendProd'=>$autoDeploiementBackendProd,
            'depotGitBackend'=>$depotGitBackend,
            'serveur_idServeurBackendProd'=>$serveur_idServeurBackendProd,
            'accesBackendTest'=>$accesBackendTest,
            'autoDeploiementBackendTest'=>$autoDeploiementBackendTest,
            'serveur_idServeurBackendTest'=>$serveur_idServeurBackendTest,
            'accesFrontendProd'=>$accesFrontendProd,
            'autoDeploiementFrontendProd'=>$autoDeploiementFrontendProd,
            'depotGitFrontend'=>$depotGitFrontend,
            'serveur_idServeurFrontendProd'=>$serveur_idServeurFrontendProd,
            'accesFrontendTest'=>$accesFrontendTest,
            'autoDeploiementFrontendTest'=>$autoDeploiementFrontendTest,
            'serveur_idServeurFrontendTest'=>$serveur_idServeurFrontendTest,
            'enqueteAPrevoir'=>$enqueteAPrevoir,
            'idApplications'=>$idApplications]);
    }
    public function delete($idApplications){
        global $pdo;
        $sqlQuerry= "delete from applications where idApplications=:idApplications";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(['idApplications'=>$idApplications]);
    }
    public function utilisateur(){
        global $pdo;
        $sqlQuery = "SELECT u.idUtilisateur, u.prenomUtilisateur
                    FROM utilisateur AS u";
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function sbt(){
        global $pdo;
        $sqlQuery = "SELECT sbt.idServeur, sbt.nom
                    FROM serveur AS sbt";
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function sbp(){
        global $pdo;
        $sqlQuery = "SELECT sbp.idServeur, sbp.nom
                    FROM serveur AS sbp";
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function sft(){
        global $pdo;
        $sqlQuery = "SELECT sft.idServeur, sft.nom
                    FROM serveur AS sft";
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function sfp(){
        global $pdo;
        $sqlQuery = "SELECT sfp.idServeur, sfp.nom
                    FROM serveur AS sfp";
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
}