
<nav class="navbar navbar-expand navbar-red">
    <div class="container-fluid">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="index.php?page=applications_locales" class="nav-link" aria-current="page">Application</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=serveurs" class="nav-link">Serveur</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=reseaus" class="nav-link">Réseau</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=type_serveurs" class="nav-link">Type serveur</a>
                </li>
                
                <?php if (isGranted('1', false)) { ?>
                    <li class="nav_item">
                        <a href="index.php?page=utilisateurs"class="nav-link">Utilisateur</a>
                    </li>
                    <li class="nav_item">
                        <a href="index.php?page=role"class="nav-link">role</a>
                    </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav">
                <li class="nav_item">
                    <h2>
                    <?php
                    echo$_SESSION['user']['loginUtilisateur'];
                    ?>
                    </h2>
                </li>
                <li class="nav_item">
                    <?php
                    $id=$_SESSION['user']['idUtilisateur'];
                    echo"<a href=\"index.php?page=fiche_utilisateur&id=$id\" class=\"nav-link\">";
                        echo"<i class=\"fas fa-user\"></i>";
                    echo"</a>";
                    ?>
                </li>
                <li class="nav_item">
                    <a href="index.php?action=logout" class="nav-link" >
                        <i class="fas fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>