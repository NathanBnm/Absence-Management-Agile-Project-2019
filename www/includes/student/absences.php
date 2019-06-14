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
                                foreach($absences as $absence) {
                                    if($absence->SIG_ETAT == "Non justifié") {
                                        $color_etat = "is-danger";
                                    } else if ($absence->SIG_ETAT == "Rattrapage"){
                                        $color_etat = "is-warning";
                                    } else{
                                        $color_etat = "is-success";
                                    }

                                    if ($absence->COU_CONTROLE == 1) {
                                        $color_controle = "is-success";
                                    }
                                    else {
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
                                            }
                                            else {
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
<div id="Consultation" class="modal">
    <div class="modal-background" onclick="michel.Consultation.close()"></div>
    <div class="modal-card">
        <header class="modal-card-head">
            <p class="modal-card-title">
                Nom Prénom | Promo - Groupe
            </p>
            <button class="delete" aria-label="close" onclick="michel.Consultation.close()"></button>
        </header>
        <section class="modal-card-body">
            <strong>N°Étudiant : </strong><span class="tag is-primary is-rounded" style="margin-right: 10px;">21800346</span>
            <br><strong>Type : </strong><span class="tag is-warning is-rounded" style="margin-right: 10px;">Absence</span>
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