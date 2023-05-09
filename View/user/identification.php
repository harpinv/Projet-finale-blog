<?php
//We import the header.
require_once dirname(__FILE__) . '/header.php';
?>
<div class="nouveau">
    <h1>Identification</h1>
    <form method="post" action="/controle">
        <div class="critere">
            <input type="text" name="identifients" class="infos" placeholder="Identifient">
        </div>
        <div class="critere">
            <input type="text" name="password" class="infos" placeholder="Mot de passe">
        </div>
        <div class="critere">
            <input type="submit" name="submit" class="bouton" value="Valider">
        </div>
    </form>
</div>
