<?php
namespace App\Model;

class UtilisateurModel
{
    public function findAll($column, $status)
    {
        global $pdo;

        switch ($column) {
            case 'idUtilisateur':
            case 'roleUtilisateur':
            case 'prenomUtilisateur':
            case 'nomUtilisateur':
            case 'emailUtilisateur':
            case 'bureau':
            case 'division':
                break;
            default:
                $column = null;
        }

        $sqlQuery = "SELECT u.idUtilisateur, u.roleUtilisateur, u.prenomUtilisateur, u.nomUtilisateur, u.emailUtilisateur, u.bureau, u.division, r.nomRole 
        FROM utilisateur AS u
        LEFT JOIN roleutilisateur AS r
        ON u.roleUtilisateur=r.idRole";
                    
        if (!empty($column)) {
            $sqlQuery .= " ORDER BY " . $column . " " . ($status === 'SORT_DESC' ? 'DESC' : '');
        }
         
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function findfiche($idUtilisateur){
        global $pdo;
        $sqlQuery = "SELECT u.idUtilisateur, u.roleUtilisateur, u.prenomUtilisateur, u.nomUtilisateur, u.emailUtilisateur, u.bureau, u.division, r.nomRole 
                        FROM utilisateur AS u
                        LEFT JOIN roleutilisateur AS r
                        ON u.roleUtilisateur=r.idRole
                        WHERE idUtilisateur=:idUtilisateur";
            $db = $pdo->prepare($sqlQuery);
            $db->execute([
                'idUtilisateur' => $idUtilisateur
            ]);
        return $db->fetch(\PDO::FETCH_ASSOC);
    }
    public function find($idUtilisateur){
        global $pdo;
        $sqlQuery = "SELECT u.loginUtilisateur, u.motDePasse, u.idUtilisateur, u.roleUtilisateur, u.prenomUtilisateur, u.nomUtilisateur, u.emailUtilisateur, u.bureau, u.division, r.nomRole,u.ldap
                        FROM utilisateur AS u
                        LEFT JOIN roleutilisateur AS r
                        ON u.roleUtilisateur=r.idRole
                        WHERE idUtilisateur=:idUtilisateur";
            $db = $pdo->prepare($sqlQuery);
            $db->execute([
                'idUtilisateur' => $idUtilisateur
            ]);
        return $db->fetch(\PDO::FETCH_ASSOC);
    }
    public function add($motDePasse, $loginUtilisateur, $roleUtilisateur, $prenomUtilisateur, $nomUtilisateur, $emailUtilisateur, $bureau,$division,$ldap){
        global $pdo;
        $sqlQuerry= "insert into utilisateur (loginUtilisateur, motDePasse, roleUtilisateur, prenomUtilisateur, nomUtilisateur, emailUtilisateur, bureau, division, sel,ldap) 
            values (:loginUtilisateur, :motDePasse, :roleUtilisateur, :prenomUtilisateur, :nomUtilisateur, :emailUtilisateur, :bureau, :division, :sel,:ldap)";
            $db=$pdo->prepare($sqlQuerry);

            $sel = bin2hex(random_bytes(20));
            $motDePasse = hash('sha256', $motDePasse . $sel);

            $autentif=$db->execute(['loginUtilisateur'=>$loginUtilisateur,
            'motDePasse'=>$motDePasse,
            'roleUtilisateur'=>$roleUtilisateur,
            'prenomUtilisateur'=>$prenomUtilisateur,
            'nomUtilisateur'=>$nomUtilisateur,
            'emailUtilisateur'=>$emailUtilisateur,
            'bureau'=>$bureau,
            'division'=>$division,
            'sel'=>$sel,
            'ldap'=>$ldap]);
    }
    public function update ($motDePasse, $loginUtilisateur, $roleUtilisateur, $prenomUtilisateur, $nomUtilisateur, $emailUtilisateur, $bureau,$division, $idUtilisateur,$ldap){
        global $pdo;
        $sql="select sel from utilisateur where idUtilisateur=:idUtilisateur";
            $db=$pdo->prepare($sql);
            $sel=$db->execute(['idUtilisateur'=>$idUtilisateur]);
            $sqlQuerry= "update utilisateur set loginUtilisateur=:loginUtilisateur, motDePasse=:motDePasse, roleUtilisateur=:roleUtilisateur, prenomUtilisateur=:prenomUtilisateur, 
            nomUtilisateur=:nomUtilisateur, emailUtilisateur=:emailUtilisateur, bureau=:bureau, division=:division, ldap=:ldap where idUtilisateur= :idUtilisateur";
            $db=$pdo->prepare($sqlQuerry);
            $motDePasse = hash('sha256', $motDePasse . $sel);
            $autentif=$db->execute(array('loginUtilisateur'=>$loginUtilisateur,
            'motDePasse'=>$motDePasse,
            'roleUtilisateur'=>$roleUtilisateur,
            'prenomUtilisateur'=>$prenomUtilisateur,
            'nomUtilisateur'=>$nomUtilisateur,
            'emailUtilisateur'=>$emailUtilisateur,
            'bureau'=>$bureau,
            'division'=>$division,
            'ldap'=>$ldap,
            'idUtilisateur'=>$idUtilisateur));
    }
    public function delete($idUtilisateur){
        global $pdo;
        $sqlQuerry= "delete from Utilisateur where idUtilisateur=:idUtilisateur";
        $db=$pdo->prepare($sqlQuerry);
        $autentif=$db->execute(['idUtilisateur'=>$idUtilisateur]);
    }
    public function role(){
        global $pdo;
        $sqlQuery = "SELECT r.*
                    FROM roleutilisateur AS r";
        $db = $pdo->prepare($sqlQuery);
        $db->execute();
        return $db->fetchAll(\PDO::FETCH_ASSOC);
    }
}