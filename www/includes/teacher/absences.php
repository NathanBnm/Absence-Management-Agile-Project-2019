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
                                <th>Module</th>
                                <th>Type</th>
                                <th>État</th>
                                <th>N°Étudiant</th>
                                <th>Étudiant</th>
                                <th>Motif</th>
                                <th>Commentaire</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                            <?php
                            $color = null;
                            $color_etat = null;
                            $absences = list_teacher_absences();
                            foreach ($absences as $absence) {
                                if ($absence->SIG_TRAITE == 0) {
                                    $color = "is-danger";
                                } else {
                                    $color = "is-success";
                                }

                                if ($absence->SIG_ETAT == "Non justifié") {
                                    $color_etat = "is-danger";
                                } else if ($absence->SIG_ETAT == "Rattrapage") {
                                    $color_etat = "is-warning";
                                } else {
                                    $color_etat = "is-success";
                                }
                                ?>
                                <tr>
                                    <td>
                                        <strong><?php echo $absence->COU_MODULE; ?></strong>
                                    </td>
                                    <td>
                                        <?php echo strtoupper($absence->COU_TYPE); ?>
                                    </td>
                                    <td>
                                        <span class="tag <?php echo $color_etat ?> is-rounded"><?php echo $absence->SIG_ETAT; ?></span>
                                    </td>
                                    <td>
                                        <?php echo $absence->UTI_IDENTIFIANT; ?>
                                    </td>
                                    <td>
                                        <span class="uppercase">
                                            <?php echo strtoupper($absence->UTI_NOM); ?>
                                        </span>
                                        <?php echo $absence->UTI_PRENOM; ?>
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
                                        <span class="tag <?php echo $color ?> is-rounded">
                                            <?php
                                            if ($absence->SIG_TRAITE == 0) {
                                                echo "Non traité";
                                            } else {
                                                echo "Traité";
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td>
                                        <a href="index.php?page=edit&id=<?php echo $absence->SIG_CODE; ?>" class="button is-info">
                                            <span class="icon is-small">
                                                <i class="far fa-edit"></i>
                                            </span>
                                        </a>
                                        <form method="POST">
                                            <input type="hidden" value="<?php echo $absence->SIG_CODE; ?>" id="code" name="code">
                                            <button type="submit" class="button is-danger" id="delete" name="delete">
                                                <span class="icon is-small">
                                                    <i class="fas fa-trash-alt"></i>
                                                </span>
                                            </button>
                                        </form>
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
<div class="modal" id="Modif_absence">
    <div class="modal-background" onclick="abs.Modif_absence.close()"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Nom Prénom | Promo - Groupe
            </p>
            <button class="delete" aria-label="close" onclick="abs.Modif_absence.close()"></button>
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
                    <textarea name="comment" class="textarea has-fixed-size" placeholder="Le Commentaire dans la base" rows="5"></textarea>
                </div>
                <p class="help">
                    X caractères restants
                </p>
            </div>
        </section>
        <footer class="modal-card-foot">
            <div class="field is-grouped">
                <div name="conf" class="control" onclick="abs.Modif_absence.close()">
                    <a class="button is-success" aria-haspopup="true">
                        <span class="icon is-small">
                            <i class="fas fa-check"></i>
                        </span>
                        <span>Confirmer</span>
                    </a>
                </div>
                <div class="control" onclick="abs.Modif_absence.close()">
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