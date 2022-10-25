<?php
if (empty($idType)) {
    $action="index.php?page=ajouter_type&action=ajout_type";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=type_serveurs\">Types</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">ajouter</li>";
        echo"</ol>";
    echo"</nav>";
} elseif(!empty($idType)) {
    $action="index.php?page=ajouter_type&action=modification_type&id=$idType";
    echo"<nav aria-label=\"breadcrumb\">";
        echo"<ol class=\"breadcrumb\">";
            echo"<li class=\"breadcrumb-item\"><a href=\"index.php?page=type_serveurs\">Types</a></li>";
            echo"<li class=\"breadcrumb-item active\" aria-current=\"page\">modifier</li>";
        echo"</ol>";
    echo"</nav>";
}
?>
<div class="container">

    <form action="<?php echo $action; ?>" method="post">
        <div class="row mb-3">
            <label for="nomType" class="col-lg-2 col-form-label text-lg-end">Nom type :</label>
            <div class="col-lg-2">
                <?php
                $nomType = null;
                if (isset($_POST['nomType'])) {
                    $nomType = $_POST['nomType'];
                } elseif (isset($row['nomType'])) {
                    $nomType = $row['nomType'];
                }
                ?>
                <input class="form-control" id="nomType" name="nomType" value="<?php echo $nomType; ?>"required>
            </div>
        </div>
        <button class="btn btn-success">Valider</button>
    </form>
</div>


