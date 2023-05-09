<?php

namespace App\Controller;

use App\Model\DB;
use App\Model\Manager\articleManager;

class articleController extends AbstractController
{
    /**
     * Allows you to go to the article page.
     * @return void
     */
    public function index()
    {
        $manager = new articleManager();
        $this->display('user/article', [
            'articles' => $manager->getAll()
        ]);
    }

    /**
     * Allows you to go to the modified page.
     * @return void
     */
    public function index2()
    {
        $manager = new articleManager();
        $this->display('user/modifie', [
            'infos' => $manager->getAll()
        ]);
    }

    /**
     * Allows you to go to the text page.
     * @return void
     */
    public function index3()
    {
        $manager = new articleManager();
        $this->display('user/texte', [
            'texte' => $manager->getAll()
        ]);
    }

    /**
     * Goes to the ewriteArticle page.
     * @return void
     */
    public function index4()
    {
        $manager = new articleManager();
        $this->display('user/ecrireArticle', [
            'ecrire' => $manager->getAll()
        ]);
    }

    //Allows you to control the data before saving to the article table.
    public function nouveau()
    {
        //We check that the data exists.
        if(isset($_POST['titre']) && isset($_POST['resume']) && isset($_POST['text']) && isset($_POST['auteur'])) {
            //It is checked that the data does not exceed the maximum size allowed.
            if(strlen($_POST['titre']) < 151 && strlen($_POST['resume']) < 500 && strlen($_POST['text']) < 1000000 && strlen($_POST['auteur']) < 101) {
                //We create a sanitize function to clean the data.
                function sanitize($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    $data = addslashes($data);
                    return $data;
                }

                try {
                    //We pass the data into the function created previously and store them in variables.
                    $titre = sanitize($_POST['titre']);
                    $resume = sanitize($_POST['resume']);
                    $text = sanitize($_POST['text']);
                    $auteur = sanitize($_POST['auteur']);

                    //We send the data to the manager and we make a redirection to the article page.
                    $article = new articleManager();
                    $article->getArticleById($titre, $resume, $text, $auteur);
                    $this->display('user/article', [
                        'articles' => $article->getAll()
                    ]);
                }
                catch (PDOException $exception) {
                    echo "Erreur de connexion: " . $exception->getMessage();
                }
            } else {
                echo "Erreur: Une des valeurs entrer dépasse la taille maximum autorisé";
            }
        } else {
            echo "Erreur: Une des valeurs entrer n'existe pas";
        }
    }

    //Deletes data from the item table.
    public function supprime()
    {
        try{
            //We send the data identifier to delete to the manager and we make a redirect to the article page.
            $supprime = new articleManager();
            $supprime->getArticleSupprime($_POST['id']);
            $this->display('user/article', [
                'articles' => $supprime->getAll()
            ]);
        }
        catch (PDOException $exception) {
            echo "Erreur de connexion: " . $exception->getMessage();
        }
    }

    //Permet de controler les données modifier avant enregistrement dans la table article.
    public function modifie()
    {
        //We check that the data exists.
        if(isset($_POST['titre']) && isset($_POST['resume']) && isset($_POST['text']) && isset($_POST['auteur'])) {
            //It is checked that the data does not exceed the maximum size allowed.
            if(strlen($_POST['titre']) < 151 && strlen($_POST['resume']) < 500 && strlen($_POST['text']) < 1000000 && strlen($_POST['auteur']) < 101) {
                //We create a sanitize function to clean the data.
                function sanitize($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    $data = addslashes($data);
                    return $data;
                }

                try {
                    //We pass the data into the function created previously and store them in variables.
                    $titre = sanitize($_POST['titre']);
                    $resume = sanitize($_POST['resume']);
                    $text = sanitize($_POST['text']);
                    $auteur = sanitize($_POST['auteur']);

                    //We send the data to the manager and we make a redirection to the article page.
                    $article = new articleManager();
                    $article->getArticleModifie($_POST['id'], $titre, $resume, $text, $auteur);
                    $this->display('user/article', [
                        'articles' => $article->getAll()
                    ]);
                }
                catch (PDOException $exception) {
                    echo "Erreur de connexion: " . $exception->getMessage();
                }
            } else {
                echo "Erreur: Une des valeurs entrer dépasse la taille maximum autorisé";
            }
        } else {
            echo "Erreur: Une des valeurs entrer n'existe pas";
        }
    }
}
