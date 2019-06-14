<form id="add-ticket" method="POST">
<div class="field is-horizontal">
    <div class="field-label is-normal ">
        <label class="label">Module :</label>
    </div>
    <div class="field-label">
        <div class="control">
            <div class="select ">
                <select id="module" name="module">
                    <?php
                    $modules = list_modules();
                    foreach ($modules as $module) {
                        echo '<option value="' . $module->COU_MODULE . '">' . $module->COU_MODULE . " - " . $module->COU_LIBELLE . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal ">
        <label class="label">Type de cours :</label>
    </div>
    <div class="field-label">
        <div class="control">
            <div class="select ">
                <select id="typecourse" name="typecourse">
                    <option value="TD">TD</option>
                    <option value="TP">TP</option>
                    <option value="CM">CM</option>
                    <option value="CC">CC</option>
                </select>
            </div>
        </div>
    </div>
</div>

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">Contrôle :</label>
        </div>
        <div class="field-label is-normal">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" id="controle">
                </label>
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
                    <input class="input" type="hidden" value="<?php echo date('Y'); ?>" id="year" name="year">
                </div>
                <div class="control">
                    <input class="input" type="time" id="time" name="time">
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
                <select id="type" name="type">
                    <option value="A">Absence</option>
                    <option value="R">Retard</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">Etudiant :</label>
    </div>
    <div class="field-label">
        <div class="field">
            <div class="control">
                <input class="input" type="text" placeholder="ex: 21801010" id="etupass" name="etupass" autocomplete="off">
            </div>
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
                <textarea class="textarea has-fixed-size" placeholder="Votre commentaire" rows="5" maxlength="255" id="message" name="message" value="if( isset($_GET['module'])) {echo $_GET['module'];}"></textarea>
            </div>
            <p id="count" class="help">
                0 / 255
            </p>
            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-success" aria-haspopup="true" id="submit-ticket" name="submit-ticket">
                        <span class="icon is-small">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Confirmer</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>