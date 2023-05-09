<?php
session_start();

use App\Model\Entity\administrateur;
//We check that all the information in the form exists.
if(isset($_POST['identifients']) && isset($_POST['password'])) {
    foreach ($params['controle'] as $administrateur) {
        /* @var administrateur $administrateur */
        if($administrateur->getIdentifients() == $_POST['identifients'] && $administrateur->getPassword() == $_POST['password']) {
            //We create a one-day session that takes as a variable the identifier, the password, the name and the firstname.
            $timeOfSession = time() + (60 * 60 * 24);

            setcookie(session_name(), session_id(), $timeOfSession);

            $_SESSION['nom'] = $administrateur->getNom();
            $_SESSION['prenom'] = $administrateur->getPrenom();
            $_SESSION['identifients'] = $_POST['identifients'];
            $_SESSION['password'] = $_POST['password'];

            //We make a relocation to the home page.
            header ('location: /home');
        } else {
            //In case of incorrect username or passwords, we make a relocation to an error page.
            header ('location: /erreur');
        }
    }
} else {
    echo "Erreur: Une des valeurs n'existe pas";
}