<?php
namespace App\Controller;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AbstractController.php');

class ReseauController extends AbstractController
{
    private $reseauModel;
    private $logModel;

    public function __construct()
    {
        $this->reseauModel = new \App\Model\ReseauModel();
        $this->logModel = new \App\Model\LogModel();
    }
    
    public function index()
    {
        global $pdo;

        parent::common();
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idReseau');
        $reseaus = $this->reseauModel->findAll($column, $status);
        /*foreach ($reseaus as $app) {
            $data[]=array('idReseau'=> $app['idReseau'], 'nomReseau'=>$app['nomReseau']);
        }
        $idReseau  = array_column($data, 'idReseau');
        $nomReseau = array_column($data, 'nomReseau');
        
        if ($status== 'SORT_DESC'){
            switch ($column) {
                case 'idreseau':
                    array_multisort(
                        $idReseau,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'nom':
                    array_multisort(
                        $nomReseau,
                        SORT_DESC,
                        $data
                    );
                    break;
            }
        } else {
            switch ($column) {
                case 'idreseau':
                    array_multisort(
                        $idReseau,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'nom':
                    array_multisort(
                        $nomReseau,
                        SORT_ASC,
                        $data
                    );
                    break;
            }
        }*/
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'reseau/index.php');
    }

    public function ajout()
    {
        global $pdo;

        parent::common();
        
        $idReseau = $_GET['id'] ?? null;
        if (!empty($idReseau)) {
            
            $row = $this->reseauModel->find($idReseau);
            
            if ($row === false) {
                header("Location:index.php?page=reseaus");
                $_SESSION['messages']['errors'][] = 'Reseau non trouvée';
                exit;
            }
        }
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'reseau/ajout.php');
    }

    public function fiche()
    {
        global $pdo;

        parent::common();
        $idReseau = $_GET['id'] ?? null;
        if (!empty($idReseau)) {
            $row = $this->reseauModel->find($idReseau);
            
            if ($row === false) {
                header("Location:index.php?page=reseaus");
                $_SESSION['messages']['errors'][] = 'Reseau non trouvée';
                exit;
            }
        }

        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'reseau/fiche.php');
    }
    public function suppression()
    {
        global $pdo;

        parent::common();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'reseau/suppression.php');
    }

    static private function controle($nomReseau)
    {

        /* controle des champs */
        $errors = [];

        // controle obligatoire 
        if (empty($nomReseau)) {
            $errors[] = 'nom Reseau obligatoire';
        }

        return $errors;
    }

    public function ajoutAction()
    {
        global $pdo;
        $nomReseau=$_POST['nomReseau'] ?? null;
        $errors = self::controle($nomReseau);
        if (empty($errors)) {
            $row = $this->reseauModel->add($nomReseau);
            $this->logModel->add("ajout d'un réseau", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]='ajout d\'un reseau';
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=reseaus");
            exit;
        }

        $_SESSION['messages']['errors'] = $errors;

    }
    public function modificationAction()
    {
        global $pdo;

        $nomReseau=$_POST['nomReseau'] ?? null;
        $errors = self::controle($nomReseau);
        $idReseau=$_GET['id'];
        if (empty($errors)) {
            $row = $this->reseauModel->update($nomReseau, $idReseau);
            $this->logModel->update("modification du réseau $idReseau", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]="modification du Reseau $idReseau";
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=reseaus");
            exit;
        }
            
        $_SESSION['messages']['errors'] = $errors;
    }
    /*use \PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;*/
    public function suppressionAction()
    {
        global $pdo;
        $idReseau=$_GET['id'];
        $row = $this->reseauModel->delete($idReseau);
        $this->logModel->delete("suppression du réseau $idReseau", $_SESSION['user']['idUtilisateur']);
        $success=[];
        $success[]="supression du Reseau $idReseau";
        $_SESSION['messages']['success'] = $success;
        header("Location:index.php?page=reseaus");
        exit;
    }
    public function exporterAction()
    {
        global $pdo;
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idReseau');
        $reseaus = $this->reseauModel->findAll($column, $status);
        $this->logModel->export("export du tableau de réseau", $_SESSION['user']['idUtilisateur']);
        $arrayData=[];
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $rowArray=['idReseau', 'nomReseau'];
        $sheet->fromArray(
            $rowArray, 
            null, 
            'A1'
        );
        $i = 2;
        foreach ($reseaus as $reseau) {
            $sheet->fromArray(
                $reseau, 
                null, 
                'A' . $i++
            );
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'reseau.xlsx';
        $filepath = 'tmp/' . $filename;
        $writer->save($filepath);

        header('Content-disposition: attachment; ' . $filename);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile($filepath);
        exit;
    }
}