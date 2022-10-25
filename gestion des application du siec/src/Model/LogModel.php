<?php
namespace App\Model;

class LogModel
{
    public function add($description, $utilisateur){
        global $pdo;
        
        $sqlQuerry= "insert into log (dateLog, descriptionLog, utilisateur_idutilisateur) values (:dateLog, :descriptionLog, :utilisateur_idutilisateur)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('dateLog'=>date('Y-m-d H:i:s'),
            'descriptionLog'=>$description, 
            'utilisateur_idutilisateur'=>$utilisateur));
    }
    public function update ($description, $utilisateur){
        global $pdo;
        
        $sqlQuerry= "insert into log (dateLog, descriptionLog, utilisateur_idutilisateur) values (:dateLog, :descriptionLog, :utilisateur_idutilisateur)";
        
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('dateLog'=>date('Y-m-d H:i:s'),
            'descriptionLog'=>$description, 
            'utilisateur_idutilisateur'=>$utilisateur));

    }
    public function delete($description, $utilisateur){
        global $pdo;
        
        $sqlQuerry= "insert into log (dateLog, descriptionLog, utilisateur_idutilisateur) values (:dateLog, :descriptionLog, :utilisateur_idutilisateur)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('dateLog'=>date('Y-m-d H:i:s'),
        'descriptionLog'=>$description, 
        'utilisateur_idutilisateur'=>$utilisateur));
    }
    public function logout()
    {
        global $pdo;
        $sqlQuerry= "insert into log (dateLog, descriptionLog, utilisateur_idutilisateur) values (:dateLog, :descriptionLog, :utilisateur_idutilisateur)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('dateLog'=>date('Y-m-d H:i:s'),
        'descriptionLog'=>'déconexion', 
        'utilisateur_idutilisateur'=>$_SESSION['user']['idUtilisateur']));
    }
    public function login()
    {
        global $pdo;
        $sqlQuerry= "insert into log (dateLog, descriptionLog, utilisateur_idutilisateur) values (:dateLog, :descriptionLog, :utilisateur_idutilisateur)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('dateLog'=>date('Y-m-d H:i:s'),
        'descriptionLog'=>'connexion',
        'utilisateur_idutilisateur'=>$_SESSION['user']['idUtilisateur']));
    }
    public function mauvaisMdp()
    {
        global $pdo;
        $sqlQuerry= "insert into log (dateLog, descriptionLog) values (:dateLog, :descriptionLog)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('dateLog'=>date('Y-m-d H:i:s'),
        'descriptionLog'=>'mauvais mot de passe'));
    }
    public function mauvaisLogin()
    {
        global $pdo;
        $sqlQuerry= "insert into log (dateLog, descriptionLog) values (:dateLog, :descriptionLog)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('dateLog'=>date('Y-m-d H:i:s'),
        'descriptionLog'=>'mauvais login'));
    }
    public function export($description, $utilisateur)
    {
        global $pdo;
        $sqlQuerry= "insert into log (dateLog, descriptionLog, utilisateur_idutilisateur) values (:dateLog, :descriptionLog, :utilisateur_idutilisateur)";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(array('dateLog'=>date('Y-m-d H:i:s'),
            'descriptionLog'=>$description, 
            'utilisateur_idutilisateur'=>$utilisateur));
    }
}