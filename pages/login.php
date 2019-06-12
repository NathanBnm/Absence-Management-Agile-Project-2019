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