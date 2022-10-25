
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=type_serveurs">Types</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $idType;?> fiche</li>
    </ol>
</nav>

<div class="container">
    <div class="row mb-3">
        <label for="idType" class="col-lg-2 col-form-label text-lg-end">ID Type :</label>
        <div class="col-lg-2">
            <?php
            if (isset($_POST['idType'])) {
                $idType = $_POST['idType'];
            } elseif (isset($row['idType'])) {
                $idType = $row['idType'];
            }
            ?>
            <input class="form-control" id="idType" name="idType" value="<?php echo $idType; ?>"disabled>
        </div>
        <label for="nomType" class="col-lg-2 col-form-label text-lg-end">Nom Type :</label>
        <div class="col-lg-2">
            <?php
            $nomType = null;
            if (isset($_POST['nomType'])) {
                $nomType = $_POST['nomType'];
            } elseif (isset($row['nomType'])) {
                $nomType = $row['nomType'];
            }
            ?>
            <input class="form-control" id="nomType" name="nomType" value="<?php echo $nomType; ?>"disabled>
        </div>
    </div>
</div>


