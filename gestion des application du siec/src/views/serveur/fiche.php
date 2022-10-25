
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=serveurs">serveurs</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $idServeur;?> fiche</li>
    </ol>
</nav>

<div class="container">
    <div class="row mb-3">
        <label for="idServeur" class="col-lg-2 col-form-label text-lg-end">ID serveur :</label>
        <div class="col-lg-2">
            <?php
            if (isset($_POST['idServeur'])) {
                $nom = $_POST['idServeur'];
            } elseif (isset($serveurs['idServeur'])) {
            $nom = $serveurs['idServeur'];
            }
            ?>
            <input class="form-control" id="idServeur" name="idServeur" value="<?php echo $idServeur; ?>"disabled>
        </div>
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
            <input class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>"disabled>
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
            <input class="form-control" id="ipServeur" name="ipServeur" value="<?php echo $ipServeur; ?>" disabled>
        </div>
    </div>
    <div class="row mb-3">
        <label for="reseau" class="col-lg-2 col-form-label text-lg-end">Réseau :</label>
        <div class="col-lg-2">
            <?php
            $reseau = null;
            if (isset($_POST['reseau'])) {
                $reseau = $_POST['reseau'];
            } elseif (isset($serveurs['reseau'])) {
                $reseau = $serveurs['reseau'];
            }
            ?>
            <input class="form-control" id="reseau" name="reseau" value="<?php 
                    echo $serveurs['nomReseau'];
            ?>" disabled>
        </div>
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
            <input class="form-control" id="os" name="os" value="<?php echo $os; ?>" disabled>
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
            ?>
            <input class="form-control" id="typeServeur" name="typeServeur" value="<?php  
                echo $serveurs['nomType'];
              ?>" disabled>
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
            <textarea class="form-control" rows="5" id="commentaire" name="commentaire" disabled><?php echo $commentaire; ?></textarea>
        </div>
    </div>
</div>


