<?php

use App\Model\Entity\article;

//We import the header.
require_once dirname(__FILE__) . '/header.php';
?>
<h1>Article</h1>
<div id="article">
    <?php
    foreach($params['articles'] as $article) {
    /* @var article $article */
    //Article information is displayed in h2 (for titles) and in paragraphs.
    ?>
    <div class="bloc">
        <h2><?= $article->getTitre() ?></h2>
        <p><?= $article->getResume() ?></p>
        <p><?= $article->getDate() ?></p>
        <form method='post' action='/texte' class="lire">
            <input type='text' name='id' class="numero" value='<?= $article->getId() ?>'>
            <input type='submit' name='submit' class='bouton' value='Lire cette article'>
        </form>
        <div class="changer">
            <?php
            //We store the delete button and the modify button in a variable.
            $element = " 
                    <form method='post' action='/modifie'>
                        <input type='text' name='id' class='numero' value='" .  $article->getId() . "'>
                        <input type='submit' name='submit' class='bouton' value='Modifier'>
                    </form>
                    <form method='post' action='/deleteArticle'>
                        <input type='text' name='id' class='numero' value='" . $article->getId() . "'>
                        <input type='submit' name='submit' class='bouton' value='Supprimer'>
                    </form>
            ";

            //We invoke the logout() function to make the delete button and the edit button appear only to the administrator.
            $admin = new \App\Controller\LoginController();
            $admin->logout($element);
            ?>
        </div>
    </div>
        <?php
    } ?>
</div>
<div class="commentaire">
    <?php
    //We store the "write an article" button in a variable.
    $element = "
            <button class='bouton'><a class='lien' href='/ecrireArticle'>Ecrire un article</a></button>
    ";

    //We invoke the logout() function to make the "write an article" button appear only to the administrator.
    $ecrit = new \App\Controller\LoginController();
    $ecrit->logout($element);
    ?>
</div>
