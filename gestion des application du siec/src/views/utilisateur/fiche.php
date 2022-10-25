
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=utilisateurs">utilisateurs</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $idUtilisateur;?> fiche</li>
    </ol>
</nav>

<div class="container">
    <div class="row mb-3">
        <label for="idUtilisateur" class="col-lg-2 col-form-label text-lg-end">ID utilisateur :</label>
        <div class="col-lg-2">
            <?php
            if (isset($_POST['idUtilisateur'])) {
                $idUtilisateur = $_POST['idUtilisateur'];
            } elseif (isset($utilisateurs['idUtilisateur'])) {
                $idUtilisateur = $utilisateurs['idUtilisateur'];
            }
            ?>
            <input class="form-control" id="idUtilisateur" name="idUtilisateur" value="<?php echo $idUtilisateur; ?>"disabled>
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
            ?>
            <input class="form-control" id="roleUtilisateur" name="roleUtilisateur" value="<?php echo $utilisateurs['nomRole']; ?>" disabled>
        </div>
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
            <input class="form-control" id="prenomUtilisateur" name="prenomUtilisateur" value="<?php echo $prenomUtilisateur; ?>" disabled>
        </div>
    </div>
    <div class="row mb-3">
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
            <input class="form-control" id="nomUtilisateur" name="nomUtilisateur" value="<?php echo $nomUtilisateur; ?>" disabled>
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
            <input class="form-control" id="emailUtilisateur" name="emailUtilisateur" value="<?php echo $emailUtilisateur; ?>" disabled>
        </div>
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
            <input class="form-control" id="bureau" name="bureau" value="<?php echo $bureau; ?>" disabled>
        </div>
    </div>
    <div class="row mb-3">
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
            <input class="form-control" id="division" name="division" value="<?php echo $division; ?>" disabled>
        </div>
    </div>
</div>


