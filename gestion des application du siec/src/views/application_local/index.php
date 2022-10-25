<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Applications</li>
  </ol>
</nav>
<?php $status= (!empty($_GET['status']) ? $_GET['status'] : 'SORT_ASC');
  $column=(!empty($_GET['column']) ? $_GET['column'] : 'idApplications');
  $limite=(!empty($_GET['limit']) ? $_GET['limit'] : 10); 
  $id=(!empty($_GET['id']) ? $_GET['id'] : 1); ?>
<div class="container">
  <div class="mb-4">
    <a href="index.php?page=ajouter_application&id=0" class="btn btn-success"><i class="fas fa-plus-square"></i> ajouter</a>
    <a href="index.php?action=exporter_application" class="btn btn-secondary" download="application_locale.xlsx"><i class="fas fa-file-download"></i> exporter</a>
    <div class="dropdown">
      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $limite ?>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="index.php?page=applications_locales&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=10">10</a></li>
        <li><a class="dropdown-item" href="index.php?page=applications_locales&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=20">20</a></li>
        <li><a class="dropdown-item" href="index.php?page=applications_locales&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=30">30</a></li>
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
          <th> 
            <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=idApplications&limit=<?php echo $limite ?>">idApplications</i></a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=idApplications&limit=<?php echo $limite ?>">idApplications</i></a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=nomOfficiel&limit=<?php echo $limite ?>">nomOfficiel</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=nomOfficiel&limit=<?php echo $limite ?>">nomOfficiel</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=nomDsi1&limit=<?php echo $limite ?>">nomDsi1</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=nomDsi1&limit=<?php echo $limite ?>">nomDsi1</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=descriptionapplications&limit=<?php echo $limite ?>">descriptionapplications</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=descriptionapplications&limit=<?php echo $limite ?>">descriptionapplications</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=technologis&limit=<?php echo $limite ?>">technologis</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=technologis&limit=<?php echo $limite ?>">technologis</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=annee&limit=<?php echo $limite ?>">annee</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=annee&limit=<?php echo $limite ?>">annee</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=sauvegardes&limit=<?php echo $limite ?>">sauvegardes</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=sauvegardes&limit=<?php echo $limite ?>">sauvegardes</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=rgpd&limit=<?php echo $limite ?>">rgpd</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=rgpd&limit=<?php echo $limite ?>">rgpd</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=enquete&limit=<?php echo $limite ?>">enquete</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=enquete&limit=<?php echo $limite ?>">enquete</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=utilisateur_idutilisateur&limit=<?php echo $limite ?>">utilisateur_idutilisateur</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=utilisateur_idutilisateur&limit=<?php echo $limite ?>">utilisateur_idutilisateur</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=accesBackendProd&limit=<?php echo $limite ?>">accesBackendProd</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=accesBackendProd&limit=<?php echo $limite ?>">accesBackendProd</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=autoDeploiementBackendProd&limit=<?php echo $limite ?>">autoDeploiementBackendProd</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=autoDeploiementBackendProd&limit=<?php echo $limite ?>">autoDeploiementBackendProd</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=depotGitBackend&limit=<?php echo $limite ?>">depotGitBackend</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=depotGitBackend&limit=<?php echo $limite ?>">depotGitBackend</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=serveur_idServeurBackendProd&limit=<?php echo $limite ?>">serveur_idServeurBackendProd</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=serveur_idServeurBackendProd&limit=<?php echo $limite ?>">serveur_idServeurBackendProd</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=accesBackendTest&limit=<?php echo $limite ?>">accesBackendTest</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=accesBackendTest&limit=<?php echo $limite ?>">accesBackendTest</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=autoDeploiementBackendTest&limit=<?php echo $limite ?>">autoDeploiementBackendTest</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=autoDeploiementBackendTest&limit=<?php echo $limite ?>">autoDeploiementBackendTest</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=serveur_idServeurBackendTest&limit=<?php echo $limite ?>">serveur_idServeurBackendTest</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=serveur_idServeurBackendTest&limit=<?php echo $limite ?>">serveur_idServeurBackendTest</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=accesFrontendProd&limit=<?php echo $limite ?>">accesFrontendProd</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=accesFrontendProd&limit=<?php echo $limite ?>">accesFrontendProd</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=autoDeploiementFrontendProd&limit=<?php echo $limite ?>">autoDeploiementFrontendProd</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=autoDeploiementFrontendProd&limit=<?php echo $limite ?>">autoDeploiementFrontendProd</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=depotGitFrontend&limit=<?php echo $limite ?>">depotGitFrontend</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=depotGitFrontend&limit=<?php echo $limite ?>">depotGitFrontend</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=serveur_idServeurFrontendProd&limit=<?php echo $limite ?>">serveur_idServeurFrontendProd</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=serveur_idServeurFrontendProd&limit=<?php echo $limite ?>">serveur_idServeurFrontendProd</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=accesFrontendTest&limit=<?php echo $limite ?>">accesFrontendTest</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=accesFrontendTest&limit=<?php echo $limite ?>">accesFrontendTest</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=autoDeploiementFrontendTest&limit=<?php echo $limite ?>">autoDeploiementFrontendTest</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=autoDeploiementFrontendTest&limit=<?php echo $limite ?>">autoDeploiementFrontendTest</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=serveur_idServeurFrontendTest&limit=<?php echo $limite ?>">serveur_idServeurFrontendTest</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=serveur_idServeurFrontendTest&limit=<?php echo $limite ?>">serveur_idServeurFrontendTest</a> 
            <?php } ?>
          </th>
          <th>
          <?php if ($status=='SORT_DESC') { ?>
            <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_ASC&column=enqueteAPrevoir&limit=<?php echo $limite ?>">enqueteAPrevoir</a> 
            <?php } else { ?>
              <a href="index.php?page=applications_locales&id=<?php echo $id ?>&status=SORT_DESC&column=enqueteAPrevoir&limit=<?php echo $limite ?>">enqueteAPrevoir</a> 
            <?php } ?>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $comp=0;
        foreach ($applicationsLocales as $application) {
          /*if ($comp>=$limite) {
            break;
          }*/?>
          <tr >
            <?php $id=$application['idApplications']; ?>
            <td>
              <a href="index.php?page=ajouter_application&id=<?php echo $id; ?>" class="text-primary" title="Modifier"><i class="fas fa-edit"></i></a>
              <a href="#" class="text-danger" title="supprimer" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a>
              <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Souhaitez-vous vraiment supprimer cette application ?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="index.php?action=supression_appli&id=<?php echo $id; ?>" class="btn btn-danger">suprimer</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>
              <a href="index.php?page=fiche_appli&id=<?php echo $id; ?>&nom=index" class="link-dark"><?php echo $id; ?></a> 
            </td>
            <td>
              <?php echo $application['nomOfficiel']; ?> 
            </td>
            <td>
              <?php echo $application['nomDsi1']; ?> 
            </td>
            <td>
              <?php echo $application['descriptionapplications']; ?> 
            </td>
            <td>
              <?php echo $application['technologis']; ?> 
            </td>
            <td>
              <?php echo $application['annee']; ?> 
            </td>
            <td>
              <?php echo $application['sauvegardes']; ?> 
            </td>
            <td>
              <?php echo $application['rgpd']; ?> 
            </td>
            <td>
              <?php echo $application['enquete']; ?> 
            </td>
            <td>
              <?php 
                echo $application['prenomUtilisateur'];
                ?> 
            </td>
            <td>
              <?php echo $application['accesBackendProd']; ?> 
            </td>
            <td>
              <?php echo $application['autoDeploiementBackendProd']; ?> 
            </td>
            <td>
              <?php echo $application['depotGitBackend']; ?> 
            </td>
            <td>
              <?php 
                echo $application['nomsbp'];
              ?>
            </td>
            <td>
              <?php echo $application['accesBackendTest']; ?> 
            </td>
            <td>
              <?php echo $application['autoDeploiementBackendTest']; ?> 
            </td>
            <td>
            <?php 
                echo $application['nomsbt'];
              ?>
            </td>
            <td>
              <?php echo $application['accesFrontendProd']; ?> 
            </td>
            <td>
              <?php echo $application['autoDeploiementFrontendProd']; ?> 
            </td>
            <td>
              <?php echo $application['depotGitFrontend']; ?> 
            </td>
            <td>
            <?php 
                echo $application['nomsfp'];
              ?>
            </td>
            <td>
              <?php echo $application['accesFrontendTest']; ?> 
            </td>
            <td>
              <?php echo $application['autoDeploiementFrontendTest']; ?> 
            </td>
            <td>
            <?php 
                echo $application['nomsft'];
              ?>
            </td>
            <td>
              <?php echo $application['enqueteAPrevoir']; ?> 
            </td>
          </tr>
          <?php $comp=$comp+1;
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
    if ($id==1) { ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" id="1" data-toggle="tab" href="index.php?page=applications_locales&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">1</a></li>
          <li class="page-item"><a class="page-link" id="2" data-toggle="tab" href="index.php?page=applications_locales&id=2&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">2</a></li>
          <li class="page-item"><a class="page-link" id="..." data-toggle="tab" href="#"  role="tab" aria-controls="delete" aria-selected="true">...</a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages-1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$nbpages-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages-1 ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$nbpages ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id+1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$id+1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">suivant</a></li>
        </ul>
      </nav>
    <?php } elseif($id==$nbpages) {?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" id="<?php echo$id-1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$id-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">précédent</a></li>
          <li class="page-item"><a class="page-link" id="1" data-toggle="tab" href="index.php?page=applications_locales&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">1</a></li>
          <li class="page-item"><a class="page-link" id="2" data-toggle="tab" href="index.php?page=applications_locales&id=2&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">2</a></li>
          <li class="page-item"><a class="page-link" id="..." data-toggle="tab" href="#"  role="tab" aria-controls="delete" aria-selected="true">...</a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages-1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$nbpages-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages-1 ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$nbpages ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages ?></a></li>
        </ul>
      </nav>
    <?php } else { ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
        <li class="page-item"><a class="page-link" id="<?php echo$id-1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$id-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">précédent</a></li>
          <li class="page-item"><a class="page-link" id="1" data-toggle="tab" href="index.php?page=applications_locales&id=1&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">1</a></li>
          <li class="page-item"><a class="page-link" id="2" data-toggle="tab" href="index.php?page=applications_locales&id=2&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">2</a></li>
          <li class="page-item"><a class="page-link" id="..." data-toggle="tab" href="#"  role="tab" aria-controls="delete" aria-selected="true">...</a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id-1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$id-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$id-1 ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$id ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$id ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id+1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$id+1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$id+1 ?></a></li>
          <li class="page-item"><a class="page-link" id="..." data-toggle="tab" href="#"  role="tab" aria-controls="delete" aria-selected="true">...</a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages-1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$nbpages-1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages-1 ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$nbpages ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$nbpages ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$nbpages ?></a></li>
          <li class="page-item"><a class="page-link" id="<?php echo$id+1 ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$id+1 ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true">suivant</a></li>
        </ul>
      </nav>
    <?php } ?>
  <?php } else { ?>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <?php for ($e=1; $e<=$nbpages; $e=$e+1){ ?>
          <li class="page-item"><a class="page-link" id="<?php echo$e ?>" data-toggle="tab" href="index.php?page=applications_locales&id=<?php echo$e ?>&status=<?php echo $status ?>&column=<?php echo $column ?>&limit=<?php echo $limite ?>"  role="tab" aria-controls="delete" aria-selected="true"><?php echo$e ?></a></li>
        <?php } ?>
      </ul>
    </nav>
  <?php }
  ?>
</div>