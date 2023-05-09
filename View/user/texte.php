<?php
//We import the header.
use App\Model\Entity\article;
require_once dirname(__FILE__) . '/header.php';
?>
<div class="texte">
    <?php
    foreach($params['texte'] as $article) {
        /* @var article $article */
        if ($article->getId() == $_POST['id']) {
            //Message information is displayed in paragraphs.
            ?>
            <div>
                <h1><?= $article->getTitre() ?></h1>
                <p><?= $article->getText() ?></p>
                <p><?= $article->getAuteur() ?></p>
            </div>
            <?php
        }
    } ?>
    <form method="post" action="/message">
        <input type="text" name="id" class="numero" value="<?= $_POST['id'] ?>">
        <input type="submit" name="submit" class="bouton" value="Commentaire">
    </form>
</div>
