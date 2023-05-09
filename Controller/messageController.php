<?php

namespace App\Controller;


use App\Model\Manager\messageManager;

class messageController extends AbstractController
{
    /**
     * Goes to the message page.
     * @return void
     */
    public function index()
    {
        $manager = new messageManager();
        $this->display('user/message', [
            'messages' => $manager->getAll()
        ]);
    }

    //Allows you to control data before saving to the message table.
    public function nouveau()
    {
        //We check that the data exists.
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['texte']) && $_POST['fkArticle']) {
            //It is checked that the data does not exceed the maximum size allowed.
            if(strlen($_POST['nom']) < 101 && strlen($_POST['prenom']) < 101 && strlen($_POST['texte']) < 1000000 && strlen($_POST['fkArticle']) < 10000) {
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
                    $nom = sanitize($_POST['nom']);
                    $prenom = sanitize($_POST['prenom']);
                    $texte = sanitize($_POST['texte']);
                    $fkArticle = sanitize($_POST['fkArticle']);

                    //We send the data to the manager and we make a redirection to the home page.
                    $article = new messageManager();
                    $article->getMessageById($nom, $prenom, $texte, $fkArticle);
                    $this->display('home/index', [
                        'messages' => $article->getAll()
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

    //Deletes data from the message table.
    public function supprime()
    {
        try{
            //We send the data identifier to delete to the manager and we make a redirection to the message page.
            $supprime = new messageManager();
            $supprime->getMessageSupprime($_POST['id']);
            $this->display('user/message', [
                'messages' => $supprime->getAll()
            ]);
        }
        catch (PDOException $exception) {
            echo "Erreur de connexion: " . $exception->getMessage();
        }
    }
}
