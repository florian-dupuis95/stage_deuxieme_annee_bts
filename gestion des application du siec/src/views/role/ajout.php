
<?php
if (empty($idRole)) {
    $action="index.php?page=ajouter_role&action=ajout_role";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=role\">Roles</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">ajouter</li>";
        echo"</ol>";
    echo"</nav>";
} elseif(!empty($idRole)) {
    $action="index.php?page=ajouter_role&action=modification_role&id=$idRole";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=role\">Roles</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">modifier</li>";
        echo"</ol>";
    echo"</nav>";
}
?>
<div class="container">

    <form action="<?php echo $action; ?>" method="post">
        <div class="row mb-3">
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
                <input class="form-control" id="nomRole" name="nomRole" value="<?php echo $nomRole; ?>"required>
            </div>
        </div>
        <button class="btn btn-success">Valider</button>
    </form>
</div>


