<?php

namespace App\Controller;

class LoginController extends AbstractController
{
    //Allows certain items to appear when a session is opened.
    public function logout($element)
    {
        if (isset($_SESSION["nom"]) && isset($_SESSION["prenom"]) && isset($_SESSION["identifients"]) && isset($_SESSION["password"])) {
            echo $element;
        }
    }

    //Allows you to disconnect in the menu when a session is open and connect when it is not.
    public function connexion($connect, $deconnect)
    {
        if (isset($_SESSION["nom"]) && isset($_SESSION["prenom"]) && isset($_SESSION["identifients"]) && isset($_SESSION["password"])) {
            echo $deconnect;
        } else {
            echo $connect;
        }
    }
}
