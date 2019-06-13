<div class="tile is-ancestor">
    <div class="tile is-parent" style="margin: 20px;">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Tous vos billets d'absence</p>
                </div>
                <div class="message-body">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th><abbr title="module">Module</abbr></th>
                                <th><abbr title="type">Type</abbr></th>
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
                            <?php
                                $absences = list_teacher_absences();
                                foreach($absences as $absence) {
                            ?>
                            <tr>
                                <td>
                                    <strong><?php echo $absence->COU_MODULE; ?></strong>
                                </td>
                                <td>
                                    <?php echo strtoupper($absence->COU_TYPE); ?>
                                </td>
                                <td>
                                    <span class="tag is-danger is-rounded"><?php echo $absence->SIG_TYPE; ?></span>
                                </td>
                                <td>
                                    <?php echo $absence->UTI_IDENTIFIANT; ?>
                                </td>
                                <td>
                                    <?php echo $absence->UTI_PRENOM; ?>
                                </td>
                                <td>
                                    <?php echo $absence->UTI_NOM; ?>
                                </td>
                                <td>
                                    <?php echo $absence->SIG_MOTIF; ?>
                                </td>
                                <td>
                                    <?php echo $absence->SIG_COMMENTAIRE; ?>
                                </td>
                                <td>
                                    <?php echo $absence->SIG_DATE; ?>
                                </td>
                                <td>
                                    <span class="tag is-danger is-rounded">
                                        <?php 
                                            if($absence->SIG_TRAITE == 0) {
                                                echo "Non traité";
                                            } else {
                                                echo "Traité";
                                            }
                                        ?>
                                    </span>
                                </td>
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
                            <?php
                                }
                            ?>
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