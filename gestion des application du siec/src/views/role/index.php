
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">role</li>
  </ol>
</nav>
<div class="container">
  <div class="mb-4">
    <a href="index.php?page=ajouter_role&id=0" class="btn btn-success"><i class="fas fa-plus-square"></i> ajouter</a>
    <a href="index.php?action=exporter_role" class="btn btn-secondary" download="role.xlsx"><i class="fas fa-file-download"></i> exporter</a>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered" >
      <thead>
        <tr >
          <th >
            action
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=role&status=SORT_ASC&column=idRole">idrole</a> 
            <?php } else { ?>
              <a href="index.php?page=role&status=SORT_DESC&column=idRole">idrole</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=role&status=SORT_ASC&column=nomRole">nom</a> 
            <?php } else { ?>
              <a href="index.php?page=role&status=SORT_DESC&column=nomRole">nom</a> 
            <?php } ?>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($roles as $role) { ?>
          <tr >
          <?php $id=$role['idRole']; ?>
            <td >
              <a href="index.php?page=ajouter_role&id=<?php echo $id; ?>" class="text-primary" title="modifier"><i class="fas fa-edit"></i></a>
              <a href="#" class="text-danger" title="supprimer" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a>
              <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Souhaitez-vous vraiment supprimer ce role ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="index.php?action=supression_role&id=<?php echo $id; ?>" class="btn btn-danger">suprimer</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <a href="index.php?page=fiche_role&id=<?php echo $id; ?>" class="link-dark"><?php echo $id; ?></a> 
            </td>
            <td >
              <?php echo $role['nomRole']; ?> 
            </td>
          </tr>
        <?php } ?> 
      </tbody>
    </table>
  </div>
</div>