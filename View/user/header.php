<header>
    <p class="normal"><a href="/home" title="Accueil" class="lien">Accueil</a></p>
    <p class="normal"><a href="/article" title="Article" class="lien">Article</a></p>
    <?php
    //We store the "connect" button in a variable.
    $connect = "
           <p class='normal'><a href='/identification' title='identification' class='lien'>Se connecter</a></p>
    ";

    //We store the "disconnect" button in a variable.
    $deconnect = "
           <p class='normal'><a href='/session' title='identification' class='lien'>Se déconnecter</a></p>
    ";

    //The connexion() function is invoked to make the "log out" button appear only to the administrator and the "connect" button only to users.
    $admin = new \App\Controller\LoginController();
    $admin->connexion($connect, $deconnect);
    ?>
    <div id="menu">
        <div class="bande"></div>
        <div class="bande"></div>
        <div class="bande"></div>
    </div>
</header>
<div id="liste">
    <p id="ferme"><a>x</a></p>
    <p class="scripte"><a href="/home" title="Accueil" class="lien">Accueil</a></p>
    <p class="scripte"><a href="/article" title="Article" class="lien">Article</a></p>
    <?php
    //We store the "connect" button in a variable.
    $connect = "
           <p class='scripte'><a href='/identification' title='identification' class='lien'>Se connecter</a></p>
    ";

    //We store the "disconnect" button in a variable.
    $deconnect = "
           <p class='scripte'><a href='/session' title='identification' class='lien'>Se déconnecter</a></p>
    ";

    //The connexion() function is invoked to make the "log out" button appear only to the administrator and the "connect" button only to users.
    $admin = new \App\Controller\LoginController();
    $admin->connexion($connect, $deconnect);
    ?>
</div>
