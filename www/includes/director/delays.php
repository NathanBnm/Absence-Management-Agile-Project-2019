<div class="tile is-ancestor">
    <div class="tile is-parent" style="margin: 20px;">
        <article class="tile is-child">
            <article class="message">
                <div class="message-header">
                    <p>Tous vos billets de retard</p>
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
                            $retards = list_director_delays();
                            foreach ($retards as $retard) {
                                if ($retard->SIG_TRAITE == 0) {
                                    $color = "is-danger";
                                } else {
                                    $color = "is-success";
                                }

                                if ($retard->SIG_ETAT == "Non justifié") {
                                    $color_etat = "is-danger";
                                } else {
                                    $color_etat = "is-success";
                                }

                                if ($retard->COU_CONTROLE == 1) {
                                    $color_controle = "is-success";
                                } else {
                                    $color_controle = "is-danger";
                                }

                                ?>
                                <tr>
                                    <td>
                                        <strong><?php echo $retard->COU_MODULE; ?></strong>
                                    </td>
                                    <td>
                                        <?php echo strtoupper($retard->COU_TYPE); ?>
                                    </td>
                                    <td>
                                        <span class="tag <?php echo $color_controle ?> is-rounded">
                                            <?php
                                            if ($retard->COU_CONTROLE == 1) {
                                                echo "Oui";
                                            } else {
                                                echo "Non";
                                            }
                                            ?>
                                        </span> <br>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" value="<?php echo $retard->SIG_CODE; ?>" id="etat" name="etat">
                                            <button type="submit" id="justifier" name="justifier" class="button <?php echo $color_etat; ?> is-rounded">
                                                <?php echo $retard->SIG_ETAT; ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php echo $retard->UTI_IDENTIFIANT; ?>
                                    </td>
                                    <td>
                                        <span class="uppercase">
                                            <?php echo $retard->UTI_NOM; ?>
                                        </span>
                                        <?php echo $retard->UTI_PRENOM; ?>
                                    </td>
                                    <td>
                                        <span class="uppercase">
                                            <?php echo $retard->UTI_ENS_NOM; ?>
                                        </span>
                                        <?php echo $retard->UTI_ENS_PRE; ?>
                                    </td>
                                    <td>
                                        <?php echo $retard->SIG_MOTIF; ?>
                                    </td>
                                    <td>
                                        <?php echo $retard->SIG_COMMENTAIRE; ?>
                                    </td>
                                    <td>
                                        <?php echo $retard->SIG_DATE; ?>
                                    </td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" value="<?php echo $retard->SIG_CODE; ?>" id="coder" name="coder">
                                            <button type="submit" id="traite" name="traite" class="button <?php echo $color; ?> is-rounded">
                                                <?php
                                                if ($retard->SIG_TRAITE == 0) {
                                                    echo "Non traité";
                                                } else {
                                                    echo "Traité";
                                                }
                                                ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="index.php?page=edit&id=<?php echo $retard->SIG_CODE; ?>" class="button is-info">
                                            <span class="icon is-small">
                                                <i class="far fa-edit"></i>
                                            </span>
                                        </a>
                                        <form method="POST">
                                            <input type="hidden" value="<?php echo $retard->SIG_CODE; ?>" id="code" name="code">
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