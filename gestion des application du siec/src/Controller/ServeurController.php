<?php
namespace App\Controller;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AbstractController.php');

class ServeurController extends AbstractController
{
    private $serveurModel;
    private $logModel;

    public function __construct()
    {
        $this->serveurModel = new \App\Model\ServeurModel();
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
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idServeur');
        $serveurs = $this->serveurModel->findAll($column, $status, $limite, $debut);
        /*foreach ($serveurs as $app) {
            $data[]=array('idServeur'=> $app['idServeur'], 'nom'=>$app['nom'], 'ipServeur'=>$app['ipServeur'], 'reseau'=>$app['reseau'],
            'os'=>$app['os'], 'typeServeur'=>$app['typeServeur'], 'commentaire'=>$app['commentaire'], 'nomReseau'=>$app['nomReseau'], 'nomType'=>$app['nomType']);
        }
        $idServeur  = array_column($data, 'idServeur');
        $nom = array_column($data, 'nom');
        $ipServeur  = array_column($data, 'ipServeur');
        $reseau = array_column($data, 'nomReseau');
        $os  = array_column($data, 'os');
        $typeServeur = array_column($data, 'nomType');
        $commentaire  = array_column($data, 'commentaire');
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idServeur');
        if ($status== 'SORT_DESC'){
            switch ($column) {
                case 'idServeur':
                    array_multisort(
                        $idServeur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'nom':
                    array_multisort(
                        $nom,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'ipServeur':
                    array_multisort(
                        $ipServeur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'reseau':
                    array_multisort(
                        $reseau,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'os':
                    array_multisort(
                        $os,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'typeServeur':
                    array_multisort(
                        $typeServeur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'commentaire':
                    array_multisort(
                        $commentaire,
                        SORT_DESC,
                        $data
                    );
                    break;
            }
        } else {
            switch ($column) {
                case 'idServeur':
                    array_multisort(
                        $idServeur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'nom':
                    array_multisort(
                        $nom,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'ipServeur':
                    array_multisort(
                        $ipServeur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'reseau':
                    array_multisort(
                        $reseau,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'os':
                    array_multisort(
                        $os,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'typeServeur':
                    array_multisort(
                        $typeServeur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'commentaire':
                    array_multisort(
                        $commentaire,
                        SORT_ASC,
                        $data
                    );
                    break;
            }
        }*/
        $ids = $this->serveurModel->findid();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'serveur/index.php');
    }

    public function ajout()
    {
        global $pdo;

        parent::common();
        $idServeur = $_GET['id'] ?? null;
        if (!empty($idServeur)) {
            $serveurs = $this->serveurModel->find($idServeur);
            if ($serveurs === false) {
                header("Location:index.php?page=serveurs");
                $_SESSION['messages']['errors'][] = 'serveur non trouvée';
                exit;
            }
        }
        $reseaus = $this->serveurModel->reseau();
        $types = $this->serveurModel->type();
            
            
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'serveur/ajout.php');
    }

    public function fiche()
    {
        global $pdo;

        parent::common();
        $idServeur = $_GET['id'] ?? null;
        if (!empty($idServeur)) {
            $serveurs = $this->serveurModel->find($idServeur);
            
            if ($serveurs === false) {
                header("Location:index.php?page=serveurs");
                $_SESSION['messages']['errors'][] = 'serveur non trouvée';
                exit;
            }
        }
        
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'serveur/fiche.php');
    }
    
    public function suppression()
    {
        global $pdo;

        parent::common();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'serveur/suppression.php');
    }

    static private function controle($nom, $ipServeur, $reseau, $os, $typeServeur)
    {
        
        /* controle des champs */
        $errors = [];

        // controle obligatoire 
        if (empty($nom)) {
            $errors[] = 'Nom obligatoire';
        }
        if (empty($ipServeur)) {
            $errors[] = 'ip Serveur obligatoire';
        }
        if (empty($os)) {
            $errors[] = 'os obligatoire';
        }

        // controle valeurs 
        if (empty($reseau)) {
            $errors[] = 'reseau obligatoire';
        }elseif (!in_array($reseau, [ '1', '2', '3' ])) {
            $errors[] = 'reseau incorrecte';
        }
        if (empty($typeServeur)) {
            $errors[] = 'type Serveur obligatoire';
        }elseif (!in_array($typeServeur, [ '1', '2', '3' ])) {
            $errors[] = 'type Serveur incorrecte';
        }
        
        return $errors;
    }

    public function ajoutAction()
    {
        global $pdo;
        $nom=!empty($_POST['nom']) ? $_POST['nom'] : null;
        $ipServeur=!empty($_POST['ipServeur']) ? $_POST['ipServeur'] : null;
        $reseau=!empty($_POST['reseau']) ? $_POST['reseau'] : null;
        $os=!empty($_POST['os']) ? $_POST['os'] : null;
        $typeServeur=!empty($_POST['typeServeur']) ? $_POST['typeServeur'] : null;
        $commentaire=!empty($_POST['commentaire']) ? $_POST['commentaire'] : null;

        $errors = self::controle($nom, $ipServeur, $reseau, $os, $typeServeur);
        if (empty($errors)) {
            $serveurs = $this->serveurModel->add($nom, $ipServeur, $reseau, $os, $typeServeur, $commentaire);
            $this->logModel->add("ajout d'un serveur", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]='ajout d\'un serveur';
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=serveurs");
            exit;
        }

        $_SESSION['messages']['errors'] = $errors;
    }
    public function modificationAction()
    {
        global $pdo;
        $nom=!empty($_POST['nom']) ? $_POST['nom'] : null;
        $ipServeur=!empty($_POST['ipServeur']) ? $_POST['ipServeur'] : null;
        $reseau=!empty($_POST['reseau']) ? $_POST['reseau'] : null;
        $os=!empty($_POST['os']) ? $_POST['os'] : null;
        $typeServeur=!empty($_POST['typeServeur']) ? $_POST['typeServeur'] : null;
        $commentaire=!empty($_POST['commentaire']) ? $_POST['commentaire'] : null;

        $errors = self::controle($nom, $ipServeur, $reseau, $os, $typeServeur);
        $idServeur=$_GET['id'];
        if (empty($errors)) {
            $serveurs = $this->serveurModel->update($nom, $ipServeur, $reseau, $os, $typeServeur, $commentaire, $idServeur);
            $this->logModel->update("modification du serveur $idServeur", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]="modification du serveur $idServeur";
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=serveurs");
            exit;
        }

        $_SESSION['messages']['errors'] = $errors;
    }
    /*use \PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;*/
    public function suppressionAction()
    {
        global $pdo;
        $idServeur=$_GET['id'];
        $serveurs = $this->serveurModel->delete($idServeur);
        $this->logModel->delete("suppression du serveur $idServeur", $_SESSION['user']['idUtilisateur']);
        $success=[];
        $success[]="supression du serveur $idServeur";
        $_SESSION['messages']['success'] = $success;
        header("Location:index.php?page=serveurs");
        exit;
    }
    public function exporterAction()
    {
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idApplications');
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        global $pdo;
        $serveurs = $this->serveurModel->findAll($column,$status,1000000000000,0);;
        $this->logModel->export("export du tableau de serveur", $_SESSION['user']['idUtilisateur']);
        $arrayData=[];
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $rowArray=['idServeur', 'nom', 'ipServeur', 'reseau', 'os', 'typeServeur', 'commentaire'];
        $sheet->fromArray(
            $rowArray, 
            null, 
            'A1'
        );
        $i = 2;
        foreach ($serveurs as $serveur) {
            $sheet->fromArray(
                $serveur, 
                null, 
                'A' . $i++
            );
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'serveur.xlsx';
        $filepath = 'tmp/' . $filename;
        $writer->save($filepath);

        header('Content-disposition: attachment; ' . $filename);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile($filepath);
        exit;
    }
}