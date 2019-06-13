<?php

function envoie($mail){

    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
    {
        $passage_ligne = "\r\n";
    }
    else
    {
        $passage_ligne = "\n";
    }


    $message_txt = "Vous êtes notifié car une connexion incorrecte a été effectuée.";
    $message_html = "<html><head></head><body><b>Vous êtes notifié</b> car une connexion <b>incorrecte</b> a été effectuée.</body></html>";

    $boundary = "-----=" . md5(rand());

    $sujet = "Absence";

    $header = "From: \"EXPEDITEUR\"noreply@unicaen.fr".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message .= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message .= $passage_ligne.$message_txt.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    //=====Ajout du message au format HTML
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    //==========
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    //==========

    mail($mail,$sujet,$message,$header);
}

if (isset($_POST['submit'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $rang = htmlspecialchars(trim($_POST['rang']));
    $errors = [];

    if (empty($username) || empty($password)) {
        $errors['empty'] = "Tous les champs n'ont pas été remplis";
    } else if (user_exist($username, $password, $rang) == 0 || user_exist($username, $password, $rang) > 1) {
        $errors['user_not_found'] = "Identifiant ou mot de passe incorrect";
        envoie("nathan.chavas@gmail.com");
    }

    if (empty($errors)) {
        $_SESSION['id'] = $username;
        $_SESSION['rank'] = user_rank($username)['rank']->CAT_CODE;
        $_SESSION['firstname'] = user_firstname($username)['firstname']->UTI_PRENOM;
        $_SESSION['lastname'] = user_lastname($username)['lastname']->UTI_NOM;
        header("Location:index.php?page=dashboard");
        exit;
    }
}

?>


<section class="hero is-dark is-fullheight">
    <div class="hero-body">
        <div class="container">
            <h1 class="title bleu">
                Espace étudiant
            </h1>
            <h2 class="subtitle">
                Gestion des absences
            </h2>
            <div class="column is-6 is-offset-3">
                <nav class="tabs is-fullwidth is-boxed is-medium">
                    <ul>
                        <li class="tab is-active" data-tab="etudiant">
                            <a href="#"><span class="icon "><i class="fas fa-user-graduate"></i>&nbsp;Étudiant</span></a>
                        </li>
                        <li class="tab" data-tab="enseignant">
                            <a href="#"><span class="icon"><i class="fas fa-user"></i>&nbsp;Enseignant</span></a>
                        </li>
                        <li class="tab" data-tab="directeur">
                            <a href="#"><span class="icon"><i class="fas fa-user-tie"></i>&nbsp;Directeur</span></a>
                        </li>
                    </ul>
                </nav>
                <div class="box border-radius-bottom has-text-centered">
                    <h1 class="title has-text-weight-bold uppercase bleu">Se connecter</h1>
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            ?>
                            <article class="message is-danger">
                                <div class="message-body">
                                    <?php echo $error; ?>
                                </div>
                            </article>
                        <?php
                    }
                }
                ?>
                    <div class="stroke-line is-center"></div>
                    <?php
                    require 'includes/forms/login.form.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <img class="logo" src="../img/logoiut.png" alt="Logo">
</section>