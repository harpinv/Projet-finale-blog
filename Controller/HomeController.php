<?php

namespace App\Controller;


use App\Model\Manager\administrateurManager;

class HomeController extends AbstractController
{
    /**
     * Permet le listing de tous les utilisateurs.
     * @return void
     */
    public function index()
    {
        $manager = new administrateurManager();
        $this->display('home/index');
    }
}
