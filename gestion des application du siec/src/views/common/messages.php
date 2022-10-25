<?php
$types = [ 'success', 'errors' ];
foreach ($types as $type) {
    if (isset($_SESSION['messages'][$type])) {
        foreach ($_SESSION['messages'][$type] as $message) {
            echo"<div class=\"alert alert-" . ($type === 'success' ? 'success' : 'danger') . "\" role=\"alert\">";
                echo $message;
            echo"</div>";
        }
        unset($_SESSION['messages'][$type]);
    }
}