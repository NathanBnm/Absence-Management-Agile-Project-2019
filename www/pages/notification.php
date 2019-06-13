<div class="tile is-ancestor" style="margin: 10px;">
    <div class="tile is-parent">
        <article class="tile is-child ">
            <article class="message">
                <div class="message-header">
                    <p>Envoyer une notification</p>
                </div>
                <div class="message-body">
                    <div class="field is-vertical">
                        <div class="field-label is-normal">
                            <label class="label">Destinataire :</label>
                        </div>
                        <div class="field-label">
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" placeholder="ex: ok@mail.com">
                                </div>
                            </div>
                        </div>
                        <div class="field-label is-normal">
                            <label class="label">Sujet :</label>
                        </div>
                        <div class="field-label">
                            <div class="field">
                                <div class="control">
                                    <input class="input" type="text" placeholder="ex: Rendu projet absence">
                                    <textarea class="textarea has-fixed-size" placeholder="Votre Commentaire" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field is-vertical">
                        <div class="field-label">
                            <div class="field is-grouped">
                                <div class="control">
                                    <a class="button is-success" aria-haspopup="true">
                                        <span class="icon is-small">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span>Confirmer</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            </article>
        </article>
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