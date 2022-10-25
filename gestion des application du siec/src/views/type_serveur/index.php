
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">type serveur</li>
  </ol>
</nav>
<div class="container">
  <div class="mb-4">
    <a href="index.php?page=ajouter_type&id=0" class="btn btn-success"><i class="fas fa-plus-square"></i> ajouter</a>
    <a href="index.php?action=exporter_type" class="btn btn-secondary" download="type.xlsx"><i class="fas fa-file-download"></i> exporter</a>
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
            <a href="index.php?page=type_serveurs&status=SORT_ASC&column=idType">idtype</a> 
            <?php } else { ?>
              <a href="index.php?page=type_serveurs&status=SORT_DESC&column=idType">idtype</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=type_serveurs&status=SORT_ASC&column=nomType">nom</a> 
            <?php } else { ?>
              <a href="index.php?page=type_serveurs&status=SORT_DESC&column=nomType">nom</a> 
            <?php } ?>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($types as $type) { ?>
          <tr >
          <?php $id=$type['idType']; ?>
            <td >
              <a href="index.php?page=ajouter_type&id=<?php echo $id; ?>" class="text-primary" title="modifier"><i class="fas fa-edit"></i></a>
              <a href="#" class="text-danger" title="supprimer" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a>
              <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Souhaitez-vous vraiment supprimer ce type ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="index.php?action=supression_type&id=<?php echo $id; ?>" class="btn btn-danger">suprimer</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <a href="index.php?page=fiche_type&id=<?php echo $id; ?>" class="link-dark"><?php echo $id; ?></a> 
            </td>
            <td >
              <?php echo $type['nomType']; ?> 
            </td>
          </tr>
        <?php } ?> 
      </tbody>
    </table>
  </div>
</div>