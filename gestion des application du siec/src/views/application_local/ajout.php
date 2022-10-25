
<?php
if (empty($idApplications)) {
    $action="index.php?page=ajouter_application&action=ajout_appli";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=applications_locales\">Applications</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">ajouter</li>";
        echo"</ol>";
    echo"</nav>";
} elseif(!empty($idApplications)) {
    $action="index.php?page=ajouter_application&action=modification_appli&id=$idApplications";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=applications_locales\">Applications</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">modifier</li>";
        echo"</ol>";
    echo"</nav>";
}
?>
<div class="container">

    <form action="<?php echo $action; ?>" method="post">
        <div class="row mb-3">
            <label for="nomOfficiel" class="col-lg-2 col-form-label text-lg-end">Nom officiel :</label>
            <div class="col-lg-2">
                <?php
                $nomOfficiel = null;
                if (isset($_POST['nomOfficiel'])) {
                    $nomOfficiel = $_POST['nomOfficiel'];
                } elseif (isset($applications['nomOfficiel'])) {
                    $nomOfficiel = $applications['nomOfficiel'];
                }
                ?>
                <input class="form-control" id="nomOfficiel" name="nomOfficiel" value="<?php echo $nomOfficiel; ?>">
            </div>
            <label for="nomDsi1" class="col-lg-2 col-form-label text-lg-end">Nom DSI1 :</label>
            <div class="col-lg-2">
                <?php
                $nomDsi1 = null;
                if (isset($_POST['nomDsi1'])) {
                    $nomDsi1 = $_POST['nomDsi1'];
                } elseif (isset($applications['nomDsi1'])) {
                    $nomDsi1 = $applications['nomDsi1'];
                }
                ?>
                <input class="form-control" id="nomDsi1" name="nomDsi1" value="<?php echo $nomDsi1; ?>" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="descriptionapplications" class="col-lg-2 col-form-label text-lg-end">Description :</label>
            <div class="col-lg-10">
                <?php
                $descriptionapplications = null;
                if (isset($_POST['descriptionapplications'])) {
                    $descriptionapplications = $_POST['descriptionapplications'];
                } elseif (isset($applications['descriptionapplications'])) {
                    $descriptionapplications = $applications['descriptionapplications'];
                }
                ?>
                <textarea class="form-control" rows="5" id="descriptionapplications" name="descriptionapplications" required><?php echo $descriptionapplications; ?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="technologis" class="col-lg-2 col-form-label text-lg-end">Technologies :</label>
            <div class="col-lg-2">
                <?php
                $technologis = null;
                if (isset($_POST['technologis'])) {
                    $technologis = $_POST['technologis'];
                } elseif (isset($applications['technologis'])) {
                    $technologis = $applications['technologis'];
                }
                ?>
                <input class="form-control" id="technologis" name="technologis" value="<?php echo $technologis; ?>">
            </div>
            <label for="utilisateur_idutilisateur" class="col-lg-2 col-form-label text-lg-end">Référent :</label>
            <div class="col-lg-2">
                <?php
                $utilisateur_idutilisateur = null;
                if (isset($_POST['utilisateur_idutilisateur'])) {
                    $utilisateur_idutilisateur = $_POST['utilisateur_idutilisateur'];
                } elseif (isset($applications['utilisateur_idutilisateur'])) {
                    $utilisateur_idutilisateur = $applications['utilisateur_idutilisateur'];
                }
                if (empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"utilisateur_idutilisateur\">";
                    echo"<option></option>";
                    foreach ($utilisateur as $utilisateur) {
                        $id=$utilisateur['idUtilisateur'];
                        $prenom=$utilisateur['prenomUtilisateur'];
                        echo"<option value=\"$id\">$prenom</option>";
                        $utilisateur=$utilisateur[0];
                    }
                    echo"</select> ";
                } elseif(!empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"utilisateur_idutilisateur\">";
                    echo"<option></option>";
                    foreach ($utilisateur as $utilisateur) {
                        $id=$utilisateur['idUtilisateur'];
                        $prenom=$utilisateur['prenomUtilisateur'];
                        if ($id===$utilisateur_idutilisateur) {
                            echo"<option value=\"$id\" selected>$prenom</option>";
                        } else {
                            echo"<option value=\"$id\">$prenom</option>";
                        }
                        $utilisateur=$utilisateur[0];
                    }
                    echo"</select> ";
                }
                ?>
            </div>
            <label for="annee" class="col-lg-2 col-form-label text-lg-end">Année :</label>
            <div class="col-lg-2">
                <?php
                $annee = null;
                if (isset($_POST['annee'])) {
                    $annee = $_POST['annee'];
                } elseif (isset($applications['annee'])) {
                    $annee = $applications['annee'];
                }
                ?>
                <input class="form-control" id="annee" name="annee" value="<?php echo $annee; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="accesBackendProd" class="col-lg-2 col-form-label text-lg-end">Acces backend prod :</label>
            <div class="col-lg-2">
                <?php
                $accesBackendProd = null;
                if (isset($_POST['accesBackendProd'])) {
                    $accesBackendProd = $_POST['accesBackendProd'];
                } elseif (isset($applications['accesBackendProd'])) {
                    $accesBackendProd = $applications['accesBackendProd'];
                }
                ?>
                <input class="form-control" id="accesBackendProd" name="accesBackendProd" value="<?php echo $accesBackendProd; ?>">
            </div>
            <label for="serveur_idServeurBackendProd" class="col-lg-2 col-form-label text-lg-end">Serveur backend prod :</label>
            <div class="col-lg-2">
                <?php
                $serveur_idServeurBackendProd = null;
                if (isset($_POST['serveur_idServeurBackendProd'])) {
                    $serveur_idServeurBackendProd = $_POST['serveur_idServeurBackendProd'];
                } elseif (isset($applications['serveur_idServeurBackendProd'])) {
                    $serveur_idServeurBackendProd = $applications['serveur_idServeurBackendProd'];
                }
                if (empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"serveur_idServeurBackendProd\">";
                    echo"<option></option>";
                    foreach ($sbp as $sbp) {
                        $id=$sbp['idServeur'];
                        $prenom=$sbp['nom'];
                        echo"<option value=\"$id\">$prenom</option>";
                        $sbp=$sbp[0];
                    }
                    echo"</select> ";
                } elseif(!empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"serveur_idServeurBackendProd\">";
                    echo"<option></option>";
                    foreach ($sbp as $sbp) {
                        $id=$sbp['idServeur'];
                        $prenom=$sbp['nom'];
                        if ($id===$serveur_idServeurBackendProd) {
                            echo"<option value=\"$id\" selected>$prenom</option>";
                        } else {
                            echo"<option value=\"$id\">$prenom</option>";
                        }
                        $sbp=$sbp[0];
                    }
                    echo"</select> ";
                }
                ?>
            </div>
            <label for="accesBackendTest" class="col-lg-2 col-form-label text-lg-end">Acces backend test :</label>
            <div class="col-lg-2">
                <?php
                $accesBackendTest = null;
                if (isset($_POST['accesBackendTest'])) {
                    $accesBackendTest = $_POST['accesBackendTest'];
                } elseif (isset($applications['accesBackendTest'])) {
                    $accesBackendTest = $applications['accesBackendTest'];
                }
                ?>
                <input class="form-control" id="accesBackendTest" name="accesBackendTest" value="<?php echo $accesBackendTest; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="serveur_idServeurBackendTest" class="col-lg-2 col-form-label text-lg-end">Serveur backend test :</label>
            <div class="col-lg-2">
                <?php
                $serveur_idServeurBackendTest = null;
                if (isset($_POST['serveur_idServeurBackendTest'])) {
                    $serveur_idServeurBackendTest = $_POST['serveur_idServeurBackendTest'];
                } elseif (isset($applications['serveur_idServeurBackendTest'])) {
                    $serveur_idServeurBackendTest = $applications['serveur_idServeurBackendTest'];
                }
                if (empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"serveur_idServeurBackendTest\">";
                    echo"<option></option>";
                    foreach ($sbt as $sbt) {
                        $id=$sbt['idServeur'];
                        $prenom=$sbt['nom'];
                        echo"<option value=\"$id\">$prenom</option>";
                        $sbt=$sbtp[0];
                    }
                    echo"</select> ";
                } elseif(!empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"serveur_idServeurBackendTest\">";
                    echo"<option></option>";
                    foreach ($sbt as $sbt) {
                        $id=$sbt['idServeur'];
                        $prenom=$sbt['nom'];
                        if ($id===$serveur_idServeurBackendTest) {
                            echo"<option value=\"$id\" selected>$prenom</option>";
                        } else {
                            echo"<option value=\"$id\">$prenom</option>";
                        }
                        $sbt=$sbt[0];
                    }
                    echo"</select> ";
                }
                ?>
            </div>
            <label for="sauvegardes" class="col-lg-2 col-form-label text-lg-end">Sauvegardes BDD :</label>
            <div class="col-lg-2">
                <?php
                $sauvegardes = null;
                if (isset($_POST['sauvegardes'])) {
                    $sauvegardes = $_POST['sauvegardes'];
                } elseif (isset($applications['sauvegardes'])) {
                    $sauvegardes = $applications['sauvegardes'];
                }
                ?>
                <select class="form-select" name="sauvegardes">
                    <option></option>
                    <option value="1" <?php echo $sauvegardes == 'Vrai' ? 'selected="selected"' : '' ?>>Vrai</option>
                    <option value="2" <?php echo $sauvegardes == 'A prevoir' ? 'selected="selected"' : '' ?>>A prevoir</option>
                </select>
            </div>
            
            <label for="rgpd" class="col-lg-2 col-form-label text-lg-end">RGPD :</label>
            <div class="col-lg-2">
                <?php
                $rgpd = null;
                if (isset($_POST['rgpd'])) {
                    $rgpd = $_POST['rgpd'];
                } elseif (isset($applications['rgpd'])) {
                    $rgpd = $applications['rgpd'];
                }?>
                <select class="form-select" name="rgpd">
                    <option></option>
                    <option value="1" <?php echo $rgpd == 'Vrai' ? 'selected="selected"' : '' ?>>Vrai</option>
                    <option value="2" <?php echo $rgpd == 'A prevoir' ? 'selected="selected"' : '' ?>>A prevoir</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="depotGitBackend" class="col-lg-2 col-form-label text-lg-end">Dépot git backend :</label>
            <div class="col-lg-2">
                <?php
                $depotGitBackend = null;
                if (isset($_POST['depotGitBackend'])) {
                    $depotGitBackend = $_POST['depotGitBackend'];
                } elseif (isset($applications['depotGitBackend'])) {
                    $depotGitBackend = $applications['depotGitBackend'];
                }
                ?>
                <input class="form-control" id="depotGitBackend" name="depotGitBackend" value="<?php echo $depotGitBackend; ?>">
            </div>
            <label for="autoDeploiementBackendProd" class="col-lg-2 col-form-label text-lg-end">Auto déploiement backend prod :</label>
            <div class="col-lg-2">
                <?php
                $autoDeploiementBackendProd = null;
                if (isset($_POST['autoDeploiementBackendProd'])) {
                    $autoDeploiementBackendProd = $_POST['autoDeploiementBackendProd'];
                } elseif (isset($applications['autoDeploiementBackendProd'])) {
                    $autoDeploiementBackendProd = $applications['autoDeploiementBackendProd'];
                }?>
                <select class="form-select" name="autoDeploiementBackendProd">
                    <option></option>
                    <option value="1" <?php echo $autoDeploiementBackendProd == 'Vrai' ? 'selected="selected"' : '' ?>>Vrai</option>
                    <option value="2" <?php echo $autoDeploiementBackendProd == 'A prevoir' ? 'selected="selected"' : '' ?>>A prevoir</option>
                </select>
            </div>
            <label for="autoDeploiementBackendTest" class="col-lg-2 col-form-label text-lg-end">Auto deploiement backend test :</label>
            <div class="col-lg-2">
                <?php
                $autoDeploiementBackendTest = null;
                if (isset($_POST['autoDeploiementBackendTest'])) {
                    $autoDeploiementBackendTest = $_POST['autoDeploiementBackendTest'];
                } elseif (isset($applications['autoDeploiementBackendTest'])) {
                    $autoDeploiementBackendTest = $applications['autoDeploiementBackendTest'];
                }?>
                <select class="form-select" name="autoDeploiementBackendTest">
                    <option></option>
                    <option value="1" <?php echo $autoDeploiementBackendTest == 'Vrai' ? 'selected="selected"' : '' ?>>Vrai</option>
                    <option value="2" <?php echo $autoDeploiementBackendTest == 'A prevoir' ? 'selected="selected"' : '' ?>>A prevoir</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="enquete" class="col-lg-2 col-form-label text-lg-end">Enquête :</label>
            <div class="col-lg-2">
                <?php
                $enquete = null;
                if (isset($_POST['enquete'])) {
                    $enquete = $_POST['enquete'];
                } elseif (isset($applications['enquete'])) {
                    $enquete = $applications['enquete'];
                }
                ?>
                <input class="form-control" id="enquete" name="enquete" value="<?php echo $enquete; ?>">
            </div>
            <label for="enqueteAPrevoir" class="col-lg-2 col-form-label text-lg-end">Enquête à prévoir :</label>
            <div class="col-lg-2">
                <?php
                $enqueteAPrevoir = null;
                if (isset($_POST['enqueteAPrevoir'])) {
                    $enqueteAPrevoir = $_POST['enqueteAPrevoir'];
                } elseif (isset($applications['enqueteAPrevoir'])) {
                    $enqueteAPrevoir = $applications['enqueteAPrevoir'];
                }
                ?>
                <input class="form-control" id="enqueteAPrevoir" name="enqueteAPrevoir" value="<?php echo $enqueteAPrevoir; ?>">
            </div>
            <label for="accesFrontendProd" class="col-lg-2 col-form-label text-lg-end">Acces frontend prod :</label>
            <div class="col-lg-2">
                <?php
                $accesFrontendProd = null;
                if (isset($_POST['accesFrontendProd'])) {
                    $accesFrontendProd = $_POST['accesFrontendProd'];
                } elseif (isset($applications['accesFrontendProd'])) {
                    $accesFrontendProd = $applications['accesFrontendProd'];
                }
                ?>
                <input class="form-control" id="accesFrontendProd" name="accesFrontendProd" value="<?php echo $accesFrontendProd; ?>">
            </div>
        </div>
        <div class="row mb-3">
        <label for="serveur_idServeurFrontendProd" class="col-lg-2 col-form-label text-lg-end">Serveur frontend prod :</label>
            <div class="col-lg-2">
                <?php
                $serveur_idServeurFrontendProd = null;
                if (isset($_POST['serveur_idServeurFrontendProd'])) {
                    $serveur_idServeurFrontendProd = $_POST['serveur_idServeurFrontendProd'];
                } elseif (isset($applications['serveur_idServeurFrontendProd'])) {
                    $serveur_idServeurFrontendProd = $applications['serveur_idServeurFrontendProd'];
                }
                if (empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"serveur_idServeurFrontendProd\">";
                    echo"<option></option>";
                    foreach ($sfp as $sfp) {
                        $id=$sfp['idServeur'];
                        $prenom=$sfp['nom'];
                        echo"<option value=\"$id\">$prenom</option>";
                        $sfp=$sfp[0];
                    }
                    echo"</select> ";
                } elseif(!empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"serveur_idServeurFrontendProd\">";
                    echo"<option></option>";
                    foreach ($sfp as $sfp) {
                        $id=$sfp['idServeur'];
                        $prenom=$sfp['nom'];
                        if ($id===$serveur_idServeurFrontendProd) {
                            echo"<option value=\"$id\" selected>$prenom</option>";
                        } else {
                            echo"<option value=\"$id\">$prenom</option>";
                        }
                        $sfp=$sfp[0];
                    }
                    echo"</select> ";
                }
                ?>
            </div>
            <label for="accesFrontendTest" class="col-lg-2 col-form-label text-lg-end">Acces frontend test :</label>
            <div class="col-lg-2">
                <?php
                $accesFrontendTest = null;
                if (isset($_POST['accesFrontendTest'])) {
                    $accesFrontendTest = $_POST['accesFrontendTest'];
                } elseif (isset($applications['accesFrontendTest'])) {
                    $accesFrontendTest = $applications['accesFrontendTest'];
                }
                ?>
                <input class="form-control" id="accesFrontendTest" name="accesFrontendTest" value="<?php echo $accesFrontendTest; ?>">
            </div>
            <label for="serveur_idServeurFrontendTest" class="col-lg-2 col-form-label text-lg-end">Serveur frontend test :</label>
            <div class="col-lg-2">
                <?php
                $serveur_idServeurFrontendTest = null;
                if (isset($_POST['serveur_idServeurFrontendTest'])) {
                    $serveur_idServeurFrontendTest = $_POST['serveur_idServeurFrontendTest'];
                } elseif (isset($applications['serveur_idServeurFrontendTest'])) {
                    $serveur_idServeurFrontendTest = $applications['serveur_idServeurFrontendTest'];
                }
                if (empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"serveur_idServeurFrontendTest\">";
                    echo"<option></option>";
                    foreach ($sft as $sft) {
                        $id=$sft['idServeur'];
                        $prenom=$sft['nom'];
                        echo"<option value=\"$id\">$prenom</option>";
                        $sft=$sft[0];
                    }
                    echo"</select> ";
                } elseif(!empty($idApplications)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"serveur_idServeurFrontendTest\">";
                    echo"<option></option>";
                    foreach ($sft as $sft) {
                        $id=$sft['idServeur'];
                        $prenom=$sft['nom'];
                        if ($id===$serveur_idServeurFrontendTest) {
                            echo"<option value=\"$id\" selected>$prenom</option>";
                        } else {
                            echo"<option value=\"$id\">$prenom</option>";
                        }
                        $sft=$sft[0];
                    }
                    echo"</select> ";
                }
                ?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="depotGitFrontend" class="col-lg-2 col-form-label text-lg-end">Dépot git frontend :</label>
            <div class="col-lg-2">
                <?php
                $depotGitFrontend = null;
                if (isset($_POST['depotGitFrontend'])) {
                    $depotGitFrontend = $_POST['depotGitFrontend'];
                } elseif (isset($applications['depotGitFrontend'])) {
                    $depotGitFrontend = $applications['depotGitFrontend'];
                }
                ?>
                <input class="form-control" id="depotGitFrontend" name="depotGitFrontend" value="<?php echo $depotGitFrontend; ?>">
            </div>
            <label for="autoDeploiementFrontendProd" class="col-lg-2 col-form-label text-lg-end">Auto déploiement frontend prod :</label>
            <div class="col-lg-2">
                <?php
                $autoDeploiementFrontendProd = null;
                if (isset($_POST['autoDeploiementFrontendProd'])) {
                    $autoDeploiementFrontendProd = $_POST['autoDeploiementFrontendProd'];
                } elseif (isset($applications['autoDeploiementFrontendProd'])) {
                    $autoDeploiementFrontendProd = $applications['autoDeploiementFrontendProd'];
                }
                ?>
                <select class="form-select" name="autoDeploiementFrontendProd">
                    <option></option>
                    <option value="1" <?php echo $autoDeploiementFrontendProd == 'Vrai' ? 'selected="selected"' : '' ?>>Vrai</option>
                    <option value="2" <?php echo $autoDeploiementFrontendProd == 'A prevoir' ? 'selected="selected"' : '' ?>>A prevoir</option>
                </select>
            </div>
            <label for="autoDeploiementFrontendTest" class="col-lg-2 col-form-label text-lg-end">Auto déploiement frontend test :</label>
            <div class="col-lg-2">
                <?php
                $autoDeploiementFrontendTest = null;
                if (isset($_POST['autoDeploiementFrontendTest'])) {
                    $autoDeploiementFrontendTest = $_POST['autoDeploiementFrontendTest'];
                } elseif (isset($applications['autoDeploiementFrontendTest'])) {
                    $autoDeploiementFrontendTest = $applications['autoDeploiementFrontendTest'];
                }
                ?>
                <select class="form-select" name="autoDeploiementFrontendTest">
                    <option></option>
                    <option value="1" <?php echo $autoDeploiementFrontendTest == 'Vrai' ? 'selected="selected"' : '' ?>>Vrai</option>
                    <option value="2" <?php echo $autoDeploiementFrontendTest == 'A prevoir' ? 'selected="selected"' : '' ?>>A prevoir</option>
                </select>
            </div>
        </div>

        <button class="btn btn-success">Valider</button>
    </form>
</div>


