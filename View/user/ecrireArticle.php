<?php
//We check that the session variables exist.
if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['identifients']) && isset($_SESSION['password'])) {
    //We import the header.
    require_once dirname(__FILE__) . '/header.php';
    ?>
    <div class="nouveau">
        <h1>Nouvelle article</h1>
        <form method="post" action="/enregistreArticle">
            <div class="critere">
                <input type="text" name="titre" class="infos" placeholder="Titre">
            </div>
            <div class="critere">
                <textarea name="resume" class="infos" placeholder="Résumé"></textarea>
            </div>
            <div class="critere">
                <textarea name="text" class="infos" placeholder="Text"></textarea>
            </div>
            <div class="critere">
                <input type="text" name="auteur" class="infos" placeholder="Auteur">
            </div>
            <div class="critere">
                <input type="submit" name="submit" class="bouton" value="Enregistrer">
            </div>
        </form>
    </div>
    <?php
} else {
    echo "Erreur 404";
}
?>
