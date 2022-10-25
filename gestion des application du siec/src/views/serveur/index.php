
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">serveur</li>
  </ol>
</nav>
<div class="container">
  <?php $status= (!empty($_GET['status']) ? $_GET['status'] : SORT_ASC);
  $column=(!empty($_GET['column']) ? $_GET['column'] : 'idServeur');
  $limite=(!empty($_GET['limit']) ? $_GET['limit'] : 10); 
  $id=(!empty($_GET['id']) ? $_GET['id'] : 1); ?>
  <div class="mb-4">
    <a href="index.php?page=ajouter_serveur&id=0" class="btn btn-success"><i class="fas fa-plus-square"></i>ajouter</a>
    <a href="index.php?action=exporter_serveur" class="btn btn-secondary" download="serveur.xlsx"><i class="fas fa-file-download"></i> exporter</a>
    <div class="dropdown">
      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $limite ?>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="index.php?page=serveurs&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=10">10</a></li>
        <li><a class="dropdown-item" href="index.php?page=serveurs&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=20">20</a></li>
        <li><a class="dropdown-item" href="index.php?page=serveurs&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=30">30</a></li>
      </ul>
    </div>
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
            <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_ASC&column=idServeur&limit=<?php echo $limite ?>">idServeur</a> 
            <?php } else { ?>
              <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_DESC&column=idServeur&limit=<?php echo $limite ?>">idServeur</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_ASC&column=nom&limit=<?php echo $limite ?>">nom</a> 
            <?php } else { ?>
              <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_DESC&column=nom&limit=<?php echo $limite ?>">nom</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_ASC&column=ipServeur&limit=<?php echo $limite ?>">ipServeur</a> 
            <?php } else { ?>
              <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_DESC&column=ipServeur&limit=<?php echo $limite ?>">ipServeur</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_ASC&column=reseau&limit=<?php echo $limite ?>">reseau</a> 
            <?php } else { ?>
              <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_DESC&column=reseau&limit=<?php echo $limite ?>">reseau</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_ASC&column=os&limit=<?php echo $limite ?>">os</a> 
            <?php } else { ?>
              <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_DESC&column=os&limit=<?php echo $limite ?>">os</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_ASC&column=typeServeur&limit=<?php echo $limite ?>">typeServeur</a> 
            <?php } else { ?>
              <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_DESC&column=typeServeur&limit=<?php echo $limite ?>">typeServeur</a> 
            <?php } ?>
          </th>
          <th >
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_ASC&column=commentaire&limit=<?php echo $limite ?>">commentaire</a> 
            <?php } else { ?>
              <a href="index.php?page=serveurs&id=<?php echo $id ?>&status=SORT_DESC&column=commentaire&limit=<?php echo $limite ?>">commentaire</a> 
            <?php } ?>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach ($serveurs as $serveur) { 
          ?>
          <tr >
            <?php $id=$serveur['idServeur']; ?>
              <td >
                <a href="index.php?page=ajouter_serveur&id=<?php echo $id; ?>" class="text-primary" title="modifier"><i class="fas fa-edit"></i></a>
                <a href="#" class="text-danger" title="supprimer" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a>
                <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Souhaitez-vous vraiment supprimer ce serveur ?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="index.php?action=supression_serveur&id=<?php echo $id; ?>" class="btn btn-danger">suprimer</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <a href="index.php?page=fiche_serveur&id=<?php echo $id; ?>" class="link-dark"><?php echo $id; ?></a> 
              </td>
              <td >
                <?php echo $serveur['nom']; ?> 
              </td>
              <td >
                <?php echo $serveur['ipServeur']; ?> 
              </td>
              <td >
                <?php 
                  echo $serveur['nomReseau'];
                ?> 
              </td>
              <td >
                <?php echo $serveur['os']; ?>
              </td>
              <td >
                <?php 
                  echo $serveur['nomType'];
                ?>
              </td>
              <td >
                <?php echo $serveur['commentaire']; ?>
              </td>
          </tr>
          <?php 
        } ?> 
      </tbody>
    </table>
  </div>
  <?php $i=1; 
  $nbpages=1;
  foreach ($ids as $id){
    if ($i==$limite){
      $nbpages=$nbpages+1;
      $i=1;
    }
    $i=$i+1;
  }

  if ($nbpages>10){ 
    $id=(!empty($_GET['id']) ? $_GET['id'] : 1); 
    if ($id==1) { ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" id="1" data-toggle="tab" href="index.php?page=serveurs&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">1</a></li>
          <li class="page-item"><a class="page-link" id="2" data-toggle="tab" href="index.php?page=serveurs&id=2&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">2</a></li>
          <li class="page-item"><a class="page-link" id="..." data-toggle="tab" href="#"  role="tab" aria-controls="delete" aria-selected="true">...</a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages-1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$nbpages-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages-1 ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$nbpages ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id+1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$id+1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">suivant</a></li>
        </ul>
      </nav>
    <?php } elseif($id==$nbpages) {?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" id="<?php echo$id-1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$id-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">précédent</a></li>
          <li class="page-item"><a class="page-link" id="1" data-toggle="tab" href="index.php?page=serveurs&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">1</a></li>
          <li class="page-item"><a class="page-link" id="2" data-toggle="tab" href="index.php?page=serveurs&id=2&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">2</a></li>
          <li class="page-item"><a class="page-link" id="..." data-toggle="tab" href="#"  role="tab" aria-controls="delete" aria-selected="true">...</a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages-1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$nbpages-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages-1 ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$nbpages ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages ?></a></li>
        </ul>
      </nav>
    <?php } else { ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" id="<?php echo$id-1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$id-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">précédent</a></li>
          <li class="page-item"><a class="page-link" id="1" data-toggle="tab" href="index.php?page=serveurs&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">1</a></li>
          <li class="page-item"><a class="page-link" id="2" data-toggle="tab" href="index.php?page=serveurs&id=2&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">2</a></li>
          <li class="page-item"><a class="page-link" id="..." data-toggle="tab" href="#"  role="tab" aria-controls="delete" aria-selected="true">...</a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id-1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$id-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$id-1 ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$id ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$id ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id+1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$id+1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$id+1 ?></a></li>
          <li class="page-item"><a class="page-link" id="..." data-toggle="tab" href="#"  role="tab" aria-controls="delete" aria-selected="true">...</a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages-1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$nbpages-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages-1 ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$nbpages ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id+1 ?>" data-toggle="tab" href="index.php?page=serveurs&id=<?php echo$id+1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">suivant</a></li>
        </ul>
      </nav>
    <?php } ?>
  <?php } else { ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php for ($e=1; $e<=$nbpages; $e=$e+1){ ?>
          <li class="page-item"><a class="page-link" href="index.php?page=serveurs&id=<?php echo$e ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"><?php echo$e ?></a></li>
        <?php } ?>
      </ul>
    </nav>
  <?php }
  ?>
</div>