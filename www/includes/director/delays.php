<div class="tile is-ancestor">
    <div class="tile is-parent" style="margin: 20px;">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Tous vos Billets d'Absences</p>
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
                            <td>Maladie</td>
                            <td>2eme absence à ce cours</td>
                            <td>15/06/2019</td>
                            <td><label class="checkbox"><input type="checkbox"></label></td>
                            <td>
                                <a href="#" class="button is-info" aria-haspopup="true">
                                        <span class="icon is-small">
                                            <i class="far fa-edit"></i>
                                        </span>
                                </a>
                                <a class="button is-danger">
                                        <span class="icon is-small">
                                            <i class="fas fa-trash-alt"></i>
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
            <br><strong>Motif : </strong><textarea class="textarea has-fixed-size" placeholder="Motif" rows="1"></textarea>
            <br><strong>État : </strong><span class="tag" style="margin-right: 10px;">
                <div class="select is-danger is-rounded">
                    <select>
                        <option>Non Justifié</option>
                        <option>Justifié</option>
                    </select>
                </div>
            </span>
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