<?php
namespace App\Controller;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AbstractController.php');

class RoleController extends AbstractController
{
    private $roleModel;
    private $logModel;

    public function __construct()
    {
        $this->roleModel = new \App\Model\RoleModel();
        $this->logModel = new \App\Model\LogModel();
    }
    public function index()
    {
        global $pdo;

        parent::common();
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idRole');
        $roles = $this->roleModel->findAll($column, $status);
        /*foreach ($roles as $app) {
            $data[]=array('idRole'=> $app['idRole'], 'nomRole'=>$app['nomRole']);
        }
        $idRole  = array_column($data, 'idRole');
        $nomRole = array_column($data, 'nomRole');
        if ($status== 'SORT_DESC'){
            switch ($column) {
                case 'idrole':
                    array_multisort(
                        $idRole,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'nom':
                    array_multisort(
                        $nomRole,
                        SORT_DESC,
                        $data
                    );
                    break;
            }
        } else {
            switch ($column) {
                case 'idrole':
                    array_multisort(
                        $idRole,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'nom':
                    array_multisort(
                        $nomRole,
                        SORT_ASC,
                        $data
                    );
                    break;
            }
        }*/

        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'role/index.php');
    }

    public function ajout()
    {
        global $pdo;

        parent::common();
        
        $idRole = $_GET['id'] ?? null;
        if (!empty($idRole)) {
            
            $row = $this->roleModel->find($idRole);
            
            if ($row === false) {
                header("Location:index.php?page=role");
                $_SESSION['messages']['errors'][] = 'Role non trouvée';
                exit;
            }
        }
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'role/ajout.php');
    }

    public function fiche()
    {
        global $pdo;

        parent::common();
        $idRole = $_GET['id'] ?? null;
        if (!empty($idRole)) {
            $row = $this->roleModel->find($idRole);
            
            if ($row === false) {
                header("Location:index.php?page=role");
                $_SESSION['messages']['errors'][] = 'Role non trouvée';
                exit;
            }
        }
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'role/fiche.php');
    }
    public function suppression()
    {
        global $pdo;

        parent::common();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'role/suppression.php');
    }

    static private function controle($nomRole)
    {
        
        /* controle des champs */
        $errors = [];
        
        // controle obligatoire 
        if (empty($nomRole)) {
            $errors[] = 'nom Role obligatoire';
        }
        
        return $errors;
    }

    public function ajoutAction()
    {
        global $pdo;
        $nomRole=$_POST['nomRole'] ?? null;
        $errors = self::controle($nomRole);
        if (empty($errors)) {
            $roles = $this->roleModel->add($nomRole);
            $this->logModel->add("ajout d'un role", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]='ajout d\'un role';
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=role");
            exit;
        }
        $_SESSION['messages']['errors'] = $errors;
    }
    public function modificationAction()
    {
        global $pdo;
        $idRole=$_GET['id'];
        $nomRole=$_POST['nomRole'] ?? null;
        $errors = self::controle($nomRole);
        if (empty($errors)) {
            $roles = $this->roleModel->update($nomRole, $idRole);
            $this->logModel->update("modification du role $idRole", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]="modification du Role $idRole";
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=role");
            exit;
        }

        $_SESSION['messages']['errors'] = $errors;
    }
    /*use \PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;*/
    public function suppressionAction()
    {
        global $pdo;
        $idRole=$_GET['id'];
        $roles = $this->roleModel->delete($idRole);
        $this->logModel->delete("suppression du role $idRole", $_SESSION['user']['idUtilisateur']);
        $success=[];
        $success[]="supression du Role $idRole";
        $_SESSION['messages']['success'] = $success;
        header("Location:index.php?page=role");
        exit;
    }
    public function exporterAction()
    {
        global $pdo;
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idRole');
        $roles = $this->roleModel->findAll($column, $status);
        $this->logModel->export("export du tableau de rôle", $_SESSION['user']['idUtilisateur']);
        $arrayData=[];
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $rowArray=['idRole', 'nomRole'];
        $sheet->fromArray(
            $rowArray, 
            null, 
            'A1'
        );
        $i = 2;
        foreach ($roles as $role) {
            $sheet->fromArray(
                $role, 
                null, 
                'A' . $i++
            );
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'role.xlsx';
        $filepath = 'tmp/' . $filename;
        $writer->save($filepath);

        header('Content-disposition: attachment; ' . $filename);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile($filepath);
        exit;
    }
}