<?php
namespace App\Controller;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AbstractController.php');

class UtilisateurController extends AbstractController
{
    private $utilisateurModel;
    private $logModel;

    public function __construct()
    {
        $this->utilisateurModel = new \App\Model\UtilisateurModel();
        $this->logModel = new \App\Model\LogModel();
    }

    public function index()
    {
        global $pdo;

        parent::common();
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idUtilisateur');
        $utilisateurs = $this->utilisateurModel->findAll($column, $status);
        /*foreach ($utilisateurs as $app) {
            $data[]=array('idUtilisateur'=> $app['idUtilisateur'], 'roleUtilisateur'=>$app['roleUtilisateur'],'prenomUtilisateur'=> $app['prenomUtilisateur'], 'nomUtilisateur'=>$app['nomUtilisateur'],
            'emailUtilisateur'=> $app['emailUtilisateur'], 'bureau'=>$app['bureau'],'division'=> $app['division'], 'nomRole'=>$app['nomRole']);
        }
        $idUtilisateur  = array_column($data, 'idUtilisateur');
        $roleUtilisateur = array_column($data, 'nomRole');
        $prenomUtilisateur  = array_column($data, 'prenomUtilisateur');
        $nomUtilisateur = array_column($data, 'nomUtilisateur');
        $emailUtilisateur  = array_column($data, 'emailUtilisateur');
        $bureau = array_column($data, 'bureau');
        $division  = array_column($data, 'division');
        if ($status== 'SORT_DESC'){
            switch ($column) {
                case 'idUtilisateur':
                    array_multisort(
                        $idUtilisateur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'roleUtilisateur':
                    array_multisort(
                        $roleUtilisateur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'prenomUtilisateur':
                    array_multisort(
                        $prenomUtilisateur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'nomUtilisateur':
                    array_multisort(
                        $nomUtilisateur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'emailUtilisateur':
                    array_multisort(
                        $emailUtilisateur,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'bureau':
                    array_multisort(
                        $bureau,
                        SORT_DESC,
                        $data
                    );
                    break;
                case 'division':
                    array_multisort(
                        $division,
                        SORT_DESC,
                        $data
                    );
                    break;
            }
        } else {
            switch ($column) {
                case 'idUtilisateur':
                    array_multisort(
                        $idUtilisateur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'roleUtilisateur':
                    array_multisort(
                        $roleUtilisateur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'prenomUtilisateur':
                    array_multisort(
                        $prenomUtilisateur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'nomUtilisateur':
                    array_multisort(
                        $nomUtilisateur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'emailUtilisateur':
                    array_multisort(
                        $emailUtilisateur,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'bureau':
                    array_multisort(
                        $bureau,
                        SORT_ASC,
                        $data
                    );
                    break;
                case 'division':
                    array_multisort(
                        $division,
                        SORT_ASC,
                        $data
                    );
                    break;
            }
        }*/

        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'utilisateur/index.php');
    }

    public function ajout()
    {
        global $pdo;

        parent::common();
        $idUtilisateur = $_GET['id'] ?? null;
        if (!empty($idUtilisateur)) {
            $utilisateurs = $this->utilisateurModel->find($idUtilisateur);
            
            if ($utilisateurs === false) {
                header("Location:index.php?page=utilisateurs");
                $_SESSION['messages']['errors'][] = 'utilisateur non trouvée';
                exit;
            }
        }
        $roles = $this->utilisateurModel->role();
                        
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'utilisateur/ajout.php');
    }

    public function fiche()
    {
        global $pdo;

        parent::common();
        $idUtilisateur = $_GET['id'] ?? null;
        if (!empty($idUtilisateur)) {
            $utilisateurs = $this->utilisateurModel->findfiche($idUtilisateur);
            
            if ($utilisateurs === false) {
                header("Location:index.php?page=utilisateurs");
                $_SESSION['messages']['errors'][] = 'utilisateur non trouvée';
                exit;
            }
        }
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'utilisateur/fiche.php');
    }
    public function suppression()
    {
        global $pdo;

        parent::common();
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'utilisateur/suppression.php');
    }

    static private function controle($loginUtilisateur, $motDePasse, $prenomUtilisateur, $nomUtilisateur, $emailUtilisateur, $bureau, $division, $roleUtilisateur,$ldap)
    {
        
        /* controle des champs */
        $errors = [];

        // controle obligatoire 
        if (empty($loginUtilisateur)) {
            $errors[] = 'login Utilisateur obligatoire';
        }
        if (empty($motDePasse)) {
            $errors[] = 'mot De Passe obligatoire';
        }
        if (empty($prenomUtilisateur)) {
            $errors[] = 'prenom Utilisateur obligatoire';
        }
        if (empty($nomUtilisateur)) {
            $errors[] = 'nom Utilisateur obligatoire';
        }
        if (empty($emailUtilisateur)) {
            $errors[] = 'email Utilisateur obligatoire';
        }
        if (empty($bureau)) {
            $errors[] = 'bureau obligatoire';
        }
        if (empty($division)) {
            $errors[] = 'division obligatoire';
        }

        // controle valeurs 
        if (empty($roleUtilisateur)) {
            $errors[] = 'role Utilisateur obligatoire';
        }elseif (!in_array($roleUtilisateur, [ '1', '2'])) {
            $errors[] = 'role Utilisateur incorrecte';
        }
        if (!empty($ldap) && !in_array($ldap, [ '1', '2' ])) {
            $errors[] = 'ldap';
        }
        
        return $errors;
    }

    public function ajoutAction()
    {
        global $pdo;
        $loginUtilisateur=!empty($_POST['loginUtilisateur']) ? $_POST['loginUtilisateur'] : null;
        $motDePasse=!empty($_POST['motDePasse']) ? $_POST['motDePasse'] : null;
        $roleUtilisateur=!empty($_POST['roleUtilisateur']) ? $_POST['roleUtilisateur'] : null;
        $prenomUtilisateur=!empty($_POST['prenomUtilisateur']) ? $_POST['prenomUtilisateur'] : null;
        $nomUtilisateur=!empty($_POST['nomUtilisateur']) ? $_POST['nomUtilisateur'] : null;
        $emailUtilisateur=!empty($_POST['emailUtilisateur']) ? $_POST['emailUtilisateur'] : null;
        $bureau=!empty($_POST['bureau']) ? $_POST['bureau'] : null;
        $division=!empty($_POST['division']) ? $_POST['division'] : null;
        $ldap=!empty($_POST['ldap']) ? $_POST['ldap'] : null;


        $errors = self::controle($loginUtilisateur, $motDePasse, $prenomUtilisateur, $nomUtilisateur, $emailUtilisateur, $bureau, $division, $roleUtilisateur, $ldap);
        if (empty($errors)) {
            $utilisateurs = $this->utilisateurModel->add($motDePasse, $loginUtilisateur, $roleUtilisateur, $prenomUtilisateur, $nomUtilisateur, $emailUtilisateur, $bureau,$division,$ldap);
            $this->logModel->add("ajout d'un utilisateur", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]='ajout d\'un utilisateur';
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=utilisateurs");
            exit;
        }

        $_SESSION['messages']['errors'] = $errors;

    }
    public function modificationAction()
    {
        global $pdo;
        $loginUtilisateur=!empty($_POST['loginUtilisateur']) ? $_POST['loginUtilisateur'] : null;
        $motDePasse=!empty($_POST['motDePasse']) ? $_POST['motDePasse'] : null;
        $roleUtilisateur=!empty($_POST['roleUtilisateur']) ? $_POST['roleUtilisateur'] : null;
        $prenomUtilisateur=!empty($_POST['prenomUtilisateur']) ? $_POST['prenomUtilisateur'] : null;
        $nomUtilisateur=!empty($_POST['nomUtilisateur']) ? $_POST['nomUtilisateur'] : null;
        $emailUtilisateur=!empty($_POST['emailUtilisateur']) ? $_POST['emailUtilisateur'] : null;
        $bureau=!empty($_POST['bureau']) ? $_POST['bureau'] : null;
        $division=!empty($_POST['division']) ? $_POST['division'] : null;
        $ldap=!empty($_POST['ldap']) ? $_POST['ldap'] : null;

        $errors = self::controle($loginUtilisateur, $motDePasse, $prenomUtilisateur, $nomUtilisateur, $emailUtilisateur, $bureau, $division, $roleUtilisateur,$ldap);
        $idUtilisateur=$_GET['id'];
        if (empty($errors)) {
            $utilisateurs = $this->utilisateurModel->update($motDePasse, $loginUtilisateur, $roleUtilisateur, $prenomUtilisateur, $nomUtilisateur, $emailUtilisateur, $bureau,$division, $idUtilisateur, $ldap);
            $this->logModel->update("modification de l'utilisateur $idUtilisateur", $_SESSION['user']['idUtilisateur']);
            $success=[];
            $success[]="modification de l'utilisateur $idUtilisateur";
            $_SESSION['messages']['success'] = $success;
            header("Location:index.php?page=utilisateurs");
            exit;
        }
        
        $_SESSION['messages']['errors'] = $errors;
    }
    /*use \PhpOffice\PhpSpreadsheet\Spreadsheet;
    use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;*/
    public function suppressionAction()
    {
        global $pdo;
        $idUtilisateur=$_GET['id'];
        $utilisateurs = $this->utilisateurModel->delete($idUtilisateur);
        $this->logModel->delete("suppression de l'utilisateur $idUtilisateur", $_SESSION['user']['idUtilisateur']);
        $success=[];
        $success[]="supression de l'utilisateur $idUtilisateur";
        $_SESSION['messages']['success'] = $success;
        header("Location:index.php?page=utilisateurs");
        exit;
    }
    public function exporterAction()
    {
        global $pdo;
        $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
        $column=(!empty($_GET['column']) ? $_GET['column'] : 'idUtilisateur');
        $utilisateurs = $this->utilisateurModel->findAll($column, $status);
        $this->logModel->export("export du tableau d'utilisateur", $_SESSION['user']['idUtilisateur']);
        $arrayData=[];
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $rowArray=['idUtilisateur', 'roleUtilisateur', 'prenomUtilisateur', 'nomUtilisateur', 'emailUtilisateur', 'bureau', 'division'];
        $sheet->fromArray(
            $rowArray, 
            null, 
            'A1'
        );
        $i = 2;
        foreach ($utilisateurs as $utilisateur) {
            $sheet->fromArray(
                $utilisateur, 
                null, 
                'A' . $i++
            );
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'utilisateur.xlsx';
        $filepath = 'tmp/' . $filename;
        $writer->save($filepath);

        header('Content-disposition: attachment; ' . $filename);
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        readfile($filepath);
        exit;
    }
}