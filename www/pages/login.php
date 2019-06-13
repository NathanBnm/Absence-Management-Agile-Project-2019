<?php

if (isset($_POST['submit'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $rang = htmlspecialchars(trim($_POST['rang']));
    $errors = [];

    if (empty($username) || empty($password)) {
        $errors['empty'] = "Tous les champs n'ont pas été remplis";
    } else if (user_exist($username, $password, $rang) == 0 || user_exist($username, $password, $rang) > 1) {
        $errors['user_not_found'] = "Identifiant ou mot de passe incorrect";
        mail("nathan.chavas@gmail.com", "TEST", "test du mail");
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



<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <a class="navbar-item">
                Documentation
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    More
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        About
                    </a>
                    <a class="navbar-item">
                        Jobs
                    </a>
                    <a class="navbar-item">
                        Contact
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item">
                        Report an issue
                    </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-light">
                        Log in
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>



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
                } else
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