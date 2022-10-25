
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=reseaus">Reseaus</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $idReseau;?> fiche</li>
    </ol>
</nav>

<div class="container">
    <div class="row mb-3">
        <label for="idReseau" class="col-lg-2 col-form-label text-lg-end">ID reseau :</label>
        <div class="col-lg-2">
            <?php
            if (isset($_POST['idReseau'])) {
                $idReseau = $_POST['idReseau'];
            } elseif (isset($row['idReseau'])) {
                $idReseau = $row['idReseau'];
            }
            ?>
            <input class="form-control" id="idReseau" name="idReseau" value="<?php echo $idReseau; ?>"disabled>
        </div>
        <label for="nomReseau" class="col-lg-2 col-form-label text-lg-end">Nom reseau :</label>
        <div class="col-lg-2">
            <?php
            $nomReseau = null;
            if (isset($_POST['nomReseau'])) {
                $nomReseau = $_POST['nomReseau'];
            } elseif (isset($row['nomReseau'])) {
                $nomReseau = $row['nomReseau'];
            }
            ?>
            <input class="form-control" id="nomReseau" name="nomReseau" value="<?php echo $nomReseau; ?>"disabled>
        </div>
    </div>
</div>


