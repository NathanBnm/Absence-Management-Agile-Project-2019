<form id="add-ticket" method="POST"></form>
<div class="field is-horizontal">
    <div class="field-label is-normal ">
        <label class="label">Séléctioner votre Cours :</label>
    </div>
    <div class="field-label">
        <div class="control">
            <div class="select ">
                <select>
                    <option>M2101 - 15/06/2019</option>
                    <option>M2101 - 16/06/2019</option>
                    <option>M2101 - 16/06/2019</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Date et Heure :</label>
    </div>
    <div class="field-label">
        <div class="field-body">
            <div class="field is-grouped">
                <div class="control">
                    <div class="select">
                        <select id="day" name="day">
                            <option value="0" class="selected" selected>Jour</option>
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control">
                    <div class="select">
                        <select id="month" name="month">
                            <option value="0" class="selected" selected>Mois</option>
                            <option value="01">Janvier</option>
                            <option value="02">Février</option>
                            <option value="03">Mars</option>
                            <option value="04">Avril</option>
                            <option value="05">Mai</option>
                            <option value="06">Juin</option>
                            <option value="07">Juillet</option>
                            <option value="08">Août</option>
                            <option value="09">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>
                    </div>
                </div>
                <div class="control">
                    <input class="input is-danger" type="time">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal ">
        <label class="label">Type de billet :</label>
    </div>
    <div class="field-label">
        <div class="control">
            <div class="select ">
                <select>
                    <option>Absence</option>
                    <option>Retard</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Nom de l'Elève :</label>
    </div>
    <div class="field-label">
        <div class="field">
            <div class="control">
                <input class="input is-danger" type="text" placeholder="ex: Marie">
            </div>
            <p class="help is-danger">
                Ce champ est obligatoire
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Prénom de l'Elève :</label>
    </div>
    <div class="field-label">
        <div class="field">
            <div class="control">
                <input class="input is-danger" type="text" placeholder="ex: Martin">
            </div>
            <p class="help is-danger">
                Ce champ est obligatoire
            </p>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Commentaire :</label>
    </div>
    <div class="field-label">
        <div class="field">
            <div class="control">
                <textarea class="textarea has-fixed-size" placeholder="Votre Commentaire" rows="5"></textarea>
            </div>
            <p class="help">
                X caractères restants
            </p>
            <div class="field is-grouped">
                <div class="control">
                    <a class="button is-success" aria-haspopup="true">
                        <span class="icon is-small">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Confirmer</span>
                    </a>
                </div>
                <div class="control">
                    <a class="button is-danger" aria-haspopup="true">
                        <span class="icon is-small">
                            <i class="fas fa-ban"></i>
                        </span>
                        <span>Annuler</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>