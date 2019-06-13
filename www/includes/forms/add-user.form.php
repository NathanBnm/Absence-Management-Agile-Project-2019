<form id="add-course" method="POST">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Module :</label>
        </div>
        <div class="field-label">
            <div class="field">
                <div class="control">
                    <input class="input is-danger" type="text" placeholder="ex: 2101" id="module" name="module">
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
                    <select id="type" name="type">
                        <option value="td">Travaux Dirigés (TD)</option>
                        <option value="tp">Travaux Pratiques (TP)</option>
                        <option value="cm">Cours Magistral (CM)</option>
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
                    <input class="input is-danger" type="text" placeholder="ex: Adminstration de Base De Données" id="coursename" name="coursename">
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
                    <select id="year" name="year">
                        <option value="1">1<sup>ère</sup> année</option>
                        <option value="2">2<sup>ème</sup> année</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Groupe :</label>
        </div>
        <div class="field-label">
            <div class="control">
                <div class="select">
                    <select id="group" name="group">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>

                        <option value="1.1">1.1</option>
                        <option value="1.2">1.2</option>
                        <option value="2.1">2.1</option>
                        <option value="2.2">2.2</option>
                        <option value="3.1">3.1</option>
                        <option value="3.2">3.2</option>
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
                <div class="field">
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
                    <p class="help is-danger">
                        Ce champ est obligatoire
                    </p>
                </div>
                <div class="field">
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
                </div>
                <div class="field">
                    <div class="control">
                        <input class="input is-danger" type="time" placeholder="ex: 12:00">
                    </div>
                    <p class="help is-danger">
                        Ce champ est obligatoire
                    </p>
                </div>
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