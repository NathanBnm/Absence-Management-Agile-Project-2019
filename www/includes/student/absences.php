<?php
$total_absences = count_students_absences();
?>

<div class="tile is-ancestor">
    <div class="tile is-parent" style="margin: 20px;">
        <article class="tile is-child">
            <article class="message is-dark">
                <div class="message-header">
                    <p>Tous vos billets d'absence (<?php echo $total_absences; ?>)</p>
                </div>
                <div class="message-body">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <th>Type</th>
                                <th>Contrôle</th>
                                <th>État</th>
                                <th>Enseignant</th>
                                <th>Motif</th>
                                <th>Commentaire</th>
                                <th>Date</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                            <?php
                            $color_etat = null;
                            $color_controle = null;
                            $absences = list_students_absences();
                            foreach ($absences as $absence) {
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
                                    <th>
                                        <?php echo $absence->COU_MODULE; ?>
                                    </th>
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
                                        <span class="tag <?php echo $color_etat ?> is-rounded">
                                            <?php echo $absence->SIG_ETAT; ?>
                                        </span>
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
                                        <a class="button is-primary" onclick="michel.Consultation.open()" title="Visualiser">
                                            <span class="icon is-small">
                                                <i class="fas fa-eye"></i>
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