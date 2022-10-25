<?php
if (!empty($action)) {
    switch ($action) {
        case 'login':
        case 'logout':
            break;
        case 'ajout_appli':
        case 'ajout_serveur':
        case 'supression_serveur':
        case 'modification_serveur':
        case 'supression_appli':
        case 'modification_appli':
        case 'ajout_reseau':
        case 'ajout_type':
        case 'supression_reseau':
        case 'modification_reseau':
        case 'supression_type':
        case 'modification_type':
        case 'exporter_application':
        case 'exporter_type':
        case 'exporter_reseau':
        case 'exporter_serveur':
            isGranted();
            break;
        case 'ajout_utilisateur':
        case 'modification_utilisateur':
        case 'supression_utilisateur':
        case 'ajout_role':
        case 'modification_role':
        case 'supression_role':
        case 'exporter_utilisateur':
        case 'exporter_role':
            isGranted('1');
            break;
        default:
            isGranted('1');
    }
}

if (!empty($page)) {
    switch ($page) {
        case 'applications_locales':
        case 'serveurs':
        case 'ajouter_application':
        case 'ajouter_serveur':
        case 'supprimer_serveur':
        case 'fiche_serveur':
        case 'supprimer_appli':
        case 'fiche_appli':
        case 'fiche_utilisateur':
        case 'reseaus':
        case 'type_serveurs':
        case 'ajouter_reseau':
        case 'ajouter_type':
        case 'supprimer_reseau':
        case 'supprimer_type':
        case 'fiche_reseau':
        case 'fiche_type':
            isGranted();
            break;
        case 'utilisateurs':
        case 'ajouter_utilisateur':
        case 'supprimer_utilisateur':
        case 'role':
        case 'ajouter_role':
        case 'supprimer_role':
        case 'fiche_role':
            isGranted('1');
            break;
        default:
            isGranted('1');
    }
}