<?php
namespace App\Controller;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'AbstractController.php');

class SecurityController extends AbstractController
{
    private $SecurityModel;
    private $logModel;

    public function __construct()
    {
        $this->SecurityModel = new \App\Model\SecurityModel();
        $this->logModel = new \App\Model\LogModel();
    }

    public function index()
    {
        global $pdo;
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'conexion/index.php');
    }
    public function loginAction()
    {
        global $pdo;
        $NomUtilisateur = $_POST['pseudo'] ?? null;
        $MotDePasse = $_POST['psw'] ?? null;
        $statement = $this->SecurityModel->statement($NomUtilisateur);
        $ldap = $this->SecurityModel->ldap($NomUtilisateur);
        if ($ldap) {
            $ds=ldap_connect(LDAP_HOST, LDAP_PORT);
            if ($ds) {
                if (ldap_bind($ds, LDAP_DOMAIN . '\\' . $NomUtilisateur , $MotDePasse)) { // authentification OK
                    $user = $statement;
                    $_SESSION['user'] = $user;
                    $login = $this->logModel->login();
                    header("Location:index.php?page=applications_locales");
                    exit;
                } else {
                    $mauvaisLogin = $this->logModel->mauvaisLogin();
                }
                ldap_close($ds);
            } else {
                echo "Impossible de se connecter au serveur LDAP.";
            }
            $_SESSION['messages']['errors'][] = 'Mauvais login ou mot de passe';
        }
        else{
            if ($statement) {
                $sel = $this->SecurityModel->sel($NomUtilisateur);
                $mdp = $this->SecurityModel->mdp($NomUtilisateur);
                if (hash('sha256', $MotDePasse . $sel)==$mdp) {
                    $user = $statement;
                    $_SESSION['user'] = $user;
                    $login = $this->logModel->login();
                    header("Location:index.php?page=applications_locales");
                    exit;
                }

                $mauvaisMdp = $this->logModel->mauvaisMdp();
            } else {
                $mauvaisLogin = $this->logModel->mauvaisLogin();
            }

            $_SESSION['messages']['errors'][] = 'Mauvais login ou mot de passe';
        }

    }
    public function logoutAction()
    {
        global $pdo;
        $logout = $this->logModel->logout();
        unset($_SESSION['user']);
        header("Location: index.php");
        exit;
    }
}