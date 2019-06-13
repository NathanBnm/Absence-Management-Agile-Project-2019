<form id="add-course" method="POST">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Module :</label>
        </div>
        <div class="field-label">
            <div class="field">
                <div class="control">
                    <input class="input is-danger" type="text" placeholder="ex: 2101">
                </div>
                <p class="help is-danger">
                    Ce champ est obligatoire
                </p>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal ">
            <label class="label">Type de Cours :</label>
        </div>
        <div class="field-label">
            <div class="control">
                <div class="select ">
                    <select>
                        <option>Travaux Dirigés (TD)</option>
                        <option>Travaux Pratiques (TP)</option>
                        <option>Cours Magistral (CM)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Nom du Cours :</label>
        </div>
        <div class="field-label">
            <div class="field">
                <div class="control">
                    <input class="input is-danger" type="text" placeholder="ex: Adminstration de Base De Données">
                </div>
                <p class="help is-danger">
                    Ce champ est obligatoire
                </p>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal ">
            <label class="label">Étudiants de </label>
        </div>
        <div class="field-label">
            <div class="control">
                <div class="select ">
                    <select>
                        <option>1ère Année</option>
                        <option>2eme Année</option>
                        <option>3eme Année</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal ">
            <label class="label">Groupe :</label>
        </div>
        <div class="field-label">
            <div class="control">
                <div class="select ">
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>

                        <option>1.1</option>
                        <option>1.2</option>
                        <option>2.1</option>
                        <option>2.2</option>
                        <option>3.1</option>
                        <option>3.2</option>
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
            <div class="field">
                <div class="control">
                    <input class="input is-danger" type="text" placeholder="ex: Marie">
                </div>
                <p class="help is-danger">
                    Ce champ est obligatoire
                </p>
            </div>
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
</form>