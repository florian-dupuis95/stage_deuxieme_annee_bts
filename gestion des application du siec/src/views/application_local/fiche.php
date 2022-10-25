<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=applications_locales">Applications</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $idApplications;?> fiche</li>
    </ol>
</nav>

<div class="container">
    <div class="notifications">
    </div>
    <?php
    echo"<ul class=\"nav nav-tabs mt-4\" role=\"tablist\">";
        echo"<li class=\"nav-item\">";
            echo"<a class=\"nav-link\" id=\"index-tab\" data-toggle=\"tab\" href=\"index.php?page=fiche_appli&id=$idApplications&nom=index\" role=\"tab\" aria-controls=\"delete\" aria-selected=\"true\">Applications</a>";
        echo"</li>";
        echo"<li class=\"nav-item\">";
            echo"<a class=\"nav-link\" id=\"frontendProd-tab\" data-toggle=\"tab\" href=\"index.php?page=fiche_appli&id=$idApplications&nom=frontendProd\" role=\"tab\" aria-controls=\"delete\" aria-selected=\"true\">Frontend prod</a>";
        echo"</li>";
        echo"<li class=\"nav-item\">";
            echo"<a class=\"nav-link\" id=\"frontendTest-tab\" data-toggle=\"tab\" href=\"index.php?page=fiche_appli&id=$idApplications&nom=frontendTest\" role=\"tab\" aria-controls=\"delete\" aria-selected=\"true\">Frontend test</a>";
        echo"</li>";
        echo"<li class=\"nav-item\">";
            echo"<a class=\"nav-link\" id=\"backendProd-tab\" data-toggle=\"tab\" href=\"index.php?page=fiche_appli&id=$idApplications&nom=backendProd\" role=\"tab\" aria-controls=\"delete\" aria-selected=\"true\">Backend prod</a>";
        echo"</li>";
        echo"<li class=\"nav-item\">";
            echo"<a class=\"nav-link\" id=\"backendTest-tab\" data-toggle=\"tab\" href=\"index.php?page=fiche_appli&id=$idApplications&nom=backendTest\" role=\"tab\" aria-controls=\"delete\" aria-selected=\"true\">Backend test</a>";
        echo"</li>";
    echo"</ul>";
    ?>
    <div class="tab-content">
        <?php
        $value=$_GET['nom'] ?? null;
        switch($value) {
            case 'index':?>
                <div class="tab-pane fade show active" id="index" role="tabpanel" aria-labelledby="index-tab">
                    <div class="row mb-3">
                        <label for="idApplications" class="col-lg-2 col-form-label text-lg-end">ID applications :</label>
                        <div class="col-lg-2">
                            <?php
                            if (isset($_POST['idApplications'])) {
                                $idApplications = $_POST['idApplications'];
                            } elseif (isset($applications['idApplications'])) {
                                $idApplications = $applications['idApplications'];
                            }
                            ?>
                            <input class="form-control" id="idApplications" name="idApplications" value="<?php echo $idApplications; ?>" disabled>
                        </div>
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
                            <input class="form-control" id="nomOfficiel" name="nomOfficiel" value="<?php echo $nomOfficiel; ?>" disabled>
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
                            <input class="form-control" id="nomDsi1" name="nomDsi1" value="<?php echo $nomDsi1; ?>" disabled>
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
                            <textarea class="form-control" rows="5" id="descriptionapplications" name="descriptionapplications" disabled><?php echo $descriptionapplications; ?></textarea>
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
                            <input class="form-control" id="technologis" name="technologis" value="<?php echo $technologis; ?>" disabled>
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
                            ?>
                            <input class="form-control" id="utilisateur_idutilisateur" name="utilisateur_idutilisateur" value="<?php 
                                        echo $applications['prenomUtilisateur'];
                                    ?>" disabled>
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
                            <input class="form-control" id="annee" name="annee" value="<?php echo $annee; ?>"disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
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
                            <input class="form-control" id="sauvegardes" name="sauvegardes" value="<?php echo $sauvegardes; ?>" disabled>
                        </div>
                        <label for="rgpd" class="col-lg-2 col-form-label text-lg-end">RGPD :</label>
                        <div class="col-lg-2">
                            <?php
                            $rgpd = null;
                            if (isset($_POST['rgpd'])) {
                                $rgpd = $_POST['rgpd'];
                            } elseif (isset($applications['rgpd'])) {
                                $rgpd = $applications['rgpd'];
                            }
                            ?>
                            <input class="form-control" id="rgpd" name="rgpd" value="<?php echo $rgpd; ?>" disabled>
                        </div>
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
                            <input class="form-control" id="enquete" name="enquete" value="<?php echo $enquete; ?>" disabled>
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
                            <input class="form-control" id="depotGitBackend" name="depotGitBackend" value="<?php echo $depotGitBackend; ?>" disabled>
                        </div>
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
                            <input class="form-control" id="depotGitFrontend" name="depotGitFrontend" value="<?php echo $depotGitFrontend; ?>" disabled>
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
                            <input class="form-control" id="enqueteAPrevoir" name="enqueteAPrevoir" value="<?php echo $enqueteAPrevoir; ?>" disabled>
                        </div>
                    </div>
                </div>
                <?php break;
            case 'frontendProd':?>
                <div class="tab-pane fade show active" id="frontendProd" role="tabpanel" aria-labelledby="frontendProd-tab">
                    <div class="row mb-3">
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
                            <input class="form-control" id="accesFrontendProd" name="accesFrontendProd" value="<?php echo $accesFrontendProd; ?>" disabled>
                        </div>
                        <label for="serveur_idServeurFrontendProd" class="col-lg-2 col-form-label text-lg-end">Serveur frontend prod :</label>
                        <div class="col-lg-2">
                            <?php
                            $serveur_idServeurFrontendProd = null;
                            if (isset($_POST['serveur_idServeurFrontendProd'])) {
                                $serveur_idServeurFrontendProd = $_POST['serveur_idServeurFrontendProd'];
                            } elseif (isset($applications['serveur_idServeurFrontendProd'])) {
                                $serveur_idServeurFrontendProd = $applications['serveur_idServeurFrontendProd'];
                            }
                            ?>
                            <input class="form-control" id="serveur_idServeurFrontendProd" name="serveur_idServeurFrontendProd" value="<?php 
                                        echo $applications['nomsfp'];
                                    ?>" disabled>
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
                            <input class="form-control" id="autoDeploiementFrontendProd" name="autoDeploiementFrontendProd" value="<?php echo $autoDeploiementFrontendProd; ?>" disabled>
                        </div>
                    </div>
                </div>
                <?php break;
            case 'frontendTest':?>
                <div class="tab-pane fade show active" id="frontendTest" role="tabpanel" aria-labelledby="frontendTest-tab">
                    <div class="row mb-3">
                
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
                            <input class="form-control" id="accesFrontendTest" name="accesFrontendTest" value="<?php echo $accesFrontendTest; ?>" disabled>
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
                            ?>
                            <input class="form-control" id="serveur_idServeurFrontendTest" name="serveur_idServeurFrontendTest" value="<?php 
                                        echo $applications['nomsft'];
                                    ?>" disabled>
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
                            <input class="form-control" id="autoDeploiementFrontendTest" name="autoDeploiementFrontendTest" value="<?php echo $autoDeploiementFrontendTest; ?>" disabled>
                        </div>
                    </div>
                </div>
                <?php break;
            case 'backendProd':?>
                <div class="tab-pane fade show active" id="backendProd" role="tabpanel" aria-labelledby="backendProd-tab">
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
                            <input class="form-control" id="accesBackendProd" name="accesBackendProd" value="<?php echo $accesBackendProd; ?>" disabled>
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
                            ?>
                            <input class="form-control" id="serveur_idServeurBackendProd" name="serveur_idServeurBackendProd" value="<?php 
                                        echo $applications['nomsbp'];
                                    ?>" disabled>
                        </div>
                        <label for="autoDeploiementBackendProd" class="col-lg-2 col-form-label text-lg-end">Auto déploiement backend prod :</label>
                        <div class="col-lg-2">
                            <?php
                            $autoDeploiementBackendProd = null;
                            if (isset($_POST['autoDeploiementBackendProd'])) {
                                $autoDeploiementBackendProd = $_POST['autoDeploiementBackendProd'];
                            } elseif (isset($applications['autoDeploiementBackendProd'])) {
                                $autoDeploiementBackendProd = $applications['autoDeploiementBackendProd'];
                            }
                            ?>
                            <input class="form-control" id="autoDeploiementBackendProd" name="autoDeploiementBackendProd" value="<?php echo $autoDeploiementBackendProd; ?>" disabled>
                        </div>
                    </div>
                </div>
                <?php break;
            case 'backendTest':?>
                <div class="tab-pane fade show active" id="backendTest" role="tabpanel" aria-labelledby="backendTest-tab">
                    <div class="row mb-3">
                
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
                            <input class="form-control" id="accesBackendTest" name="accesBackendTest" value="<?php echo $accesBackendTest; ?>" disabled>
                        </div>
                        <label for="serveur_idServeurBackendTest" class="col-lg-2 col-form-label text-lg-end">Serveur backend test :</label>
                        <div class="col-lg-2">
                            <?php
                            $serveur_idServeurBackendTest = null;
                            if (isset($_POST['serveur_idServeurBackendTest'])) {
                                $serveur_idServeurBackendTest = $_POST['serveur_idServeurBackendTest'];
                            } elseif (isset($applications['serveur_idServeurBackendTest'])) {
                                $serveur_idServeurBackendTest = $applications['serveur_idServeurBackendTest'];
                            }
                            ?>
                            <input class="form-control" id="serveur_idServeurBackendTest" name="serveur_idServeurBackendTest" value="<?php 
                                        echo $applications['nomsbt'];
                                    ?>" disabled>
                        </div>
                        <label for="autoDeploiementBackendTest" class="col-lg-2 col-form-label text-lg-end">Auto déploiement backend test :</label>
                        <div class="col-lg-2">
                            <?php
                            $autoDeploiementBackendTest = null;
                            if (isset($_POST['autoDeploiementBackendTest'])) {
                                $autoDeploiementBackendTest = $_POST['autoDeploiementBackendTest'];
                            } elseif (isset($applications['autoDeploiementBackendTest'])) {
                                $autoDeploiementBackendTest = $applications['autoDeploiementBackendTest'];
                            }
                            ?>
                            <input class="form-control" id="autoDeploiementBackendTest" name="autoDeploiementBackendTest" value="<?php echo $autoDeploiementBackendTest; ?>" disabled>
                        </div>
                    </div>
                </div>
                <?php break;
        }?>
    </div>
</div>
