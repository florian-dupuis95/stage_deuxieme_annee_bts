
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=role">Role</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $idRole;?> fiche</li>
    </ol>
</nav>

<div class="container">
    <div class="row mb-3">
        <label for="idRole" class="col-lg-2 col-form-label text-lg-end">ID role :</label>
        <div class="col-lg-2">
            <?php
            if (isset($_POST['idRole'])) {
                $idRole = $_POST['idRole'];
            } elseif (isset($row['idRole'])) {
                $idRole = $row['idRole'];
            }
            ?>
            <input class="form-control" id="idRole" name="idRole" value="<?php echo $idRole; ?>"disabled>
        </div>
        <label for="nomRole" class="col-lg-2 col-form-label text-lg-end">Nom role :</label>
        <div class="col-lg-2">
            <?php
            $nomRole = null;
            if (isset($_POST['nomRole'])) {
                $nomRole = $_POST['nomRole'];
            } elseif (isset($row['nomRole'])) {
                $nomRole = $row['nomRole'];
            }
            ?>
            <input class="form-control" id="nomRole" name="nomRole" value="<?php echo $nomRole; ?>"disabled>
        </div>
    </div>
</div>


