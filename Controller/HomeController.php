<?php

namespace App\Controller;

use App\Model\Manager\administrateurManager;

class HomeController extends AbstractController
{
    /**
     * Allows the listing of all users.
     * @return void
     */
    public function index()
    {
        $manager = new administrateurManager();
        $this->display('home/index');
    }
}
