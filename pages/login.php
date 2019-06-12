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
<section class="hero is-primary has-background-grey-darker is-fullheight">
    <div class="hero-body has-text-centered">
        <div class="container">
            <div class="column is-6 is-offset-3">
                <div class="box" style="border-radius: 20px;">
                    <h1 class="title has-text-warning has-text-weight-bold">SE CONNECTER</h1>
                    <div class="stroke-line is-center"></div>
                    <form action="" method="POST">
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <label>
                                    <input placeholder="Nom d'utilisateur" class="input" type="text" name="username" id="username" />
                                    <span class="icon is-small is-left">
                                                <i class="fas fa-user"></i>
                                            </span>
                                </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left">
                                <label>
                                    <input placeholder="Mot de passe" class="input" type="password" name="password" id="password" />
                                    <span class="icon is-small is-left">
                                                <i class="fas fa-lock"></i>
                                            </span>
                                </label>
                            </div>
                        </div>

                        <input type="submit" name="submit" id="submit" value="Connexion" class="button is-block has-text-black is-warning is-fullwidth has-text-weight-medium" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>