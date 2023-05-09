<?php
use App\Model\Entity\message;
//We import the header.
require_once dirname(__FILE__) . '/header.php';
?>
<h1>Commentaire</h1>
<div class="commentaire">
    <div>
        <?php
        foreach($params['messages'] as $message) {
            /* @var message $message */
            if ($message->getFkArticle() == $_POST['id']) {
                //The information from a row of the table of articles is displayed in paragraphs.
                ?>
                <div class="message">
                    <p><?= $message->getNom() . " " . $message->getPrenom() ?></p>
                    <p><?= $message->getDate() ?></p>
                    <p><?= $message->getTexte() ?></p>
                    <div>
                        <?php
                        //We store the delete button in a variable.
                        $element = " 
                            <form method='post' action='/deleteMessage'>
                                <input type='text' name='id' class='numero' value='" . $message->getId() . "'>
                                <input type='submit' name='submit' class='bouton' value='Supprimer'>
                            </form>
                            ";

                        //We invoke the logout() function to make the delete button appear only to the administrator.
                        $commentaire = new \App\Controller\LoginController();
                        $commentaire->logout($element);
                        ?>
                    </div>
                </div>
                <?php
            }
        }?>
    </div>
    <div class="nouveau">
        <h2>Ecrire un commentaire</h2>
        <form method="post" action="/enregistre">
            <div class="critere">
                <input type="text" name="nom" class="infos" placeholder="Nom">
            </div>
            <div class="critere">
                <input type="text" name="prenom" class="infos" placeholder="Prénom">
            </div>
            <div class="critere">
                <input type="text" name="texte" class="infos" placeholder="Texte">
            </div>
            <input type="text" name="fkArticle" class="numero" value="<?= $_POST['id'] ?>">
            <div>
                <input type="submit" name="submit" class="bouton" value="Valider">
            </div>
        </form>
    </div>
</div>
