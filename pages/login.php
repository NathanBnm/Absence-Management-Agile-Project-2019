<?php
if (isset($_POST['submit'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $errors[];

    if(empty($username) || empty($password)) {
        $errors['empty'] = "Tous les champs n'ont pas été remplis";
    }
    else if(user_exist($username, $token) == 0 || user_exist($username, $token) > 1) {
        $errors['user_not_found'] = "Identifiant ou mot de passe incorrect";
    }

    if(!empty($errors)){
        foreach($errors as $error) {
            echo "<p>".$error."</p>";
        }
    }
    else {
        header("Location:index.php?page=dashboard");
        exit;
    }
}

?>

<section class="hero is-primary has-background-grey-darker is-fullheight">
    <div class="hero-body has-text-centered">
        <div class="container">
            <div class="column is-6 is-offset-3">
                <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="http://www.unicaen.fr/iutcaen/">
                            <img src="../img/logoiut.png" width="30" height="40">
                        </a>

                    </div>

                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-start">
                            <a class="navbar-item item has-text-centered">
                                Espace étudiant
                            </a>

                            <a class="navbar-item item has-text-centered">
                                Espace professeur
                            </a>

                            <a class="navbar-item item has-text-centered">
                                Directeur des études
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="box" style="border-radius: 20px;">
                    <h1 class="title has-text-warning has-text-weight-bold">SE CONNECTER</h1>
                    <div class="stroke-line is-center"></div>
                    <?php
                    require 'forms/login.form.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>