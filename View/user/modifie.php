<?php
use App\Model\Entity\article;

//We check that the session variables exist.
if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['identifients']) && isset($_SESSION['password'])) {
    //We import the header.
    require_once dirname(__FILE__) . '/header.php';
    ?>

    <div class="nouveau">
        <?php
        foreach ($params['infos'] as $article) {
            /* @var article $article */
            if ($article->getId() == $_POST['id']) {
                //We retrieve a row from the table and display the information in the form.
                ?>
                <h1>Modification article</h1>
                <form method="post" action="/modifieArticle">
                    <input type="text" name="id" class="numero" value="<?= $article->getId() ?>">
                    <div class="critere">
                        <input type="text" name="titre" class="infos" placeholder="Titre" value="<?= $article->getTitre() ?>">
                    </div>
                    <div class="critere">
                        <input type="text" name="resume" class="infos" placeholder="Résumé" value="<?= $article->getResume() ?>">
                    </div>
                    <div class="critere">
                        <input type="text" name="text" class="infos" placeholder="Text" value="<?= $article->getText() ?>">
                    </div>
                    <div class="critere">
                        <input type="text" name="auteur" class="infos" placeholder="Auteur" value="<?= $article->getAuteur() ?>">
                    </div>
                    <div class="critere">
                        <input type="submit" name="submit" class="bouton" value="Enregistrer">
                    </div>
                </form>
                <?php
            }
        } ?>
    </div>
    <?php
} else {
    echo "Erreur 404";
}
?>
