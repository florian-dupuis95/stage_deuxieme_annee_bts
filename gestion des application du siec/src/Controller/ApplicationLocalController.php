<?php
namespace App\Controller;

use PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AbstractController.php');

class ApplicationLocalController extends AbstractController
{
    private $applicationLocaleModel;

    private $logModel;


    public function __construct()
    {
        $this->applicationLocaleModel = new \App\Model\ApplicationLocaleModel();
        $this->logModel = new \App\Model\LogModel();
    }
    
    public function index()
    {
        global $pdo;

        parent::common();
        $page = (!empty($_GET['id']) ? $_GET['id'] : 1);
        
        $limite=(!empty($_GET['limit']) ? $_GET['limit'] : 10);
        $debut=($page-1)*$limite;
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idApplications');

        $applicationsLocales = $this->applicationLocaleModel->findAll($column, $status, $limite, $debut);
        /*foreach ($applications as $app) {
            $data[]=array('idApplications'=> $app['idApplications'], 'nomOfficiel'=>$app['nomOfficiel'], 'nomDsi1'=>$app['nomDsi1'], 'descriptionapplications'=>$app['descriptionapplications'],
            'technologis'=>$app['technologis'], 'annee'=>$app['annee'], 'sauvegardes'=>$app['sauvegardes'], 'rgpd'=>$app['rgpd'], 'enquete'=>$app['enquete'], 
            'utilisateur_idutilisateur'=>$app['utilisateur_idutilisateur'], 'accesBackendProd'=>$app['accesBackendProd'], 'autoDeploiementBackendProd'=>$app['autoDeploiementBackendProd'],
            'depotGitBackend'=>$app['depotGitBackend'], 'serveur_idServeurBackendProd'=>$app['serveur_idServeurBackendProd'], 'accesBackendTest'=>$app['accesBackendTest'],
            'autoDeploiementBackendTest'=>$app['autoDeploiementBackendTest'], 'serveur_idServeurBackendTest'=>$app['serveur_idServeurBackendTest'], 'accesFrontendProd'=>$app['accesFrontendProd'],
            'autoDeploiementFrontendProd'=>$app['autoDeploiementFrontendProd'], 'depotGitFrontend'=>$app['depotGitFrontend'], 'serveur_idServeurFrontendProd'=>$app['serveur_idServeurFrontendProd'],
            'accesFrontendTest'=>$app['accesFrontendTest'], 'autoDeploiementFrontendTest'=>$app['autoDeploiementFrontendTest'],'serveur_idServeurFrontendTest'=>$app['serveur_idServeurFrontendTest'],
            'enqueteAPrevoir'=>$app['enqueteAPrevoir'],'prenomUtilisateur'=> $app['prenomUtilisateur'], 'nomsbt'=>$app['nomsbt'], 'nomsbp'=>$app['nomsbp'],
            'nomsfp'=>$app['nomsfp'], 'nomsft'=>$app['nomsft']);
        }
        $idApplications  = array_column($data, 'idApplications');
        $nomOfficiel = array_column($data, 'nomOfficiel');
        $nomDsi1  = array_column($data, 'nomDsi1');
        $descriptionapplications = array_column($data, 'descriptionapplications');
        $technologis  = array_column($data, 'technologis');
        $annee = array_column($data, 'annee');
        $sauvegardes  = array_column($data, 'sauvegardes');
        $rgpd = array_column($data, 'rgpd');
        $enquete  = array_column($data, 'enquete');
        $utilisateur_idutilisateur = array_column($data, 'utilisateur_idutilisateur');
        $accesBackendProd  = array_column($data, 'accesBackendProd');
        $autoDeploiementBackendProd = array_column($data, 'autoDeploiementBackendProd');
        $depotGitBackend  = array_column($data, 'depotGitBackend');
        $serveur_idServeurBackendProd = array_column($data, 'nomsbp');
        $accesBackendTest  = array_column($data, 'accesBackendTest');
        $autoDeploiementBackendTest = array_column($data, 'autoDeploiementBackendTest');
        $serveur_idServeurBackendTest  = array_column($data, 'nomsbt');
        $accesFrontendProd = array_column($data, 'accesFrontendProd');
        $autoDeploiementFrontendProd  = array_column($data, 'autoDeploiementFrontendProd');
        $depotGitFrontend = array_column($data, 'depotGitFrontend');
        $serveur_idServeurFrontendProd  = array_column($data, 'nomsfp');
        $accesFrontendTest = array_column($data, 'accesFrontendTest');
        $autoDeploiementFrontendTest  = array_column($data, 'autoDeploiementFrontendTest');
        $serveur_idServeurFrontendTest = array_column($data, 'nomsft');
        $enqueteAPrevoir  = array_column($data, 'enqueteAPrevoir');
        
        if ($status== 'SORT_DESC'){
            switch ($column) {
                case 'idApplication':
                    array_multisort(
                        $idApplications,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'nomOfficiel':
                    array_multisort(
                        $nomOfficiel,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'nomDsi1':
                    array_multisort(
                        $nomDsi1,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'descriptionapplications':
                    array_multisort(
                        $descriptionapplications,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'technologis':
                    array_multisort(
                        $technologis,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'annee':
                    array_multisort(
                        $annee,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'sauvegardes':
                    array_multisort(
                        $sauvegardes,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'rgpd':
                    array_multisort(
                        $rgpd,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'enquete':
                    array_multisort(
                        $enquete,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'utilisateur_idutilisateur':
                    array_multisort(
                        $utilisateur_idutilisateur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'accesBackendProd':
                    array_multisort(
                        $accesBackendProd,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'autoDeploiementBackendProd':
                    array_multisort(
                        $autoDeploiementBackendProd,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'depotGitBackend':
                    array_multisort(
                        $depotGitBackend,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'serveur_idServeurBackendProd':
                    array_multisort(
                        $serveur_idServeurBackendProd,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'accesBackendTest':
                    array_multisort(
                        $accesBackendTest,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'autoDeploiementBackendTest':
                    array_multisort(
                        $autoDeploiementBackendTest,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'serveur_idServeurBackendTest':
                    array_multisort(
                        $serveur_idServeurBackendTest,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'accesFrontendProd':
                    array_multisort(
                        $accesFrontendProd,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'autoDeploiementFrontendProd':
                    array_multisort(
                        $autoDeploiementFrontendProd,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'depotGitFrontend':
                    array_multisort(
                        $depotGitFrontend,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'serveur_idServeurFrontendProd':
                    array_multisort(
                        $serveur_idServeurFrontendProd,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'accesFrontendTest':
                    array_multisort(
                        $accesFrontendTest ,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'autoDeploiementFrontendTest':
                    array_multisort(
                        $autoDeploiementFrontendTest,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'serveur_idServeurFrontendTest':
                    array_multisort(
                        $serveur_idServeurFrontendTest,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'enqueteAPrevoir':
                    array_multisort(
                        $enqueteAPrevoir,
                        SORT_DESC,
                        $data
                    );
                    break;
            }
        } else {
            switch ($column) {
                case 'idApplications':
                    array_multisort(
                        $idApplications,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'nomOfficiel':
                    array_multisort(
                        $nomOfficiel,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'nomDsi1':
                    array_multisort(
                        $nomDsi1,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'descriptionapplications':
                    array_multisort(
                        $descriptionapplications,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'technologis':
                    array_multisort(
                        $technologis,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'annee':
                    array_multisort(
                        $annee,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'sauvegardes':
                    array_multisort(
                        $sauvegardes,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'rgpd':
                    array_multisort(
                        $rgpd,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'enquete':
                    array_multisort(
                        $enquete,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'utilisateur_idutilisateur':
                    array_multisort(
                        $utilisateur_idutilisateur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'accesBackendProd':
                    array_multisort(
                        $accesBackendProd,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'autoDeploiementBackendProd':
                    array_multisort(
                        $autoDeploiementBackendProd,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'depotGitBackend':
                    array_multisort(
                        $depotGitBackend,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'serveur_idServeurBackendProd':
                    array_multisort(
                        $serveur_idServeurBackendProd,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'accesBackendTest':
                    array_multisort(
                        $accesBackendTest,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'autoDeploiementBackendTest':
                    array_multisort(
                        $autoDeploiementBackendTest,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'serveur_idServeurBackendTest':
                    array_multisort(
                        $serveur_idServeurBackendTest,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'accesFrontendProd':
                    array_multisort(
                        $accesFrontendProd,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'autoDeploiementFrontendProd':
                    array_multisort(
                        $autoDeploiementFrontendProd,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'depotGitFrontend':
                    array_multisort(
                        $depotGitFrontend,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'serveur_idServeurFrontendProd':
                    array_multisort(
                        $serveur_idServeurFrontendProd,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'accesFrontendTest':
                    array_multisort(
                        $accesFrontendTest ,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'autoDeploiementFrontendTest':
                    array_multisort(
                        $autoDeploiementFrontendTest,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'serveur_idServeurFrontendTest':
                    array_multisort(
                        $serveur_idServeurFrontendTest,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'enqueteAPrevoir':
                    array_multisort(
                        $enqueteAPrevoir,
                        SORT_ASC,
                        $data
                    );
                    break;
            }
        }
        /*$applications = $this->applicationLocaleModel->findDix($limite, $debut);*/
        $ids = $this->applicationLocaleModel->findid();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'application_local/index.php');
    }

    public function ajout()
    {
        global $pdo;

        parent::common();
        $idApplications = $_GET['id'] ?? null;
        if (!empty($idApplications)) {
            $applications = $this->applicationLocaleModel->find($idApplications);
            
            if ($applications === false) {
                header("Location:index.php?page=applications_locales");
                $_SESSION['messages']['errors'][] = 'Application non trouvée';
                exit;
            }
        }
        
        $utilisateur = $this->applicationLocaleModel->utilisateur();
        $sbt = $this->applicationLocaleModel->sbt();
        $sbp = $this->applicationLocaleModel->sbp();
        $sft = $this->applicationLocaleModel->sft();
        $sfp = $this->applicationLocaleModel->sfp();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'application_local/ajout.php');
    } 

    public function fiche()
    {
        global $pdo;

        parent::common();
        $idApplications = $_GET['id'] ?? null;
        if (!empty($idApplications)) {
            
            $applications = $this->applicationLocaleModel->find($idApplications);
            
            if ($applications === false) {
                header("Location:index.php?page=applications_locales");
                $_SESSION['messages']['errors'][] = 'Application non trouvée';
                exit;
            }
        }
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'application_local/fiche.php');
    }
    public function suppression()
    {
        global $pdo;

        parent::common();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'application_local/suppression.php');
    }

    static private function controle($nomDsi1,
            $descriptionapplications,
            $technologis,
            $utilisateur_idutilisateur,
            $serveur_idServeurBackendProd,
            $serveur_idServeurBackendTest,
            $sauvegardes,
            $rgpd,
            $autoDeploiementBackendProd,
            $autoDeploiementBackendTest,
            $enquete,
            $enqueteAPrevoir,
            $serveur_idServeurFrontendProd,
            $serveur_idServeurFrontendTest,
            $autoDeploiementFrontendProd,
            $autoDeploiementFrontendTest)
    {

        /* controle des champs */
        $errors = [];

        // controle obligatoire 
        if (empty($nomDsi1)) {
            $errors[] = 'Nom DSI obligatoire';
        }
        if (empty($descriptionapplications)) {
            $errors[] = 'description obligatoire';
        }

        // controle valeurs 
        if (!empty($sauvegardes) && !in_array($sauvegardes, [ '1', '2' ])) {
            $errors[] = 'Sauvegarde incorrecte';
        }
        if (!empty($rgpd) && !in_array($rgpd, [ '1', '2' ])) {
            $errors[] = 'rgpd incorrecte';
        }
        if (!empty($autoDeploiementBackendProd) && !in_array($autoDeploiementBackendProd, [ '1', '2' ])) {
            $errors[] = 'auto Deploiement Backend Prod incorrecte';
        }
        if (!empty($autoDeploiementBackendTest) && !in_array($autoDeploiementBackendTest, [ '1', '2' ])) {
            $errors[] = 'auto Deploiement Backend Test incorrecte';
        }
        if (!empty($autoDeploiementFrontendProd) && !in_array($autoDeploiementFrontendProd, [ '1', '2' ])) {
            $errors[] = 'auto Deploiement Frontend Prod incorrecte';
        }
        if (!empty($autoDeploiementFrontendTest) && !in_array($autoDeploiementFrontendTest, [ '1', '2' ])) {
            $errors[] = 'auto Deploiement Frontend Test incorrecte';
        }
        

        return $errors;
    }

    public function ajoutAction()
    {
        global $pdo;

        $nomOfficiel = !empty($_POST['nomOfficiel']) ? $_POST['nomOfficiel'] : null;
        $nomDsi1= !empty($_POST['nomDsi1']) ? $_POST['nomDsi1'] : null;
        $descriptionapplications= !empty($_POST['descriptionapplications']) ? $_POST['descriptionapplications'] : null;
        $technologis= !empty($_POST['technologis']) ? $_POST['technologis'] : null;
        $utilisateur_idutilisateur= !empty($_POST['utilisateur_idutilisateur']) ? $_POST['utilisateur_idutilisateur'] : null;
        $annee= !empty($_POST['annee']) ? $_POST['annee'] : null;
        $accesBackendProd= !empty($_POST['accesBackendProd']) ? $_POST['accesBackendProd'] : null;
        $serveur_idServeurBackendProd= !empty($_POST['serveur_idServeurBackendProd']) ? $_POST['serveur_idServeurBackendProd'] : null;
        $accesBackendTest= !empty($_POST['accesBackendTest']) ? $_POST['accesBackendTest'] : null;
        $serveur_idServeurBackendTest= !empty($_POST['serveur_idServeurBackendTest']) ? $_POST['serveur_idServeurBackendTest'] : null;
        $sauvegardes = !empty($_POST['sauvegardes']) ? $_POST['sauvegardes'] : null;;
        $rgpd= !empty($_POST['rgpd']) ? $_POST['rgpd'] : null;
        $depotGitBackend= !empty($_POST['depotGitBackend']) ? $_POST['depotGitBackend'] : null;
        $autoDeploiementBackendProd= !empty($_POST['autoDeploiementBackendProd']) ? $_POST['autoDeploiementBackendProd'] : null;
        $autoDeploiementBackendTest= !empty($_POST['autoDeploiementBackendTest']) ? $_POST['autoDeploiementBackendTest'] : null;
        $enquete= !empty($_POST['enquete']) ? $_POST['enquete'] : null;
        $enqueteAPrevoir= !empty($_POST['enqueteAPrevoir']) ? $_POST['enqueteAPrevoir'] : null;
        $accesFrontendProd= !empty($_POST['accesFrontendProd']) ? $_POST['accesFrontendProd'] : null;
        $serveur_idServeurFrontendProd= !empty($_POST['serveur_idServeurFrontendProd']) ? $_POST['serveur_idServeurFrontendProd'] : null;
        $accesFrontendTest= !empty($_POST['accesFrontendTest']) ? $_POST['accesFrontendTest'] : null;
        $serveur_idServeurFrontendTest= !empty($_POST['serveur_idServeurFrontendTest']) ? $_POST['serveur_idServeurFrontendTest'] : null;
        $depotGitFrontend= !empty($_POST['depotGitFrontend']) ? $_POST['depotGitFrontend'] : null;
        $autoDeploiementFrontendProd= !empty($_POST['autoDeploiementFrontendProd']) ? $_POST['autoDeploiementFrontendProd'] : null;
        $autoDeploiementFrontendTest= !empty($_POST['autoDeploiementFrontendTest']) ? $_POST['autoDeploiementFrontendTest'] : null;
        
        $utilisateur_idutilisateur=!$utilisateur_idutilisateur ? null : $utilisateur_idutilisateur;
        $serveur_idServeurBackendProd=!$serveur_idServeurBackendProd ? null : $serveur_idServeurBackendProd;
        $serveur_idServeurBackendTest=!$serveur_idServeurBackendTest ? null : $serveur_idServeurBackendTest;
        $serveur_idServeurFrontendProd=!$serveur_idServeurFrontendProd ? null : $serveur_idServeurFrontendProd;
        $serveur_idServeurFrontendTest=!$serveur_idServeurFrontendTest ? null : $serveur_idServeurFrontendTest;
        $enquete=!$enquete ? null : $enquete;
        $enqueteAPrevoir=!$enqueteAPrevoir ? null : $enqueteAPrevoir;

        $errors = self::controle($nomDsi1,
            $descriptionapplications,
            $technologis,
            $utilisateur_idutilisateur,
            $serveur_idServeurBackendProd,
            $serveur_idServeurBackendTest,
            $sauvegardes,
            $rgpd,
            $autoDeploiementBackendProd,
            $autoDeploiementBackendTest,
            $enquete,
            $enqueteAPrevoir,
            $serveur_idServeurFrontendProd,
            $serveur_idServeurFrontendTest,
            $autoDeploiementFrontendProd,
            $autoDeploiementFrontendTest);

        if (empty($errors)) {
            $this->applicationLocaleModel->add($nomOfficiel, $nomDsi1, $descriptionapplications, $technologis, $utilisateur_idutilisateur, $annee, $accesBackendProd,$serveur_idServeurBackendProd,
                $accesBackendTest, $serveur_idServeurBackendTest, $sauvegardes, $rgpd, $depotGitBackend, $autoDeploiementBackendProd, $autoDeploiementBackendTest, $enquete, $enqueteAPrevoir,
                $accesFrontendProd, $serveur_idServeurFrontendProd, $accesFrontendTest, $serveur_idServeurFrontendTest, $depotGitFrontend, $autoDeploiementFrontendProd, $autoDeploiementFrontendTest);
            $this->logModel->add("ajout d'une application", $_SESSION['user']['idUtilisateur']);

            $success=[];
            $success[]='ajout d\'une application';
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=applications_locales");
            exit;
        }
        
        $_SESSION['messages']['errors'] = $errors;
    }

    public function modificationAction()
    {
        global $pdo;

        $nomOfficiel = !empty($_POST['nomOfficiel']) ? $_POST['nomOfficiel'] : null;
        $nomDsi1= !empty($_POST['nomDsi1']) ? $_POST['nomDsi1'] : null;
        $descriptionapplications= !empty($_POST['descriptionapplications']) ? $_POST['descriptionapplications'] : null;
        $technologis= !empty($_POST['technologis']) ? $_POST['technologis'] : null;
        $utilisateur_idutilisateur= !empty($_POST['utilisateur_idutilisateur']) ? $_POST['utilisateur_idutilisateur'] : null;
        $annee= !empty($_POST['annee']) ? $_POST['annee'] : null;
        $accesBackendProd= !empty($_POST['accesBackendProd']) ? $_POST['accesBackendProd'] : null;
        $serveur_idServeurBackendProd= !empty($_POST['serveur_idServeurBackendProd']) ? $_POST['serveur_idServeurBackendProd'] : null;
        $accesBackendTest= !empty($_POST['accesBackendTest']) ? $_POST['accesBackendTest'] : null;
        $serveur_idServeurBackendTest= !empty($_POST['serveur_idServeurBackendTest']) ? $_POST['serveur_idServeurBackendTest'] : null;
        $sauvegardes = !empty($_POST['sauvegardes']) ? $_POST['sauvegardes'] : null;;
        $rgpd= !empty($_POST['rgpd']) ? $_POST['rgpd'] : null;
        $depotGitBackend= !empty($_POST['depotGitBackend']) ? $_POST['depotGitBackend'] : null;
        $autoDeploiementBackendProd= !empty($_POST['autoDeploiementBackendProd']) ? $_POST['autoDeploiementBackendProd'] : null;
        $autoDeploiementBackendTest= !empty($_POST['autoDeploiementBackendTest']) ? $_POST['autoDeploiementBackendTest'] : null;
        $enquete= !empty($_POST['enquete']) ? $_POST['enquete'] : null;
        $enqueteAPrevoir= !empty($_POST['enqueteAPrevoir']) ? $_POST['enqueteAPrevoir'] : null;
        $accesFrontendProd= !empty($_POST['accesFrontendProd']) ? $_POST['accesFrontendProd'] : null;
        $serveur_idServeurFrontendProd= !empty($_POST['serveur_idServeurFrontendProd']) ? $_POST['serveur_idServeurFrontendProd'] : null;
        $accesFrontendTest= !empty($_POST['accesFrontendTest']) ? $_POST['accesFrontendTest'] : null;
        $serveur_idServeurFrontendTest= !empty($_POST['serveur_idServeurFrontendTest']) ? $_POST['serveur_idServeurFrontendTest'] : null;
        $depotGitFrontend= !empty($_POST['depotGitFrontend']) ? $_POST['depotGitFrontend'] : null;
        $autoDeploiementFrontendProd= !empty($_POST['autoDeploiementFrontendProd']) ? $_POST['autoDeploiementFrontendProd'] : null;
        $autoDeploiementFrontendTest= !empty($_POST['autoDeploiementFrontendTest']) ? $_POST['autoDeploiementFrontendTest'] : null;

        $utilisateur_idutilisateur=!$utilisateur_idutilisateur ? null : $utilisateur_idutilisateur;
        $serveur_idServeurBackendProd=!$serveur_idServeurBackendProd ? null : $serveur_idServeurBackendProd;
        $serveur_idServeurBackendTest=!$serveur_idServeurBackendTest ? null : $serveur_idServeurBackendTest;
        $serveur_idServeurFrontendProd=!$serveur_idServeurFrontendProd ? null : $serveur_idServeurFrontendProd;
        $serveur_idServeurFrontendTest=!$serveur_idServeurFrontendTest ? null : $serveur_idServeurFrontendTest;
        $enquete=!$enquete ? null : $enquete;
        $enqueteAPrevoir=!$enqueteAPrevoir ? null : $enqueteAPrevoir;

        $errors = self::controle(
            $nomDsi1,
            $descriptionapplications,
            $technologis,
            $utilisateur_idutilisateur,
            $serveur_idServeurBackendProd,
            $serveur_idServeurBackendTest,
            $sauvegardes,
            $rgpd,
            $autoDeploiementBackendProd,
            $autoDeploiementBackendTest,
            $enquete,
            $enqueteAPrevoir,
            $serveur_idServeurFrontendProd,
            $serveur_idServeurFrontendTest,
            $autoDeploiementFrontendProd,
            $autoDeploiementFrontendTest);

        $idApplications=$_GET['id'];
        if (empty($errors)) {
            $this->applicationLocaleModel->update($nomOfficiel, $nomDsi1, $descriptionapplications, $technologis, $utilisateur_idutilisateur, $annee, $accesBackendProd,$serveur_idServeurBackendProd,
                $accesBackendTest, $serveur_idServeurBackendTest, $sauvegardes, $rgpd, $depotGitBackend, $autoDeploiementBackendProd, $autoDeploiementBackendTest, $enquete, $enqueteAPrevoir,
                $accesFrontendProd, $serveur_idServeurFrontendProd, $accesFrontendTest, $serveur_idServeurFrontendTest, $depotGitFrontend, $autoDeploiementFrontendProd, $autoDeploiementFrontendTest,$idApplications);
            $this->logModel->update("modification de l'application $idApplications", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]="modification de l'application $idApplications";
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=applications_locales");
            exit;
        }

        $_SESSION['messages']['errors'] = $errors;
    }
    /*use \PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;*/
    public function suppressionAction()
    {
        global $pdo;
        $idApplications=$_GET['id'];
        $applications = $this->applicationLocaleModel->delete($idApplications);
        $this->logModel->delete("suppression de l'application $idApplications", $_SESSION['user']['idUtilisateur']);
        $success=[];
        $success[]="suppression de l'applications $idApplications";
        $_SESSION['messages']['success'] = $success;
        header("Location:index.php?page=applications_locales");
        exit;
    }
    public function exporterAction()
    {
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idApplications');
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        global $pdo;
        $this->logModel->export("export du tableau d'applcation locale", $_SESSION['user']['idUtilisateur']);
        $applications = $this->applicationLocaleModel->findAll($column,$status,1000000000000,0);
        $arrayData=[];
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $rowArray=['idApplications', 'nomOfficiel', 'nomDsi1', 'descriptionapplications', 'technologis', 'annee', 'sauvegardes', 'rgpd', 'enquete', 'utilisateur_idutilisateur',
        'accesBackendProd', 'autoDeploiementBackendProd', 'depotGitBackend', 'serveur_idServeurBackendProd', 'accesBackendTest', 'autoDeploiementBackendTest', 'serveur_idServeurBackendTest', 
        'accesFrontendProd', 'autoDeploiementFrontendProd', 'depotGitFrontend', 'serveur_idServeurFrontendProd', 'accesFrontendTest', 'autoDeploiementFrontendTest', 'serveur_idServeurFrontendTest', 
        'enqueteAPrevoir'];
        $sheet->fromArray(
            $rowArray, 
            null, 
            'A1'
        );
        $i = 2;
        foreach ($applications as $application) {
            $sheet->fromArray(
                $application, 
                null, 
                'A' . $i++
            );
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'application_locale.xlsx';
        $filepath = 'tmp/' . $filename;
        $writer->save($filepath);

        header('Content-disposition: attachment; ' . $filename);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile($filepath);
        exit;
    }
}