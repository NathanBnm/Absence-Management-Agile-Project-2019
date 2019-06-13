<div class="tile is-ancestor" style="margin: 10px;">
    <div class="tile is-parent">
        <article class="tile is-child ">
            <article class="message">
                <div class="message-header">
                    <p>Ajouter un Cours</p>
                </div>
                <div class="message-body">
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

                </div>
            </article>
        </article>
    </div>
    <div class="tile is-parent is-vertical">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Tout vos Cours</p>
                </div>
                <div class="message-body">
                    <div class="columns" style="text-align: center">
                        <div class="column">
                            <a href="#" class="button is-primary" aria-haspopup="true">
                                <span class="icon is-small">
                                    <i class="fas fa-clipboard-list"></i>
                                </span>
                                <span>Accéder</span>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </article>
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Votre dernier Cours</p>
                </div>
                <div class="message-body">
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                <span class="tag is-success is-rounded" style="margin-right: 10px;">M2101</span>
                                Nom du Cours | Date et Heure
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                Type de Cours: <span class="tag is-info is-rounded" style="margin-right: 10px;">TP</span><br>
                                Etudiants de <span class="tag is-info is-rounded" style="margin-right: 10px;">1ère Année</span><br>
                                Groupe: <span class="tag is-info is-rounded" style="margin-right: 10px;">2.2</span>

                            </div>
                            <div class="columns" style="text-align: center">
                                <div class="column">
                                    <a href="#info_modif" class="button is-link" aria-haspopup="true">
                                        <span class="icon is-small">
                                            <i class="far fa-edit"></i>
                                        </span>
                                        <span>Modifier</span>
                                    </a>
                                </div>
                                <div class="column">
                                    <a class="button is-danger">
                                        <span class="icon is-small">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                        <span>Supprimer</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </article>
    </div>
</div>