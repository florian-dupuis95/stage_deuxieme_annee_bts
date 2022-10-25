<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">utilisateur</li>
  </ol>
</nav>
<div class="container">
  <div class="mb-4">
  <a href="index.php?page=ajouter_utilisateur&id=0" class="btn btn-success"><i class="fas fa-plus-square"></i> ajouter</a>
  <a href="index.php?action=exporter_utilisateur" class="btn btn-secondary" download="utilisateurs.xlsx"><i class="fas fa-file-download"></i> exporter</a>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered" >
      <thead>
        <tr >
          <th >
            action <br/>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=utilisateurs&status=SORT_ASC&column=idUtilisateur">idUtilisateur</a> 
            <?php } else { ?>
              <a href="index.php?page=utilisateurs&status=SORT_DESC&column=idUtilisateur">idUtilisateur</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=utilisateurs&status=SORT_ASC&column=roleUtilisateur">roleUtilisateur</a> 
            <?php } else { ?>
              <a href="index.php?page=utilisateurs&status=SORT_DESC&column=roleUtilisateur">roleUtilisateur</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=utilisateurs&status=SORT_ASC&column=prenomUtilisateur">prenomUtilisateur</a> 
            <?php } else { ?>
              <a href="index.php?page=utilisateurs&status=SORT_DESC&column=prenomUtilisateur">prenomUtilisateur</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=utilisateurs&status=SORT_ASC&column=nomUtilisateur">nomUtilisateur</a> 
            <?php } else { ?>
              <a href="index.php?page=utilisateurs&status=SORT_DESC&column=nomUtilisateur">nomUtilisateur</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=utilisateurs&status=SORT_ASC&column=emailUtilisateur">emailUtilisateur</a> 
            <?php } else { ?>
              <a href="index.php?page=utilisateurs&status=SORT_DESC&column=emailUtilisateur">emailUtilisateur</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=utilisateurs&status=SORT_ASC&column=bureau">bureau</a> 
            <?php } else { ?>
              <a href="index.php?page=utilisateurs&status=SORT_DESC&column=bureau">bureau</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=utilisateurs&status=SORT_ASC&column=division">division</a> 
            <?php } else { ?>
              <a href="index.php?page=utilisateurs&status=SORT_DESC&column=division">division</a> 
            <?php } ?>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($utilisateurs as $utilisateur) { ?>
          <tr >
          <?php $id=$utilisateur['idUtilisateur']; ?>
            <td >
              <a href="index.php?page=ajouter_utilisateur&id=<?php echo $id; ?>" class="text-primary" title="modifier"><i class="fas fa-edit"></i></a> 
              <a href="#" class="text-danger" title="supprimer" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a>
              <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Souhaitez-vous vraiment supprimer cet uttilisateur ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="index.php?action=supression_utilisateur&id=<?php echo $id; ?>" class="btn btn-danger">suprimer</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td >
              <a href="index.php?page=fiche_utilisateur&id=<?php echo $id; ?>" class="link-dark"><?php echo $id; ?></a> <br/>
            </td>
            <td >
            <?php echo $utilisateur['nomRole']; ?> <br/>
            <td >
              <?php echo $utilisateur['prenomUtilisateur']; ?> <br/>
            </td>
            <td >
              <?php echo $utilisateur['nomUtilisateur']; ?> <br/>
            </td>
            <td >
              <?php echo $utilisateur['emailUtilisateur']; ?> <br/>
            </td>
            <td >
              <?php echo $utilisateur['bureau']; ?> <br/>
            </td>
            <td >
              <?php echo $utilisateur['division']; ?> <br/>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>