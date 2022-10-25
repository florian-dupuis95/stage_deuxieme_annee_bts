
<?php
if (empty($idServeur)) {
    $action="index.php?page=ajouter_serveur&action=ajout_serveur";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=serveurs\">serveurs</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">ajouter</li>";
        echo"</ol>";
    echo"</nav>";
} elseif(!empty($idServeur)) {
    $action="index.php?page=ajouter_serveur&action=modification_serveur&id=$idServeur";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=serveurs\">serveurs</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">modifier</li>";
        echo"</ol>";
    echo"</nav>";
}
?>
<div class="container">

    <form action="<?php echo $action; ?>" method="post">
        <div class="row mb-3">
            <label for="nom" class="col-lg-2 col-form-label text-lg-end">Nom :</label>
            <div class="col-lg-2">
                <?php
                $nom = null;
                if (isset($_POST['nom'])) {
                    $nom = $_POST['nom'];
                } elseif (isset($serveurs['nom'])) {
                    $nom = $serveurs['nom'];
                }
                ?>
                <input class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>"required>
            </div>
            <label for="ipServeur" class="col-lg-2 col-form-label text-lg-end">IP serveur :</label>
            <div class="col-lg-2">
                <?php
                $ipServeur = null;
                if (isset($_POST['ipServeur'])) {
                    $ipServeur = $_POST['ipServeur'];
                } elseif (isset($serveurs['ipServeur'])) {
                    $ipServeur = $serveurs['ipServeur'];
                }
                ?>
                <input class="form-control" id="ipServeur" name="ipServeur" value="<?php echo $ipServeur; ?>" required>
            </div>
            <label for="reseau" class="col-lg-2 col-form-label text-lg-end">Réseau :</label>
            <div class="col-lg-2">
                <?php
                $reseau = null;
                if (isset($_POST['reseau'])) {
                    $reseau = $_POST['reseau'];
                } elseif (isset($serveurs['reseau'])) {
                    $reseau = $serveurs['reseau'];
                }
                if (empty($idServeur)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"reseau\">";
                    echo"<option></option>";
                    foreach ($reseaus as $reseaux) {
                    $id=$reseaux['idReseau'];
                    $prenom=$reseaux['nomReseau'];
                    echo"<option value=\"$id\">$prenom</option>";
                    $value=$reseau[0];
                    }
                    echo"</select> ";
                } elseif(!empty($idServeur)){
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"reseau\">";
                    echo"<option></option>";
                    foreach ($reseaus as $reseaux) {
                        $id=$reseaux['idReseau'];
                        $prenom=$reseaux['nomReseau'];
                        if ($id===$reseau) {
                            echo"<option value=\"$id\" selected>$prenom</option>";
                        } else {
                            echo"<option value=\"$id\">$prenom</option>";
                        }
                        $value=$reseaux[0];
                    }
                    echo"</select> ";
                }
                ?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="os" class="col-lg-2 col-form-label text-lg-end">OS :</label>
            <div class="col-lg-2">
                <?php
                $os = null;
                if (isset($_POST['os'])) {
                    $os = $_POST['os'];
                } elseif (isset($serveurs['os'])) {
                    $os = $serveurs['os'];
                }
                ?>
                <input class="form-control" id="os" name="os" value="<?php echo $os; ?>" required>
            </div>
            <label for="typeServeur" class="col-lg-2 col-form-label text-lg-end">Type serveur :</label>
            <div class="col-lg-2">
                <?php
                $typeServeur = null;
                if (isset($_POST['typeServeur'])) {
                    $typeServeur = $_POST['typeServeur'];
                } elseif (isset($serveurs['typeServeur'])) {
                    $typeServeur = $serveurs['typeServeur'];
                }
                if (empty($idServeur)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"typeServeur\">";
                    echo"<option></option>";
                    foreach ($types as $type) {
                        $id=$type['idType'];
                        $prenom=$type['nomType'];
                        echo"<option value=\"$id\">$prenom</option>";
                        $value=$type[0];
                    }
                    echo"</select> ";
                } elseif(!empty($idServeur)) {
                    echo"<select class=\"form-select\" aria-label=\"Default select example\" name=\"typeServeur\">";
                    echo"<option></option>";
                    foreach ($types as $type) {
                        $id=$type['idType'];
                        $prenom=$type['nomType'];
                        if ($id===$typeServeur) {
                            echo"<option value=\"$id\" selected>$prenom</option>";
                        }else{
                            echo"<option value=\"$id\">$prenom</option>";
                        }
                        $value=$type[0];
                    }
                    echo"</select> ";
                }
                ?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="commentaire" class="col-lg-2 col-form-label text-lg-end">Commentaire :</label>
            <div class="col-lg-10">
                <?php
                $commentaire = null;
                if (isset($_POST['commentaire'])) {
                    $commentaire = $_POST['commentaire'];
                } elseif (isset($serveurs['commentaire'])) {
                    $commentaire = $serveurs['commentaire'];
                }
                ?>
                <textarea class="form-control" rows="5" id="commentaire" name="commentaire"><?php echo $commentaire; ?></textarea>
            </div>
        </div>
        <button class="btn btn-success">Valider</button>
    </form>
</div>


