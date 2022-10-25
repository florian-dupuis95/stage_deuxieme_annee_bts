<?php
session_start();
define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);

require_once(ROOT_PATH . 'vendor/autoload.php');

require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'library.php');
require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'define.php');
require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'connexion_base.php');

// require models
$iterator = new GlobIterator(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'Model/*.php');
foreach ($iterator as $file) {
    require_once($file->getRealPath());
}

// require controllers
$iterator = new GlobIterator(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'Controller/*.php');
foreach ($iterator as $file) {
    require_once($file->getRealPath());
}

// instances de controller
$securityController = new \App\Controller\SecurityController();
$applicationLocalController = new \App\Controller\ApplicationLocalController();
$reseauController = new \App\Controller\ReseauController();
$roleController = new \App\Controller\RoleController();
$serveurController = new \App\Controller\ServeurController();
$typeServeurController = new \App\Controller\TypeServeurController();
$utilisateurController = new \App\Controller\UtilisateurController();

$action = $_GET['action'] ?? null;
$page = $_GET['page'] ?? null;

require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'acces.php');

switch ($action) {
    case 'ajout_appli':
        $applicationLocalController->ajoutAction();
        break;
    case 'login':
        $securityController->loginAction();
        break;
    case 'logout':
        $securityController->logoutAction();
        break;
    case 'ajout_serveur':
        $serveurController->ajoutAction();
        break;
    case 'ajout_utilisateur':
        $utilisateurController->ajoutAction();
        break;
    case 'supression_serveur':
        $serveurController->suppressionAction();
        break;
    case 'modification_serveur':
        $serveurController->modificationAction();
        break;
    case 'modification_utilisateur':
        $utilisateurController->modificationAction();
        break;
    case 'supression_utilisateur':
        $utilisateurController->suppressionAction();
        break;
    case 'modification_appli':
        $applicationLocalController->modificationAction();
        break;
    case 'supression_appli':
        $applicationLocalController->suppressionAction();
        break;
    case 'supression_type':
        $typeServeurController->suppressionAction();
        break;
    case 'modification_reseau':
        $reseauController->modificationAction();
        break;
    case 'modification_type':
        $typeServeurController->modificationAction();
        break;
    case 'supression_reseau':
        $reseauController->suppressionAction();
        break;
    case 'ajout_type':
        $typeServeurController->ajoutAction();
        break;
    case 'ajout_reseau':
        $reseauController->ajoutAction();
        break;
    case 'modification_role':
        $roleController->modificationAction();
        break;
    case 'supression_role':
        $roleController->suppressionAction();
        break;
    case 'ajout_role':
        $roleController->ajoutAction();
        break;
    case 'exporter_application':
        $applicationLocalController->exporterAction();
        break;
    case 'exporter_type':
        $typeServeurController->exporterAction();
        break;
    case 'exporter_reseau':
        $reseauController->exporterAction();
        break;
    case 'exporter_role':
        $roleController->exporterAction();
        break;
    case 'exporter_serveur':
        $serveurController->exporterAction();
        break;
    case 'exporter_utilisateur':
        $utilisateurController->exporterAction();
        break;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>gestion des application</title>
        <link href="library/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="library/fontawesome-free-5.15.4-web/css/all.min.css" rel="stylesheet"> 
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <?php 
        
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views/common' . DIRECTORY_SEPARATOR . 'header.php');
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views/common' . DIRECTORY_SEPARATOR . 'messages.php');
        switch ($page) {
            case 'applications_locales':
                $applicationLocalController->index();
                break;
            case 'ajouter_application':
                $applicationLocalController->ajout();
                break;
            case 'fiche_appli':
                $applicationLocalController->fiche();
                break;
            case 'supprimer_appli':
                $applicationLocalController->suppression();
                break;
            case 'serveurs':
                $serveurController->index();
                break;
            case 'utilisateurs':
                $utilisateurController->index();
                break;
            case 'ajouter_serveur':
                $serveurController->ajout();
                break;
            case 'ajouter_utilisateur':
                $utilisateurController->ajout();
                break;
            case 'supprimer_serveur':
                $serveurController->suppression();
                break;
            case 'supprimer_utilisateur':
                $utilisateurController->suppression();
                break;
            case 'fiche_serveur':
                $serveurController->fiche();
                break;
            case 'fiche_utilisateur':
                $utilisateurController->fiche();
                break;
            case 'type_serveurs':
                $typeServeurController->index();
                break;
            case 'reseaus':
                $reseauController->index();
                break;
            case 'ajouter_reseau':
                $reseauController->ajout();
                break;
            case 'supprimer_reseau':
                $reseauController->suppression();
                break;
            case 'ajouter_type':
                $typeServeurController->ajout();
                break;
            case 'supprimer_type':
                $typeServeurController->suppression();
                break;
            case 'fiche_reseau':
                $reseauController->fiche();
                break;
            case 'fiche_type':
                $typeServeurController->fiche();
                break;
            case 'role':
                $roleController->index();
                break;
            case 'ajouter_role':
                $roleController->ajout();
                break;
            case 'supprimer_role':
                $roleController->suppression();
                break;
            case 'fiche_role':
                $roleController->fiche();
                break;
            default:
                $securityController->index();
                break;
        }
        /*require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views/common' . DIRECTORY_SEPARATOR . 'footer.php');*/
        ?>

        <script src="library/jquery-3.6.0/jquery.min.js"></script>
        <script src="library/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
