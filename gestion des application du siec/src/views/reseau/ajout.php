
<?php
if (empty($idReseau)) {
    $action="index.php?page=ajouter_reseau&action=ajout_reseau";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=reseaus\">Reseaus</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">ajouter</li>";
        echo"</ol>";
    echo"</nav>";
} elseif(!empty($idReseau)) {
    $action="index.php?page=ajouter_reseau&action=modification_reseau&id=$idReseau";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=reseaus\">Reseaus</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">modifier</li>";
        echo"</ol>";
    echo"</nav>";
}
?>
<div class="container">

    <form action="<?php echo $action; ?>" method="post">
        <div class="row mb-3">
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
                <input class="form-control" id="nomReseau" name="nomReseau" value="<?php echo $nomReseau; ?>"required>
            </div>
        </div>
        <button class="btn btn-success">Valider</button>
    </form>
</div>


