<form method="POST">
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
    <div style="display:none">
        <input class="input" type="text" name="rang" id="rang" value="ETU">
    </div>
    <br>
    <button name="submit" id="submit" class="button is-block has-text-black is-fullwidth has-text-weight-medium bg-bleu">Connexion</button>
</form>