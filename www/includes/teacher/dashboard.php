<div class="tile is-ancestor" style="margin: 10px;">
    <div class="tile is-parent">
        <article class="tile is-child ">
            <article class="message">
                <div class="message-header">
                    <p>Ajouter un billet</p>
                </div>
                <div class="message-body">
                    <?php require('includes/forms/add-ticket.form.php'); ?>
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
                                    <a href="#" class="button is-link" aria-haspopup="true">
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
                                    <a href="#" class="button is-link" aria-haspopup="true">
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
<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Nom Prénom | Promo - Groupe
            </p>
            <button class="delete" aria-label="close"></button>
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