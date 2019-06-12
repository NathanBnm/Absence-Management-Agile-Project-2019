<?php

if (isset($_POST['submit'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $errors = [];

    if(empty($username) || empty($password)) {
        $errors['empty'] = "Tous les champs n'ont pas été remplis";
    }
    else if(user_exist($username, $password) == 0 || user_exist($username, $password) > 1) {
        $errors['user_not_found'] = "Identifiant ou mot de passe incorrect";
    }

    if(!empty($errors)){
        foreach($errors as $error) {
            echo "<p>".$error."</p>";
        }
    }
    else {
        $_SESSION['id'] = $username;
        $_SESSION['rank'] = user_rank($username)['rank']->CAT_CODE;
        header("Location:index.php?page=dashboard");
        exit;
    }
}

?>

<section class="hero is-success is-primary has-background-grey-darker is-fullheight">
    <div class="hero-body has-text-centered">
        <div class="container hero-body">
            <div class="column is-6 is-offset-3">
                <nav class="tabs is-fullwidth is-boxed is-medium">
                    <ul>
                        <li class="tab is-active" onclick="openTab('Etudiant')">
                            <a>
                                <span class="icon "><i class="fas fa-user-graduate"></i>&nbsp;Étudiant</span>
                            </a>
                        </li>
                        <li class="tab" onclick="openTab('Professeur')">
                            <a>
                                <span class="icon"><i class="fas fa-user"></i>&nbsp;Enseignant</span>
                            </a>
                        </li>
                        <li class="tab" onclick="openTab('Directeur')">
                            <a>
                                <span class="icon"><i class="fas fa-user-tie"></i>&nbsp;Directeur</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="box boite">
                    <h1 class="title has-text-weight-bold">SE CONNECTER</h1>
                    <div class="stroke-line is-center"></div>
                    <?php
                    require 'forms/login.form.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>