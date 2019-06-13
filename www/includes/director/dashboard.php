<div class="tile is-ancestor" style="margin: 10px;">
    <div class="tile is-parent">
        <article class="tile is-child ">
            <article class="message">
                <div class="message-header">
                    <p>Ajouter un billet</p>
                </div>
                <div class="message-body">
                    <?php
                    if (!empty($errors)) {
                        foreach ($errors as $error) {
                            ?>
                            <article class="message is-danger">
                                <div class="message-body">
                                    <?php echo $error; ?>
                                </div>
                            </article>
                        <?php
                    }
                }
                require('includes/forms/add-ticket.form.php'); ?>
                </div>
            </article>
        </article>
    </div>
    <div class="tile is-parent">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Vos derniers billets</p>
                </div>
                <div class="message-body">
                    <div class="card" style="margin-bottom: 5%;">
                        <header class="card-header">
                            <p class="card-header-title">
                                <span class="tag is-warning is-rounded" style="margin-right: 10px;">Retard</span>
                                <span class="tag is-danger is-rounded" style="margin-right: 10px;">Non Justifié</span>
                                Nom Prénom | Promo - Groupe
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <span class="tag is-success is-rounded" style="margin-right: 10px;">M2101</span>
                                <span class="tag is-info is-rounded" style="margin-right: 10px;">16 Juin 2019 - 11h39</span> <br>
                                <strong>Commentaire:<br></strong>
                                En Retard de 30 minutes.
                            </div>
                            <div class="columns" style="text-align: center">
                                <div class="column">
                                    <a href="#" class="button is-link" aria-haspopup="true" onclick="m1.m1_acc.open()">
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
                    <div class="card">
                        <header class="card-header">
                            <p class="card-header-title">
                                <span class="tag is-warning is-rounded" style="margin-right: 10px;">Retard</span>
                                <span class="tag is-danger is-rounded" style="margin-right: 10px;">Non Justifié</span>
                                Nom Prénom | Promo - Groupe
                            </p>
                        </header>
                        <div class="card-content">
                            <div class="content">
                                <span class="tag is-success is-rounded" style="margin-right: 10px;">M2101</span>
                                <span class="tag is-info is-rounded" style="margin-right: 10px;">16 Juin 2019 - 11h39</span> <br>
                                <strong>Commentaire:<br></strong>
                                En Retard de 30 minutes.
                            </div>
                            <div class="columns" style="text-align: center">
                                <div class="column">
                                    <a href="#" class="button is-link" aria-haspopup="true" onclick="m1.m1_acc.open()">
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
<div id="m1_acc" class="modal">
    <div class="modal-background" onclick="m1.m1_acc.close()"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Nom Prénom | Promo - Groupe
            </p>
            <button class="delete" aria-label="close" onclick="m1.m1_acc.close()"></button>
        </header>
        <section class="modal-card-body">
            <strong>N°Étudiant : </strong><span class="tag is-primary is-rounded" style="margin-right: 10px;">21800346</span>
            <br><strong>Type : </strong><span class="tag is-warning is-rounded" style="margin-right: 10px;">Retard</span>
            <br><strong>Motif : </strong>Médical
            <br><strong>État : </strong><span class="tag is-danger is-rounded" style="margin-right: 10px;">Non Justifié</span>
            <br><strong>Date : </strong><span class="tag is-info is-rounded" style="margin-right: 10px;">16 Juin 2019 - 11h39</span>
            <br><strong>Module : </strong><span class="tag is-success is-rounded" style="margin-right: 10px;">M2101</span>
            <label class="label">Commentaire :</label>
            <div class="field">
                <div class="control">
                    <textarea class="textarea has-fixed-size" placeholder="Le Commentaire dans la base" rows="5"></textarea>
                </div>
                <p class="help">
                    X caractères restants
                </p>
            </div>
        </section>
        <footer class="modal-card-foot">
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
        </footer>
    </div>
</div>
<div id="information" class="modal">
    <div class="modal-background" onclick="michel2.information.close()"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Vos Informations !
            </p>
            <button class="delete" aria-label="close" onclick="michel2.information.close()"></button>
        </header>
        <section class="modal-card-body">
            <span class="icon is-small">
                <i class="fas fa-user-graduate"></i>
            </span></i><strong>N°Étudiant : </strong><span class="tag is-light is-rounded" style="margin-right: 10px;">21800346</span>
            <br><strong>Nom : </strong><span class="tag is-dark is-rounded" style="margin-right: 10px;">Michel</span>
            <span class="icon is-small">
                <i class="fas fa-signature"></i>
            </span></i><br><strong>Prénom : </strong><span class="tag is-black is-rounded" style="margin-right: 10px;">Jacquie</span>
            <span class="icon is-small">
                <i class="fas fa-signature"></i>
            </span></i><br><strong>Mail : </strong><span class="tag is-link is-rounded" style="margin-right: 10px;">21800346@unicaen</span>
            <span class="icon is-small">
                <i class="fas fa-envelope-open"></i>
            </span></i><br><strong>Groupe : </strong><span class="tag is-info is-rounded" style="margin-right: 10px;">TP 2.2</span>
            <span class="icon is-small">
                <i class="fas fa-graduation-cap"></i>
            </span></i><br><strong>Promo : </strong><span class="tag is-primary is-rounded" style="margin-right: 10px;">1ère année</span>
            <span class="icon is-small">
                <i class="fas fa-university"></i>
            </span></i>
        </section>
        <footer class="modal-card-foot">
            <strong>Vous êtes Mme Jort</strong>
        </footer>
    </div>
</div>