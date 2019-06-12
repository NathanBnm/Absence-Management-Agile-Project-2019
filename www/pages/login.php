<?php

if (isset($_POST['submit'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $errors = [];

    if (empty($username) || empty($password)) {
        $errors['empty'] = "Tous les champs n'ont pas été remplis";
    } else if (user_exist($username, $password) == 0 || user_exist($username, $password) > 1) {
        $errors['user_not_found'] = "Identifiant ou mot de passe incorrect";
    }

    if (empty($errors)) {
        $_SESSION['id'] = $username;
        $_SESSION['rank'] = user_rank($username)['rank']->CAT_CODE;

        var_dump(user_rank($username)['rank']->CAT_CODE);
        var_dump($_SESSION);

        header("Location:index.php?page=dashboard");
        exit;
    }
}

?>

<section class="hero is-dark is-fullheight">
    <div class="logo">
        <img src="../img/logoiut.png" alt="Logo">
    </div>
    <div class="hero-body">
        <div class="container">
            <section class="hero">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title bleu">
                            Espace étudiant
                        </h1>
                        <h2 class="subtitle">
                            Gestion des absences
                        </h2>
                    </div>
                </div>
            </section>
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
                require 'forms/login.form.php';
                ?>
                </div>
            </div>
            <div class="hero-body">
                <div class="container">
                </div>
            </div>
        </div>
</section>