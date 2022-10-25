<?php
function isGranted($role = null, $stop = true)
{
    if (isset($_SESSION['user']) && (empty($role) || $_SESSION['user']['roleUtilisateur'] === $role)) {
        return true;
    }

    if ($stop) {
        if (!isset($_SESSION['user'])) {
            $_SESSION['messages']['errors'][] = 'Veuillez vous connecter';
            header("Location: index.php");
        } else {
            http_response_code(403);
        }
        exit;
    }

    return false;
}