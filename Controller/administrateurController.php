<?php

namespace App\Controller;

use App\Model\Manager\administrateurManager;

class administrateurController extends AbstractController
{
    /**
     * Allows you to go to the identification page.
     * @return void
     */
    public function index()
    {
        $manager = new administrateurManager();
        $this->display('user/identification', [
            'administrateurs' => $manager->getAll()
        ]);
    }

    /**
     * Allows you to go to the control page.
     * @return void
     */
    public function index2()
    {
        $manager = new administrateurManager();
        $this->display('user/controle', [
            'controle' => $manager->getAll()
        ]);
    }

    /**
     * Goes to the error page.
     * @return void
     */
    public function index3()
    {
        $manager = new administrateurManager();
        $this->display('user/erreur', [
            'erreur' => $manager->getAll()
        ]);
    }

    /**
     * Allows you to destroy a session.
     * @return void
     */
    public function index4()
    {
        //An open session is destroyed using three functions
        session_unset ();

        session_destroy ();

        $manager = new administrateurManager();
        $this->display('home/index', [
            'session' => $manager->getAll()
        ]);
    }
}
