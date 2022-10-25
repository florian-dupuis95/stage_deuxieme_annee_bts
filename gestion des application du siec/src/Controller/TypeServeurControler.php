<?php
namespace App\Controller;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AbstractController.php');

class TypeServeurController extends AbstractController
{
    private $typeServeurModel;
    private $logModel;

    public function __construct()
    {
        $this->typeServeurModel = new \App\Model\TypeServeurModel();
        $this->logModel = new \App\Model\LogModel();
    }

    public function index()
    {
        global $pdo;

        parent::common();
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idType');
        $types = $this->typeServeurModel->findAll($column, $status);
        /*foreach ($types as $app) {
            $data[]=array('idType'=> $app['idType'], 'nomType'=>$app['nomType']);
        }
        $idType  = array_column($data, 'idType');
        $nomType = array_column($data, 'nomType');
        if ($status== 'SORT_DESC'){
            switch ($column) {
                case 'idtype':
                    array_multisort(
                        $idType,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'nom':
                    array_multisort(
                        $nomType,
                        SORT_DESC,
                        $data
                    );
                    break;
            }
        } else {
            switch ($column) {
                case 'idtype':
                    array_multisort(
                        $idType,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'nom':
                    array_multisort(
                        $nomType,
                        SORT_ASC,
                        $data
                    );
                    break;
            }
        }*/

        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'type_serveur/index.php');
    }

    public function ajout()
    {
        global $pdo;

        parent::common();
        $idType = $_GET['id'] ?? null;
        if (!empty($idType)) {
            
            $row = $this->typeServeurModel->find($idType);

            if ($row === false) {
                header("Location:index.php?page=type_serveurs");
                $_SESSION['messages']['errors'][] = 'Type non trouvée';
                exit;
            }
        }
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'type_serveur/ajout.php');
    }

    public function fiche()
    {
        global $pdo;

        parent::common();
        $idType = $_GET['id'] ?? null;
        if (!empty($idType)) {
            $row = $this->typeServeurModel->find($idType);
            
            if ($row === false) {
                header("Location:index.php?page=type_serveurs");
                $_SESSION['messages']['errors'][] = 'Type non trouvée';
                exit;
            }
        }
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'type_serveur/fiche.php');
    }
    public function suppression()
    {
        global $pdo;

        parent::common();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'type_serveur/suppression.php');
    }

    static private function controle($nomType)
    {

    /* controle des champs */
    $errors = [];

    // controle obligatoire 
    if (empty($nomType)) {
        $errors[] = 'nom Type obligatoire';
    }

        return $errors;
    }

    public function ajoutAction()
    {
        global $pdo;
        $nomType=$_POST['nomType'] ?? null;

        $errors = self::controle($nomType);
        if (empty($errors)) {
            $row = $this->typeServeurModel->add($nomType);
            $this->logModel->add("ajout d'un type", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]='ajout d\'un Type';
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=type_serveurs");
            exit;
        }
        $_SESSION['messages']['errors'] = $errors;
    }
    public function modificationAction()
    {
        global $pdo;
        $idType=$_GET['id'];
        $nomType=$_POST['nomType'] ?? null;
        $errors = self::controle($nomType);
        if (empty($errors)) {
            $row = $this->typeServeurModel->update($nomType, $idType);
            $this->logModel->update("modification du type $idType", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]="modification du Type $idType";
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=type_serveurs");
            exit;
        }

        $_SESSION['messages']['errors'] = $errors;
    }
    /*use \PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;*/
    public function suppressionAction()
    {
        global $pdo;
        $idType=$_GET['id'];
        $row = $this->typeServeurModel->delete($idType);
        $this->logModel->delete("suppression du type $idType", $_SESSION['user']['idUtilisateur']);

        $success=[];
        $success[]="supression du Type $idType";
        $_SESSION['messages']['success'] = $success;
        header("Location:index.php?page=type_serveurs");
        exit;
    }
    public function exporterAction()
    {
        global $pdo;
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idType');
        $types = $this->typeServeurModel->findAll($column, $status);
        $this->logModel->export("export du tableau de type", $_SESSION['user']['idUtilisateur']);
        $arrayData=[];
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $rowArray=['idType','nomType'];
        $sheet->fromArray(
            $rowArray, 
            null, 
            'A1'
        );
        $i = 2;
        foreach ($types as $type) {
            $sheet->fromArray(
                $type, 
                null, 
                'A' . $i++
            );
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'type.xlsx';
        $filepath = 'tmp/' . $filename;
        $writer->save($filepath);

        header('Content-disposition: attachment; ' . $filename);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile($filepath);
        exit;
    }
}