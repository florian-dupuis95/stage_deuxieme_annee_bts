<?php
if (empty($idUtilisateur)) {
    $action="index.php?page=ajouter_utilisateur&action=ajout_utilisateur";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=utilisateurs\">utilisateurs</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">ajouter</li>";
        echo"</ol>";
    echo"</nav>";
} elseif(!empty($idUtilisateur)) {
    $action="index.php?page=ajouter_utilisateur&action=modification_utilisateur&id=$idUtilisateur";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=utilisateurs\">utilisateurs</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">modifier</li>";
        echo"</ol>";
    echo"</nav>";
}
?>
<div class="container">

    <form action="<?php echo $action; ?>" method="post">
        <div class="row mb-3">
            <label for="loginUtilisateur" class="col-lg-2 col-form-label text-lg-end">Login utilisateur :</label>
            <div class="col-lg-2">
                <?php
                $loginUtilisateur = null;
                if (isset($_POST['loginUtilisateur'])) {
                    $loginUtilisateur = $_POST['loginUtilisateur'];
                } elseif (isset($utilisateurs['loginUtilisateur'])) {
                    $loginUtilisateur = $utilisateurs['loginUtilisateur'];
                }
                ?>
                <input class="form-control" id="loginUtilisateur" name="loginUtilisateur" value="<?php echo $loginUtilisateur; ?>"required>
            </div>
            <label for="motDePasse" class="col-lg-2 col-form-label text-lg-end">Mot de passe :</label>
            <div class="col-lg-2">
                <?php
                $motDePasse = null;
                if (isset($_POST['motDePasse'])) {
                    $motDePasse = $_POST['motDePasse'];
                } elseif (isset($utilisateurs['motDePasse'])) {
                    $motDePasse = $utilisateurs['motDePasse'];
                }
                ?>
                <input class="form-control" id="motDePasse" name="motDePasse" value="<?php echo $motDePasse; ?>" required>
            </div>
            <label for="roleUtilisateur" class="col-lg-2 col-form-label text-lg-end">Rôle utilisateur :</label>
            <div class="col-lg-2">
                <?php
                $roleUtilisateur = null;
                if (isset($_POST['roleUtilisateur'])) {
                    $roleUtilisateur = $_POST['roleUtilisateur'];
                } elseif (isset($utilisateurs['roleUtilisateur'])) {
                    $roleUtilisateur = $utilisateurs['roleUtilisateur'];
                }
                if (empty($idUtilisateur)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"roleUtilisateur\">";
                    echo"<option></option>";
                    foreach ($roles as $role) {
                    $id=$role['idRole'];
                    $prenom=$role['nomRole'];
                    echo"<option value=\"$id\">$prenom</option>";
                    $value=$role[0];
                    }
                    echo"</select> ";
                } elseif(!empty($idUtilisateur)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"roleUtilisateur\">";
                    echo"<option></option>";
                    foreach ($roles as $role) {
                    $id=$role['idRole'];
                    $prenom=$role['nomRole'];
                    if ($id===$roleUtilisateur) {
                        echo"<option value=\"$id\" selected>$prenom</option>";
                    } else {
                        echo"<option value=\"$id\">$prenom</option>";
                    }
                    $value=$role[0];
                    }
                    echo"</select> ";
                }?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="prenomUtilisateur" class="col-lg-2 col-form-label text-lg-end">Prenom utilisateur :</label>
            <div class="col-lg-2">
                <?php
                $prenomUtilisateur = null;
                if (isset($_POST['prenomUtilisateur'])) {
                    $prenomUtilisateur = $_POST['prenomUtilisateur'];
                } elseif (isset($utilisateurs['prenomUtilisateur'])) {
                    $prenomUtilisateur = $utilisateurs['prenomUtilisateur'];
                }
                ?>
                <input class="form-control" id="prenomUtilisateur" name="prenomUtilisateur" value="<?php echo $prenomUtilisateur; ?>" required>
            </div>
            <label for="nomUtilisateur" class="col-lg-2 col-form-label text-lg-end">Nom utilisateur :</label>
            <div class="col-lg-2">
                <?php
                $nomUtilisateur = null;
                if (isset($_POST['nomUtilisateur'])) {
                    $nomUtilisateur = $_POST['nomUtilisateur'];
                } elseif (isset($utilisateurs['nomUtilisateur'])) {
                    $nomUtilisateur = $utilisateurs['nomUtilisateur'];
                }
                ?>
                <input class="form-control" id="nomUtilisateur" name="nomUtilisateur" value="<?php echo $nomUtilisateur; ?>" required>
            </div>
            <label for="emailUtilisateur" class="col-lg-2 col-form-label text-lg-end">Email utilisateur :</label>
            <div class="col-lg-2">
                <?php
                $emailUtilisateur = null;
                if (isset($_POST['emailUtilisateur'])) {
                    $emailUtilisateur = $_POST['emailUtilisateur'];
                } elseif (isset($utilisateurs['emailUtilisateur'])) {
                    $emailUtilisateur = $utilisateurs['emailUtilisateur'];
                }
                ?>
                <input class="form-control" id="emailUtilisateur" name="emailUtilisateur" value="<?php echo $emailUtilisateur; ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="bureau" class="col-lg-2 col-form-label text-lg-end">Bureau :</label>
            <div class="col-lg-2">
                <?php
                $bureau = null;
                if (isset($_POST['bureau'])) {
                    $bureau = $_POST['bureau'];
                } elseif (isset($utilisateurs['bureau'])) {
                    $bureau = $utilisateurs['bureau'];
                }
                ?>
                <input class="form-control" id="bureau" name="bureau" value="<?php echo $bureau; ?>" required>
            </div>
            <label for="division" class="col-lg-2 col-form-label text-lg-end">Division :</label>
            <div class="col-lg-2">
                <?php
                $division = null;
                if (isset($_POST['division'])) {
                    $division = $_POST['division'];
                } elseif (isset($utilisateurs['division'])) {
                    $division = $utilisateurs['division'];
                }
                ?>
                <input class="form-control" id="division" name="division" value="<?php echo $division; ?>" required>
            </div>
            <label for="ldap" class="col-lg-2 col-form-label text-lg-end">ldap :</label>
            <div class="col-lg-2">
                <?php
                $ldap = null;
                if (isset($_POST['ldap'])) {
                    $ldap = $_POST['ldap'];
                } elseif (isset($utilisateurs['ldap'])) {
                    $ldap = $utilisateurs['ldap'];
                }
                ?>
                <select class="form-select" name="ldap" required>
                    <option></option>
                    <option value="1" <?php echo $ldap == 'true' ? 'selected="selected"' : '' ?>>true</option>
                    <option value="2" <?php echo $ldap == 'false' ? 'selected="selected"' : '' ?>>false</option>
                </select>
            </div>
        </div>
        <button class="btn btn-success">Valider</button>
    </form>
</div>


