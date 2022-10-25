<?php
namespace App\Controller;

abstract class AbstractController
{
    public function common()
    {
        require_once(ROOT_PATH . 'src' . DIRECTORY_SEPARATOR . 'views/common' . DIRECTORY_SEPARATOR . 'menu_admin.php');
    }
}