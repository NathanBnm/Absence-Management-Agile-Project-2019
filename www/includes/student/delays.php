<div class="tile is-ancestor">
    <div class="tile is-parent" style="margin: 20px;">
        <article class="tile is-child">
            <article class="message is-info">
                <div class="message-header">
                    <p>Tous vos Billets de Retards</p>
                </div>
                <div class="message-body">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th><abbr title="module">Module</abbr></th>
                                <th><abbr title="etat">État</abbr></th>
                                <th><abbr title="etucode">N°Étudiant</abbr></th>
                                <th><abbr title="prenom">Prénom</abbr></th>
                                <th><abbr title="nom">Nom</abbr></th>
                                <th><abbr title="nom">Motif</abbr></th>
                                <th><abbr title="commentaire">Commentaire</abbr></th>
                                <th><abbr title="date">Date</abbr></th>
                                <th><abbr title="date">Statut</abbr></th>
                                <th><abbr title="edit">Options</abbr></th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                            <tr>
                                <th>M2101</th>
                                <td><span class="tag is-danger is-rounded">Non Justifié</span></td>
                                <td>21800346</td>
                                <td>Marie</td>
                                <td>Martin</td>
                                <td>Panne de Réveil</td>
                                <td>2eme absence à ce cours</td>
                                <td>15/06/2019</td>
                                <td><span class="tag is-danger is-rounded">Non Traité</span></td>
                                <td>
                                    <a class="button is-primary">
                                        <span class="icon is-small">
                                            <i class="fas fa-eye"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
            <br><strong>État : </strong><span class="tag is-danger is-rounded" style="margin-right: 10px;">Non Justifié</span>
            <br><strong>Date : </strong><span class="tag is-info is-rounded" style="margin-right: 10px;">16 Juin 2019 - 11h39</span>
            <br><strong>Module : </strong><span class="tag is-dark is-rounded" style="margin-right: 10px;">M2101</span>
            <label class="label">Commentaire du professeur :</label>
            <div class="field">
                <div class="control">
                    <textarea class="textarea" readonly>Ici commentaire du professeur !</textarea>
                </div>
            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="file is-success">
                <label class="file-label">
                    <input class="file-input" type="file" name="resume">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="file-label">
                            Justifier
                        </span>
                    </span>
                    <span class="file-name">
                        Justification.png
                    </span>
                </label>
            </div>
        </footer>
    </div>
</div>
<div class="modal">
    <div class="modal-background"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Vos Informations !
            </p>
            <button class="delete" aria-label="close"></button>
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
            <strong>Vous êtes un étudiant</strong>
        </footer>
    </div>
</div>