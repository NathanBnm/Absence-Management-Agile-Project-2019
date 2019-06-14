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
                                <th>Contrôle</th>
                                <th>État</th>
                                <th>N°Étudiant</th>
                                <th>Étudiant</th>
                                <th>Enseignant</th>
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
                            $color_controle = null;
                            $absences = list_director_absences();
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

                                if ($absence->COU_CONTROLE == 1) {
                                    $color_controle = "is-success";
                                } else {
                                    $color_controle = "is-danger";
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
                                        <span class="tag <?php echo $color_controle ?> is-rounded">
                                            <?php
                                            if ($absence->COU_CONTROLE == 1) {
                                                echo "Oui";
                                            } else {
                                                echo "Non";
                                            }
                                            ?>
                                        </span> <br>
                                    </td>
                                    <td>
                                        <span class="tag <?php echo $color_etat; ?> is-rounded"><?php echo $absence->SIG_ETAT; ?></span>
                                    </td>
                                    <td>
                                        <?php echo $absence->UTI_IDENTIFIANT; ?>
                                    </td>
                                    <td>
                                        <span class="uppercase">
                                            <?php echo $absence->UTI_NOM; ?>
                                        </span>
                                        <?php echo $absence->UTI_PRENOM; ?>
                                    </td>
                                    <td>
                                        <span class="uppercase">
                                            <?php echo $absence->UTI_ENS_NOM; ?>
                                        </span>
                                        <?php echo $absence->UTI_ENS_PRE; ?>
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
                                        <form method="POST">
                                            <input type="hidden" value="<?php echo $absence->SIG_CODE; ?>" id="coder" name="coder">
                                            <button type="submit" id="traite" name="traite" href="#" class="button <?php echo $color; ?> is-rounded">
                                                <?php
                                                if ($absence->SIG_TRAITE == 0) {
                                                    echo "Non traité";
                                                } else {
                                                    echo "Traité";
                                                }
                                                ?>
                                            </button>
                                        </form>
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